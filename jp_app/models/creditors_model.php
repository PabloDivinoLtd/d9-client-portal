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

    public function update_creditor($id, $data){
        $this->db->where('ID', $id);
        $return=$this->db->update('pp_creditors', $data);
        return $return;
    }

    public function update($id, $data){
        $this->db->where('ID', $id);
        $return=$this->db->update('pp_creditors', $data);
        return $return;
    }

    public function delete_creditor($id){
        $this->db->where('ID', $id);
        $this->db->delete('pp_creditors');
    }

    public function authenticate_creditor($user_name, $password) {
        $this->db->select('*');
        $this->db->from('pp_creditors');
        $this->db->where('email', $user_name);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }

    public function authenticate_creditor_email_address($email) {
        $this->db->select('*');
        $this->db->from('pp_creditors');
        $this->db->where('email', $email);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }

    public function authenticate_creditor_username($user_name) {
        $this->db->select('*');
        $this->db->from('pp_creditors');
        $this->db->where('username', $user_name);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }

    public function authenticate_creditor_by_id_password($ID, $password) {
        $this->db->select('*');
        $this->db->from('pp_creditors');
        $this->db->where('ID', $ID);
        $this->db->where('password', $password);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }

    public function get_creditors_by_id($id) {
        $this->db->select('pp_creditors.*');
        $this->db->from('pp_creditors');
        $this->db->where('pp_creditors.ID', $id);
        $Q = $this->db->get();
        if ($Q->num_rows > 0) {
            $return = $Q->row();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
}