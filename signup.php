<?php
session_start();
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
	if($_SESSION['message']=='M')
	{
		$Smessage="<img src='images/x.png' width=25px height=18px valign=bottom> Password Mismatch";
		session_destroy();
	}
	else if($_SESSION['message']=='S')
	{
		$Smessage="<img src='images/x.png' width=25px height=18px valign=bottom> Sign Up failed! Try again";
		session_destroy();
	}
	else if($_SESSION['message']=='I')
	{
		$Smessage="<img src='images/x.png' width=25px height=18px valign=bottom> Email Id Invalid";
		session_destroy();
	}
	else if($_SESSION['message']=='E')
	{
		$Smessage="<img src='images/x.png' width=25px height=18px valign=bottom> You are already registered";
		session_destroy();
	}

	else if($_SESSION['message']=='C')
	{
		$msg="<span style='color:green'><img src='images/x.png' width=25px height=18px valign=bottom> Incorrect Captcha!</span>";	
		$Smessage='';
		session_destroy();
	}
	else
	{
		Windows.Location.reset();
	}
}
else if(isset($_SESSION['login']))
{
	header("Location: UserProfile.php");
	exit;
}
else
{
	$Smessage='';
	$msg='';
	session_destroy();
}

?>
<?php 
error_reporting(0);
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
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Xpensy | Login</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
	<script src="https://connect.facebook.net/en_US/all.js"></script>
        <!-- CSS -->
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
    color: #555;
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
    width: 20px;
    margin-left: -2.5px;
    text-align: center;
    padding: 10px 0;
    top: 1px
}

.icon-addon.addon-lg .form-control {
    line-height: 1.33;
    height: 46px;
    font-size: 18px;
    padding: 10px 16px 10px 40px;
}

.icon-addon.addon-sm .form-control {
    height: 30px;
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
    padding-left: 30px;
    float: left;
    font-weight: normal;
}

.icon-addon.addon-sm .fa,
.icon-addon.addon-sm .glyphicon {
    margin-left: 0;
    font-size: 12px;
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
			                    <form role="form" action="UserSignup.php" method="POST" class="registration-form">
			                    	<div class="form-group">
									<?php echo $Smessage; echo "<br>"; ?>
                <div class="input-group input-group-md">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <div class="icon-addon addon-md">
                        <input type="text" placeholder="Name" class="form-control input-lg" name="Name">
                       
                    </div>
                    
                </div>
            </div>
			<div class="form-group">
                <div class="input-group input-group-md">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <div class="icon-addon addon-md">
                        <input type="email" placeholder="Email" class="form-control input-lg" name="UserId">
                       
                    </div>
                    
                </div>
            </div>
			                        <div class="form-group">
                <div class="input-group input-group-md">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <div class="icon-addon addon-md">
                        <input type="password" placeholder="Password" class="form-control input-lg" name="UserPassword">
                       
                    </div>
                    
                </div>
            </div>
			<div class="form-group">
                <div class="input-group input-group-md">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <div class="icon-addon addon-md">
                        <input type="password" placeholder="Re-Password" class="form-control input-lg" name="RePassword" id="RePassword">
                       
                    </div>
                    
                </div>
            </div>
            <br>
<?php include 'captCode.php'; ?>
			<!--center>
			                        <button type="submit" class="btn">Sign up </button>
									</center-->
			                    </form><br>
								<center><p>Already member ? <a href="login.php">Sign In here</a></p></center>
<!--<div class="container-fluid">	
<center><div class="row">Or Sign In with</div>	</center>						
<div class="row">

<div class="g-signin2 col-md-4 " data-onsuccess="onSignIn"></div>
<div class="col-md-offset-4 col-md-4"><a onclick="logIn()"><img src="img/fb.png" ></a></div>
<div>
</div>-->

		                    




</div>
							
							<!--<a href="#"><img src="img/fb.png" height="25px" width="25px"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="img/twitter.png" height="25px" width="25px"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><img src="img/g+.png" height="25px" width="25px"></a>-->



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