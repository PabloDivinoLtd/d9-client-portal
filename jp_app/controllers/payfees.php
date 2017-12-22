<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Envy
 * Date: 12/20/17
 * Time: 1:55 AM
 */
class Payfees extends CI_Controller {

    public function index(){
        if(!$this->session->userdata('user_id')){
            echo 'Your session has been expired, please re-login first.';
            exit;
        }

        redirect(base_url().'payfees/receipt', 'refresh');
    }


    public function receipt(){

        if(!$this->session->userdata('user_id')){
            echo 'Your session has been expired, please re-login first.';
            exit;
        }

        $data['title'] = 'D9 Pay Fees';
        $data['msg']='';

        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|strip_all_tags');
        if (empty($_FILES['slip_file']['name'])){
            $this->form_validation->set_rules('slip_file', 'Receipt', 'required');
        }

        $this->form_validation->set_error_delimiters('<div class="errowbox"><div class="erormsg">', '</div></div>');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('payfees_view',$data);
            return;
        }
        if(!empty($_FILES['slip_file']['name'])){
            $config['upload_path'] = realpath(APPPATH . '../public/uploads/candidate/');
            $config['allowed_types'] = 'txt|pdf|jpg|jpeg';
            $config['file_name'] = $_FILES['slip_file']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('slip_file')){
                $receipt = $this->upload->data();
                $data['msg'] = 'Successfull upload.';
                $this->load->view('payfees_view',$data);
                return;
            }
        } else {
            $data['msg'] = 'File is empty.';
            $this->load->view('payfees_view',$data);
            return;
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

        redirect(base_url('claim_form'));
    }
}