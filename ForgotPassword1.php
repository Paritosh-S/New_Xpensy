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
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Xpensy | Login</title>

        <!-- CSS -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
	
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
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

<!--<form>
<div class="form-group">
<label for="login-username"><i class="icon-user"></i> <b>Enter Email address</b></label><br><br>
<input name="UName" class="form-control" id="login-username" type="text" placeholder="Enter you Email address" onfocus="this.value=''"><br> <br>
<button type="button" class="btn" name="forgot" style="color:white;" onClick="GetPassword(UName.value);">Generate Link</button>
<p id="show_status" style="display:none;"><br></p>
</form>-->


<form>
<div class="form-group">
<div class="input-group input-group-md">
<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
<div class="icon-addon addon-md">
<input name="UName" type="text" placeholder="Enter you Email address"  onfocus="this.value='' class="form-control input-lg" >                       
</div>               
</div>
</div>
<center>
<button type="button" class="btn" name="forgot" onClick="GetPassword(UName.value);">Generate Link </button>
<p id="show_status" style="display:none;"><br></p>
</center>
</form>






<br>
<p>Not a member yet ? <a href="signup.php">Sign up here</a></p>

<div class="container-fluid">	
			
<div class="row">

<div>
</div>








		                    </div>
					
		



				
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
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>