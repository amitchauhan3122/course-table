<?php
    class Students extends CI_Controller{
        // function __construct(){
        //     parent::__construct();
        //     $this->db2 = $this->load->database('second', TRUE);
        //     $this->db1=$this->load->database('default', TRUE);
        // }

        // public function getsecondUsers(){
        //     echo"<pre>";
        //     echo"<h3>Second db</h3><br>";
        //     $query = $this->db2->get('web_slider');
        //     $result =  $query->result_array(); 
        //     print_r($result);
        //     echo"<h3>defaul db</h3><br>";
        //     $query1 = $this->db1->get('slider');
        //     $result1 =  $query1->result_array(); 
        //     print_r($result1);
        //     die;
        // }

        public function register(){
            $data['title'] = 'Welcome To Bloohash';

            $this->form_validation->set_rules('student', 'Student', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirm', 'Confirm', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('students/register', $data);
                $this->load->view('templates/footer');
            }else{
                $enc_password = md5($this->input->post('password'));
                $this->signup_model->create_user($enc_password);
                              
                $this->session->set_flashdata('user_registered', 'You are now registered and can log in');
               
                redirect('login');
            }
        }

        public function login(){
            
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if($this->form_validation->run() === FALSE){
                $data['title'] = 'Login to Enter';
                $this->load->view('templates/header');
                $this->load->view('students/login', $data);
                $this->load->view('templates/footer');
            }else{
                $user_name = $this->input->post('email');
                $password = md5($this->input->post('password'));
                     
                $user_id = $this->login_model->enter_user($user_name, $password);
               
                if($user_id){
                    $user_data = array(
                        'id' => $user_id, 
                        'mail' => $user_name, 
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);

                    $this->session->set_flashdata('user_loggedin', 'You are now logged in');

                    redirect('courses/create');
                }else{
                    $this->session->set_flashdata('login_failed', 'login is invalid');

                    redirect('login');
                }
                
            }

        }

        public function logout(){
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('mail');

            $this->session->set_flashdata('user_loggedout', 'Thanks For visiting..');
            redirect('login');
        }
        public function forgot_password(){
            // echo"<pre>";
            // print_r($_REQUEST['email']);
            // die;
            $data['title'] = 'Change Password';
            $this->load->view('templates/header');
            $this->load->view('students/changepassword',$data);
            $this->load->view('templates/footer');
        }
        public function changepassword($data){
        }
    }