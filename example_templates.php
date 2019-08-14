<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//so this would be for any type of html generation from the database, it would allow us to not have to write out all the html each time we
//need a drop down, text field, radio group etc. 
function generateDropDownHtml($itemId, $itemName) {
	
	$dropDownHtml = "<option value=".$itemId.">" . $itemName. "</option>";
	
	return $dropDownHtml;
	
}
function generateradioHtml($itemId,$itemName) {
	
	$radioHtml = "<label for='itemName'>".$itemName."</label>"."<input type='radio'  name= 'itemName' value=".$itemName.">" ;
	
	return $radioHtml;
}
?>