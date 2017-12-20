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

        $userRow = $this->creditors_model->authenticate_creditor($this->input->post('email'), $this->input->post('pass'));
        if(!$userRow){
            $data['msg'] = 'Wrong email or password provided';
            $this->load->view('signin_view', $data);
            return;
        }

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
        $user_data = array(
            'user_id' => $userRow->ID,
            'user_email' => $userRow->email,
            'first_name' => $userRow->first_name,
            'is_user_login' => TRUE,
        );
        $this->session->set_userdata($user_data);

        if($userRow->first_login_date==''){
            $this->creditors_model->update($userRow->ID, array('first_login_date' => date("Y-m-d H:i:s"), 'last_login_date' => date("Y-m-d H:i:s"), 'sts' => 'active'));
        } else {
            $this->creditors_model->update($userRow->ID, array('last_login_date' => date("Y-m-d H:i:s")));
        }

        redirect(base_url('dashboard'), '');
    }

    public function forgot() {

        $data['title'] = 'Recover Your Password';
        $data['msg'] = '';
        $signup_link = base_url();

        $this->form_validation->set_rules('email', 'email address', 'trim|required|valid_email');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('forgot_view', $data);
            return;
        }

        $data['signup_link'] = $signup_link;

        $row = $this->creditors_model->authenticate_creditor_email_address($this->input->post('email'));
        $email = @$row->email;
        $password = @$row->password;
        if(!$row){
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Provided email address does not exist.</div>');
            redirect(base_url('forgot'));
            exit;
        }

        $row_email = $this->email_model->get_records_by_id(1);

        $config = array();
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';

        $this->email->initialize($config);
        $this->email->clear(TRUE);
        $this->email->from($row_email->from_email, $row_email->from_name);
        $this->email->to($email);

        $this->email->subject(SITE_NAME.' | Password Recovery');
        $mail_message = $this->email_drafts_model->get_forgot_password_draft($email, $password, $row_email->content);
        $this->email->message($mail_message);
        $this->email->send();
        $this->session->set_flashdata('success_msg', '<div class="alert alert-success">Your account information has been sent to your email address.</div>');
        redirect(base_url('login'));
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