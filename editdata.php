<?php
/**
 for display full info. and edit data
 */
// start again

//require ('StoredProcedures.php');
require ('DropDowns.php');
$con; 
require_once dirname(__FILE__).'/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();



//$con=mysqli_connect('localhost','root','','interndb1');  // this one in error

if(isset($_REQUEST['id'])){
    $id=intval($_REQUEST['id']);
    if($id=="0")
    {
        $per_id="New Record";
        $per_firstname="";
        $per_lastname="";
        $per_department="";
        $per_role="";
        $per_personalemail="";
        $per_purdueglobalemail="";
        $per_pgiptechemail="";
        $per_track="";
        $per_startdate="";
        $per_enddate="";

        $form_Type = "Add New Person";
    }
    else
    {
        $sql="select * from vw_personnel WHERE ID=$id";
        $run_sql=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($run_sql)){
            $per_id=$row[0];
            $per_firstname=$row[1];
		    $per_lastname=$row[2];
		    $per_department=$row[3];
		    $per_role=$row[4];
		    $per_personalemail=$row[5];
		    $per_purdueglobalemail=$row[6];
		    $per_pgiptechemail=$row[7];
		    $per_track=$row[8];
		    $per_startdate=$row[9];
		    $per_enddate=$row[10];
        }

        $form_Type = "Edit: ".$per_firstname." ".$per_lastname;
    }//end while
    //var_dump($run_sql);
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $form_Type ?></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">ID</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtid" name="txtid" value="<?php echo $per_id;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtfirstname">First Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtfirstname" name="txtfirstname" value="<?php echo $per_firstname;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtlastname">Last Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtlastname" name="txtlastname" value="<?php echo $per_lastname;?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-4 control-label" for="txtdepartment">Department</label>
                            <div class="col-sm-6">                                
								<select class = "form-control" id="txtdepartment" name="txtdepartment">
									<?php echo DepartmentList($per_department); ?>
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-4 control-label" for="txtrole">Role</label>
                            <div class="col-sm-6">                                
                                <select class = "form-control" id="txtrole" name="txtrole">
									<?php echo RoleList($per_role); ?>
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-4 control-label" for="txtpersonalEmail">Personal Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtpersonalEmail" name="txtpersonalEmail" value="<?php echo $per_personalemail;?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-4 control-label" for="txtPurdueGlobalEmail">Purdue Global Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtPurdueGlobalEmail" name="txtPurdueGlobalEmail" value="<?php echo $per_purdueglobalemail;?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-4 control-label" for="txtPGIPEmail">PGIP-Tech Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtPGIPEmail" name="txtPGIPEmail" value="<?php echo $per_pgiptechemail;?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-4 control-label" for="txttrack">Track</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="txttrack" name="txttrack" onchange="OnSelectionChange(this.value)">
									<?php echo TrackList($per_track); ?>
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-4 control-label" for="txtstartDate">Start Date</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtstartDate" name="txtstartDate" value="<?php echo $per_startdate;?>" readonly>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-4 control-label" for="txtendDate">End Date</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="txtendDate" name="txtendDate" value="<?php echo $per_enddate;?>" readonly>
                            </div>
                        </div>							
                    </div>
                </form>
            </div>
        </div>
    </form>

<script type="text/javascript" >
function OnSelectionChange(strvalue)
{
    $.ajax({
    url: 'DropDowns.php',
    type: 'post',
    data: { "getStartDate": strvalue},
    success: function(response) 
    { 
        document.getElementById("txtstartDate").value = response; 
    }
    });

    $.ajax({
    url: 'DropDowns.php',
    type: 'post',
    data: { "getEndDate": strvalue},
    success: function(response) 
    { 
        document.getElementById("txtendDate").value = response; 
    }
    });


}
</script>
<?php
}//end if ?>





