<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

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
		$this->load->model('berita_m');
		$berita = $this->berita_m->get_three_latest_news();

		$data = array (
			'berita' => $berita,
		);
		$config = array(
			'active' => 'mobilitas-penduduk',
		);
		
		$this->load->view('frontend/part/header', $config);
		$this->load->view('frontend/home', $data);
		$this->load->view('frontend/part/footer');

		// print_r($data);

	}

}
