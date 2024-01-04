<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('emp');
	}
    public function test1()
    {
        $result = $this->db->get('authors')->result();
        //$result = $this->db->get('authors',10,20)->result();
        pre($result);        
    }
    public function test2()
    {
        $sql = $this->db->get_compiled_select('authors');
        $sql = $this->db->limit(10,20)->get_compiled_select('authors', FALSE);

        echo $sql;
    }
    public function test3()
    {
        $id = 2;
        $limit = 1;
        $offset = 0;
        $result = $this->db->get_where('authors', array('id' => $id), $limit, $offset)->result();
        pre($result); 
    }
}