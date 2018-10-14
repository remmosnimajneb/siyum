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
* Admin Panel
*/

//Require Functions File
require 'functions.php';

//First check if User is logged in
checkAuth();

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>View Siyums</title>
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
                <h1><strong>View Siyums</strong></h1>
            </div>
        </header>

        <!-- Main -->
        <div id="main">
            <!-- One -->
            <section id="one">
                <header class="major">
                    <h2>View Siyums</h2>
                    <a href="addSiyum.php">Add new Siyum</a>
                </header>                        
            </section>
            <section id="two">
               <table>
				  <caption>Siyums</caption>
				  <thead>
				    <tr>
				      <th scope="col">Siyum Name</th>
				      <th scope="col">Siyum For</th>
				      <th scope="col">Siyum Type</th>
				      <th scope="col">Siyum End Date</th>
					  <th scope="col">Link to Siyum</th>
					  <th scope="col">Edit</th>
					  <th scope="col">Download</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  		//Show All Siyums
				  		$sql = "SELECT * FROM `siyums`";
				  		$stm = $con->prepare($sql);
						$stm->execute();
						$records = $stm->fetchAll();
						foreach ($records as $row) {
							echo "<tr>";
								echo "<td data-label='Siyum Name'>" . $row['siyumName'] . "</td>";
								echo "<td data-label='Siyum For'>" . $row['siyumFor'] . "</td>";
								echo "<td data-label='Siyum Type'>" . ucwords($row['siyumType']) . "</td>";
								echo "<td data-label='Siyum End Date'>" . $row['siyumEndDate'] . "</td>";
								echo "<td data-label='Link to Siyum'><a href=index.php?siyum=" . $row['SiyumID'] . ">" . $public_link . "index.php?siyum=" . $row['SiyumID'] . "</a></td>";
								echo "<td data-label='Edit'><a href='editSiyum.php?siyum=" . $row['SiyumID'] . "'>Edit</a></td>";
								echo "<td data-label='Download'><a href='exportList.php?siyum=" . $row['SiyumID'] . "&type=" . $row['siyumType'] . "&name=" . $row['siyumName'] . "'>Download</a></td>";
							echo "</tr>";
						}
				  	?>
				  </tbody>
				</table>
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