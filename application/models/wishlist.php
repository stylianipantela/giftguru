<?php

    class Wishlist extends CI_Model {

        private $defaultWishList;
        private $defaultAnswers;

        public function __construct() {
            for ($i = 0; $i < 7; $i++) {
                $this->defaultWishList[$i] = array("item_description" => "?");
                $this->defaultAnswers[$i] = array("answer_text" => "?");
            }
        }  

        public function isUser($user_id) {
            $query = $this->db->get_where('users', array('id' => $user_id));
            return $query->num_rows();
        }


        public function getUserName($user_id) {
            $query = $this->db->get_where('users', array('id' => $user_id));
            if ($query->num_rows()) {
                foreach ($query->result() as $row) {
                    return $row->name;
                }
            }
            return "?";
        }

        public function getFriendList($user_id) {
            $query = $this->db->get_where('friends', array('friend1_id' => $user_id));
            $friends = array ();
            if ($query->num_rows()) {
                foreach ($query->result() as $row) {
                     $friends[] = 
                        array (
                            "id" => $row->friend2_id, 
                            "name" => $this->getUserName($row->friend2_id)
                        );
                }
            }
            return $friends;
        }


        // Every user is going to have ONE list for SUNDAY ---> CHANGE LATER
        public function getWishListId($user_id) {
            $query = $this->db->get_where('wishlists', array('user_id' => $user_id));
            if ($query->num_rows()) {
                foreach ($query->result() as $row) {
                    return $row->list_id;
                }
            }
            return -1;
        }

        public function getWishListItems($user_id) {
            $result = array();
            if ($this->isUser($user_id)) {
                $list_id = $this->getWishListId($user_id);
                $query = $this->db->get_where('items', array('list_id' => $list_id));
                if ($query->num_rows()) {
                    foreach ($query->result() as $row) {
                        $result[] = array("item_description" => $row->item_description);
                    }
                }
                return $result;
            }
            return $this->defaultWishList;
        }
        public function getAnswers($user_id) {
            $result = array();
            if ($this->isUser($user_id)) {
                $query = $this->db->get_where('answers', array('user_id' => $user_id));
                if ($query->num_rows()) {
                    foreach ($query->result() as $row) {
                        $result[] = array("answer_text" => $row->answer_text);
                    }
                }
                return $result;
            }
            return $this->defaultAnswers;
        }

        public function getQuestions() {
            $query = $this->db->get('questions');
            $result = array();
            if ($query->num_rows()) {
                foreach ($query->result() as $row) {
                    $result[] = array("question_text" => $row->question_text);
                }
            }
            return $result;
        }

        // tested and working
        // assuming every user has one LIST ONLY
        public function insertToWishList($list_id, $item_description) {
            $this->db->insert('items', array('item_description' => $item_description, 'list_id' => $list_id, 'item_status' => 0)); 
            return "ok";
        }

        // tested and working as long as inputs are ok
        public function deleteItem($list_id, $item_description) {
            $this->db->delete('items', array('item_description' => $item_description, 'list_id' => $list_id));
            return "ok";
        }

        public function emptyList($list_id) {
            $this->db->delete('items', array('list_id' => 2));
            return "ok";
        }
    }

?>