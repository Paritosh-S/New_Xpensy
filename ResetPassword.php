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
			$Lmessage="<img src='images/Tick.png' width=25px height=20px valign=bottom> Password changed.Please <a href='http://xpensy.com/login.php' style='font-weight:bold; font-family:calibri; color:blue;'>LOGIN</a>";
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


       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>XPENSY | ResetPassword</title>

        <!-- CSS -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
	<script src="https://connect.facebook.net/en_US/all.js"></script>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

<meta name="google-signin-client_id" content="918871235883-7pfhcqbgckd4lhci4qd5co8tcemoadu1.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>


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



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

       
       
    </head>

    <body>

		<!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<img src="img/lightwhite.png">
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="index.php"><strong>Home</strong></a> 
						</li>
					</ul>
				</div>
			</div>
		</nav>

        <!-- Top content -->
<div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    
                    <div class="row">
					<div class="col-sm-4">
					</div>
                        <div class="col-sm-4 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<img src="img/lightwhite.png">                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>

 <div class="form-bottom">
			
       <form class="login-form" action="" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><center><p><a>Enter Email address</a></p><!--END TITLE-->
    
    </div>
    <!--END HEADER-->
	
	<!--CONTENT-->

    <div class="content">
	<!--USERNAME--><?php echo $Lmessage; ?><br>
<div class="form-group">
 <div class="input-group input-group-md">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <div class="icon-addon addon-md">
<input required name="NewPassword" type="password" class="input username" placeholder="Enter new password" onfocus="this.value=''"  style="width:100%;"/><br>
   </div>
                </div>
            </div>
<!--END USERNAME-->
    <!--PASSWORD-->

 <div class="form-group">						
                <div class="input-group input-group-md">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <div class="icon-addon addon-md">
<input type="password" required class="input password" Placeholder="Confirm password" onfocus="this.value=''" name="RePassword" style="width:100%;"/><br><br>
</div>
    </div>
            </div>
<!--END PASSWORD-->
</div>
    
    <!--END CONTENT-->
<!--FOOTER-->
<div class="footer">
    
                       <center><input type="submit" class="btn btn-primary" name="reset" value="Reset Password" class="button" style="color:white;"></center>
    <!--Reset BUTTON--><!--<input type="submit" name="reset" value="Reset Password" class="button"/>--><!--END RESET BUTTON-->

</div>

    </div>


    <!--END FOOTER-->

</form>





<!--<div class="g-signin2" data-onsuccess="onSignIn"></div>
<a class="col-md-4" onclick="logIn()"><img src="img/fb.png" height="50%" width="95%"></a>-->
<!--<a onclick="logIn()" >
                  <div class="icon-social icon-social-facebook normal">
                    <i class="fa fa-facebook "></i>
                  </div>
</a>-->

</center>
		                    </div>
					<!--<a href="#"><img src="img/fb.png" height="25px" width="25px"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="img/twitter.png" height="25px" width="25px"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="img/g+.png" height="25px" width="25px"></a>-->
		



				<!--<div class="g-signin2" data-onsuccess="onSignIn"></div><a onclick="logIn()"><img src="img/fb.png" height="23%" width="23%"></a>-->
                        </div>                    	
                    </div>
                </div>
            </div>            
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
          <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>