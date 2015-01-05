<?php

class Employee extends Controller{

	function Employee()
	{
		parent::Controller();
		$this->view_data['base_url']=base_url();
		$this->view_data['footer']="footer";
		$this->view_data['header']="header";
		$this->view_data['add_panel']="add_panel";
		$this->view_data['manage_panel']="manage_panel";
		$this->view_data['advsearch_panel']="advsearch_panel";
		$this->load->model('Employee_model');
		$this->load->library('form_validation');
     }


	function index()
	{
		$this->load->view('view_add',$this->view_data);
	}

	function addEmployee()
	{
		if ($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else
		{
			$firstname=$this->input->post('firstname');
			$lastname=$this->input->post('lastname');
			$address=$this->input->post('address');
			$age=$this->input->post('age');
			$designation=$this->input->post('designation');
			$department=$this->input->post('department');
			$this->Employee_model->insertEmployee($firstname,$lastname,$address,$age,$designation,$department);
			echo "Information Successfully Submitted";
		}
	}
	
	function showEmployee()
	{
		$employee_details= $this->Employee_model->selectEmployee();
		$data=array();	
		$data['employee_details']=$employee_details;		
		$this->load->view('employee_list',$data);		
	}

	function removeEmployee($id)
	{	$num_id=(int)$id;
		$this->Employee_model->deleteEmployee($num_id);
	}
	
	function editEmployee($id,$fieldName,$fieldValue)
	{	$num_id=(int)$id;
		$this->Employee_model->updateEmployee($num_id,$fieldName,$fieldValue);
	}
	
function searchEmployee($advsearch)
	{	
		$searchresult=$this->Employee_model->searchOnMultiple($advsearch);
		$data=array();	
		$data['searchresult']=$searchresult;		
		$this->load->view('employee_search_list',$data);	
	}
	
	
	
	
	
	
	

}


?>