<?php

session_start();
			
echo"Work in Progress";
		//{ Below commented code here }
		
		unset($_SESSION['login']);
		unset($_SESSION['userid']);
		session_destroy();
$url = "index.php";
if(isset($_GET["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
}
header("Location:$url");
		//header("Location: index.php");
							
			/*include('dbcon.php');
			$R = 0;
			$stmt = $dbh->prepare("CALL sp_DelAttachment(?,?)");
			$stmt->execute(array($User,$R));
			while($row = $stmt->fetch())
			{
				$folder = "uploads/";
				unlink($folder.$row[0]);
				$folder.$row[0];
			}
			$rownum = 0;
			$stmt = $dbh->prepare("CALL sp_DelRow(?,?)");
			$stmt->execute(array($User,$rownum));
			$dbh->connection = null; */			
	
?>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
	<script src="https://connect.facebook.net/en_US/all.js"></script>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">

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
        echo "sunny";

					//window.location = "UserProfile.php";				
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
window.location = "login.php";
    echo "sujit";
    });
  }

</script>

	
	<script>
	$( document ).ready(function() {
		$('#logoutBtn').show();
		$('#userDetails').show();
	});
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

<div class="container-fluid">	
<div class="row">Or Sign In with</div>							
<div class="row">
hjvjhvjhvbjn
<div class="g-signin2 col-md-4 " data-onsuccess="signOut"></div>
<div class="col-md-offset-4 col-md-4"><a onclick="logIn()"><img src="img/fb.png" ></a></div>
<div>
</div>
</body>
</html>




