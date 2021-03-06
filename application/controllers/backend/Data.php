<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

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
		$hak_akses = array(0,1);
		no_access($hak_akses);
	}

	public function index()
	{
		$this->load->model('data_m');
		$data = $this->data_m->config_datatable();

		$this->load->view('part/header');
		$this->load->view('backend/data-covid', $data);
		$this->load->view('part/footer');
	}

	public function datatable()
    {
        $this->load->model('data_m');
        $outp = $this->data_m->datatable($_POST);
	   
		print_r(json_encode($outp));
	}

	public function tambah_data()
	{
		$this->load->view('part/header');
		$this->load->view('backend/tambah-data-covid');
		$this->load->view('part/footer');
	}

	public function insert()
	{
		$this->load->model('data_m');
		$outp = $this->data_m->insert($_POST);
	
		print_r(json_encode($outp));
	}

	

}
