<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Envy
 * Date: 12/20/17
 * Time: 1:55 AM
 */
class Payfees extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        if(!$this->session->userdata('user_id')){
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Your session have expired.Login again.</div>');
            exit;
        }

        $data['title'] = 'D9 Pay Fees';
        $data['msg']='';

        $this->form_validation->set_message('is_unique', 'The %s is already taken');

        if (empty($_FILES['slip_file']['name']))
            $this->form_validation->set_rules('slip_file', 'Receipt', 'required');

        $this->form_validation->set_error_delimiters('<div class="errowbox"><div class="erormsg">', '</div></div>');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('payfees_view',$data);
            return;

        }
        if (!empty($_FILES['slip_file']['name'])){

            $extention = get_file_extension($_FILES['cv_file']['name']);
            $allowed_types = array('doc','docx','pdf','rtf','jpg','txt');

            if(!in_array($extention,$allowed_types)){
                $data['cpt_code'] = create_ml_captcha();
                $data['msg'] = 'This file type is not allowed.';
                $this->load->view('jobseeker_signup_view',$data);
                return;
            }

            $receipt = $this->input->$_FILES['slip_file'];

            $config = array();
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_port'] = 465;
            $config['smtp_user'] = 'augubilla100@gmail.com';
            $config['smtp_pass'] = 'mbegebillal+100';
            $config['smtp_crypto'] = 'tls';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';

            $this->email->initialize($config);
            $this->email->clear(TRUE);
            $this->email->from($this->session->userdata('user_email'));
            $this->email->to('augubilla100@gmail.com');
            //
            $this->email->subject('Creditor payment');
            $mail_message = 'The attached file have the creditor receipt';
            $this->email->attach($receipt);
            $this->email->message($mail_message);

            redirect(base_url('pay_fees'));
        }

        $this->load->view('payfees_view', $data);

    }
}