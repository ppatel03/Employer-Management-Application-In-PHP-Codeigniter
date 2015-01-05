<?php

class Employee_model extends Model{
	
	function Employee_model()
	{
		parent::Model();
		$this->load->database();
	}
	
	function insertEmployee($firstname,$lastname,$address,$age,$designation,$department)
	{
		$insertQuery="INSERT INTO employeeinfo(firstname,lastname,address,age, designation, 
		department) values (?,?,?,?,?,?)";
		$this->db->query($insertQuery,array($firstname,$lastname,$address,$age,$designation,$department));
	}
	
	function selectEmployee()
	{
		$selectQuery =  $this->db->query("Select * from employeeinfo");
        return $selectQuery;
	}
	
	
	function deleteEmployee($id)
	{
		 $this->db->query("Delete  from employeeinfo where employee_id=".$id);
   	}
	
	function updateEmployee($id,$fieldName,$fieldValue)
	{
		$this->db->query("Update employeeinfo SET ".$fieldName."='".$fieldValue."' where employee_id=".$id);
	}
	
function searchOnMultiple($search)
	{
		$searchQuery =$this->db->query("SELECT employee_id, firstname, lastname, address, age, designation, department FROM employeeinfo WHERE employee_id LIKE '%$search%' || lastname LIKE '%$search%' || address LIKE '%$search%' || age LIKE '%$search%' || designation LIKE '%$search%' || department LIKE '%$search%' ");
		return $searchQuery;
	}
	
	
}










?>