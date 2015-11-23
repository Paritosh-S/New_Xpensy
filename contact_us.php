<?php


session_start();

error_reporting(0);

if (isset($_COOKIE['Username']) && isset($_COOKIE['Password'])) 
{
	$Email = $_COOKIE['Username'];
	$Pass = $_COOKIE['Password'];
	$Lmessage = "Welcome back!";
}
else
{
	$Email = '';
	$Pass = '';
}
if(isset($_SESSION['message']))
{
	if($_SESSION['message']=='L')
	{
		$Lmessage="<img src='images/x.png' width=25px height=20px valign=bottom> Invalid Username or Password";
		session_destroy();
	}
        else if($_SESSION['message']=='A')
	{
		$Lmessage="<img src='images/x.png' width=25px height=20px valign=bottom> Inactive account";
		session_destroy();
	}
	else if($_SESSION['message']=='P')
	{
		$Lmessage="<img src='images/x.png' width=25px height=20px valign=bottom> Trial period expired";
		session_destroy();
	}
	else
	{
		Windows.Location.reset();
	}
}
else if(isset($_SESSION['login']) && isset($_SESSION['userid']) && isset($_SESSION['pname']))
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
        <title>XPENSY | LOGIN</title>
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
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

        <!-- Navigation & Logo-->
       <!-- Navigation & Logo-->
	<div class="mainmenu-wrapper">
	        <div class="container">
	        	<nav id="mainmenu" class="mainmenu">
                                       <div class="navbar-header" style="margin-left:-5%;">
                                         <a href="index.php"><img src="image/Logo3.png" width="180px"></a>
                                       </div>
					<!--ul class="navbar-left">
						<li class="logo-wrapper"><a href="index.php"><img src="image/Logo3.png" width="180px"></a></li>
					</ul-->
                                        <ul class="nav navbar-nav navbar-right">	
                                               <li  >
							<a href="index.php">Home</a>
						</li>
						<li >
							<a href="about_new.php">About us</a>
						</li>
						<li >
							<a href="help.php">Help</a>
						</li>
						<li class="active">
							<a href="contact_us.php">Contact us</a>
						</li>
						
						<li><a href="login.php">LogIn</a></li>
<li><a href="signup.php">Sign Up</a></li>
					</ul>
				</nav>
			</div>
		</div>
        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 style="margin-top:32px;">Contact Us</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
<div class="col-sm-5">
<br>
<br>
<img src="images/call_center.png" alt="Mountain View" style="width:304px;height:228px;">
</div>

					<div class="col-sm-7">
						

                                           <div class="basic-login">
						
		

<!-- Required Div Starts Here -->
<form role="form" action="" method="POST">
<h3>Contact Form</h3>

<label>Name: <span>*</span></label>
<input type="text" id="name" placeholder="Name"/>
<label>Email: <span>*</span></label>
<input type="text" id="email" placeholder="Email"/>
<label>Contact No: <span>*</span></label>
<input type="text" id="contact" placeholder="10 digit Mobile no."/>

									<br><label><b>Select Topic:</b></label>
									
										<select class="form-control" type="text" id="name" >
											<option>Just saying hello!</option>
											<option>Feedback</option>
											<option>Suggestions</option>
											<option>Question</option>
											<option>Others</option>
										</select>
									
								
<label>Message:</label>
<textarea id="message" placeholder="Message......."></textarea>
<input type="button" id="submit" value="Send Message"/><br>
<p id="returnmessage"></p>
</form>
</div></div>
<div class="col-sm-3">
</div>
		<!--<div class="col-sm-7 social-login">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.785955738611!2d73.10645699999999!3d19.204548999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be795994ccbacd9%3A0x1c5519a6fa25e4ac!2sNekni+Pada%2C+MIDC+Residential+Area%2C+Dombivli+East%2C+Dombivli%2C+Maharashtra+421203!5e0!3m2!1sen!2sin!4v1443851757093" width="120%" height="528" frameborder="3" style="border:3;"></iframe>
					</div>-->
				</div>
				
			</div>
</div>

	   <?php include 'footer2.php'?>
        <!-- Javascripts -->
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="js/js/jquery.fitvids.js"></script>
        <script src="js/js/jquery.sequence-min.js"></script>
        <script src="js/js/jquery.bxslider.js"></script>
        <script src="jsjs/main-menu.js"></script>
        <script src="js/js/template.js"></script>
</html>
	