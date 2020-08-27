<?php
    class Login_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function enter_user($user_name, $password){
            
            $this->db->where('mail',$user_name);
            $this->db->where('password',$password);
            
            $result = $this->db->get('idusers');

            if($result->num_rows() == 1){
                return $result->row(0)->id;
            }else{
                return false;
            }

            

        }
    }
?>