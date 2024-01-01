<?php

/**
 * Crud Model
 */
class Emp extends CI_Model
{

	public function insert($table, $data)
	{
		$result = $this->db->insert($table, $data);
		return $result;
	}

	public function update($table, $data, $id)
	{
		$result = $this->db->where('id', $id)->update($table, $data);
		return $result;
	}

	public function delete($table, $id)
	{
		$result = $this->db->delete($table, ['id' => $id]);
		return $result;
	}

	public function get_records($table)
	{
		$result = $this->db->get($table)->result();
		return $result;
	}

	public function find_record_by_id($table, $id)
	{
		$result = $this->db->get_where($table, ['id' => $id])->row();
		return $result;
	}
	public function getAuthers($postData=null)
	{
		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value
   
		## Search 
		$searchQuery = "";
		if($searchValue != ''){
		   $searchQuery = " (first_name like '%".$searchValue."%' or last_name like '%".$searchValue."%' or email like'%".$searchValue."%' ) ";
		}
   
		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('authors')->result();
		$totalRecords = $records[0]->allcount;
   
		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
		   $this->db->where($searchQuery);
		$records = $this->db->get('authors')->result();
		$totalRecordwithFilter = $records[0]->allcount;
   
		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
		{
			$this->db->where($searchQuery);
		}
		   
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('authors')->result();
   
		$data = array();
   
		foreach($records as $record ){
   
		   $data[] = array( 
			  "id"=>$record->id,
			  "first_name"=>$record->first_name,
			  "last_name"=>$record->last_name,
			  "email"=>$record->email,
			  "birthdate"=>$record->birthdate
		   ); 
		}
   
		## Response
		$response = array(
		   "draw" => intval($draw),
		   "iTotalRecords" => $totalRecords,
		   "iTotalDisplayRecords" => $totalRecordwithFilter,
		   "aaData" => $data
		);
   
		return $response; 
	}
}