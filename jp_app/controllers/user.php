<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Envy
 * Date: 12/20/17
 * Time: 1:55 AM
 */
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        redirect(base_url().'user/login');

    }

    public function login() {

        if($this->session->userdata('is_user_login')==TRUE){
            redirect(base_url('dashboard'),'');
            exit;
        }

        $data['title'] = 'D9 Login';
        $data['msg'] = '';
        $signup_link = base_url();

        $data['signup_link'] = $signup_link;

        $this->form_validation->set_rules('email', 'Email address', 'trim|required');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if ($this->form_validation->run() === FALSE) {
            $data['msg'] = $this->session->flashdata('msg');
            $this->load->view('signin_view', $data);
            return;
        }

        $is_creditor = TRUE;
        $userRow = $this->creditors_model->authenticate_job_seeker($this->input->post('email'), $this->input->post('pass'));
        $slug = '';

        if($userRow->sts=='pending'){
            $data['msg'] = 'You have not yet verified your email address.';
            $this->load->view('login_view', $data);
            return;
        }

        if($userRow->sts=='blocked'){
            $data['msg'] = 'Your account was suspended. Please contact site admin for further information.';
            $this->load->view('login_view', $data);
            return;
        }

        $slug = @$userRow;
        $user_data = array(
            'user_id' => $userRow->ID,
            'user_email' => $userRow->email,
            'first_name' => $userRow->first_name,
            'slug' => $slug,
            'first_name' => $userRow->first_name,
            'is_user_login' => TRUE,
            'is_creditor' => $is_creditor
        );
        $this->session->set_userdata($user_data);

        $this_model_name = creditors_model;

        if($userRow->first_login_date==''){
            $this->$this_model_name->update($userRow->ID, array('first_login_date' => date("Y-m-d H:i:s"), 'last_login_date' => date("Y-m-d H:i:s"), 'sts' => 'active'));
        } else {
            $this->$this_model_name->update($userRow->ID, array('last_login_date' => date("Y-m-d H:i:s")));
        }

        #$redirect = ($this->session->userdata('back_from_user_login')) ? $this->session->userdata('back_from_user_login') : $folder.'/dashboard';
        #$this->session->set_userdata('back_from_user_login','');
        redirect(base_url('dashboard'), '');
    }

    public function forgot() {

        $data['title'] = 'Recover Your Password';
        $data['msg'] = '';

        $this->load->view('forgot_view', $data);
    }

    public function logout() {
        $user_data = array(
            'user_id' => '',
            'useremail' => '',
            'is_user_login' => FALSE,
            'slug' => '',
            'is_job_seeker' => FALSE,
            'is_employer' => FALSE
        );
        $this->session->set_userdata($user_data);
        $this->session->unset_userdata($user_data);
        redirect(base_url(), 'refresh');
    }
}