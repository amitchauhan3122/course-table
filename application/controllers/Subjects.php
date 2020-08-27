<?php
    class Subjects extends CI_Controller{

        public function test_composer()
  {
    $excel = new \SimpleExcel\SimpleExcel('xml'); // instantiate new object (will automatically construct the parser & writer type as XML)

    $excel->writer->setData(
      array
      (
        array('ID', 'Name', 'Kode' ),
        array('1', 'Kab. Bogor', '1' ),
        array('2', 'Kab. Cianjur', '1' ),
        array('3', 'Kab. Sukabumi', '1' ),
        array('4', 'Kab. Tasikmalaya', '2' )
      )
    ); // add some data to the writer
    $excel->writer->saveFile('example'); // save the file with specified name (example.xml)
    // and specified target (default to browser)
  }
        public function subject_data(){
            $data['title'] = 'Latest Subjects';
            $data['posts'] = $this->subject_model->get_posts();
            $this->load->view('templates/header');
            $this->load->view('subjects/subjects', $data);
            $this->load->view('templates/footer');
        }

        public function create(){
            $data['title'] = 'Create Subjects';
            $data['courses'] = $this->course_model->get_courses();

            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('classes', 'Classes', 'required');
            $this->form_validation->set_rules('fees', 'Fees', 'required');
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('subjects/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->subject_model->create_post();
                redirect('subjects');
            }

        }

        public function delete($id){
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            $this->subject_model->delete_post($id);
            redirect('subjects');
        }
        
        public function edit($slug){
            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }
            $data['post'] = $this->subject_model->get_posts($slug);
            $data['courses'] = $this->course_model->get_courses();
            
            if(empty($data['post'])){
                show_404();
            }
            $data['title'] = 'Edit Posts';
            $this->load->view('templates/header');
            $this->load->view('subjects/edit', $data);
            $this->load->view('templates/footer');
        }
        
        public function update(){
            $this->subject_model->update_post();
            redirect('subjects');
        }
    }
?>