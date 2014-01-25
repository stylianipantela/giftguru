<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function index()
    {
        $friendList = array ("Stella Pantela", "Lili Jiang", "Jay Po", "Sam Smith");
        $wishList = array();
        //getWishList();
        $questionList = array ( "sweet" => "nutella", "restaurant" => "Pizza Hut", "sport" => "tennis", "athlete" => "roger federer",
                              "singer" => "arctic monkeys", "snack" => "seaweed", "author" => "Zusak");
        
        $this->load->library('myamazon');
        $questionRecs = array ();
        foreach ($questionList as $key => $value) {      
            // $questionRecs[$key] = $this->myamazon->lookup('All', $value);
        }
        $wishListRecs = array ();
        // foreach ($wishList as $value) {      
        //     $wishListRecs[] = $this->myamazon->lookup7($value);
        // }

        $this->load->view('templates/header', array('title' => 'Guru Profile'));
        $this->load->view('amazon', 
            array("name" => "me", 
            "friendList" => $friendList, 
            "wishList" => $wishList,
            "questionList" => $questionList,
            "questionRecs" => $questionRecs,
            "wishListRecs" => $wishListRecs
            ));
        $this->load->view('templates/footer');
    }


        // $this->Wishlist->insertToWishList($list_id, "geeky drinking");
        // $this->Wishlist->deleteItem($list_id, "geeky drinking");


	public function myprofile(){
        $user_id = 9; 
        $this->load->model('Wishlist');
        $list_id = $this->Wishlist->getWishListId($user_id);
        $wishListItems = $this->Wishlist->getWishListItems($user_id);
        $this->load->view('templates/header', array('title' => 'My profile'));
		$this->load->view('profile', array('name' => 'me', "wishListItems" => $wishListItems));
		// $this->load->view('templates/footer');
    }

    // public function profile(){
    //     $this->load->view('templates/header', array('title' => 'Profile'));
    //     $this->lo>view('profile', array('name' => 'me'));
    //     $this->load->view('templates/footer');
    // }

    public function deleteItem() {
        $user_id = 9;
        $this->load->model('Wishlist');
        $deleteItem = $this->input->get();
        if ($deleteItem) {
            $this->Wishlist->deleteItem($list_id, $deleteItem['query']);
        }
        echo "ok";
    }

    public function insertItem() {
        $user_id = 9;
        $this->load->model('Wishlist');
        $insertItem = $this->input->get();
        $list_id = $this->Wishlist->getWishListId($user_id);
        if ($insertItem) {
            $this->Wishlist->insertToWishList($list_id, $insertItem['query']);
        }
        echo "ok";
    }


    public function amazon2() {
        $post = $this->input->get();
        $result = "";
        if ($post) {
            $this->load->library('myamazon');
            $result = $this->myamazon->lookup('All', $post['query']);
        }
        echo json_encode($result);
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