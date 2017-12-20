<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){

        if(!$this->session->userdata('user_id')){
            echo 'Your session has been expired, please re-login first.';
            exit;
        }

        $row = $this->creditors_model->get_creditors_by_id($this->session->userdata('user_id'));
        $data['title'] = SITE_NAME.': Manage Account';
        $data['row'] = $row;

        $this->form_validation->set_rules('username', 'Username', 'trim|required|strip_all_tags');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|strip_all_tags');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|strip_all_tags');
        $this->form_validation->set_rules('first_name', 'First name', 'trim|required|strip_all_tags');
        $this->form_validation->set_rules('last_name', 'Last name', 'trim|required|strip_all_tags');
        $this->form_validation->set_rules('country', 'country', 'trim|required|strip_all_tags');
        $this->form_validation->set_error_delimiters('<div class="errowbox"><div class="erormsg">', '</div></div>');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('dashboard_view',$data);
            return;
        }
        $profile_array = array(
            'username'		=> $this->input->post('username'),
            'email'		=> $this->input->post('email'),
            'first_name'		=> $this->input->post('first_name'),
            'last_name'			=> $this->input->post('last_name'),
            'phone'			=> $this->input->post('phone'),
            'country' 			=> $this->input->post('country'),
        );
        $this->creditors_model->update($this->session->userdata('user_id'), $profile_array);
        $this->session->set_userdata('username',$this->input->post('username'));
        $this->session->set_flashdata('msg', '<div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert">&times;</a> <strong>Success!</strong> Profile has been updated successfully. </div>');
        redirect(base_url('dashboard'));
    }
}