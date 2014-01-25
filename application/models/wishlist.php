<?php

    class Wishlist extends CI_Model {


        // adds a user with id 6 to the database
        // TO BE REMOVED!!!
        public function createUser() {
            $query = $this->db->insert('users', array('id' => '6'));
            print_r ($query);
            return "ok";
        }

        public function getWishlistItem($list_id) {
           	$query = $this->db->query('SELECT item_description FROM items');
			return $query->result();
        }

         public function deleteItem($item) {
            $this->db->delete('items', array('item_description' => $item)); 
            return "ok";
        }

    }

?>