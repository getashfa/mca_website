<?php
/* //require_once "Mail.php";
require 'PHPMailer/PHPMailerAutoload.php';
 
 
 function sendMail($to, $subject, $body)
 {
	 $from = "Saran <sarans@iitb.ac.in>";
	 //echo "sending email";
	 $host = "smtp-auth.iitb.ac.in";
	 $username = "sarans";
	 $password = "@swasar";
	 /*
	 $headers = array ('From' => $from,
	   'To' => $to,
	   'Subject' => $subject);
	 $smtp = Mail::factory('smtp',
	   array ('host' => $host,
		 'auth' => true,
		 'username' => $username,
		 'password' => $password));
	 
	 $mail = $smtp->send($to, $headers, $body);
	 
	 if (PEAR::isError($mail)) {
	   echo("<p>" . $mail->getMessage() . "</p>");
	  } else {
	   echo("<p>Message successfully sent!</p>");
	  }
	*/

	//date_default_timezone_set('Etc/UTC');

	
/*
	//Create a new PHPMailer instance
	$mail = new PHPMailer();
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
	$mail->Host = $host;
	//Set the SMTP port number - likely to be 25, 465 or 587
	$mail->Port = 25;
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	//Username to use for SMTP authentication
	$mail->Username = $username;
	//Password to use for SMTP authentication
	$mail->Password = $password;
	//Set who the message is to be sent from
	$mail->setFrom('noreplay@mca.com', 'MCA - IIT Bombay');
	//Set an alternative reply-to address
	//$mail->addReplyTo('replyto@example.com', 'First Last');
	//Set who the message is to be sent to
	$mail->addAddress($to, '');
	//Set the subject line
	$mail->Subject = $subject;
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
	//Replace the plain text body with one created manually
	$mail->Body = $body;
	//Attach an image file
	//$mail->addAttachment('images/phpmailer_mini.gif');

	//send the message, check for errors
	if (!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	    echo "Message sent!";
	}
}

//sendMail("ashfaque@ee.iitb.ac.in", "This is after modification", "Test Content");
 */
 ?>
