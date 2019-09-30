<?php include 'DropDowns.php'; ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" </script>
<script>

</script>

</head>
<body>
<form style="background-color:#ffffff;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E" method="post"></div>
	<p>
	<div class="element-name">		
		<span class="nameFirst">
			<label>First Name:</label>
			<input type="text" size="8" id="firstname" name="firstname" />
		</span>
		<span class="nameLast">
			<label>Last Name:</label>
			<input type="text" size="14" id="lastname" name="lastname" />
		</span>
	</div>
	</p>
	<p>
	<div class="role-deparment">		
		<span class="role">
			<label>Role:</label>
			<select id="role" name="Role">
				<?php echo RoleList(); ?>
			</select>
		</span>
		<span class="role">
			<label>Department:</label>
			<select id="department" name="Department">
				<?php echo DepartmentList(); ?>
			</select>
		</span>
	</div>
	</p>
	<p>
	<div class="EmailAddress">		
		<span class="PersonalEmail">
			<label>Personal Email:</label>
			<input type="text" size="8" id="personalemail" name="personalemail" />
		</span>
		<span class="PurdueEmail">
			<label>Purdue Email:</label>
			<input type="text" size="14" id="purdueemail" name="purdueemail" />
		</span>
		<span class="PGIPEmail">
			<label>PGIP-Tech Email:</label>
			<input type="text" size="14" id="pgipemail" name="pgipemail" />
		</span>
	</div>
	</p>
	<p>
	<div class="Track">		
		<span class="track">
			<label>Track:</label>
			<select id="track" name="Track">
				<?php echo TrackList(); ?>
			</select>
		</span>
		<span class="startdate">
			<label>Start Date:</label>
			<input type="text" size="14" id="startdate" name="StartDate" />
		</span>
		<span class="enddate">
			<label>End Date:</label>
			<input type="text" size="14" id="enddate" name="enddate" />
		</span>
	</div>
	</p>
	<p>
	<div class="submit">
		<input type="submit" value="Submit"/>
	</div>
	</p>
</form>
	
	
	
	
<p>
	<?php echo Interns(); ?>
</p>
</body>

<script>
	$(document).ready(function() {
		$('#example').DataTable();
	});
	
	
	
	
	
	var table = document.getElementById('example'),rIndex;
	
	for(var i = 0; i < table.rows.length; i++)
	{
		table.rows[i].onclick = function()
		{
			rIndex = this.rowIndex;
			document.getElementById("firstname").value = this.cells[0].innerHTML;
			document.getElementById("lastname").value = this.cells[1].innerHTML;
			
			document.getElementById("personalemail").value = this.cells[4].innerHTML;
			document.getElementById("purdueemail").value = this.cells[5].innerHTML;
			document.getElementById("pgipemail").value = this.cells[6].innerHTML;
			document.getElementById("startdate").value = this.cells[8].innerHTML;
			document.getElementById("enddate").value = this.cells[9].innerHTML;
			
			
			
				var select = document.getElementById("role");
				for (var k = 0; k < select.length; k++){
				if(select.options[k].text === this.cells[3].innerHTML){
					select.options[k].selected = true;
				}				
				}

				var select = document.getElementById("department");
				for (var k = 0; k < select.length; k++){
				if(select.options[k].text === this.cells[2].innerHTML){
					select.options[k].selected = true;
				}				
				}

				var select = document.getElementById("track");
				for (var k = 0; k < select.length; k++){
				if(select.options[k].text === this.cells[7].innerHTML){
					select.options[k].selected = true;
				}				
				}
									

				
		}
	}
	
</script>

</html>
