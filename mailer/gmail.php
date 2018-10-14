<?php
function sendMail($email, $name, $volumes){
	//SMTP needs accurate times, and the PHP time zone MUST be set
	//This should be done in your php.ini

	require 'PHPMailerAutoload.php';

	//Create a new PHPMailer instance
	$mail = new PHPMailer;

	//Set CharSet to support Hebrew Chars in emails!
	$mail->CharSet = 'UTF-8';

	//Tell PHPMailer to use SMTP
	$mail->isSMTP();

	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;

	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';

	//Set the hostname of the mail server
	$mail->Host = $smtp_host;
	// use
	// $mail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6

	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = $stmp_port;

	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = $stmp_encryption;

	//Whether to use SMTP authentication
	$mail->SMTPAuth = $stmp_authentication;

	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = $stmp_username;

	//Password to use for SMTP authentication
	$mail->Password = $stmp_password;

	//Set who the message is to be sent from
	$mail->setFrom($stmp_email, $stmp_name);

	$mail->addAddress($email, $name);


	//Set the subject line
	$mail->Subject = 'Siyum Signup Confirmation';

	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->msgHTML("This email is confirming your sign up for participating in the siyum. Please make sure to complete your selections by the siyum end date. <br /> Here is what you slected in case your not sure: " . $volumes . "<br />");
};
?>