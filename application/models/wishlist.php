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
           	// $sql = "SELECT item_description FROM items WHERE list_id = ?"; 
		   	// $query = $this->db->query($sql, array($list_id));
			return $query->result();
        }

    }

?>