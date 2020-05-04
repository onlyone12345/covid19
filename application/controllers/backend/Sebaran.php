<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sebaran extends CI_Controller {

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
		$this->load->model('sebaran_m');
		$data = array(
			'data' => $this->sebaran_m->get_data()
		);

		
		$config = array(
			'active' => 'sebaran',
		);

		$this->load->view('part/header', $config);
		$this->load->view('backend/sebaran-corona', $data);
		$this->load->view('part/footer');
	}

	public function update()
	{
		$this->load->model('sebaran_m');
		$outp = $this->sebaran_m->update($_POST);
	
		print_r(json_encode($outp));
				
	}

}
