<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header', array('title' => 'Home'));
		$this->load->view('index');
		$this->load->view('templates/footer');
	}

	public function search()
	{
		$this->load->view('templates/header', array('title' => 'Search'));
		$this->load->view('search');
		$this->load->view('templates/footer');
	}

	public function about()
	{
		$this->load->view('templates/header', array('title' => 'About'));
		$this->load->view('about');
		$this->load->view('templates/footer');
	}

	public function contact()
	{
		$this->load->view('templates/header', array('title' => 'Contact'));
		$this->load->view('contact');
		$this->load->view('templates/footer');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */