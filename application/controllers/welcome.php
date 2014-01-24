<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
        parent::__construct();
 
        $this->load->model('Facebook_model');
    }

    function index()
    {
        $fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
 
        if((!$fb_data['uid']) or (!$fb_data['me']))
        {
            // If this is a protected section that needs user authentication
            // you can redirect the user somewhere else
            // or take any other action you need
            redirect('login');
        }
        else
        {
            $data = array(
                    'fb_data' => $fb_data,
                    );
 			$this->load->view('templates/header', array('title' => 'Home'));
            $this->load->view('home', $data);
            $this->load->view('templates/footer');
        }
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