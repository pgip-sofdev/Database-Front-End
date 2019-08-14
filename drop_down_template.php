<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// use the fist block of code to create dropdown varibales in PHP based on database
                                                        //database connection credentials
require ('internconnection.php'); 
require ('functions.php');
                                                            // Create connection to databse 
	$conn = new mysqli($serverName, $userName, $password, $databaseName);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
                
                                                            // create varible here example variable below
                                $statusDrop = " ";
                                $statusradio = " ";
                                
            
                                                                //assign variable to database table contents and organize it as a dropdown
                $sql= "SELECT status_id, status_type FROM status;"; //getting all statuses from database 
		$rs = mysqli_query($conn, $sql);
		if (mysqli_num_rows($rs) > 0) {             //if data exist based on number of rows
                    // output data of each row
                    while($row = mysqli_fetch_assoc($rs)){
                    $statusDrop .= generateDropDownHTML($row['status_id'], $row['status_type'] );
                    }
					}
                                        
    //                          output data of each row
					$sql= "SELECT status_id, status_type FROM status;"; //getting all statuses from database 
		$rs = mysqli_query($conn, $sql);
		if (mysqli_num_rows($rs) > 0) {             //if data exist based on number of rows
                    // output data of each row
                    while($row = mysqli_fetch_assoc($rs)){
                    $statusradio .= generateradioHtml($row['status_type'], $row['status_type'] );
                    }
					}
                                        mysqli_close($conn);
		
//on front end form we could do the echo $statusDrop where appropriate 
		
?>
               use the second half to echo PHP drop down variable into the HTML form                           
                                        
                    <form action="insertintodatabase.php" method="POST">     
                                    <div class="wrap-input25 input100-select bg1">
					<span class="label-input100">Status</span>
					<div>
						<select class="js-select2" name="stateid">
						<?php 
							echo $statusDrop; 
							?>
							</select>
						<?php
                                                        echo $statusradio;
						?>
						
						<div class="dropDownSelect2"></div>
					</div>
				</div>
                                    </form> 