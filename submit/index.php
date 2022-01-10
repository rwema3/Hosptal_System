<?php
/*
* Ajax form submit
*/

# request sent using HTTP_X_REQUESTED_WITH
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ){
	if (isset($_POST['name']) AND isset($_POST['email']) AND isset($_POST['subject']) AND isset($_POST['message'])) {
		$to = 'your@mail.id';

		$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
		$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
		$sent = email($to, $email, $name, $subject, $message);
		if ($sent) {
			echo 'Message sent!';
		} else {
			echo 'Message couldn\'t sent!';
		}
	}
	else {
		echo 'All Fields are required';
	}
	return;
}

/**
 * email function
 *
 * @return bool | void
 **/
function email($to, $from_mail, $from_name, $subject, $message){
	$header = array();
	$header[] = "MIME-Version: 1.0";
	$header[] = "From: {$from_name}<{$from_mail}>";
	/* Set message content type HTML*/
	$header[] = "Content-type:text/html; charset=iso-8859-1";
	$header[] = "Content-Transfer-Encoding: 7bit";
	if( mail($to, $subject, $message, implode("\r\n", $header)) ) return true; 
}

?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>jQuery ajax form submit</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
	<div id="wrap">
		<h1>AJAX Form Submit with jQuery</h1>
		<div class="alert">Hello</div>
		<form id="form" action="" method="post">
			<div>
				<label>
					<span>Name: *</span>
					<input placeholder="Name" type="text" name="name" required>
				</label>
			</div>
			<div>
				<label>
					<span>Email: *</span>
					<input placeholder="Email address" type="email" name="email" required>
				</label>
			</div>
			<div>
				<label>
					<span>Subject: *</span>
					<input placeholder="Subject" type="text" name="subject" required>
				</label>
			</div>
			<div>
				<label>
					<span>Message: *</span>
					<textarea placeholder="Type your message here...." name="message" required></textarea>
				</label>
			</div>
			<div>
				<button name="submit" type="submit" id="submit">Send Email</button>
			</div>
		</form>
		<p>Note: * Fields are required</p>
	</div>
</body>
</html>