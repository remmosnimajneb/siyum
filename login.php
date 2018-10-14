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
* Login Page
*/

//Require Functions File
require 'functions.php';
    
//Start Sessions()
session_start();

//Assume User is logging in for first time and set the Authentication Session False
$_SESSION['sigum_sys_loggedin_session'] = false;

//If it's a post request, he tried logging in
$error = '';
if(isset($_POST['username']) && isset($_POST['password'])){
        //If credentials match (credentials set in functions.php), set Session, Go to admin.php
    if($_POST['username'] == $adminUsername && $_POST['password'] == $adminPassword){
        $_SESSION['sigum_sys_loggedin_session'] = true;
        header('Location: admin.php');
    } else {
            //Else throw an error!
        $error = "Error! Authentication Failed. Please try again!";
    }
};

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>
    <body class="is-preload">
         <!-- Header -->
        <header id="header">
            <div class="inner">
                <h1><strong>View Siyums</strong></h1>
            </div>
        </header>
       
            <section id="main">
                <header>
                    <h1>Login</h1>
                    <hr />
                </header>
                <?php echo $error; ?>
                <form action="login.php" method="POST">
                    <input type="text" name="username" placeholder="Username" required="required" style="margin: auto;"><br />
                    <input type="password" name="password" placeholder="Password" required="required" style="margin: auto;"><br />
                    <input type="submit" name="Submit" value="Login">
                </form>
                    <hr />
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