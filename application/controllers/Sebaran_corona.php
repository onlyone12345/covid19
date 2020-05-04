<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sebaran_corona extends CI_Controller {

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

	public function index()
	{
		$this->load->model('sebaran_m');
		$foto_sebaran = $this->sebaran_m->get_data();

		$data = array(
			'foto_sebaran' => $foto_sebaran['foto_sebaran_corona'],
		);

		$config = array(
			'active' => 'sebaran-corona',
		);
		
		$this->load->view('frontend/part/header', $config);
		$this->load->view('frontend/sebaran-corona', $data);
		$this->load->view('frontend/part/footer');

		// print_r($data);

	}

}
