<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Firebase_sms extends CI_Controller{

      public function __construct()
      {
        parent::__construct();
      }

      public function index(){
        $data['title'] = 'Phone_login';
        $this->load->view('templates/header');
        $this->load->view('firebase_login/phone_login',$data);
        $this->load->view('templates/footer');
      }
    }