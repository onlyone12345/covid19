<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$berita = $this->berita_m->get_lastest_news(3);

		$this->load->model('rilis_m');
		$rilis = $this->rilis_m->get_data();

		$this->load->model('detail_m');
		$detail = $this->detail_m->get_data();


		$data = array (
			'berita' => $berita,
			'rilis' => $rilis,
			'detail' => $detail
		);
		
		$config = array(
			'active' => 'home',
		);
		
		$this->load->view('frontend/part/header', $config);
		$this->load->view('frontend/home', $data);
		$this->load->view('frontend/part/footer');

		// print_r($data);

	}

}
