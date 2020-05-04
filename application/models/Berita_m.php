<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_m extends CI_Model {

    public function config_datatable()
	{       
        $data['datatable_url'] = 'backend/berita/datatable';
        $data['delete_url'] = site_url('backend/berita/delete');        
        $data['datatable_header'] = '<tr>
                                        <th>Judul Berita</th>
										<th>Gambar</th>
										<th>Status</th>
										<th>Tanggal Rilis</th>
										<th width="80px">Action</th>
									</tr>';
		$data['datatable_column'] = array(
			'{"data": "judul_berita"},',
			'{"data": "gambar"},',
            '{"data": "status"},',
			'{"data": "waktu_rilis"},',            
			'{"data": "aksi", "className":"dt-center"},',
		);

		return $data;
	}

	public function datatable($post)
    {   
        
        $total_data = $this->db->get('berita')->num_rows();
		
        $column = array('judul_berita','gambar', 'publish', 'waktu_rilis');

        // having
        if(isset($post["search"]["value"]) && !empty($post["search"]["value"]) ) {
			$q		= $post["search"]["value"];
                     
            $this->db->having("judul_berita LIKE '%".$q."%'");
        }

        $total_filtered = $this->db->get('berita')->num_rows();
  
        // having
        if(isset($post["search"]["value"]) && !empty($post["search"]["value"]) ) {
            $q		= $post["search"]["value"];
                        
            $this->db->having("judul_berita LIKE '%".$q."%'");
           
        }

        // order
        $this->db->order_by($column[$post['order'][0]['column']], $post['order'][0]['dir']);

        // limit
        $this->db->limit($post['length'], $post['start']);


        $data = $this->db->get('berita');
        
        $column = array();
        foreach ($data->result() as $row) {
            $date = date_create($row->waktu_rilis);
			$gg['judul_berita'] = '<a href="'.site_url('backend/berita/view/').$row->slug.'">'.$row->judul_berita.'</a>';
			$gg['gambar'] =  '<img src="'.$row->gambar.'" alt="gambar berita" heigt="auto" width="80px">';
			$gg['status'] =  ($row->publish == 1) ? '<p class="text-green">Dipublish</p>' : '<p class="text-red">Draft</p>';  
            $gg['waktu_rilis'] = date_format($date, "d M Y | H:i");
            $button_publish = ($row->publish == 0) ? '<a class="btn btn-success btn-sm btn-flat publish" data-id="'.$row->id.'"><i class="fa fa-check"></i></a>' : '<a class="btn btn-danger btn-sm btn-flat un-publish" data-id="'.$row->id.'"><i class="fa fa-times"></i></a>';
            $gg['aksi'] = '<div class="btn-group">'.$button_publish.'<a class="btn btn-primary btn-sm btn-flat" href="'.site_url().'backend/berita/edit/'.$row->id.'"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-sm btn-flat delete" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a> </div> ';
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

    function data($number,$offset){
		return $query = $this->db->order_by('id', 'DESC')->get('berita',$number,$offset)->result_array();		
	}


    function jumlah_data(){
		return $this->db->get_where('berita')->num_rows();
	}
    
    public function get_single($id)
    {
        $query = $this->db->get_where('berita', array('id' => $id));
        return $query->row_array();
    }

    public function insert($post)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";

        $post['slug'] = url_title($this->input->post('judul_berita'), 'dash', TRUE);

        unset($post['_wysihtml5_mode']);
        $insert =  $this->db->insert('berita', $post);
		if($insert){
            $response['status'] = "success";
            $response['message'] = "Data Berhasil Disimpan";
            $response['redirect'] = site_url('backend/berita');   
        }
        
		return $response;
    }

    public function update($id, $data)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";

        unset($data['_wysihtml5_mode']);
        $this->db->where('id', $id);
		if ($this->db->update('berita', $data)) {
            $response['status'] = "success";
            $response['message'] = "Data has been save";
            $response['redirect'] = site_url('backend/berita');
        };
        return $response;
    }

    public function delete($id)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";

        $this->db->where('id', $id);
		if ($this->db->delete('berita')) {
            $response['status'] = "success";
            $response['message'] = "Data has been save";
        };
        return $response;
    }

    public function publish($id)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";

        $status = $this->db->get_where('berita', array('id' => $id))->row_array();
        $publish = $status['publish'] == 0 ? 1 : 0 ;

        $this->db->where('id', $id);
		if ($this->db->update('berita', array('publish' => $publish))) {
            $response['status'] = "success";
            $response['message'] = "Berita berhasil diganti status";
        };
        return $response;
    }

    public function get_news($slug = FALSE)
    {
        if ($slug === FALSE)
        {
                $query = $this->db->order_by('id', 'DESC')->get('berita');
                return $query->result_array();
        }

        $query = $this->db->get_where('berita', array('slug' => $slug));
        return $query->row_array();
    }


    public function get_lastest_news($jumlah = 3)
    {
        $data = $this->db->select('*')->from('berita')->order_by('id', 'DESC')->limit($jumlah)->get()->result_array();

        return $data;
    }

  
}