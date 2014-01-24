<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function Wecome(){
        parent::__construct();
        parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
        $CI = & get_instance();
		$CI->config->load("facebook",TRUE);
		$config = $CI->config->item('facebook');
		$this->load->library('Facebook', $config);
    }

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

		// Try to get the user's id on Facebook
        $userId = $this->facebook->getUser();
 		$data['user'] = $userId;

        // If user is not yet authenticated, the id will be zero
        if($userId == 0){
            // Generate a login url
            $data['url'] = $this->facebook->getLoginUrl(array('scope'=>'email'));
            $this->load->view('templates/header', array('title' => 'Search'));
			$this->load->view('search', $data);
			$this->load->view('templates/footer');
        } else {
            // Get user's data and print it
            $user = $this->facebook->api('/me');
            print_r($user);
        }
        

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