<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sebaran_m extends CI_Model {


    public function update()
    {
        $response['status'] = "fail";
        $response['message'] = "Data can't be save";
        $old_image = $this->db->get_where('sebaran_corona','id = 1' ,1)->row_array();
        
        $data['foto_sebaran_corona'] = $this->_updateImage();

        $this->db->where('id', 1);
		if ($this->db->update('sebaran_corona', $data)) {
            $this->_deleteImage($old_image['foto_sebaran_corona']);
            $response['status'] = "success";
            $response['message'] = "Data has been save";
            $response['redirect'] = site_url('backend/sebaran');
        };
        return $response;
    }

    public function get_data()
    {
        $query = $this->db->limit(1)->get('sebaran_corona');
        return $query->row_array();
    }

    private function _updateImage()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'sebaran'.time();
        $config['overwrite']			= true;
        $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_sebaran_corona')) {
            return $this->upload->data("file_name");
        }
        $error = array('error' => $this->upload->display_errors());
        
        return "default.jpg";
    }

    private function _deleteImage($old_image)
    {
        // print_r($old_image);
        if ($old_image != "default.jpg") {
            $filename = explode(".", $old_image)[0];
            return array_map('unlink', glob(FCPATH."upload/$filename.*"));
        }
    }
 
}