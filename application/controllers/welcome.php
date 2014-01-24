<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header', array('title' => 'Home'));
		$this->load->view('index');
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

    private function lookup($category, $keyword) {
        // $this->load->library('amazonECS');
        include("amazonECS.php");
        $mystr = "";
        $client = new AmazonECS('AKIAJKTEYNKJYROFSX3Q', 'IlFACjHl3HwTjRnStKy3UQdBGoITnJY/AGATyfBX', 'com', 'munerum-20');
        $response = $client->responseGroup('Images,ItemAttributes,OfferSummary')->category($category)->search($keyword);
        
        // foreach($response->Items->Item as $current){
        //     $mystr .= "<b>".$current->SmallImage->URL."</b><br>";
        //     $mystr .= "<b>".$current->DetailPageURL."</b><br>";
        //     $mystr .= "<b>".$current->OfferSummary->LowestNewPrice->FormattedPrice."</b><br>";
        //     $mystr .= "<b>".$current->ItemAttributes->Title."</b><br>";
        // }    
        return $response;
    }


    public function amazon () {
        $result = $this->lookup('Books', 'PHP');
        $this->load->view('templates/header', array('title' => 'Amazon', 'result'=> $result));
        $this->load->view('amazon');
        $this->load->view('templates/footer');
    }

	public function search(){

		$fb_config = array(
            'appId'  => '602143143167099',
            'secret' => '6c0f97cb15e3c5c390a0f074cfbbd9ae'
        );

        $this->load->library('facebook', $fb_config);

        $user = $this->facebook->getUser();
        $data['user'] = $user;
        
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook
                    ->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }

        if ($user) {
            $data['logout_url'] = $this->facebook
                ->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook
                ->getLoginUrl();
        }
        $this->load->view('templates/header', array('title' => 'Search'));
		$this->load->view('search', $data);
		$this->load->view('templates/footer');

	}

    public function logout(){

        $this->load->library('facebook');

        // Logs off session from website
        $this->facebook->destroySession();
        $this->facebook->setSession(null);
        // Make sure you destory website session as well.

        return('welcome/search');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */