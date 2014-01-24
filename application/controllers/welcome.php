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
    }

    // TODO: move amazon functionanility to home later - keep for testing
    public function amazon () {
        $this->load->library('myamazon');
        $result = $this->myamazon->lookup('Books', 'PHP');
        $this->load->view('templates/header', array('title' => 'Amazon', 'result'=> $result));
        $this->load->view('amazon');
        $this->load->view('templates/footer');
    }

	public function myprofile(){
        $this->load->view('templates/header', array('title' => 'My profile'));
		$this->load->view('profile', array('name' => 'me'));
		$this->load->view('templates/footer');
    }

    public function profile(){
        $this->load->view('templates/header', array('title' => 'Profile'));
        $this->load->view('profile', array('name' => 'me'));
        $this->load->view('templates/footer');
    }

    public function about()
    {
        // $this->load->model('Wishlist');
        // $results = $this->Wishlist->createUser();

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