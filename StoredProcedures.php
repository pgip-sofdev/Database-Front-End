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
		
		public function getPositions()
		{
			$rows = array();
			$Sql = 'CALL sp_call_positions()';			
			$stmt = $this->con->prepare($Sql);
			$stmt->execute();
			$result = $stmt->get_result();		
			
			while ($row = $result->fetch_assoc())
			{
				$row_array["position_ID"] = $row["position_ID"];
				$row_array["position"] = $row["position"];
				array_push($rows,$row_array);
			}			
			return $rows;			
		}
		
		public function getTracks()
		{
			$rows = array();
			$Sql = 'CALL sp_call_tracks()';			
			$stmt = $this->con->prepare($Sql);
			$stmt->execute();
			$result = $stmt->get_result();		
			
			while ($row = $result->fetch_assoc())
			{
				$row_array["academic_track_ID"] = $row["academic_track_ID"];
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
		
		
		
		
	}
?>