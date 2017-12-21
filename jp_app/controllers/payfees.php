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

        if (empty($_FILES['slip_file']['name'])){
            $this->form_validation->set_rules('slip_file', 'Receipt', 'required');
        }

        $this->form_validation->set_error_delimiters('<div class="errowbox"><div class="erormsg">', '</div></div>');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('payfees_view',$data);
            return;
        } else
            if (!empty($_FILES['slip_file']['name'])){

                $extention = get_file_extension($_FILES['cv_file']['name']);
                $allowed_types = array('doc','docx','pdf','rtf','jpg','txt');

                if(!in_array($extention,$allowed_types)){
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong>Invalid file format.</div>');
                    $this->load->view('payfees_view',$data);
                    return;
                }

                #$receipt = $this->input->$_FILES['slip_file'];
                $real_path = realpath(APPPATH . '../public/uploads/');
                $config['upload_path'] = $real_path;
                $config['allowed_types'] = 'doc|docx|pdf|rtf|jpg|txt';
                $config['overwrite'] = true;
                $config['max_size'] = 6000;
                #$config['file_name'] = replace_string(' ','-',strtolower('d9').'-'.$seeker_id;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('slip_file')){
                    $data['msg'] = $this->upload->display_errors();
                    $this->load->view('payfees_view',$data);
                    return;
                }

                $receipt = array('upload_data' => $this->upload->data());

            }

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

        $this->email->subject('Creditor payment');
        $mail_message = 'The attached file have the creditor receipt';
        $this->email->attach($receipt);
        $this->email->message($mail_message);

        redirect(base_url('pay_fees'));
    }
}