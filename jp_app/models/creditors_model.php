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

    public function update_job_seeker($id, $data){
        $this->db->where('ID', $id);
        $return=$this->db->update('pp_creditors', $data);
        return $return;
    }

    public function update($id, $data){
        $this->db->where('ID', $id);
        $return=$this->db->update('pp_creditors', $data);
        return $return;
    }

    public function delete_job_seeker($id){
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

    public function authenticate_creditor_email_address($user_name) {
        $this->db->select('*');
        $this->db->from('pp_creditors');
        $this->db->where('email', $user_name);
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

    public function authenticate_job_seeker_by_id_password($ID, $password) {
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
}