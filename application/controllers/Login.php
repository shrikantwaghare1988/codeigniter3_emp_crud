<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('form');
        //$this->load->library('form_validation');

        $this->load->model('UserModel');
    }

    public function index()
    {        
        $this->load->view('auth/login.php');       
    }

    public function login()
    {  
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');       
        
        if($this->form_validation->run() == FALSE)
        {
            // failed
            $this->index();
        }
        else
        {

            $data = array(              
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $user = new UserModel;
            $uresult = $user->checkLogin($data);

            if($uresult)
            {              
                
                $this->session->set_userdata('uid',$uresult->id); 
                $this->session->set_userdata('fname',$uresult->first_name);
                $this->session->set_userdata('lname',$uresult->last_name);
                $this->session->set_userdata('email',$uresult->email); 
                pre("Login Successfully");
                pre($this->session->userdata);die;              
                $this->session->set_flashdata('status','Login Successfully.!');
                redirect(base_url('register'));
            }
            else
            {
                $this->session->set_flashdata('status','Invalid Login');
                redirect(base_url('login'));
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        return redirect('Login');
    }
    public function test()
    {        
        echo is_logged_in();
    }
}

