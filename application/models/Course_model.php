<?php
    class Course_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_courses($slug = false){
            if($slug === FALSE){
                $this->db->select('courses.*');
                $this->db->select_sum('classes');
                $this->db->select_sum('fees');
                $this->db->select('COUNT(*) as subject');
                $this->db->join('subjects','subjects.course_id = courses.id', 'LEFT');
                $this->db->group_by("course_name");
                $query = $this->db->get('courses');
                return $query->result_array();
            }
            $query = $this->db->get_where('courses', array('id' => $slug));
            return $query->row_array();
        }
        
        public function create_course(){ 
            $data = array(
                'course_name' => $this->input->post('course'),
                'duration' => $this->input->post('duration'),
                'total_fees' =>  $this->input->post('total_fees'),
                'total_classes' =>  $this->input->post('total_classes'),
                'total_subjects' =>  $this->input->post('total_subjects')
            );
            if ( !$this->db->insert('courses', $data) )
            {
                $error = $this->db->error();
                return $error;
            }else{
                return $this->db->insert('courses', $data);
            }
        }

        public function delete_course($id){
            $this->db->where('id', $id);
            $this->db->delete('courses');
            return true;
        }

        public function update_post(){
            $slug = url_title($this->input->post('course_name'));
            $data = array(
                'course_name' => $this->input->post('course_name'),
                'duration' => $this->input->post('duration'),
                'total_fees' => $this->input->post('total_fees'),
                'total_classes' => $this->input->post('total_classes'),
                'total_subjects' => $this->input->post('total_subjects')
            );
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('courses', $data);
        }

        public function get_subjects_by_course($id){
            $this->db->order_by('subjects.id', 'DESC');    
            $this->db->join('courses','courses.id = subjects.course_id');
                $query = $this->db->get_where('subjects', array('courses.id' => $id));
                return $query->result_array();
        }

        public function get_course($id){
            $query = $this->db->get_where('courses', array('id' => $id));
            return $query->row();
        }
    }

    