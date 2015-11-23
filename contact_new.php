<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>XPENSY | CONTACT</title>
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
		
		<style>
		/* latin-ext */
@font-face {
  font-family: 'Fauna One';
  font-style: normal;
  font-weight: 400;
  src: local('Fauna One'), local('FaunaOne-Regular'), url(http://fonts.gstatic.com/s/faunaone/v4/ev-FaPpZYwwjm7lSlYKlFRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Fauna One';
  font-style: normal;
  font-weight: 400;
  src: local('Fauna One'), local('FaunaOne-Regular'), url(http://fonts.gstatic.com/s/faunaone/v4/cSd7NBXNFQWK4oX1706dY1tXRa8TVwTICgirnJhmVJw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
/* latin */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 400;
  src: local('Muli'), url(http://fonts.gstatic.com/s/muli/v7/z6c3Zzm51I2zB_Gi7146Bg.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}

#mainform{
width:960px;
margin:20px auto;
padding-top:20px;
font-family: 'Fauna One', serif;
}
#form{
border-radius:2px;
padding:20px 30px;
box-shadow:0 0 15px;
font-size:14px;
font-weight:bold;
width:350px;
margin:20px 250px 0 35px;
float:left;

}
h3{
text-align:center;
font-size:20px;
}
input{
width:100%;
height:35px;
margin-top:5px;
border:1px solid #999;
border-radius:3px;
padding:5px;
}
input[type=button]{
background-color:#123456;
border:1px solid white;
font-family: 'Fauna One', serif;
font-Weight:bold;
font-size:18px;
color:white;
}
textarea{
width:100%;
height:80px;
margin-top:5px;
border-radius:3px;
padding:5px;
resize:none;
}
span{
color:red
}
#note{
color:black;
font-Weight:400;
}
#returnmessage{
font-size:14px;
color:green;
text-align:center;
}
		</style>
		<link rel="shortcut icon" href="imgages/favicon.ico" type="image/x-icon">
   <link rel="icon" href="imgages/favicon.ico" type="image/x-icon">
    </head>
    <body>
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
						<li class="active">
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
						<h1>Contact Us</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-5">
						


						
		

<!-- Required Div Starts Here -->
<form id="form" >
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
</div>
		<div class="col-sm-7 social-login"><br>
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3888.2377002663434!2d77.742863!3d12.956636000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae120a316b7d7f%3A0x9638d321f729145b!2sTechvulcan!5e0!3m2!1sen!2sin!4v1431418811629" width="600" height="480" frameborder="3" style="border:3"></iframe>
					</div>
				</div>
				
			</div>
		</div>
		
		
<?php include 'footer.php'?>
	  	
        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="js/js/jquery.fitvids.js"></script>
        <script src="js/js/jquery.sequence-min.js"></script>
        <script src="js/js/jquery.bxslider.js"></script>
        <script src="js/js/main-menu.js"></script>
        <script src="js/js/template.js"></script>
<script>
$(document).ready(function() {
$("#submit").click(function() {
var name = $("#name").val();
var email = $("#email").val();
var message = $("#message").val();
var contact = $("#contact").val();
$("#returnmessage").empty(); // To empty previous error/success message.
// Checking for blank fields.
if (name == '' || email == '' || contact == '') {
alert("Please Fill Required Fields");
} else {
// Returns successful data submission message when the entered information is stored in database.
$.post("contact_form.php", {
name1: name,
email1: email,
message1: message,
contact1: contact
}, function(data) {
$("#returnmessage").append(data); // Append returned message to message paragraph.
if (data == "Your Query has been received, We will contact you soon.") {
$("#form")[0].reset(); // To reset form fields on success.
}
});
}
});
});

</script>
    </body>
</html>
	