<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_m extends CI_Model {

    public function config_datatable()
	{       
        $data['datatable_url'] = 'backend/data/datatable';
        $data['delete_url'] = site_url('backend/data/delete');        
        $data['datatable_header'] = '<tr>
                                        <th>NIK</th>
										<th>Nama</th>
										<th>Nama Orang Tua</th>
                                        <th>Usia</th>
										<th>Status</th>                                        
										<th>Status Pemantauan</th>
										<th width="80px">Action</th>
									</tr>';
		$data['datatable_column'] = array(
			'{"data": "nik"},',
			'{"data": "nama"},',
			'{"data": "nama_ortu"},',
            '{"data": "usia"},',
			'{"data": "status"},',            
			'{"data": "status_pemantauan"},',
			'{"data": "aksi", "className":"dt-center"},',
		);

		return $data;
	}

	public function datatable($post)
    {   
        
        $total_data = $this->db->get('suspect')->num_rows();
		// $total_filtered = $this->db->get('pasien')->num_rows();
        $column = array('s.nik','s.nama','s.nama_ortu', 's.tgl_lahir', 'ss.status', 'ss.status_pemantauan');

        // having
        if(isset($post["search"]["value"]) && !empty($post["search"]["value"]) ) {
			$q		= $post["search"]["value"];
                     
            $this->db->having("id_pasien LIKE '%".$q."%'");
            $this->db->or_having("nama_pasien LIKE '%".$q."%'");
            $this->db->or_having("nama_ibu LIKE '%".$q."%'");
            $this->db->or_having("tempat_lahir LIKE '%".$q."%'");
            $this->db->or_having("tgl_lahir LIKE '%".$q."%'");
            $this->db->or_having("alamat LIKE '%".$q."%'");
        }

        $total_filtered = $this->db->get('suspect')->num_rows();
  
        $this->db->select('s.nik as nik, s.nama as nama, s.nama_ortu as nama_ortu, s.tgl_lahir as tgl_lahir, ss.status as status, ss.status_pemantauan as status_pemantauan')
                 ->from('suspect as s')
                 ->join('status_suspect as ss', 'ss.nik = s.nik', 'LEFT');

        // having
        if(isset($post["search"]["value"]) && !empty($post["search"]["value"]) ) {
            $q		= $post["search"]["value"];
                        
            $this->db->having("id_pasien LIKE '%".$q."%'");
            $this->db->or_having("nama_pasien LIKE '%".$q."%'");
            $this->db->or_having("nama_ibu LIKE '%".$q."%'");
            $this->db->or_having("tempat_lahir LIKE '%".$q."%'");
            $this->db->or_having("tgl_lahir LIKE '%".$q."%'");
            $this->db->or_having("alamat LIKE '%".$q."%'");
        }

        // order
        $this->db->order_by($column[$post['order'][0]['column']], $post['order'][0]['dir']);

        // limit
        $this->db->limit($post['length'], $post['start']);


        $data = $this->db->get();
        
        $column = array();
        foreach ($data->result() as $row) {
            $date = date_create($row->tgl_lahir);
			$gg['nik'] = $row->nik;
			$gg['nama'] = $row->nama;
			$gg['nama_ortu'] = $row->nama_ortu;
            $gg['usia'] = get_usia($row->tgl_lahir);
			$gg['status'] =  strtoupper($row->status);   
			$gg['status_pemantauan'] = strtoupper($row->status_pemantauan);
            $gg['aksi'] = '<div class="btn-group"> <a class="btn btn-success btn-sm btn-flat" href="'.site_url().'backend/data/ganti-status/'.$row->nik.'"><i class="fa fa-book"></i></a> <a class="btn btn-primary btn-sm btn-flat" href="'.site_url().'backend/data/edit/'.$row->nik.'"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-sm btn-flat delete" data-id="'.$row->nik.'"><i class="fa fa-trash"></i></a> </div> ';
            $column[] = $gg;
        }

        $outp = array(
            'draw' => $post['draw'],
            "recordsTotal" => $total_data,
            "recordsFiltered" => $total_filtered,
            "data" => $column,
        );        

        return $outp;
    }

   
    
    public function get_single($id)
    {

        $data = $this->db->where('id_pasien',$id)->get('pasien');
        $column = array();
        foreach ($data->result() as $row) {
            $date = date_create($row->tgl_lahir);
            $cur_date = date_create();
			$gg['id_pasien'] = $row->id_pasien;
			$gg['nama_pasien'] = $row->nama_pasien;
			$gg['nama_ibu'] = $row->nama_ibu;
            $gg['tempat_lahir'] = $row->tempat_lahir;
            $gg['tgl_lahir'] = $row->tgl_lahir;
            $gg['usia'] = get_usia($row->tgl_lahir);
			$gg['alamat'] = $row->alamat;
            $column[] = $gg;
        }

        return $column[0];
    }

    public function insert($post)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";

        $status = array (
            'nik' => $post['nik'],
            'status' => $post['status'],
            'status_pemantauan' => $post['status_pemantauan'],
            'tanggal_penetapan' => $post['tanggal_penetapan'],
            'ket' => $post['ket']
        );

        unset($post['status'],$post['status_pemantauan'], $post['tanggal_penetapan'], $post['ket']);

        $insert =  $this->db->insert('suspect', $post);
		if($insert){
            $insert_status = $this->db->insert('status_suspect',$status);
            if($insert_status){ 
                $response['status'] = "success";
                $response['message'] = "Data Berhasil Disimpan";
                $response['redirect'] = site_url('backend/data');
            }
        }
        
		return $response;
    }

    public function update($id, $data)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";

        $this->db->where('id_pasien', $id);
		if ($this->db->update('pasien', $data)) {
            $response['status'] = "success";
            $response['message'] = "Data has been save";
            $response['redirect'] = site_url('pasien/daftar');
        };
        return $response;
    }

     public function delete($id)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";

        $this->db->where('id_pasien', $id);
		if ($this->db->delete('pasien')) {
            $response['status'] = "success";
            $response['message'] = "Data has been save";
            $response['redirect'] = site_url('pasien/daftar');
        };
        return $response;
    }

    public function proses($post)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";
        

        $insert =  $this->db->insert('pasien_dokter', $post);
        
		if($insert){
            $response['status'] = "success";
            $response['message'] = "Data Pasien Telah Diproses Ke Poly : ".$post['poly'];
		}
		return $response;
    }
    
}