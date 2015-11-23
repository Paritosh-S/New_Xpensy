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
							<a href="contact_new.php">Contact us</a>
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
						<h1>Send Password</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="basic-login">
							<form action="" method="post">
								<div class="form-group">
		        				 	<label for="login-username"><i class="icon-user"></i> <b>Enter your Email address</b></label><br><br>
									<input name="useremail" class="form-control" id="login-username" type="email" placeholder="Enter you Email address" ><br> <br>
								</div>
								
								<div class="form-group">
									 <div class="g-recaptcha" data-sitekey="6LfqogYTAAAAAN7zGpZ_rn0MRoKH0VUpNgnku3oj"></div><br><br>
									
									<button type="submit" class="btn" name="submit">Send</button><br><br>
									
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm-7 social-login">
						<div class="not-member">
							<p>Back to Login <a href="userlogin.php">Click here</a></p>
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
<?php

include("connect.php");

$name=$_POST['useremail'];

$recaptcha=$_POST['g-recaptcha-response'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
if(!empty($recaptcha))
{

include("getCurlData.php");
$google_url="https://www.google.com/recaptcha/api/siteverify";
$secret='6LfqogYTAAAAAHiKKzw4LZm5kYZ-uYVY4V_HiMfT';
$ip=$_SERVER['REMOTE_ADDR'];
$url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
$res=getCurlData($url);
$res= json_decode($res, true);
if($res['success'])
{

$sql="SELECT * FROM employeelogin WHERE email='$name'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0)
{

while($row=mysqli_fetch_array($result))
{
$pass=$row['password'];




include "innerpage/classes/class.phpmailer.php";

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'localhost';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'support@expensegoblin.net';                 // SMTP username
$mail->Password = 'Mumbai@2012';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'support@expensegoblin.net';
$mail->FromName = 'Expense Goblin';
     
$mail->addAddress($name);               // Name is optional


$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Password Expense Goblin ';
$mail->Body    = 'Your Password is '.$pass.'';


if(!$mail->send()) {
   echo "<script>
alert('cannot send mail');
window.location.href='userpasswordreset.php';
</script>";
} else {
    
echo "<script>
alert('Mail send successfully!!!! please check your email');
window.location.href='userpasswordreset.php';
</script>";
}





}

}
else
{
echo "<script>
alert('Wrong Email address');
window.location.href='userpasswordreset.php';
</script>";


}




}
	else{
	
	echo "<script>
alert('Please re-enter your reCAPTCHA.');
window.location.href='userpasswordreset.php';
</script>";
	}
	}
	else{
	
	echo "<script>
alert('Please re-enter your reCAPTCHA.');
window.location.href='userpasswordreset.php';
</script>";
	}
	}
	
	?>