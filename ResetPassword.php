<?php
session_start();
//error_reporting(0);

if(isset($_SESSION['login']) && isset($_SESSION['userid']) && isset($_SESSION['pname']))
{
	header("Location: UserProfile.php");
	exit;
}
else if(isset($_REQUEST['AT']) && isset($_REQUEST['identity']) && isset($_REQUEST['tracker']))
{
	$Uid = $_REQUEST['identity'];
	$_SESSION['Uid'] = $Uid;
	$OldPass = $_REQUEST['tracker'];
	$_SESSION['OldPass'] = $_REQUEST['tracker'];
	unset($_REQUEST['identity']);
	unset($_REQUEST['AT']);
	unset($_REQUEST['tracker']);
}

if(isset($_POST['NewPassword']) && isset($_POST['RePassword']) && isset($_POST['reset']))
{
	$NewPass = $_POST['NewPassword'];
	$RePass = $_POST['RePassword'];
	$UId = $_SESSION['Uid'];
	$OldPassword = $_SESSION['OldPass'];
	if($NewPass == $RePass)
	{
		$setPass = md5(md5($RePass));
		include('dbcon.php');
		$stmt = $dbh->prepare("CALL sp_ResetPassword(?,?,?)");
		$stmt->execute(array($UId,$OldPassword,$setPass));
		$result = $stmt->fetchColumn();
		if($result == '1')
		{
			$Lmessage="<img src='images/Tick.png' width=25px height=20px valign=bottom> Password changed.Please <a href='login.php' style='font-weight:bold; font-family:calibri; color:blue;'>LOGIN</a>";
		}
		else
		{
			$Lmessage="<img src='images/x.png' width=25px height=20px valign=bottom> Reset link expired";
		}
	}
	else
	{
		$Lmessage="<img src='images/x.png' width=25px height=20px valign=bottom> Password strings mismatch";
	}
}
?>
<html>
<head>

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>XPENSY | ResetPassword</title>

<!--STYLESHEETS-->
<link href="CSS/styles.css" rel="stylesheet" type="text/css" />
 <link href="CSS/bootstrap.min.css" rel="stylesheet">
 <link href="css/modern-business.css" rel="stylesheet">
  <link href="CSS/bootstrap.css" rel="stylesheet">
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

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").CSS("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").CSS("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").CSS("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").CSS("left","0px");
	});
});
</script>

</head>
<body>

       
            <!-- Collect the nav links, forms, and other content for toggling -->
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
						
						<li class="active"><a href="login.php">Login</a></li>
					</ul>
				</nav>
			</div>
		</div>
</nav>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form class="login-form" action="" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1 style="color:#000099; margin-left:-3%; ">Reset Password</h1><!--END TITLE-->
    
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->
    <div class="content">
	<!--USERNAME--><?php echo $Lmessage; ?><br><input required name="NewPassword" type="password" class="input username" placeholder="Enter new password" onfocus="this.value=''"  style="width:100%;"/><!--END USERNAME-->
    <!--PASSWORD--><input type="password" required class="input password" Placeholder="Confirm password" onfocus="this.value=''" name="RePassword" style="width:100%;"/><br><br><!--END PASSWORD-->

    </div>
    <!--END CONTENT-->
    
    <!--FOOTER-->
<div class="footer">
    
                       <input type="submit" class="btn pull-right" name="reset" value="Reset Password" class="button" style="color:white;">
    <!--Reset BUTTON--><!--<input type="submit" name="reset" value="Reset Password" class="button"/>--><!--END RESET BUTTON-->

</div>

    </div>


    <!--END FOOTER-->

</form>

<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->




<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>