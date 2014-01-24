<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model('Facebook_model');
    }
    
    function index()
    {
        $fb_data = $this->session->userdata('fb_data');

        $data = array(
                    'fb_data' => $fb_data,
                    );
        
        $this->load->view('index', $data);
        // $this->load->view('templates/header', array('title' => 'Home'));

    }

    // public function index()
    // {
    //     $this->load->view('templates/header', array('title' => 'Home'));
    //     $this->load->view('index');
    //     $this->load->view('templates/footer');
    // }

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


    public function amazon () {
        $this->load->library('myamazon');
        $result = $this->myamazon->lookup('Books', 'PHP');
        $fb_data = $this->session->userdata('fb_data');
        $this->load->view('templates/header', array('title' => 'Amazon', 'fb_data'=> $fb_data));
        $this->load->view('amazon');
        $this->load->view('templates/footer');
    }

	public function search(){
        $this->load->view('templates/header', array('title' => 'Search'));
		$this->load->view('search');
		$this->load->view('templates/footer');
    }

    // public function logout(){

    //     $this->load->library('facebook');

    //     // Logs off session from website
    //     $this->facebook->destroySession();
    //     $this->facebook->setSession(null);
    //     // Make sure you destory website session as well.

    //     return('welcome/search');
    // }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */