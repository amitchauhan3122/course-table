<?php 
    class Signup_model extends CI_Model{

        public function __construct(){
            $this->load->database();
        }
        
        public function create_user($enc_password){
            $data = array(
                'username'=> $this->input->post('student'),
                'mail'=> $this->input->post('email'),
                'password'=> $enc_password
            );

            return $this->db->insert('idusers',$data);

        }
    }
?>



