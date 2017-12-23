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

        if (empty($_FILES['slip_file']['name'])){
            $this->form_validation->set_rules('slip_file', 'Receipt', 'required');
        }

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
            redirect(base_url('claim_form'));
            exit;
        }
        $config['upload_path'] = realpath(APPPATH . '../public/uploads/candidate/');
        $config['allowed_types'] = 'txt|pdf|jpg|jpeg';
        $config['file_name'] = $_FILES['slip_file']['name'];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload('slip_file');
        $receipt = $this->upload->data();

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
        $config = array();
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'augubilla100@gmail.com';
        $config['smtp_pass'] = '***';
        $config['smtp_crypto'] = 'tls';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';

        $this->email->initialize($config);
        $this->email->clear(TRUE);
        //send email
        $this->email->from($email);
        $this->email->to('augubilla100@gmail.com');
        $this->email->subject('Creditors Claims');
        $this->email->attach($receipt);
        $this->email->message($mail_message);

        if($this->email->send()) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Your claims were sent successfully.</div>');
            redirect(base_url('claim_form'));
            return;
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Failed to send your claims, try again later.</div>');
            redirect(base_url('claim_form'));
            return;
        }
    }
}