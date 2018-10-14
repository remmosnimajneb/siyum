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
* Edit Siyum
*/

//Require Functions File
require 'functions.php';

//First check if User is logged in
checkAuth();

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Edit Siyum</title>
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
                <h1><strong>Edit Siyum</strong></h1>
            </div>
        </header>

        <!-- Main -->
        <div id="main">
            <!-- One -->
            <section id="one">
                <header class="major">
                    <h2>Edit Siyum</h2>
                </header>                        
            </section>
            <section id="two">
                <form action="register.php" method="POST">
                    <input type="hidden" name="formType" value="editSiyum">
                    <?php
                        $sql = "SELECT * FROM `siyums` WHERE `SiyumID` = " . safesql($_GET['siyum']);
                        $stm = $con->prepare($sql);
                        $stm->execute();
                        $records = $stm->fetchAll();
                        foreach ($records as $row) {
                            echo "<input type='hidden' name='SiyumID' value='" . $row['SiyumID'] . "'>";
                            echo "Siyum Name: <input type='text' name='siyumName' value='" . $row['siyumName'] . "'><br />";
                            echo "Siyum For: <input type='text' name='siyumFor' value='" . $row['siyumFor'] . "'><br />";
                            echo "Siyum End Date: <input type='text' name='siyumEndDate' value='" . $row['siyumEndDate'] . "'><br />";
                            echo "Make this homepage Siyum?<br />";
                            
                            //Check HomePageID
                                if(getHomepageID() == $_GET['siyum']){
                                    echo '<input type="radio" name="homepage" value="Yes" checked="checked"> Yes<br>
                                            <input type="radio" name="homepage" value="No"> No<br>';
                                } else {
                                    echo '<input type="radio" name="homepage" value="Yes"> Yes<br>
                                            <input type="radio" name="homepage" value="No" checked="checked"> No<br>';
                                }
                        }

                        echo "<br /> Delete this Siyum? <br /> 
                                <input type='radio' name='delete' value='true'> Yes <br />
                                <input type='radio' name='delete' value='false' checked='checked'> No <br /><br />";
                    ?>
                    <input type="submit" name="submit" value="Edit">
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