<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function pre($data)
{

    echo "<pre>";
    print_r($data);
}
function is_logged_in() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    $user = $CI->session->userdata('uid');

    if (!isset($user)) 
    { 
        return false; 
    } 
    else
    { 
        return true; 
    }
}
