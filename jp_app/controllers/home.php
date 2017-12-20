<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Envy
 * Date: 12/19/17
 * Time: 10:54 PM
 */
class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function index(){

        if($this->session->userdata('is_creditor')==TRUE){
            redirect(base_url('dashboard'),'');
            exit;
        }

        $data['title'] = 'D9 Clubclaims';
        $data['msg']='';

        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[pp_creditors.username]|strip_all_tags');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[pp_creditors.email]|strip_all_tags');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[6]|strip_all_tags');
        $this->form_validation->set_rules('confirm_pass', 'Confirm password', 'trim|required|matches[pass]');

        $this->form_validation->set_message('is_unique', 'The %s is already taken');

        $this->form_validation->set_error_delimiters('<div class="errowbox"><div class="erormsg">', '</div></div>');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('home_view',$data);
            return;

        }

        $current_date = date("Y-m-d H:i:s");
        $creditor_array = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('pass'),
            'ip_address' => $this->input->ip_address(),
            'dated' => $current_date
        );

        $creditor_id = $this->creditors_model->add_creditors($creditor_array);
        $user_data = array(
            'user_id' => $creditor_id,
            'user_email' => $this->input->post('email'),
            'is_user_login' => TRUE,
            'is_creditor' => TRUE
        );
        $this->session->set_userdata($user_data);

        //Sending email to the user
        $row_email = $this->email_model->get_records_by_id(2);
        $config = array();
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';

        $this->email->initialize($config);
        $this->email->clear(TRUE);
        $this->email->from($row_email->from_email, $row_email->from_name);
        $this->email->to($this->input->post('email'));
        //
        $this->email->subject($row_email->subject);
        $mail_message = $this->email_drafts_model->creditor_signup($row_email->content, $creditor_array);
        $this->email->message($mail_message);
        $this->email->send();
        redirect(base_url('dashboard'),'');

        #$this->load->view('home_view', $data);
    }
}