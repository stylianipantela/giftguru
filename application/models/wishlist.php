<?php

    class Wishlist extends CI_Model {

        // adds a user with id 6 to the database
        // TO BE REMOVED!!!
        // public function createUser() {
        //     $query = $this->db->insert('users', array('user_id' => '6', 'email' => "stella.pantela@gmail.com", 'name' => "Stella Pantela"));
        //     return "ok";
        // }

        // public function createWishList($list_name, $user_id) {
        //     $query = $this->db->insert('wishlists', array('user_id' => $user_id, 'list_name' => $list_name));
        //     return "ok";
        // }


        public function getUserName($user_id) {
            $query = $this->db->get_where('users', array('id' => $user_id));
            if ($query->num_rows()) {
                foreach ($query->result() as $row) {
                    return $row->name;
                }
            }
            return -1;
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
            $list_id = $this->getWishListId($user_id);
            $query = $this->db->get_where('items', array('list_id' => $list_id));
            $result = array();
            if ($query->num_rows()) {
                foreach ($query->result() as $row) {
                    $result[] = array("item_description" => $row->item_description);
                }
            }
            return $result;
        }
        public function getAnswers($user_id) {
            $query = $this->db->get_where('answers', array('user_id' => $user_id));
            $result = array();
            if ($query->num_rows()) {
                foreach ($query->result() as $row) {
                    $result[] = array("answer_text" => $row->answer_text);
                }
            }
            return $result;
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