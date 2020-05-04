<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rilis extends CI_Controller {

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
		$this->load->model('rilis_m');
		$data = $this->rilis_m->config_datatable();

		
		$config = array(
			'active' => 'rilis',
		);

		$this->load->view('part/header', $config);
		$this->load->view('backend/rilis-data', $data);
		$this->load->view('part/footer');
	}

	public function datatable()
    {
        $this->load->model('rilis_m');
        $outp = $this->rilis_m->datatable($_POST);
	   
		print_r(json_encode($outp));
	}

	public function tambah()
	{

		$config = array(
			'form_url' => site_url('backend/rilis/insert'),
			'form_title' =>'Tambah Rilis Data',
			'active' => 'rilis',
		);

		$this->load->view('part/header', $config);
		$this->load->view('backend/tambah-data-rilis', $config);
		$this->load->view('part/footer');
	}
	
	public function edit($id = NULL)
	{
		$this->load->model('rilis_m');
		$config = array(
			'form_url' => site_url("backend/rilis/update/".$id),
			'data' => $this->rilis_m->get_single($id),
			'form_title' =>'Edit Rilis Data',
			'active' => 'rilis',
		);

		$this->load->view('part/header', $config);
		$this->load->view('backend/tambah-data-rilis', $config );
		$this->load->view('part/footer');
	}

	public function update($id = NULL)
	{
		$this->load->model('rilis_m');
		$outp = $this->rilis_m->update($id, $_POST);
	
		print_r(json_encode($outp));
				
	}

	public function insert()
	{
		$this->load->model('rilis_m');
		$outp = $this->rilis_m->insert($_POST);
	
		print_r(json_encode($outp));
	}

	public function delete()
	{
		$this->load->model('rilis_m');
		$outp = $this->rilis_m->delete($_POST['id']);

		print_r(json_encode($outp));
	}

	

}
