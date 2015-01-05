
<table cellpadding='0' cellspacing='0' border='0' class='display' id='showtable'>
<thead>
<tr>
<th>Delete</th>
<th>Id</th>
<th>FirstName</th>
<th>LastName</th>
<th>Address</th>
<th>Age</th>
<th>Designation</th>
<th>Department</th>
</tr>
</thead>
<tbody>

<?php foreach ($employee_details->result_array() as $row)
		{
echo "<tr class='gradeX'>
<td id='".$row['employee_id']."'><img class='deleterow' src='". base_url()."images/delete_button.gif' width='20' height='20'></td>			
<td fieldName='".$row['employee_id']."'>". $row['employee_id']."</td>
<td fieldName='firstname'>". $row['firstname']."</td>
<td fieldName='lastname'>". $row['lastname']."</td>
<td fieldName='address'>". $row['address']."</td>
<td fieldName='age'>". $row['age']."</td>
<td fieldName='designation'>". $row['designation']."</td>
<td fieldName='department'>". $row['department']."</td>
</tr>";
}

		
?>

</tbody>
		<tfoot>
		<tr>
		<th>Delete</th>
<th>Id</th>
<th>FirstName</th>
<th>LastName</th>
<th>Address</th>
<th>Age</th>
<th>Designation</th>
<th>Department</th>
</tr>
</tfoot>
</table>       
		