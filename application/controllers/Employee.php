<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('emp');
	}	
	public function index()
	{
		$data['data'] = $this->emp->get_records('emp');
		//pre($data['data']);die;
        $this->load->view('layout/header');
        $this->load->view('employee/index',$data);
		$this->load->view('layout/footer');
	}
	
    public function create()
	{
        $this->load->view('layout/header');
		$this->load->view('employee/create');
        $this->load->view('layout/footer');
	}
	public function store()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('city', 'City', 'required');
		//$this->form_validation->set_rules('dept', 'Department', 'required');
		$this->form_validation->set_rules('profile_pic', '', 'callback_file_check');
		

		if ($this->form_validation->run() == FALSE) 
		{
			$this->create();		
		}
		else
		{
			//----file upload code---
				
			$target = "uploads/" . basename($_FILES["profile_pic"]["name"]);

			if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target)) 
			{
				$data['profile_pic'] = basename($_FILES["profile_pic"]["name"]);
				$response = array(
					"type" => "success",
					"message" => "Image uploaded successfully."
				);
			}


			//----end of file upload code---
			$post = $this->input->post();
			$data['name'] = $post['name'];
			$data['email'] = $post['email'];
			$data['mobile'] = $post['mobile'];
			$data['city'] = $post['city'];
			$data['dept'] = $post['dept'];
			$this->emp->insert('emp',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-block">Record has been saved successfully.</div>');
			redirect(base_url());
		}	
		
	}
	public function edit($id)
	{
		$data['data'] = $this->emp->find_record_by_id('emp', $id);

		$this->load->view('layout/header');
		$this->load->view('employee/edit',$data);
		$this->load->view('layout/footer');
	}	
	public function update($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('city', 'City', 'required');
		

		if ($this->form_validation->run() == FALSE) 
		{
			$this->edit($id);		
		}
		else
		{
			$post = $this->input->post();
			$data['name'] = $post['name'];
			$data['email'] = $post['email'];
			$data['mobile'] = $post['mobile'];
			$data['city'] = $post['city'];
			$data['dept'] = $post['dept'];

			$this->emp->update('emp', $data, $id);
			$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been updated successfully.</div>');
			redirect(base_url());
			
		}	

		//$this->crud->update('posts', $data, $id);
		//$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been updated successfully.</div>');
		//redirect(base_url());
	}
	public function file_check($str)
	{
        $allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['profile_pic']['name']);
        if(isset($_FILES['profile_pic']['name']) && $_FILES['profile_pic']['name']!="")
		{
            if(in_array($mime, $allowed_mime_type_arr))
			{
                return true;
            }
			else
			{
                $this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
                return false;
            }
        }
		else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }
	public function delete($id)
	{
		$this->emp->delete('emp', $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been deleted successfully.</div>');
		redirect(base_url());
	}
	public function index2()
	{
		$data['data'] = $this->emp->get_records('emp');
		//pre($data['data']);die;
        $this->load->view('layout/header');
        $this->load->view('employee/index2',$data);
		$this->load->view('layout/footer');
	}
	public function autherList()
	{
		$postData = $this->input->post();

		// Get data
		$data = $this->emp->getAuthers($postData);
   
		echo json_encode($data);
	}
}
