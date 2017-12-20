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
        $data['title'] = 'D9 Pay Fees';

        $this->load->view('payfees_view', $data);

    }
}