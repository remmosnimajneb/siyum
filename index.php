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
* Main Siyum Page
*/

//Require Functions File
require 'functions.php';

    //Get which Siyum to Display
        //First check if a $_GET['siyum'] is set, if so show that, otherwise show the Homepage Siyum
    $siyumID;
    if(isset($_GET['siyum'])){
        $siyumID = safesql($_GET['siyum']);
    } else {
        $siyumID = getHomepageID();
    }

    $stm = $con->prepare("SELECT * FROM `siyums` WHERE `SiyumID` LIKE '" . $siyumID. "'");
    $stm->execute();
    $records = $stm->fetchAll();
    $result = $stm->fetchColumn();

    //Then let's check Siyum Exists!, If not, choose a Siyum at Random!
    if(count($records) <= 0){
        $stm = $con->prepare("SELECT * FROM `siyums` LIMIT 1");
        $stm->execute();
        $records = $stm->fetchAll();
        $result = $stm->fetchColumn();
    }

    //Set Vars
    $siyumName;
    $siyumFor;
    $siyumEndDate;
    $siyumType;

    foreach($records as $row){
        $siyumID = $row['SiyumID'];
        $siyumName = $row['siyumName'];
        $siyumFor = $row['siyumFor'];
        $siyumEndDate = $row['siyumEndDate'];
        $siyumType = $row['siyumType'];
    };

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo $siyumName ?></title>
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
                <h1><strong><?php echo $siyumName ?></strong></h1>
            </div>
        </header>

        <!-- Main -->
        <div id="main">
            <!-- One -->
            <section id="one">
                <header class="major">
                    <h2>Signup to participate.</h2>
                    <p>Siyum ends: <?php echo $siyumEndDate; ?></p>
                    <?php if(isset($_GET['error'])){echo $_GET['error'];}; ?>
                </header>                        
            </section>
            <section id="two">
                <?php
                    //Echo Form Top
                    echo "<form action='register.php' method=POST><div class='12u$'>";

                    //Set SQL Statement
                    $sql = ("SELECT * FROM `" . $siyumType . "` WHERE `SiyumID` LIKE '" . $siyumID . "'");
                    $stm = $con->prepare($sql);
                    $stm->execute();
                    $records = $stm->fetchAll();
                        
                        //Output all the Volumes in the Siyum to be selected. If Status == 5 that means it's a Header title, not a clicky
                    foreach ($records as $row) {
                        
                       	if($row['status'] == 5){
                       		echo "<p><strong>" . $row['volumeName'] . "</strong></p>";
                       	} else if($row['status'] == 1){
                            echo "<input type='checkbox' name='sections[]' id='" . $row['volumeName'] . "' value='"  . $row['volumeName'] . "'>";
                            echo "<label for='" . $row['volumeName'] . "'>"  . $row['volumeName'] . " - [TAKEN]</label><br />";
                        } else {
                            echo "<input type='checkbox' name='sections[]' id='" . $row['volumeName'] . "' value='"  . $row['volumeName'] . "'>";
                            echo "<label for='" . $row['volumeName'] . "'>"  . $row['volumeName'] . "</label><br />";
                        };
                        
                        
                        
                    };

                    echo "</div><div class='12u$'>";
                    echo "<input type='hidden' name='siyumID' value='" . $siyumID . "'>";
                    echo "<input type='hidden' name='formType' value='register'>";
                    echo "<input type='text' name='name' placeholder='Name' required='required'><br />";
                    echo "<input type='email' name='email' placeholder='Email' required='required'><br />";
                    echo "<input type='email' name='confEmail' placeholder='Confirm Email' required='required'><br />";
                    echo "<input type='submit' value='Submit'>";
                    echo "</div></form>";
                    
                ?>
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