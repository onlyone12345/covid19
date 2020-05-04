<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

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

		$this->load->database();
		$jumlah_data = $this->berita_m->jumlah_data();

		$this->load->library('pagination');
		$config['base_url'] = site_url().'news/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['berita'] = $this->berita_m->data($config['per_page'],$from);
		$data['pagination'] = $this->pagination->create_links();

		$data['list_news']= $this->berita_m->get_lastest_news(5);

		$configgg = array(
			'active' => 'news',
		);
		
		$this->load->view('frontend/part/header', $configgg);
		$this->load->view('frontend/berita', $data);
		$this->load->view('frontend/part/footer');

		// print_r($data);
	}

	public function view($slug = NULL)
	{
		$this->load->model('berita_m');
		$news = $this->berita_m->get_news($slug);
		$list_news = $this->berita_m->get_lastest_news(5);

		$data = array (
			'news' => $news,
			'list_news' => $list_news,
		);

		$config = array(
			'active' => 'news',
		);
		
		$this->load->view('frontend/part/header', $config);
		$this->load->view('frontend/detail-berita', $data);
		$this->load->view('frontend/part/footer');

		// print_r($data);
	}



}
