<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('UserModel');
    }

    public function index()
    {        
        $this->load->view('auth/register.php');       
    }

    public function register()
    {
       
       
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
        if($this->form_validation->run() == FALSE)
        {
            // failed
            $this->index();
        }
        else
        {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $register_user = new UserModel;
            $checking = $register_user->registerUser($data);
            if($checking)
            {
                $this->session->set_flashdata('status','Registered Successfully.! Go to Login');
                redirect(base_url('register'));
            }
            else
            {
                $this->session->set_flashdata('status','Something Went Wrong.!');
                redirect(base_url('register'));
            }
        }
    }
}

