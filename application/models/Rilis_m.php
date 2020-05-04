<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rilis_m extends CI_Model {

    public function config_datatable()
	{       
        $data['datatable_url'] = 'backend/rilis/datatable';
        $data['delete_url'] = site_url('backend/rilis/delete');        
        $data['datatable_header'] = '<tr>
                                        <th>ODP</th>
										<th>PDP</th>
										<th>OTG</th>
                                        <th>Positif</th> 
										<th>Tanggal Rilis</th>                                                                                                                       
										<th width="80px">Action</th>
									</tr>';
		$data['datatable_column'] = array(
			'{"data": "odp"},',
			'{"data": "pdp"},',
			'{"data": "otg"},',
            '{"data": "positif"},',   
			'{"data": "tanggal_rilis"},',                                 
			'{"data": "aksi", "className":"dt-center"},',
		);

		return $data;
	}

	public function datatable($post)
    {   
        
        $total_data = $this->db->get('rilis')->num_rows();
		// $total_filtered = $this->db->get('pasien')->num_rows();
        $column = array('odp','pdp', 'otg', 'selesai_dipantau', 'positif');

        // having
        if(isset($post["search"]["value"]) && !empty($post["search"]["value"]) ) {
			$q		= $post["search"]["value"];
                     
            $this->db->having("odp LIKE '%".$q."%'");
            $this->db->or_having("pdp LIKE '%".$q."%'");
            $this->db->or_having("otg LIKE '%".$q."%'");
            $this->db->or_having("selesai_dipantau LIKE '%".$q."%'");
            $this->db->or_having("positif LIKE '%".$q."%'");
        }

        $total_filtered = $this->db->get('rilis')->num_rows();

        // having
        if(isset($post["search"]["value"]) && !empty($post["search"]["value"]) ) {
            $q		= $post["search"]["value"];
                        
            $this->db->having("odp LIKE '%".$q."%'");
            $this->db->or_having("pdp LIKE '%".$q."%'");
            $this->db->or_having("otg LIKE '%".$q."%'");
            $this->db->or_having("selesai_dipantau LIKE '%".$q."%'");
            $this->db->or_having("positif LIKE '%".$q."%'");
        }

        // order
        $this->db->order_by($column[$post['order'][0]['column']], $post['order'][0]['dir']);

        // limit
        $this->db->limit($post['length'], $post['start']);


        $data = $this->db->get('rilis');
        
        $column = array();
        foreach ($data->result() as $row) {
            $date = date_create($row->tanggal_rilis);
			$gg['odp'] = $row->odp;
			$gg['pdp'] = $row->pdp;
			$gg['otg'] = $row->otg;
            $gg['positif'] = $row->positif;
			$gg['tanggal_rilis'] = date_format($date, "d M Y");            
            $gg['aksi'] = '<div class="btn-group"> <a class="btn btn-primary btn-sm btn-flat" href="'.site_url().'backend/rilis/edit/'.$row->id.'"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-sm btn-flat delete" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a> </div> ';
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

        $data = $this->db->where('id',$id)->get('rilis');
        $column = array();
        foreach ($data->result() as $row) {
            // $date = date_create($row->tanggal_rilis);
			$gg['odp'] = $row->odp;
			$gg['pdp'] = $row->pdp;
			$gg['otg'] = $row->otg;
            $gg['selesai_dipantau'] = $row->selesai_dipantau;
            $gg['positif'] = $row->positif;
            $gg['tanggal_rilis'] = $row->tanggal_rilis;
            $column[] = $gg;
        }

        return $column[0];
    }

    public function insert($post)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";

        $insert =  $this->db->insert('rilis', $post);
		if($insert){ 
            $response['status'] = "success";
            $response['message'] = "Data Berhasil Disimpan";
            $response['redirect'] = site_url('backend/rilis');
        }
        
		return $response;
    }

    public function update($id, $data)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";

        $this->db->where('id', $id);
		if ($this->db->update('rilis', $data)) {
            $response['status'] = "success";
            $response['message'] = "Data has been save";
            $response['redirect'] = site_url('backend/rilis');
        };
        return $response;
    }

     public function delete($id)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";

        $this->db->where('id', $id);
		if ($this->db->delete('rilis')) {
            $response['status'] = "success";
            $response['message'] = "Data has been save";
            $response['redirect'] = site_url('backend/rilis');
        };
        return $response;
    }

    public function get_data()
    {
        $query = $this->db->order_by('tanggal_rilis', 'DESC')->limit(1)->get('rilis');
        return $query->row_array();
    }

}