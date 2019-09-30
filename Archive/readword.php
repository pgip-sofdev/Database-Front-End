<?php
//$doc = 'Weekly_Status_Report.docx';
//$_xml    = 'word/document.xml'
//$dom = new DOMDocument;


$_path='Weekly_Status_Report.docx';
 
$_xml='word/document.xml';
$zip = new ZipArchive();
$YourName;
$YourLeadName;
$DirectorName;
$DueDate;
$Department;
$AdditionalTasks;
$From;
$ReviewDates;
$PersonalPerformance;
$Questions;
$Hours;
$PracticalGrade;
$LeadComments;
$Concerns;


if(true === $zip->open($_path)) {
 
if (($index = $zip->locateName($_xml)) !== false) {
 
$xml = $zip->getFromIndex($index);
 
$zip->close();
 
}
} else die('non zip file');
 
// well format it with domdocument class
 
$dom = new DOMDocument();
 
$dom->formatOutput = true;
 
$dom->preserveWhiteSpace = false;
 
$dom->loadXML($xml);
 
$contents = $dom->getElementsByTagName('p');


foreach($contents as $content)
{
	$strValue = $content->nodeValue;	
	
	$strSearch = 'Your Name: ';	
	if (preg_match("/{$strSearch}/i",$strValue)) 
	{
		$YourName = CleanString($strValue,':');
	}
	
	$strSearch = 'Your Team Lead’s Name: ';	
	if (preg_match("/{$strSearch}/i",$strValue)) 
	{
		$YourLeadName = CleanString($strValue,':');
	}
	
	$strSearch = 'Director’s Name: ';	
	if (preg_match("/{$strSearch}/i",$strValue)) 
	{
		$DirectorName = CleanString($strValue,':');
	}
	
	$strSearch = 'Due Date for each Week (due on Tuesdays): ';	
	if (preg_match("/{$strSearch}/i",$strValue)) 
	{
		$DueDate = CleanString($strValue,':');
	}
	
	$strSearch = 'Which Department You are working in: ';	
	if (preg_match("/{$strSearch}/i",$strValue)) 
	{
		
	}
	
	$strSearch = 'Additional Tasks (researching or meetings): ';	
	if (preg_match("/{$strSearch}/i",$strValue)) 
	{
		$AdditionalTasks = $CleanString($strValue,':');
	}
	
	$strSearch = 'From: ';	
	if (preg_match("/{$strSearch}/i",$strValue)) 
	{
		$From = CleanString($strValue,':');
	}
	
	$strSearch = 'Department: ';	
	if (preg_match("/{$strSearch}/i",$strValue)) 
	{
		$Department = CleanString($strValue,':');
	}
	
	$strSearch = 'Personal Performance for the Week. ';	
	if (preg_match("/{$strSearch}/i",$strValue)) 
	{
		$PersonalPerformance = CleanString($strValue,'.');
	}
	
	$strSearch = 'Questions, Comments, Accomplishments for the Week. ';	
	if (preg_match("/{$strSearch}/i",$strValue)) 
	{
		$Questions = CleanString($strValue,'.');
	}
	
	$strSearch = 'Total Hours this Week: ';	
	if (preg_match("/{$strSearch}/i",$strValue)) 
	{
		$Hours = CleanString($strValue,':');
	}
	
	$strSearch = 'Practical Grade for the Week: ';	
	if (preg_match("/{$strSearch}/i",$strValue)) 
	{
		
	}
	
	$strSearch = 'Team Leader’s Comments: ';	
	if (preg_match("/{$strSearch}/i",$strValue)) 
	{
		$Comments = CleanString($strValue,':');
	}
	
	$strSearch = 'Concerns: ';	
	if (preg_match("/{$strSearch}/i",$strValue)) 
	{
		$Concerns = CleanString($strValue, ':');
	}
}

	echo $YourName;
	echo $YourLeadName;
	echo $DirectorName;
	//echo $DueDate;
	echo $Department;
	//echo $AdditionalTasks;
	echo $From;
	//echo $ReviewDates;
	echo $PersonalPerformance;
	//echo $Questions;
	echo $Hours;
	//echo $PracticalGrade;
	//echo $LeadComments;
	//echo $Concerns;

Function CleanString($Value, $Find)
{	
	$Index = strpos($Value,$Find) + strlen($Find);	
	return trim(substr($Value, $Index));
}
?>