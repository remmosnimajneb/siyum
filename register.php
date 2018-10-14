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
* Register/Proccess Form's Page
*/

//Require Functions File
require 'functions.php';

//First check what Form we're updating
if($_POST['formType'] == 'register'){
		//Register for a Siyum:

	//Check emails are the same
	if($_POST['email'] != $_POST['confEmail']){
		header('Location: index.php?error=Error: Please enter a Proper Email');
		die();
	};

	//Set Vars
	$name = safesql($_POST['name']);
	$email = safesql($_POST['email']);
	$confEmail = safesql($_POST['confEmail']);
	$sections = $_POST['sections']; //Not doing safesql() becuase it's an array. We safesql() each one below;
	$siyumID = safesql($_POST['siyumID']);

	//Select Siyum
	$sql = ("SELECT `siyumType` FROM `siyums` WHERE `SiyumID` LIKE '" . $siyumID . "'");
		$stm = $con->prepare($sql);
		$stm->execute();
		$siyumType = $stm->fetchColumn();

	//Parse each clicked thing and add registration to DB
	foreach($sections as $check) {
			
				//SafeSQL each Section
			$check = safesql($check);

		$sql = ("SELECT `status` FROM `" . $siyumType . "` WHERE `SiyumID` LIKE '" . $siyumID  . "' AND `volumeName` LIKE '" . $check . "'");
		$stm = $con->prepare($sql);
		$stm->execute();
		$result = $stm->fetchColumn();
		if($result != '1'){
			//Add to DB
			$sql = ("UPDATE `" . $siyumType .  "` SET `status` = '1', `name` = '" . $name . "', `email` = '" . $email . "' WHERE `SiyumID` = '" . $siyumID . "' AND `volumeName` = '" . $check . "'");
			$stm = $con->prepare($sql);
			$stm->execute();
		} else if($result == '1'){
			//We need to append the name and email to the DB
			$sql = "UPDATE `" . $siyumType .  "` SET `name` = CONCAT(name, ', " . $name . "'), `email` = CONCAT(email, ', " . $email . "') WHERE `SiyumID` = '" . $siyumID . "' AND `volumeName` = '" . $check . "'";
			$stm = $con->prepare($sql);
			$stm->execute();
		};
	};
			//Send Confirmation Email
		include 'mailer/gmail.php';
		$sects = implode( ", ", $sections);
		sendMail($email, $name, $sects);
		header('Location: index.php?siyum=' . $siyumID . '&error=Register Success!');
	
} else if($_POST['formType'] == 'addSiyum'){
		//Else it's adding a new Siyum

		//First check if User is logged in
		checkAuth();

	//Set Vars
	$siyumTitle = $_POST['siyumName'];
	$siyumFor = $_POST['siyumFor'];
	$siyumType = $_POST['siyumType'];
	$siyumEndDate = $_POST['siyumEndDate'];
	$lID;

		//Check no duplicate Siyum Exits
	$sql = ("SELECT * FROM `siyums` WHERE siyumName = '" . $siyumTitle . "'");
	$stm = $con->prepare($sql);
	$stm->execute();
	$result = $stm->fetchColumn();
		
		if($result < 1){
			//If we're good:

		//Insert into DB
		$sql = ("INSERT INTO `siyums` (siyumName, siyumType, siyumFor, siyumEndDate) VALUES ('" . $siyumTitle . "', '" . $siyumType . "', '" . $siyumFor . "', '" . $siyumEndDate . "')");
		$stm = $con->prepare($sql);
		$stm->execute();
		$lID = $con->lastInsertId();
		//Format second table to submittions
		if($siyumType == "tanach"){
			$sql = ("INSERT INTO `tanach` (SiyumID, volumeName, status) VALUES ('" . $lID . "', 'Sefer Bereshit', 5), ('" . $lID . "', 'Bereshit', 0), ('" . $lID . "', 'Noach', 0), ('" . $lID . "', 'Lech Lecha', 0), ('" . $lID . "', 'Vayera', 0), ('" . $lID . "', 'Chayie Sarah', 0), ('" . $lID . "', 'Toldos', 0), ('" . $lID . "', 'Vayetze', 0), ('" . $lID . "', 'Vayishlach', 0), ('" . $lID . "', 'Vayeshev', 0), ('" . $lID . "', 'Miketz', 0), ('" . $lID . "', 'Vayigash', 0), ('" . $lID . "', 'Vayechi', 0), ('" . $lID . "', 'Sefer Shemot', 5), ('" . $lID . "', 'Shemot', 0), ('" . $lID . "', 'Vaera', 0), ('" . $lID . "', 'Bo', 0), ('" . $lID . "', 'Bishalach', 0), ('" . $lID . "', 'Yitro', 0), ('" . $lID . "', 'Mishpatim', 0), ('" . $lID . "', 'Teruma', 0), ('" . $lID . "', 'Tetzaveh', 0), ('" . $lID . "', 'Ki Tisa', 0), ('" . $lID . "', 'Vayakhel', 0), ('" . $lID . "', 'Pekudie', 0), ('" . $lID . "', 'Sefer Vayikrah', 5), ('" . $lID . "', 'Vayikrah', 0), ('" . $lID . "', 'Tzav', 0), ('" . $lID . "', 'Shmini', 0), ('" . $lID . "', 'Tazriyah', 0), ('" . $lID . "', 'Metzorah', 0), ('" . $lID . "', 'Acharie Mot', 0), ('" . $lID . "', 'Kedoshim', 0), ('" . $lID . "', 'Behar', 0), ('" . $lID . "', 'Bechukoti', 0), ('" . $lID . "', 'Sefer Bamidbar', 5), ('" . $lID . "', 'Bamidbar', 0), ('" . $lID . "', 'Nasso', 0), ('" . $lID . "', 'Bhaalotcha', 0), ('" . $lID . "', 'Shlach', 0), ('" . $lID . "', 'Korach', 0), ('" . $lID . "', 'Chukat', 0), ('" . $lID . "', 'Balak', 0), ('" . $lID . "', 'Pinchas', 0), ('" . $lID . "', 'Maatos', 0), ('" . $lID . "', 'Maasie', 0), ('" . $lID . "', 'Sefer Devarim', 5), ('" . $lID . "', 'Devarim', 0), ('" . $lID . "', 'Vetchanan', 0), ('" . $lID . "', 'Eikev', 0), ('" . $lID . "', 'Reeh', 0), ('" . $lID . "', 'Shoftim', 0), ('" . $lID . "', 'Ki Tetsei', 0), ('" . $lID . "', 'Ki Tavo', 0), ('" . $lID . "', 'Netzavim', 0), ('" . $lID . "', 'Vayelech', 0), ('" . $lID . "', 'Haazinu', 0), ('" . $lID . "', 'Vezot Habiracha', 0), ('" . $lID . "', 'Neviim', 5), ('" . $lID . "', 'Yehoshua (24)', 0), ('" . $lID . "', 'Shoftim (21)', 0), ('" . $lID . "', 'Shmuel I (31)', 0), ('" . $lID . "', 'Shmuel II (24)', 0), ('" . $lID . "', 'Melachim I (22)', 0), ('" . $lID . "', 'Melachim II (25)', 0), ('" . $lID . "', 'Yeshayahu (66)', 0), ('" . $lID . "', 'Yirmiyahu (52)', 0), ('" . $lID . "', 'Yechezkel (48)', 0), ('" . $lID . "', 'Hoshea (14)', 0), ('" . $lID . "', 'Yoel (4)', 0), ('" . $lID . "', 'Amos (9)', 0), ('" . $lID . "', 'Ovadiah (1)', 0), ('" . $lID . "', 'Yonah (4)', 0), ('" . $lID . "', 'Michah (7)', 0), ('" . $lID . "', 'Nachum (3)', 0), ('" . $lID . "', 'Chavakuk (3)', 0), ('" . $lID . "', 'Tzefaniah (3)', 0), ('" . $lID . "', 'Chaggai (2)', 0), ('" . $lID . "', 'Zechariah (14)', 0), ('" . $lID . "', 'Malachi (3)', 0), ('" . $lID . "', 'Ketubim', 5), ('" . $lID . "', 'Tehillim (15 0)', 0), ('" . $lID . "', 'Mishlei (31)', 0), ('" . $lID . "', 'Iyov (42)', 0), ('" . $lID . "', 'Shir Hashirim (8)', 0), ('" . $lID . "', 'Rut (4)', 0), ('" . $lID . "', 'Eichah (5)', 0), ('" . $lID . "', 'Kohelet (12)', 0), ('" . $lID . "', 'Esther (1 0)', 0), ('" . $lID . "', 'Daniel (12)', 0), ('" . $lID . "', 'Ezra (1 0)', 0), ('" . $lID . "', 'Nechemiah (13)', 0), ('" . $lID . "', 'Divrei Hayamim I (29)', 0), ('" . $lID . "', 'Divrei Hayamim II (36)', 0)");
			$stm = $con->prepare($sql);
			$stm->execute();
		} else if($siyumType == "mishna"){
			$sql = ("INSERT INTO `mishna` (SiyumID, volumeName, status) VALUES ('" . $lID . "', 'Seder Zeraim', 5), ('" . $lID . "', 'Brachot (9)', 0), ('" . $lID . "', 'Peah (8)', 0), ('" . $lID . "', 'Dmai (7)', 0), ('" . $lID . "', 'Kilayim (9)', 0), ('" . $lID . "', 'Shviit (1 0)', 0), ('" . $lID . "', 'Trumot (11)', 0), ('" . $lID . "', 'Maasrot (5)', 0), ('" . $lID . "', 'Maasar Sheni (5)', 0), ('" . $lID . "', 'Challa (4)', 0), ('" . $lID . "', 'Orlah (3)', 0), ('" . $lID . "', 'Bikkurim (4)', 0), ('" . $lID . "', 'Seder Moed', 5), ('" . $lID . "', 'Shabbat (24)', 0), ('" . $lID . "', 'Eiruvin (1 0)', 0), ('" . $lID . "', 'Pesachim (1 0)', 0), ('" . $lID . "', 'Shekalim (8)', 0), ('" . $lID . "', 'Yuma (8)', 0), ('" . $lID . "', 'Sukkah (5)', 0), ('" . $lID . "', 'Beitzah (5)', 0), ('" . $lID . "', 'Rosh Hashana (4)', 0), ('" . $lID . "', 'Taanit (4)', 0), ('" . $lID . "', 'Megillah (4)', 0), ('" . $lID . "', 'Moed Katan (3)', 0), ('" . $lID . "', 'Chagigah (3)', 0), ('" . $lID . "', 'Seder Nashim', 5), ('" . $lID . "', 'Yevamot (16)', 0), ('" . $lID . "', 'Ketubos (13)', 0), ('" . $lID . "', 'Nedarim (11)', 0), ('" . $lID . "', 'Nazir (9)', 0), ('" . $lID . "', 'Sotah (9)', 0), ('" . $lID . "', 'Gittin (9)', 0), ('" . $lID . "', 'Kiddushin (4)', 0), ('" . $lID . "', 'Seder Nezikin', 5), ('" . $lID . "', 'Bava Kama (1 0)', 0), ('" . $lID . "', 'Bava Metzia (1 0)', 0), ('" . $lID . "', 'Bava Basra (1 0)', 0), ('" . $lID . "', 'Sanhedrin (11)', 0), ('" . $lID . "', 'Maakot (3)', 0), ('" . $lID . "', 'Shevuot (8)', 0), ('" . $lID . "', 'Ediyot (8)', 0), ('" . $lID . "', 'Avodah Zarah (5)', 0), ('" . $lID . "', 'Avot (6)', 0), ('" . $lID . "', 'Seder Kedushin', 5), ('" . $lID . "', 'Horiyot (3)', 0), ('" . $lID . "', 'Zevachim (14)', 0), ('" . $lID . "', 'Menachot (13)', 0), ('" . $lID . "', 'Chulin (12)', 0), ('" . $lID . "', 'Bechorotm (9)', 0), ('" . $lID . "', 'Arakhin (9)', 0), ('" . $lID . "', 'Tmurah (7)', 0), ('" . $lID . "', 'Krisus (6)', 0), ('" . $lID . "', 'Meilah (6)', 0), ('" . $lID . "', 'Tomid (7)', 0), ('" . $lID . "', 'Middot (5)', 0), ('" . $lID . "', 'Kinim (3)', 0), ('" . $lID . "', 'Seder Taharos', 5), ('" . $lID . "', 'Keilim (30)', 0), ('" . $lID . "', 'Oholot (18)', 0), ('" . $lID . "', 'Negoim (14)', 0), ('" . $lID . "', 'Poroh (12)', 0), ('" . $lID . "', 'Taharot (10)', 0), ('" . $lID . "', 'Mikvaot (10)', 0), ('" . $lID . "', 'Niddah (10)', 0), ('" . $lID . "', 'Machshirin (6)', 0), ('" . $lID . "', 'Zavim (5)', 0), ('" . $lID . "', 'Tvul Yom (4)', 0), ('" . $lID . "', 'Yadayim (4)', 0), ('" . $lID . "', 'Uktzin (3)', 0)");
			$stm = $con->prepare($sql);
			$stm->execute();
		} else if($siyumType == "talmud"){
			$sql = ("INSERT INTO `talmud` (SiyumID, volumeName, status) VALUES ('" . $lID . "', 'Seder Zeraim', 5), ('" . $lID . "', 'Brachot (9)', 0),  ('" . $lID . "', 'Peah (8)', 0), ('" . $lID . "', 'Demai (7)', 0), ('" . $lID . "', 'Kilayim (9)', 0), ('" . $lID . "', 'Sheviit (1 0)', 0), ('" . $lID . "', 'Terumot (11)', 0), ('" . $lID . "', 'Maaserot (5)', 0), ('" . $lID . "', 'Maaser Sheni (5)', 0), ('" . $lID . "', 'Halah (4)', 0), ('" . $lID . "', 'Orlah (3)', 0), ('" . $lID . "', 'Bikurin (4)', 0), ('" . $lID . "', 'Seder Moed', 5), ('" . $lID . "', ' Sabbath (24)', 0), ('" . $lID . "', 'Iruvin (9)', 0), ('" . $lID . "', 'Pesahim (1 0)', 0), ('" . $lID . "', 'Shekalim (8)', 0), ('" . $lID . "', 'Yoma (8)', 0), ('" . $lID . "', 'Sukkah (5)', 0), ('" . $lID . "', 'Betza (5)', 0), ('" . $lID . "', 'Rosh Hashanah (4)', 0), ('" . $lID . "', 'Taanit (4)', 0), ('" . $lID . "', 'Megillah (4)', 0), ('" . $lID . "', 'Moed Katan (3)', 0), ('" . $lID . "', 'Hagigah (3)', 0), ('" . $lID . "', 'Seder Nashim', 5), ('" . $lID . "', ' Yebamot (16)', 0), ('" . $lID . "', 'Ketubot (8)', 0), ('" . $lID . "', 'Nedarim (9)', 0), ('" . $lID . "', 'Nazir (9)', 0), ('" . $lID . "', 'Sotah (9)', 0), ('" . $lID . "', 'Gittin (9)', 0), ('" . $lID . "', 'Kiddushin (4)', 0), ('" . $lID . "', 'Seder Nezikin', 5), ('" . $lID . "', 'Baba Kama (1 0)', 0), ('" . $lID . "', 'Baba Metzia (1 0)', 0), ('" . $lID . "', 'Baba Batra (1 0)', 0), ('" . $lID . "', 'Sanhedrin (11)', 0), ('" . $lID . "', 'Makot (3)', 0), ('" . $lID . "', 'Shevuot (8)', 0), ('" . $lID . "', 'Eduyot (8)', 0), ('" . $lID . "', 'Avodah Zarah (5)', 0), ('" . $lID . "', 'Avot (6)', 0), ('" . $lID . "', 'Horayot (3)', 0), ('" . $lID . "', 'Seder Kodashim', 5), ('" . $lID . "', 'Zevahim (13)', 0), ('" . $lID . "', 'Menahot (13)', 0), ('" . $lID . "', 'Hulin (11)', 0), ('" . $lID . "', 'Bekhorot (9)', 0), ('" . $lID . "', 'Arakhin (9)', 0), ('" . $lID . "', 'Temurah (7)', 0), ('" . $lID . "', 'Keritot (6)', 0), ('" . $lID . "', 'Meilah (6)', 0), ('" . $lID . "', 'Tamid (7)', 0), ('" . $lID . "', 'Midot (5)', 0), ('" . $lID . "', 'Kinim (3)', 0), ('" . $lID . "', 'Seder Tohorot', 5), ('" . $lID . "', 'Kelim (3 0)', 0), ('" . $lID . "', 'Oholot (18)', 0), ('" . $lID . "', 'Negaim (14)', 0), ('" . $lID . "', 'Parah (12)', 0), ('" . $lID . "', 'Tohorot (10)', 0), ('" . $lID . "', 'Mikvaot (1 0)', 0), ('" . $lID . "', 'Nidah (10)', 0), ('" . $lID . "', 'Makhshirin (6)', 0), ('" . $lID . "', 'Zavim (5)', 0), ('" . $lID . "', 'Tevul Yom (6)', 0), ('" . $lID . "', 'Yadaim (4)', 0), ('" . $lID . "', 'Uktzkin (3)', 0)");
			$stm = $con->prepare($sql);
			$stm->execute();
		};
	};

	//Now if $_POST['homepage'] is YES make set this to be the Homepage
	if($_POST['homepage'] == "Yes"){
		$sql = "UPDATE `options` SET `OptKey` = '" . $lID . "' WHERE `OptValue` = 'HomepageID'";
		$stm = $con->prepare($sql);
		$stm->execute();
	}
	
	header('Location: admin.php');

} else if($_POST['formType'] == 'editSiyum'){
		//If we're Editing an Existing Siyum (Or deleting)
	
		//First check if User is logged in
		checkAuth();

	//First Check Delete: 
		if(safesql($_POST['delete']) == "True"){
			//Get SiyumType
			$sql = $con->query("SELECT siyumType FROM `siyums` WHERE `SiyumID` = " . safesql($_POST['SiyumID']));
			$siyumType = $sql->fetchColumn();

			//Now delete rows from Table
			$sql = "DELETE FROM `" . $siyumType . "` WHERE `SiyumID` = " . safesql($_POST['SiyumID']);
			$stm = $con->prepare($sql);
			$stm->execute();	

			//And Delete from Siyums
			$sql = "DELETE FROM `siyums` WHERE `SiyumID` = " . safesql($_POST['SiyumID']);
			$stm = $con->prepare($sql);
			$stm->execute();	

			header('Location: admin.php');
			exit();
		}

		//Otheriwse Update!

		//First Set the Siyum Settings
		$sql = "UPDATE `siyums` SET `siyumName` = '" . safesql($_POST['siyumName']) . "', `siyumFor` = '" . safesql($_POST['siyumFor']) . "', `siyumEndDate` = '" . safesql($_POST['siyumEndDate']) . "' WHERE `SiyumID` = " . safesql($_POST['SiyumID']);
		$stm = $con->prepare($sql);
		$stm->execute();

		//Now if $_POST['homepage'] is YES make set this to be the Homepage
	if($_POST['homepage'] == "Yes"){
		$sql = "UPDATE `options` SET `OptKey` = '" . safesql($_POST['SiyumID']) . "' WHERE `OptValue` = 'HomepageID'";
		$stm = $con->prepare($sql);
		$stm->execute();
	}

	//And redirect
	header('Location: admin.php');

};
?>