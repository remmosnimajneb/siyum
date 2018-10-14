<?php
/********************************
* Project: Siyum System
* Code Version: 1.0
* Author: Benjamin Sommer
* GitHub: https://github.com/remmosnimajneb
* Theme Design by: HTML5 UP [HTML5UP.NET] - Theme `Editorial`
* Licensing Information: CC BY-SA 4.0 (https://creativecommons.org/licenses/by-sa/4.0/)
***************************************************************************************/

/*
* Export CSV of Siyum Registrants and Emails
*/

//Require Functions File
require 'functions.php';

//First check if User is logged in
checkAuth();

//Set Headers so it can download
header('Content-type: text/plain');

//Get SiyumID
$SiyumID = safesql($_GET['siyum']);

//Get Siyum Type
$SiyumType = strtolower(safesql($_GET['type']));

//Get Siyum Name
$SiyumName = safesql($_GET['name']);

//Setup Array
$exportArray = array();
$titlesArray = array("Volume Name", "Name(s)", "Email(s)");
array_push($exportArray, $titlesArray);

//Query DB
$sql = "SELECT * FROM `" . $SiyumType . "` WHERE `SiyumID` = " . $SiyumID;

//Build Array
$stm = $con->prepare($sql);
$stm->execute();
$array = array();
$records = $stm->fetchAll();
foreach($records as $row){
	$array = array($row['volumeName'], $row['name'], $row['email']);
	array_push($exportArray, $array);
};

//Output Array
    outputCSV($exportArray, ucwords($SiyumName) . "_Signups.csv");
?>