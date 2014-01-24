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

    // implements amazon model ---> should be moved to models later
    // get 100 items later rather than just 10

    private function lookup($category, $keyword) {
        include("amazon_api_class.php");
        $amazon = new AmazonProductAPI();
        $parameters = array("Operation"     => "ItemSearch",
                            "SearchIndex"   => $category,
                            "Keywords"      => $keyword,
                            "ResponseGroup" => "Images,ItemAttributes,OfferSummary");

        $result = $amazon->queryAmazon($parameters);
        echo "<pre>";        
        $json = json_encode($result);
        $array = json_decode($json, true);
        $mystr = "";

        foreach($array['Items']['Item'] as $item){
            if (isset($item['OfferSummary']['LowestNewPrice']['FormattedPrice'])) {
                // isset($item['SmallImage->URL) &&
                // isset($item->DetailPageURL) && $item->ItemAttributes->Title) {
                // $mystr .= "<img src=\"" . $item->SmallImage->URL . "\"></br>";
                // $mystr .= "<a href=\"". $item->DetailPageURL."\">" . $item->ItemAttributes->Title . "</a><br>";
                $mystr .= $item['OfferSummary']['LowestNewPrice']['FormattedPrice'] . "<br>";
            }
        }    
        // print_r(count($array['Items']['Item']));
        // print_r($array);
        print_r($mystr);
        echo "</pre>";
        return $result;
        
    }


    public function amazon () {
        $result = $this->lookup('Books', 'PHP');
        $this->load->view('templates/header', array('title' => 'Amazon', 'result'=> $result));
        $this->load->view('amazon');
        $this->load->view('templates/footer');
    }

    public function search(){

        $this->load->library('facebook'); 

        $user = $this->facebook->getUser();
        // $data['user_profile'] = $this->facebook->api('/me');
        log_message('debug','Message you want to log');
        $data['user'] = $user;
        
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