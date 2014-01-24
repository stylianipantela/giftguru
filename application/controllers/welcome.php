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

        $this->load->library('amazon_ecs'); 

        $client = new AmazonECS('AKIAJKTEYNKJYROFSX3Q', 'IlFACjHl3HwTjRnStKy3UQdBGoITnJY/AGATyfBX', 'com', 'munerum-20');
        // $response  = $client->category($category)->search($keyword);
        $response = $client->responseGroup('Images,ItemAttributes,OfferSummary')->category($category)->search($keyword);
        $mystr = "";
        foreach($response->Items->Item as $current){
            $mystr .= "<b>".$current->SmallImage->URL."</b><br>";
            $mystr .= "<b>".$current->DetailPageURL."</b><br>";
            $mystr .= "<b>".$current->OfferSummary->LowestNewPrice->FormattedPrice."</b><br>";
            $mystr .= "<b>".$current->ItemAttributes->Title."</b><br>";
        }    
        return $mystr;
    }


    public function amazon () {
        $this->load->library('amazon_ecs');
        $result = lookup('Books', 'PHP');
        $this->load->view('templates/header', array('title' => 'Amazon', 'result' => $result));
        $this->load->view('amazon');
        $this->load->view('templates/footer');
    }

	public function search(){

		$this->load->library('facebook'); 

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
                'redirect_url' => 'http://giftguru.herokuapp.com/welcome/search',
                'scope' => array("email") // permissions here
            ));
        }
        $this->load->view('templates/header', array('title' => 'Search'));
		$this->load->view('search',$data);
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