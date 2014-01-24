<?php

    class Wishlist extends CI_Model {


        // adds a user with id 6 to the database
        // TO BE REMOVED!!!
        public function createUser() {
            $query = $this->db->insert('users', array('id' => '6'));
            print_r ($query);
            return "ok";
        }
    }

?>