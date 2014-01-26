<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    private $user_id = 1; 
    private $friendList;

    function index($friendId = -1)
    {
        // Error checking for friendId inputs
        // TODO: check if actualy friendship is established in db
        if (!is_numeric($friendId) || $friendId == 1)
            $friendId = -1;
        $this->load->model('Wishlist');
        if (!isset($this->friendList)) {
            $this->friendList = $this->Wishlist->getFriendList($this->user_id);
        }
        $wishList = $this->Wishlist->getWishListItems($friendId);
        $answers = $this->Wishlist->getAnswers($friendId);
        $questions = $this->Wishlist->getQuestions();
        $questionRecs = array (); $wishListRecs = array ();

        $this->load->library('myamazon');
        //foreach ($questionList as $key => $value) {      
            // $questionRecs[$key] = $this->myamazon->lookup('All', $value);
        //}
        foreach ($wishList as $value) {      
            // $wishListRecs[] = $this->myamazon->lookup('All', $value['item_description']);
            // break;
        }

        $this->load->view('templates/header', 
            array('title' => 'Gift Guru', 
            'friendList' => $this->friendList, 
            'friendName' => $this->Wishlist->getUserName($friendId)));
        $this->load->view('index', 
            array("name" => "me", 
            "wishList" => $wishList,
            "answers" => $answers,
            "questions" => $questions,
            "questionRecs" => $questionRecs,
            "wishListRecs" => $wishListRecs
            ));
        $this->load->view('templates/footer');
    }

	public function myprofile(){
        $user_id = 1; 
        $this->load->model('Wishlist');
        $list_id = $this->Wishlist->getWishListId($user_id);
        $wishListItems = $this->Wishlist->getWishListItems($user_id);
        $this->load->view('templates/header', array('title' => 'My profile'));
		$this->load->view('profile', array('name' => 'me', "wishListItems" => $wishListItems));
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
        $this->load->model('Wishlist');
        if (!isset($this->friendList)) {
            $this->friendList = $this->Wishlist->getFriendList($this->user_id);
        }
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