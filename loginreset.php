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
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
<script type="text/javascript">
function onSignIn(googleUser) 
{
  var profile = googleUser.getBasicProfile();
  /*console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());*/
  var id=profile.getId();
  var name=profile.getName();
  var email=profile.getEmail();
  
  //sending data for xpensy user_error
  var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function () 
		{
			if (xhr.readyState == 4 && xhr.status == 200) 
			{
					window.location = "UserProfile.php";				
			}
		}
	xhr.open("GET", "google-api.php?access_google_id="+id+"&access_google_name="+name+"&access_google_email="+email, true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	xhr.send();
}

  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }

</script>

	
	<script>
	$( document ).ready(function() {
		$('#logoutBtn').hide();
		$('#userDetails').hide();
	});

	function fbAsyncInit() {
		FB.init({
			appId      : '1723169717913358',
			status     : true, // check login status
			cookie     : true, // enable cookies to allow the server to access the session
			xfbml      : true  // parse XFBML
		});
	}
	function logIn() {
	  	FB.login(
	        function(response) {
				if (response.status== 'connected') {
					FB.api('/me?fields=id,name,email', function(response) {
				    	//console.log(response);
				      	/*console.log('Good to see you, ' + response.email + '.');
				      	$('#loginBtn').hide();
				      	$('#logoutBtn').show();
					$('#userDetails').show();
					$('#userInfo').html(response.email + '<br>' + response.location.name); */
					var id=response.id;
					  var name=response.name;
					  var email=response.email;
					  
					  //sending data for xpensy user_error
					  var xhr = new XMLHttpRequest();
							xhr.onreadystatechange = function () 
							{
								if (xhr.readyState == 4 && xhr.status == 200) 
								{
										window.location = "UserProfile.php";				
								}
							}
						xhr.open("GET", "google-api.php?access_google_id="+id+"&access_google_name="+name+"&access_google_email="+email, true);
						xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
						xhr.send();
				    });

				    FB.api("/me/picture?width=200&redirect=0&type=normal&height=200", function (response) {
				      	if (response && !response.error) {
				        	/* handle the result */
				        	console.log('PIC ::', response);
				        	$('#userPic').attr('src', response.data.url);
				      	}
				    });
				}
			}
		);
	}

	function logOut() {
		FB.logout(function(response) {
			console.log('logout :: ', response);
			//Removing access token form localStorage.
			$('#loginBtn').show();
			$('#logoutBtn').hide();
			$('#userDetails').hide();
		});
	}

	fbAsyncInit();
	  
	</script>
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
<style>
.center-block {
    float: none;
    margin-left: auto;
    margin-right: auto;
}

.input-group .icon-addon .form-control {
    border-radius: 0;
}

.icon-addon {
    position: relative;
    color: #fff;
    display: block;
}

.icon-addon:after,
.icon-addon:before {
    display: table;
    content: " ";
}

.icon-addon:after {
    clear: both;
}

.icon-addon.addon-md .glyphicon,
.icon-addon .glyphicon, 
.icon-addon.addon-md .fa,
.icon-addon .fa {
    position: absolute;
    z-index: 2;
    left: 10px;
    font-size: 14px;
    width: 30px;
    margin-left: -2.5px;
    text-align: center;
    padding: 10px 0;
    top: 1px
}

.icon-addon.addon-lg .form-control {
    line-height: 1.33;
    height: 56px;
    font-size: 18px;
    padding: 10px 16px 10px 40px;
}

.icon-addon.addon-sm .form-control {
    height: 40px;
    padding: 5px 10px 5px 28px;
    font-size: 12px;
    line-height: 1.5;
}

.icon-addon.addon-lg .fa,
.icon-addon.addon-lg .glyphicon {
    font-size: 18px;
    margin-left: 0;
    left: 11px;
    top: 4px;
}

.icon-addon.addon-md .form-control,
.icon-addon .form-control {
    padding-left: 25px;
    float: left;
    font-weight: normal;
}

.icon-addon.addon-sm .fa,
.icon-addon.addon-sm .glyphicon {
    margin-left: 0;
    font-size: 14px;
    left: 5px;
    top: -1px
}

.icon-addon .form-control:focus + .glyphicon,
.icon-addon:hover .glyphicon,
.icon-addon .form-control:focus + .fa,
.icon-addon:hover .fa {
    color: #2580db;
}
</style>
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
			   <div class="form-bottom">
			                    <form role="form" action="UserLogin.php" method="post" class="registration-form">
			                    	<div class="form-group">
									<?php echo $Lmessage; ?><br>
                <div class="input-group input-group-md">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input required name="NewPassword" type="password" class="input username" placeholder="Enter new password" onfocus="this.value=''"  style="width:100%;"/>
                </div>
            </div>
			                        <div class="form-group">
                <div class="input-group input-group-md">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" required class="input password" Placeholder="Confirm password" onfocus="this.value=''" name="RePassword" style="width:100%;"/>
                    
                </div>
            </div>
			<center>
			                         <input type="submit" class="btn btn-primary" name="reset" value="Reset Password" class="button" style="color:white;">
									</center>
			                    </form><br>

<div class="container-fluid">	
						
<div class="row">


<div>
</div>





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
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>