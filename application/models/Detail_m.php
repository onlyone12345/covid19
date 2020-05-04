<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_m extends CI_Model {


    public function update($data)
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";

        $this->db->where('id', 1);
		if ($this->db->update('detail_corona', $data)) {
            $response['status'] = "success";
            $response['message'] = "Data has been save";
            $response['redirect'] = site_url('backend/detail');
        };
        return $response;
    }


    public function get_data()
    {
        $query = $this->db->limit(1)->get('detail_corona');
        return $query->row_array();
    }
 
}