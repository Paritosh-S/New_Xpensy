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
    <body height="auto">
	<?php 
error_reporting(E_ERROR);
if(isset($_REQUEST['Submit'])) 
{
	$message = $_SESSION['Umessage'];
	unset($_SESSION['Umessage']);

	// define variables and set to empty values
	$nameErr = $emailErr = $lnameErr=$contactErr=  "";
	$fname = $emailid  = $title = $contact="";

	if (empty($_POST["fname"])) 
	{
		$nameErr = "First Name is required";
    } 
	else 
	{
		$fname = $_POST["fname"];
		// check if name only contains letters 
		if (!preg_match('/^[a-z]*$/i',$fname)) 
		{													
			$nameErr = "Only letters allowed"; 
		}
	}
   
	if (empty($_POST["lname"])) 
	{
		$lnameErr = " Last Name is required";
	}
	else 
	{
		$lname = $_POST["lname"];
		// check if name only contains letters 
		if (!preg_match('/^[a-z]*$/i',$lname)) 
		{
			$lnameErr = "Only letters allowed"; 
		}
   }
   
	if (empty($_POST["emailid"])) 
	{
		$emailErr = "EmailID is required";
	} 
	else 
	{     
		$emailid = $_POST["emailid"];
		// check if e-mail address is well-formed
		if (!filter_var($emailid, FILTER_VALIDATE_EMAIL)) 
		{
			$emailErr = "Invalid email format"; 
		}
	}
	if (empty($_POST["contact"])) 
	{
		$contactErr = " Contact no is required";
	}
	else 
	{
     $contact = $_POST["contact"];
     // check if contact only contains number
			if (!preg_match( '/^[+]?([\d]{0,3})?[\(\.\-\s]?([\d]{3})[\)\.\-\s]*([\d]{3})[\.\-\s]?([\d]{4})$/',$contact)) 
			{
				$contactErr = "Only 10 digits number"; 
			}
	}
   
	if (empty($_POST["title"]))
	{
		$title = "";
	} 
	else 
	{
    		$title = $_POST["title"];
	}
  	try
	{
		include('dbcon.php');
		 $fname = $_POST['fname'];
		 $lname = $_POST['lname'];
		 $cmpny_name = $_POST['cmpny_name'];
		 $emailid = $_POST['emailid'];
		 $contact = $_POST['contact'];
		 $subject = $_POST['title'];
		$stmt = $dbh->prepare("CALL sp_UserVisit(?,?,?,?,?,?)");
		$stmt->execute(array($fname,$lname,$cmpny_name,$emailid,$contact,$subject));				
		$row = $stmt->fetch();		
		$Flag = $row[0];
		$dbh->connection = NULL;
		if($Flag == '1')
		{
			//$_SESSION['Umessage'] = $flag;
			$_SESSION['Umessage'] = "<img src='images/tick.png' width=25px height=18px valign=bottom> Thank you";
		}
		else
		{
			//$_SESSION['Umessage'] = $flag;
			$_SESSION['Umessage'] = "<img src='images/x.png' width=25px height=20px valign=bottom> Not updated, try again";
		}
	}
	catch(PDOException $ex)
	{
		echo $ex->getMessage();
		//$_SESSION['message'] = "Not Updated error occured";
		//echo "not Updated error occured";
		//$dbh->connection = NULL;
	}
}
?>

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

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
						<li>
							<a href="contact_us.php">Contact us</a>
						</li>
						
						<li class="active"><a href="login.php">LogIn</a></li>
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
						<h1 style="margin-top:32px;">Employee Login</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section" style="margin-top:32px;">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="basic-login">
							<form role="form" role="form" action="UserLogin.php" method="POST">
								<div class="form-group">
									<?php echo $Lmessage; ?><br>
		        				 	
									<input name="UName" class="form-control" id="login-username" type="email" placeholder="Enter UserName" onfocus="this.value=''">
								</div>
								<div class="form-group">
		        				 	
									<input class="form-control" id="login-password" type="password" name="UPassword" placeholder="Enter Password" onfocus="this.value=''">
								</div>
								<div class="form-group">
									
									<a href="ForgotPassword.php" class="forgot-password">Forgot password?</a>
									<input type="submit" class="btn pull-right" name="submit" style="color:white;">
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm-7 social-login">
						<div class="not-member">
							<p>Not a member? <a href="signup.php">Register here</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

	   <div style="margin-top:200px;"><?php include 'footer.php'?></div>
		
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

    </body>
</html>