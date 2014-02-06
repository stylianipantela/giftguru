<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    private $user_id = 1; 
    private $friendList = array (0 => array ("id" => 4, "name" => "Stella Pantela"), 
        1 => array ("id" => 9, "name" => "Jay Po"));

    function index($friendId = -1)
    {
        // Error checking for friendId inputs
        // TODO: check if actualy friendship is established in db
        $this->load->model('Wishlist');
        $this->load->library('myamazon');

        if (($friendId != 4) && ($friendId != 9))
            $friendId = -1;
        // if (!isset($this->friendList)) {
        //     $this->friendList = $this->Wishlist->getFriendList($this->user_id);
        // }
        // print_r ($this->friendList);

        $wishList = $this->Wishlist->getWishListItems($friendId);
        $prods = array ();
        if ($friendId != -1) {
            for ($i=0; $i < 7; $i++) {
                // $prods[] = $this->myamazon->lookup('All', $wishList[$i]['item_description']);
                $prods = array_merge($prods, $this->myamazon->lookup('All', $wishList[$i]['item_description']));

            }
        }
        // print_r ($imgUrls);

        $this->load->view('templates/header', 
            array('title' => 'GiftGuru', 
            'friendList' => $this->friendList, 
            'friendName' => $this->Wishlist->getUserName($friendId)));
        $this->load->view('index', 
            array("name" => "me", 
            "prods" => $prods
            ));
        $this->load->view('templates/footer');
    }
    public function search() {
        $this->load->view('search');
    }

	public function myprofile(){
        $this->load->model('Wishlist');
        $list_id = $this->Wishlist->getWishListId($this->user_id);
        $wishListItems = $this->Wishlist->getWishListItems($this->user_id);
        $questions = $this->Wishlist->getQuestions();
        // if (!isset($this->friendList)) {
        //     $this->friendList = $this->Wishlist->getFriendList($this->user_id);
        // }
        $this->load->view('templates/header', 
            array('title' => 'About', 
                'friendList' => $this->friendList, 
                'friendName' => "?"));
		$this->load->view('profile', array('name' => 'me', "wishListItems" => $wishListItems,"questions" => $questions));
		$this->load->view('templates/footer');
    }

    public function deleteItem() {
        $user_id = 1;
        $this->load->model('Wishlist');
        $deleteItem = $this->input->get();
        if ($deleteItem) {
            $this->Wishlist->deleteItem($list_id, $deleteItem['query']);
        }
        echo "ok";
    }

    public function insertItem() {
        $user_id = 1;
        $this->load->model('Wishlist');
        $insertItem = $this->input->get();
        $insertItem = mysqli_escape_string($insertItem);
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
        // $this->load->model('Wishlist');
        // if (!isset($this->friendList)) {
        //     $this->friendList = $this->Wishlist->getFriendList($this->user_id);
        // }
        $this->load->view('templates/header', 
            array('title' => 'About', 
                'friendList' => $this->friendList, 
                'friendName' => "?"));
        $this->load->view('about');
        $this->load->view('templates/footer');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */