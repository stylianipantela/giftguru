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

	// facebook integration
	public function __construct(){
		parent::__construct();
	}

	public function login(){

		$this->load->library('facebook/facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
        //$this->load->library('facebook', array(
        //    'appId' => 'APP_ID',
        //    'secret' => 'SECRET',
        //    ));

		$user = $this->facebook->getUser();
        
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            $this->facebook->destroySession();
        }

        if ($user) {

            $data['logout_url'] = site_url('welcome/logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => 'http://giftguru.herokuapp.com/welcome/search',
                'scope' => array("email") // permissions here
            ));
        }
        $this->load->view('welcome',$data);

	}

    public function logout(){

        $this->load->library('facebook/facebook');

        // Logs off session from website
        $this->facebook->destroySession();
        $this->facebook->setSession(null);
        // Make sure you destory website session as well.

        return('welcome/login');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */