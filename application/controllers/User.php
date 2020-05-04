<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$hak_akses = array(0);
		no_access($hak_akses);
	}

	
	public function index()
	{
		$this->load->model('user_m');
		$data = $this->user_m->config_datatable();

		$this->load->view('part/header');
		$this->load->view('user/daftar-user', $data);
		$this->load->view('part/footer');
	}

	public function datatable()
    {
        $this->load->model('user_m');
        $outp = $this->user_m->datatable($_POST);
	   
		print_r(json_encode($outp));
	}


	public function get_single()
	{
		$this->load->model('user_m');
        $outp = $this->user_m->get_single($_POST['id']);

		print_r(json_encode($outp));
	}

	public function tambah()
	{
		$config = array(
			'form_url' => site_url('user/insert'),
			'form_title' =>'tambah data user'
		);
		$this->load->view('part/header');
		$this->load->view('user/form', $config);
		$this->load->view('part/footer');
	}

	public function insert()
	{


		$this->load->model('user_m');
		$outp = $this->user_m->insert($_POST);
	
		print_r(json_encode($outp));
		
	}

	public function edit($username = NULL)
	{
		$this->load->model('user_m');
	
		$config = array(
			'form_url' => site_url('user/update/'.$username),
			'data' => $this->user_m->get_single($username),
			'form_title' =>'edit data user'
		);


		$this->load->view('part/header');		
		$this->load->view('user/form', $config);
		$this->load->view('part/footer');
	}

	public function update($id = NULL)
	{
		$this->load->model('user_m');
		$outp = $this->user_m->update($id, $_POST);
	
		print_r(json_encode($outp));
				
	}
	
	public function delete()
	{
		$this->load->model('user_m');
		$outp = $this->user_m->delete($_POST['username']);

		print_r(json_encode($outp));
	}

	public function cek_username()
	{
		$this->load->model('user_m');
		$outp = $this->user_m->cek_user($_POST['username']);

		print_r(json_encode($outp));
	}
}
