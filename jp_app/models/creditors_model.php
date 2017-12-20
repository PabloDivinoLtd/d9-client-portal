<?php
class Creditors_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function add_creditors($data){

        $return = $this->db->insert('pp_creditors', $data);
        if ((bool) $return === TRUE) {
            return $this->db->insert_id();
        } else {
            return $return;
        }

    }
}