<?php

class UserModel extends CI_Model
{
    public function registerUser($data)
    {
        return $this->db->insert('users', $data);
    }
    public function checkLogin($data) 
    {
        $this->db->where('email', $data['email']);
        $this->db->where('password', $data['password']);
        $query = $this->db->get('users');
        if($query!=NULL)
        {
            return $query->row();
        } 
        else
        {
            return false;
        }
    }
}