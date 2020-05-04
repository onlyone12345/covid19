<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

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
		$hak_akses = array(0,2);
		no_access($hak_akses);
	}

	public function index()
	{
		$this->load->model('berita_m');
		$data = $this->berita_m->config_datatable();

		$config = array(
			'active' => 'berita',
		);

		$this->load->view('part/header', $config);
		$this->load->view('backend/daftar-berita', $data);
		$this->load->view('part/footer');
	}

	public function datatable()
    {
        $this->load->model('berita_m');
        $outp = $this->berita_m->datatable($_POST);
	   
		print_r(json_encode($outp));
	}

	public function tulis_berita()
	{
		$data['form_url'] = site_url("backend/berita/insert");

		$config= array(
			'form_url' => site_url("backend/berita/insert"),
			'form_title' =>'Tulis Berita'
		);

		$config = array(
			'active' => 'berita',
		);

		$this->load->view('part/header', $config);
		$this->load->view('backend/tulis-berita', $data);
		$this->load->view('part/footer');
	}

	public function insert()
	{
		$this->load->model('berita_m');
		$outp = $this->berita_m->insert($_POST);
	
		print_r(json_encode($outp));
	}

	public function view($slug = NULL)
	{
		$this->load->model('berita_m');
		print_r($this->berita_m->get_news($slug));
	}

	public function edit($id = NULL)
	{
		$this->load->model('berita_m');
	
		$config= array(
			'form_url' => site_url("backend/berita/update/".$id),
			'data' => $this->berita_m->get_single($id),
			'form_title' =>'Edit Berita'
		);


		$config = array(
			'active' => 'berita',
		);

		$this->load->view('part/header', $config);
		$this->load->view('backend/tulis-berita', $config);
		$this->load->view('part/footer');
	}

	public function update($id = NULL)
	{
		$this->load->model('berita_m');
		$outp = $this->berita_m->update($id, $_POST);
	
		print_r(json_encode($outp));
				
	}

	public function delete()
	{
		$this->load->model('berita_m');
		$outp = $this->berita_m->delete($_POST['id']);

		print_r(json_encode($outp));
	}

	public function publish()
	{
		$this->load->model('berita_m');
		$outp = $this->berita_m->publish($_POST['id']);

		print_r(json_encode($outp));
	}

}
