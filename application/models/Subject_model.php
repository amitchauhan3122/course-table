<?php
    class Subject_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_posts($slug = FALSE){
            
            if($slug === FALSE){
                $this->db->order_by('subjects.id', 'DESC');
                $this->db->select('subjects.*, course_name');
                $this->db->join('courses', 'courses.id = subjects.course_id', 'left');
                $query = $this->db->get('subjects');
                // var_dump($this->db->last_query());die;
                return $query->result_array();
            }
            $query = $this->db->get_where('subjects', array('subject_name' => $slug));
            return $query->row_array();
        }

        public function create_post(){
            $slug = url_title($this->input->post('subject'));
            $data = array(
                'subject_name' => $this->input->post('subject'),
                'classes' => $this->input->post('classes'),
                'fees' => $this->input->post('fees'),
                'course_id' => $this->input->post('id')
            );
            return $this->db->insert('subjects', $data);
        }

        public function delete_post($id){
            $this->db->where('subjects.id', $id);
            $this->db->delete('subjects');
            return true;
        }

        public function update_post(){
            $slug = url_title($this->input->post('subject'));
            $data = array(
                'subject_name' => $this->input->post('subject'),
                'classes' => $this->input->post('classes'),
                'fees' => $this->input->post('fees'),
                'course_id' => $this->input->post('course_id')
            );
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('subjects', $data);
        }


        

        // public function get_posts_by_course($id){
        //     $this->db->order_by('subjects.id', 'DESC');    
        //     $this->db->join('courses','courses.id = subjects.course_id');
        //         $query = $this->db->get_where('subjects', array('course_id' => $id));
        //         return $query->result_array();
        // }


    }
?>