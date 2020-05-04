<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    public function config_datatable()
	{       
        $data['datatable_url'] = 'user/datatable';
        $data['delete_url'] = site_url('user/delete');        
        $data['datatable_header'] = '<tr>
                                        <th>Username</th>
										<th>Nama User</th>
										<th>Level</th>
                                        <th width="50px">Action</th>
									</tr>';
		$data['datatable_column'] = array(
			'{"data": "username"},',
			'{"data": "nama_user"},',
			'{"data": "level"},',
			'{"data": "aksi", "className":"dt-center"},',
		);

		return $data;
	}

	public function datatable($post)
    {   
        
        $total_data = $this->db->get('user')->num_rows();
		
        $column = array('username', 'nama_user', 'level', 'username');

        // having
        if(isset($post["search"]["value"]) && !empty($post["search"]["value"]) ) {
			$q		= $post["search"]["value"];
                     
            $this->db->having("username LIKE '%".$q."%'");
            $this->db->or_having("nama_user LIKE '%".$q."%'");
    
        }

        $total_filtered = $this->db->get('user')->num_rows();


            // having
        if(isset($post["search"]["value"]) && !empty($post["search"]["value"]) ) {
            $q		= $post["search"]["value"];
                        
            $this->db->having("username LIKE '%".$q."%'");
            $this->db->or_having("nama_user LIKE '%".$q."%'");
    
        }
        // order
        $this->db->order_by($column[$post['order'][0]['column']], $post['order'][0]['dir']);

        // limit
        $this->db->limit($post['length'], $post['start']);
        
        $data = $this->db->get('user');
        
        $column = array();
        foreach ($data->result() as $row) {
			$gg['username'] = $row->username;
			$gg['nama_user'] = $row->nama_user;
			$gg['level'] = ($row->level==0) ? 'root' : 'admin';
            $gg['aksi'] = '<div class="btn-group"> <a class="btn btn-primary btn-sm btn-flat" href="'.site_url().'user/edit/'.$row->username.'"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-sm btn-flat delete" data-id="'.$row->username.'"><i class="fa fa-trash"></i></a> </div> ';
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

    public function get_single($username)
    {
        $data = $this->db->where('username',$username)->get('user');
        $column = array();
        foreach ($data->result() as $row) {
			$gg['username'] = $row->username;
			$gg['nama_user'] = $row->nama_user;
			$gg['level'] = $row->level;
            $column[] = $gg;
        }

        return $column[0];
    }

    public function insert($post)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";

        $post['password'] = sha1($post['password']);
        unset($post['konfirm_password']);

		$insert =  $this->db->insert('user', $post);
		if($insert){
            $response['status'] = "success";
            $response['message'] = "Data has been save";
            $response['redirect'] = site_url('user');

		}
		return $response;
    }

    public function update($username, $data)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";

        $old_data = $this->db->where('username', $username)->limit(1)->get('user')->row();
        
        if(empty($data['password'])) {
            $data['password'] = $old_data->password;
        }else {
            $data['password'] = sha1($data['password']);
        }

        unset($data['konfirm_password']);

        $this->db->where('username', $username);
		if ($this->db->update('username', $data)) {
            $response['status'] = "success";
            $response['message'] = "Data has been save";
            $response['redirect'] = site_url('pasien/daftar');
        };
        return $response;
    }

     public function delete($username)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";

        $this->db->where('username', $username);
		if ($this->db->delete('user')) {
            $response['status'] = "success";
            $response['message'] = "Data has been save";
        };
        return $response;
    }

    public function cek_user($username) 
    {
        $valid = TRUE;
        $query = $this->db->where('username', $username)->get('user');
        $cek = $query->num_rows();
        if ($cek > 0) {
          $valid =  FALSE;  
        }

        return array('valid' => $valid);
    }
    
}