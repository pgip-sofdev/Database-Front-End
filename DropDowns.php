<?php

	require ('StoredProcedures.php');

	$statusDrop= "";
	$departmentDrop = "";
	$positionDrop = "";
	$trackDrop = "";
	$starttrackDrop = "";
	$endtrackDrop = "";


	$SP = new StoredProcedures();
	$Departments = $SP->getDepartments();
	$Positions = $SP->getPositions();
	$Tracks = $SP->getTracks();
	$Status = $SP->getStatus();
	
	
	
	foreach($Status as $S)
	{
		$statusDrop .= "<option value=".$S["status_ID"].">" .$S["status"]. "</option>";
	}
	foreach($Departments as $Department)
	{
		$departmentDrop .= "<option value=".$Department["department_ID"].">" .$Department["department_name"]. "</option>";
	}
	
	foreach($Positions as $Position)
	{
		$positionDrop .= "<option value=".$Position["position_ID"].">" .$Position["position"]. "</option>";
	}
	
	foreach($Tracks as $Track)
	{
		$trackDrop .= "<option value=".$Track["academic_track_ID"].">" .$Track["track"]. "</option>";
		$starttrackDrop .= "<option value=".$Track["academic_track_ID"].">" .$Track["start_date"]. "</option>";
		$endtrackDrop .= "<option value=".$Track["academic_track_ID"].">" .$Track["end_date"]. "</option>";
	}
	

?>