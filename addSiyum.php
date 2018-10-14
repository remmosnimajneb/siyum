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
* Add New Siyum
*/

//Require Functions File
require 'functions.php';

//First check if User is logged in
checkAuth();

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Add Siyum</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body id="top">
		<!-- Header -->
		<header id="header">
			<div class="inner">
				<h1><strong> Add a New Siyum</strong></h1>
			</div>
		</header>

		<!-- Main -->
		<div id="main">
			<!-- One -->
			<section id="one">
				<header class="major">
					<h2>Add a New Siyum</h2>
					<a href="index.php">Home</a>
				</header>						
			</section>
			<section id="two">
				<form action="register.php" method="POST">
					<input type="hidden" name="formType" value="addSiyum">
					<input type="text" name="siyumName" placeholder="Siyum Title" required="required"><br />
					<input type="text" name="siyumFor" placeholder="Who is the Siyum for?" required="required"><br />
					<select name="siyumType" required="required">
						<option value="tanach">Tanach</option>
						<option value="mishna">Mishna</option>
						<option value="talmud">Gemara</option>
					</select><br />
					<input type="text" name="siyumEndDate" placeholder="Siyum End Date [MM/DD/YYYY]" required="required"><br />
					Make this homepage Siyum? <br />
						<input type="radio" name="homepage" value="Yes"> Yes<br>
						<input type="radio" name="homepage" value="No"> No<br>
					<br />
					<input type="submit" value="Register">
				</form>
			</section>
		<!-- Footer -->
		<footer id="footer">
			<div class="inner">
				<ul class="copyright">
					<?php displayFooter(); ?>
				</ul>
			</div>
		</footer>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.poptrox.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>

	</body>
</html>