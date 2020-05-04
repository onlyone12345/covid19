<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct(){
		parent::__construct();		
        $this->load->model('login_m');
		in_access();
	}

    public function index()
    {
        // print_r($this->session->userdata('status'));
        $this->load->view('login'); 
    }

    public function login_action()
    {
        $username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => sha1($password)
			);
		$query = $this->login_m->cek_login("user",$where);
		$cek = $query->num_rows();
		if($cek > 0){
			$user = $query->result()[0];
			$data_session = array(
				'username' => $username,
				'status' => "login",
				'nama' => $user->nama_user,
				'level' => $user->level
			);
 
			$this->session->set_userdata($data_session);
            redirect(base_url('backend/dashboard'));
            
		}else{
			$this->session->set_flashdata('flash_data', 'Username dan password salah !');
			$this->load->view('login');
			
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}

?>