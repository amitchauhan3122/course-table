<?php
    class Courses extends CI_Controller{

        public function course_data(){
            $data['title'] = 'All Courses';
            $data['posts'] = $this->course_model->get_courses();
            $this->load->view('templates/header');
            $this->load->view('courses/courses', $data);
            $this->load->view('templates/footer');
        }

        public function create(){
            $data['title'] = 'Courses';
            $this->form_validation->set_rules('course', 'Course', 'required');
            if($this->form_validation->run()=== FALSE){
                $this->load->view('templates/header');
                $this->load->view('courses/create', $data);
                $this->load->view('templates/footer');
            }else{
                $data['new_course'] = $this->course_model->create_course();
                if(isset($data['new_course']) && isset($data['new_course']['code'])){
                    $this->session->set_flashdata('The Course already exists', 'Please create New Course. Error code is:'.$data['new_course']['code']);
                }
                redirect('courses', $data);
            }
        }

        public function delete($id){
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            $this->course_model->delete_course($id);
            redirect('courses');
        }

        public function edit($slug){
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            $data['post'] = $this->course_model->get_courses($slug);
            if(empty($data['post'])){
                show_404();
            }
            $data['title'] = 'Edit Courses';
            $this->load->view('templates/header');
            $this->load->view('courses/edit', $data);
            $this->load->view('templates/footer');
        }
        
        public function update(){
            $this->course_model->update_post();
            redirect('courses');
        }

        public function course_detail($id){
            $data['title'] = $this->course_model->get_course($id)->course_name;
            $data['posts'] = $this->course_model->get_subjects_by_course($id);
            $this->load->view('templates/header');
            $this->load->view('subjects/subjects', $data);
            $this->load->view('templates/footer');
        }
    }