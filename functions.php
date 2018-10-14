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
* Functions Page
*/

/*
* Declare MySQL connection information. Required for program to work!
*/
$con = new PDO("mysql:host={HOST};dbname={DB_NAME}", "{DB_NAME}", "{DB_USERNAME}");

/*
* Link to this on the web
* Should end with / 
*/
$public_link = "https://example.com/siyum/";

/*
* SMTP Credentials
*/
$stmp_host = ""; //stmp.example.com
$stmp_authentication = ""; //'ssl' or 'tls'
$smtp_username = "";
$stmp_password = "";
$stmp_email = ""; //This might differ from Username, so put in the 'From' Email
$stmp_password = "";

/*
* Admin Panel Login Credentials
*/
$adminUsername = "admin";
$adminPassword = "admin";

/**
* System Functions (Can leave, don't need to edit)
*/

/*
* Function to Show Footer
*/
function displayFooter(){
	echo '<li>Powered by <a href="https://sommertechs.com">Sommer Technologies</a><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>';
}

/*
* Function to Safely use $_GET and $_POST in SQL Queries
*/
function safesql($input){
	return filter_var(ucwords(strtolower($input)),FILTER_SANITIZE_STRING);
}

/*
* Function to get the ID for the Homepage Siyum
*/
function getHomepageID(){
	$sql = $GLOBALS['con']->query("SELECT `OptKey` FROM `options` WHERE OptValue='HomepageID'");
	return $sql->fetchColumn();
}

/*
* Check User is Logged in properly
*/
function checkAuth(){
	//Start Session and check authentication
	session_start();
	if($_SESSION['sigum_sys_loggedin_session'] != true){
		header('Location: login.php');
		die();
	};
}

/**
* Function to output a CSV file with records of students
* Data Send: Array of records, (Optional) File Name, (Optional) Delimiter
* Data Returned: Downloadable CSV File
*/
function outputCSV($array, $filename = "Siyum_Signups.csv", $delimiter=",") {
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="'.$filename.'";');

    // open the "output" stream
    // see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
    $f = fopen('php://output', 'w');

    foreach ($array as $line) {
        fputcsv($f, $line, $delimiter);
    }
}; 

?>