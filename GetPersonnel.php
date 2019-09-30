<?php
$con; 
require_once dirname(__FILE__).'/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();

$request=$_REQUEST;
$col =array(
    0   =>  'id',
    1   =>  'firstname',
    2   =>  'lastname',
    3   =>  'department',
	4	=>	'role', 
	5	=>	'personal_Email',
	6	=>	'PurdueGlobal_email',
	7	=>	'PGIPTech_email',
	8	=>	'Track',
	9	=>	'start_date',
	10	=>	'end_date'
);  //create column like table in database

$sql ="SELECT * FROM vw_personnel";
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM vw_personnel WHERE 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (ID Like '".$request['search']['value']."%' ";
    $sql.=" OR firstname Like '".$request['search']['value']."%' ";
	$sql.=" OR lastname Like '".$request['search']['value']."%' ";
	$sql.=" OR department_name Like '".$request['search']['value']."%' ";
	$sql.=" OR role Like '".$request['search']['value']."%' ";
	$sql.=" OR personal_Email Like '".$request['search']['value']."%' ";
	$sql.=" OR PurdueGlobal_Email Like '".$request['search']['value']."%' ";
	$sql.=" OR PGIPTech_Email Like '".$request['search']['value']."%' ";
	$sql.=" OR Track Like '".$request['search']['value']."%' ";
	$sql.=" OR start_date Like '".$request['search']['value']."%' ";
	$sql.=" OR end_date Like '".$request['search']['value']."%' )";
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){
    $subdata=array();
    $subdata[]=$row[0]; //id
    $subdata[]=$row[1]; //name
    $subdata[]=$row[2]; //salary
    $subdata[]=$row[3];
	$subdata[]=$row[4];
	$subdata[]=$row[5];
	$subdata[]=$row[6];
	$subdata[]=$row[7];
	$subdata[]=$row[8];
	$subdata[]=$row[9];
	$subdata[]=$row[10];	//age           //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table on database
    $subdata[]='<button type="button" id="getEdit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id="'.$row[0].'"><i class="glyphicon glyphicon-pencil">&nbsp;</i>Edit</button>
                <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash">&nbsp;</i>Delete</button>';
    $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>
