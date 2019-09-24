<?php

	require ('StoredProcedures.php');

	$statusDrop= "";
	$departmentDrop = "";
	$roleDrop = "";
	$trackDrop = "";
	$starttrackDrop = "";
	$endtrackDrop = "";


	
	//$Positions = $SP->getPositions();
	//$Tracks = $SP->getTracks();
	//$Status = $SP->getStatus();
	
	function StatusList()
	{	
		foreach($Status as $S)
		{
			$statusDrop .= "<option value=".$S["status_ID"].">" .$S["status"]. "</option>";
		}
	}
	
	function DepartmentList()
	{
		$SP = new StoredProcedures();
		$Departments = $SP->getDepartments();
		
		foreach($Departments as $Department)
		{
			$departmentDrop .= "<option value=".$Department["department_ID"].">" .$Department["department_name"]. "</option>";
		}
		
		return $departmentDrop;
	}
	
	function RoleList()
	{
		$SP = new StoredProcedures();
		$Roles = $SP->getRoles();
		
		foreach($Roles as $Role)
		{
			$roleDrop .= "<option value=".$Role["Role_ID"].">" .$Role["Role"]. "</option>";
		}
		return $roleDrop;
		
	}
	function TrackList()
	{
		$SP = new StoredProcedures();
		$Tracks = $SP->getTracks();
		foreach($Tracks as $Track)
		{
			$trackDrop .= "<option value=".$Track["track_ID"].">" .$Track["track"]. "</option>";
		}
		
		return $trackDrop;
		
		
	}
	
	function TrackStarts()
	{
		foreach($Tracks as $Track)
		{			
			$starttrackDrop .= "<option value=".$Track["track_ID"].">" .$Track["start_date"]. "</option>";
		}
	}
	
	function TrackEnds()
	{
		foreach($Tracks as $Track)
		{			
			$endtrackDrop .= "<option value=".$Track["track_ID"].">" .$Track["end_date"]. "</option>";
		}
	}
	
	function Interns()
	{
		$SP = new StoredProcedures();
		$InternList = $SP->getInterns();
		$table_str = '<table id="example" class="display" style="width:100%">';
		$table_str.='<thead>';
			$table_str.='<th>First Name</th>';
			$table_str.='<th>Last Name</th>';
			$table_str.='<th>Department</th>';
			$table_str.='<th>Role</th>';
			$table_str.='<th>Personal Email</th>';
			$table_str.='<th>Purdue Global Email</th>';
			$table_str.='<th>PGIP-Tech Email</th>';
			$table_str.='<th>Track</th>';
			$table_str.='<th>Start Date</th>';
			$table_str.='<th>End Date</th>';
		$table_str.='</thead>';		
		$table_str.='<tbody>';	
		//$table_str='<table id="example" class="display" style="width:100%">';
		foreach($InternList as $Intern)
		{				
			$table_str.='<tr>';		
			$table_str.= '<td>'.$Intern["firstname"].'</td>';
			$table_str.= '<td>'.$Intern["lastname"].'</td>';
			$table_str.= '<td>'.$Intern["department_name"].'</td>';
			$table_str.= '<td>'.$Intern["role"].'</td>';
			$table_str.= '<td>'.$Intern["personal_Email"].'</td>';
			$table_str.= '<td>'.$Intern["PurdueGlobal_Email"].'</td>';
			$table_str.= '<td>'.$Intern["PGIPTech_Email"].'</td>';
			$table_str.= '<td>'.$Intern["Track"].'</td>';
			$table_str.= '<td>'.$Intern["start_date"].'</td>';
			$table_str.= '<td>'.$Intern["end_date"].'</td>';
			$table_str.='</tr>';
		}
		$table_str.='</tbody>';
		$table_str.='</table>';
		return $table_str;
		
	}
?>