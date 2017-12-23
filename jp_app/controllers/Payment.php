<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function index(){

        if(!$this->session->userdata('user_id')){
            echo 'Your session has been expired, please re-login first.';
            exit;
        }

        $this->load->view('payment_view');
    }

    public function pay(){

        if(!$this->session->userdata('user_id')){
            echo 'Your session has been expired, please re-login first.';
            exit;
        }

        $data['title'] = 'D9 Pay Fees';
        $data['msg']='';

        $this->form_validation->set_rules('username', 'Username', 'trim|required|strip_all_tags');
        if (empty($_FILES['slip_file']['name'])){
            $this->form_validation->set_rules('slip_file', 'Receipt', 'required');
        }

        $this->form_validation->set_error_delimiters('<div class="errowbox"><div class="erormsg">', '</div></div>');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('payment_view',$data);
            return;
        }

        $row = $this->creditors_model->authenticate_creditor_username($this->input->post('username'));
        if(!$row){
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Provided username does not exist.</div>');
            redirect(base_url('payment'));
            exit;
        }
        else {
            $config['upload_path'] = realpath(APPPATH . '../public/uploads/candidate/');
            $config['allowed_types'] = 'txt|pdf|jpg|jpeg';
            $config['file_name'] = $_FILES['slip_file']['name'];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('slip_file')){
                $receipt = $this->upload->data();
                $data['msg'] = 'Successful upload.';
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
                $this->email->from($this->session->userdata('user_email'));
                $this->email->to('augubilla100@gmail.com');

                $this->email->subject('Creditor payment');
                $mail_message = 'The attached file have the creditor receipt';
                #$path = set_realpath('../public/uploads/candidate/');
                $this->email->attach($receipt['full_path']);
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
                #redirect(base_url('claim_form'));
                #$this->load->view('home_view',$data);
                #return;
            }
            /*$data['msg'] = 'Success to submit.';
            $this->load->view('home_view',$data);*/
        }

    }
}