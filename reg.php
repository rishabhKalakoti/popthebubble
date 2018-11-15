<?php

	require('PHPMailer/PHPMailer.php');
	require('PHPMailer/SMTP.php');
	require('PHPMailer/Exception.php');

	// email phone name
	$message='';
	$name='';
	$email='';
	$phone='';
	if(isset($_POST['name']) && isset($_POST['email']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		
		if(empty($name) && empty($email))
		{
			$message = "Name and email required.";
		}
		else if(!preg_match("/^[a-zA-Z ]*$/",$name))
		{
			$message = "Invalid name";
		}
		else
		{
			$mail = new PHPMailer\PHPMailer\PHPMailer();;                
			try {
				
				$mail->SMTPDebug = 2;          
				$mail->isSMTP();               
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;                             
				$mail->Username = 'rishabh.kalakoti@gmail.com';     
				$mail->Password = 'Percy@3538';                     
				$mail->SMTPSecure = 'tls';                          
				$mail->Port = 587;                                  

				$mail->setFrom('rishabh.kalakoti@gmail.com', 'Mailer');
				$mail->addAddress('rishabh.kalakoti@gmail.com');     
				
				$mail->isHTML(true);                                
				$mail->Subject = 'TEDxMNITJaipur Speaker Registration';
				$mail->Body    = "Name:".$name."<br>Email:".$email."<br>Phone:".$phone;
				$mail->AltBody = "Name:".$name." Email:".$email." Phone:".$phone;

				$mail->send();
				$message= 'Your details have been sent. Thank You.';
				header('Location: reg.php?q=1');
			} catch (Exception $e) {
				$message =  'Details could not be sent.';
			}
		}
	}
?>


<html>
	<head>
		<title>TEDx MNIT</title>
		<link rel="stylesheet" href="flipclock.css" type="text/css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="flipclock.js"></script>
		<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
		<script type="text/javascript" src="jquery.onepage-scroll.js"></script>
		<link href='onepage-scroll.css' rel='stylesheet' type='text/css'>
		<link href='css/layout.css' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" type="image/png" href="images/favicon.png">
		
		<script type="text/javascript">
			var clock;

			$(document).ready(function() {
				$(".main").onepage_scroll({
					sectionContainer: "section",
					responsiveFallback: 600,
					loop: false
				});
			});
		</script>
	</head>
	<body>
		<div id="big_wrapper">
			<div id="header">
				<div class="logo">
					<img src="images/logo.png" alt="TEDx MNIT Jaipur" width="200" height="50">
				</div>
				<div class="menu">
					<ul class="h_list">
						<!--<li class="element">Speakers</li>-->
						<!--<li class="element">Partners</li>-->
						<li class="element"><a href="about.html">About</a></li>
						<li class="element">Team</li>
						<li class="element"><a href="index.html">Home</a></li>
						
					</ul>
				</div>
			</div>
			
			<div class="main">
				<style>
					input{
						margin:5px;
						height:25px;
						border-radius:3px;
						background-color:transparent;
						border:1px solid white;
						color:white;
						width:250px;
					}
					input#submit{
						background-color:white;
						color: red;
						font-weight:bold;
						width:150px;
					}
					table,tr,td{
						color:inherit;
					}
				</style>
				<section class="form" style="width:100%;text-align:center;">
					<br />
					<h1 class="heading">Speaker Registration Form</h1>
					<hr style="width:50%;opacity:0.5;"/>
					<p style="text-align:center;">
					<table style="margin:Auto;">
					<form id="reg_form" name="reg_form" method="POST" action="reg.php">
						<tr><td>Name </td><td><input id="name" name="name" type="text" required><?php $name?></input></td></tr>
						<tr><td>Phone </td><td><input id="phone" name="phone" type="phone"><?php $phone?></input></td></tr>
						<tr><td>Email </td><td><input id="email" name="email" type="email" required><?php $email?></input></td></tr>
						<tr><td colspan=2 align="center"><input id="submit" type="submit" value="Submit Details"></td></tr>
					</form>
					</table>
					</p>
					<div id="msg" style="align:center;width:100%;">
						<?php echo $message;?>
						<?php if(isset($_GET['q'])) echo 'Your details have been sent. Thank You.'; ?>
					</div>
				</section>
			</div>
			
			<div id="footer">
				<div id="social">
					<a href="https://www.facebook.com/TEDxMNITJaipur/" target="_blank"><img width=40 height=30 alt="fb" src="images/fb.png"></a>
					<a href="https://www.instagram.com/tedxmnitjaipur/" target="_blank"><img width=40 height=30 alt="insta" src="images/insta.png"></a>
				</div>
				<div id="foot_txt">
				This independent event is operated under license from TEDx.
				</div>
			</div>
		</div>
	</body>
</html>