<?php
	
	class StoredProcedures{

		private $con; 

		function __construct(){

			require_once dirname(__FILE__).'/DbConnect.php';

			$db = new DbConnect();

			$this->con = $db->connect();

		}
	
		public function getDepartments()
		{
			$rows = array();
			$Sql = 'CALL call_departments()';			
			$stmt = $this->con->prepare($Sql);
			$stmt->execute();
			$result = $stmt->get_result();		
			
			while ($row = $result->fetch_assoc())
			{
				$row_array["department_ID"] = $row["department_ID"];
				$row_array["department_name"] = $row["department_name"];
				array_push($rows,$row_array);
			}			
			return $rows;			
		}
		
		public function getRoles()
		{
			$rows = array();
			//$Sql = 'CALL sp_Call_Roles()';
			$Sql = 'SELECT Role_ID, Role From roles;';
			$stmt = $this->con->prepare($Sql);
			$stmt->execute();
			$result = $stmt->get_result();		
			
			while ($row = $result->fetch_assoc())
			{
				$row_array["Role_ID"] = $row["Role_ID"];
				$row_array["Role"] = $row["Role"];
				array_push($rows,$row_array);
			}				
			return $rows;			
		}
		
		public function getTracks()
		{
			$rows = array();
			//$Sql = 'CALL sp_call_tracks()';
			$Sql = 'SELECT track_ID, track, start_date, end_date From tracks;';			
			$stmt = $this->con->prepare($Sql);
			$stmt->execute();
			$result = $stmt->get_result();		
			
			while ($row = $result->fetch_assoc())
			{
				$row_array["track_ID"] = $row["track_ID"];
				$row_array["track"] = $row["track"];
				$row_array["start_date"] = $row["start_date"];
				$row_array["end_date"] = $row["end_date"];				
				array_push($rows,$row_array);
			}			
			return $rows;			
		}
		
		public function getStatus()
		{
			$rows = array();
			$Sql = 'CALL sp_call_status()';			
			$stmt = $this->con->prepare($Sql);
			$stmt->execute();
			$result = $stmt->get_result();		
			
			while ($row = $result->fetch_assoc())
			{
				$row_array["status_ID"] = $row["status_ID"];
				$row_array["status"] = $row["status"];
				array_push($rows,$row_array);
			}			
			return $rows;			
		}
		
		public function getInterns()
		{
			$rows = array();
			$Sql = 'CALL sp_InternTest()';			
			$stmt = $this->con->prepare($Sql);
			$stmt->execute();
			$result = $stmt->get_result();		
			
			while ($row = $result->fetch_assoc())
			{
				$row_array["firstname"] = $row["firstname"];
				$row_array["lastname"] = $row["lastname"];
				$row_array["department_name"] = $row["department_name"];
				$row_array["role"] = $row["role"];
				$row_array["personal_Email"] = $row["personal_Email"];
				$row_array["PurdueGlobal_Email"] = $row["PurdueGlobal_Email"];
				$row_array["PGIPTech_Email"] = $row["PGIPTech_Email"];
				$row_array["Track"] = $row["Track"];
				$row_array["start_date"] = $row["start_date"];
				$row_array["end_date"] = $row["end_date"];
				array_push($rows,$row_array);
			}			
			return $rows;			
		}
		
		
		
	}
?>