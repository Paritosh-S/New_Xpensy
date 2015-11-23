<?php
session_start();
//error_reporting(0);
if (isset($_COOKIE['Username']) && isset($_COOKIE['Password'])) 
{
	$Email = $_COOKIE['Username'];
	$Pass = $_COOKIE['Password'];
}
else
{
	$Email = '';
	$Pass = '';
}
if(isset($_SESSION['login']) && isset($_SESSION['userid']) && isset($_SESSION['pname']))
{
	header("Location: UserProfile.php");
	exit;
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
       <title>XPENSY | PASSWORD RESET</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="CSS/css/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="CSS/css/leaflet.css" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="CSS/css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="CSS/main.css">

        <script src="js/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script>
function GetPassword(text)
{
document.getElementById('login-username').value = "";
	if (text != "")
	{
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function () 
		{
			if (xhr.readyState == 4 && xhr.status == 200) 
			{    
					document.getElementById('show_status').innerHTML = xhr.responseText;
					setTimeout(function () {
						document.getElementById('show_status').style.display = 'block';
						setTimeout(function () {
							$('#show_status').show();
							$('#show_status').fadeOut('slow');
						}, 10000);
					});
			}
		}
		xhr.open("POST", "Frm_Password_Recovery.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
		xhr.send("forgot=ar34ks"+ "&UName=" + text);
	}
	else
	{
		document.getElementById("show_status").innerHTML = "Enter valid email address";
		document.getElementById("show_status").style.display = 'block';
	}
}
</script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

          <!-- Navigation & Logo-->
       <div class="mainmenu-wrapper">
	        <div class="container">
	        	 <nav id="mainmenu" class="mainmenu">
					<ul>
						<li class="logo-wrapper"><a href="index.php"><img src="image/Logo3.png" width="180px"></a></li>
						<li >
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="about_new.php">About us</a>
						</li>
						<li>
							<a href="help.php">Help</a>
							
						</li>
						<li>
							<a href="faq.php">FAQ</a>
						</li>
						<li>
							<a href="contact_us.php">Contact us</a>
						</li>
						
						<li><a href="login.php">Login</a></li>
					</ul>
				</nav>
			</div>
		</div>
        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Password Recovery</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="basic-login">
							<form>
								<div class="form-group">
								
		        				 	<label for="login-username"><i class="icon-user"></i> <b>Enter Email address</b></label><br><br>
		        				 	
									<input name="UName" class="form-control" id="login-username" type="text" placeholder="Enter you Email address" onfocus="this.value=''"><br> <br>
									
									<button type="button" class="btn" name="forgot" style="color:white;" onClick="GetPassword(UName.value);">Generate Link</button>
									<p id="show_status" style="display:none;"><br></p>
							</form>
						</div>
					</div>
					<div class="col-sm-7 social-login">
						<div class="not-member">
							<p>Back to  <a href="login.php">Login</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		 <?php include 'footer.php'?>
	            <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="js/jquery.fitvids.js"></script>
        <script src="js/jquery.sequence-min.js"></script>
        <script src="js/jquery.bxslider.js"></script>
        <script src="js/main-menu.js"></script>
        <script src="js/template.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
    </body>
</html>