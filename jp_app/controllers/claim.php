<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Envy
 * Date: 12/20/17
 * Time: 1:55 AM
 */
class Claim extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        if(!$this->session->userdata('user_id')){
            echo 'Your session has been expired, please re-login first.';
            exit;
        }

        $data['title'] = 'D9 Clubclaims';
        $data['msg'] = '';

        $this->form_validation->set_rules('username', 'Username', 'trim|required|strip_all_tags');
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|strip_all_tags');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|strip_all_tags');
        $this->form_validation->set_rules('package_name', 'Package Name', 'trim|required|strip_all_tags');
        $this->form_validation->set_rules('country', 'Country', 'trim|required|strip_all_tags');

        $this->form_validation->set_error_delimiters('<div class="errowbox"><div class="erormsg">', '</div></div>');
        if ($this->form_validation->run() === FALSE) {
            #$data['msg'] = $this->session->flashdata('msg');
            $this->load->view('claim_view', $data);
            return;
        }

        $row = $this->creditors_model->authenticate_creditor_username($this->input->post('username'));
        $email = @$row->email;
        if(!$row){
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Provided username does not exist.</div>');
            redirect(base_url('claim_view'));
            exit;
        }
        $profile_array = array(
            'username'		=> $this->input->post('username'),
            'full_name'		=> $this->input->post('full_name'),
            'phone'		    => $this->input->post('phone'),
            'package'		=> $this->input->post('package'),
            'country' 		=> $this->input->post('country')
        );
        $row_email = $this->email_model->get_records_by_id(3);
        $mail_message = $this->email_drafts_model->creditor_claims_draft($row_email->content, $profile_array);

        //config email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'd9clubclaims.com';
        $config['smtp_port'] = '587';
        $config['smtp_user'] = 'info@d9clubclaims.com';
        $config['smtp_pass'] = 'f173oo431002';  //sender's password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n";

        $this->load->library('email', $config);
        $this->email->initialize($config);
        //send email
        $this->email->from($email);
        $this->email->to('augubilla100@gmail.com');
        $this->email->subject('Creditors Claims');
        $this->email->message($mail_message);

        if($this->email->send()) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Your claims were sent successfully.</div>');
            redirect(base_url('claim_form'));
            return;
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Failed to send your claims, try again later.</div>');
            redirect(base_url('claim_form'));
            return;
        }
    }
}