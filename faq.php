<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>XPENSY | <?php echo $pname=$_SESSION['pname'];?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/icomoon-social.css">

        <link rel="stylesheet" href="CSS/css/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="CSS/css/leaflet.css" />
		<!--[if lte IE 8]>
		   <link rel="stylesheet" href="CSS/css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="CSS/main.css">

        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="js/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
			
						
						<li class="active">
							<a href="faq.php">FAQ</a>
						</li>
						<li>
							<a href="contact_us.php">Contact us</a>
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
						<h1>Frequently Asked Questions</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 faq-wrapper">
						<div class="panel-group" id="accordion2">
							<h3>General Questions</h3>
							


							<div class="panel panel-default">
								<div class="panel-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse12">
										User Registration</a>
								</div>
								<div id="collapse12" class="accordion-body collapse">
									<div class="accordion-inner">
										<div class="answer">
                                                                                     <p style="font-size:20; color:red">Sign Up/ Login</p>
 <p style="font-size:16; color:black"><li>Create an account to use xpensy.</p></li>
<p style="font-size:16; color:black"><li>Click on "Register Here". </p></li>
<p style="font-size:16; color:black"><li>Fill up registration details and click on "Create account".</p></li>
<p style="font-size:16; color:black"><li>Click on registration link which is sent to your Email ID.</p></li>
<p style="font-size:16; color:black"><li>Once you are registered, click on Login tab, Enter email address and password to get access of our services.</p></li>
                                                                                </div>
									</div>
								</div>
							</div>



							<div class="panel panel-default">
								<div class="panel-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse13">
										Generate and send reports									</a>
								</div>


								<div id="collapse13" class="accordion-body collapse">
									<div class="accordion-inner">
								<div class="answer"><p style="font-size:20; color:red">Generate reports</p>
							
																																												
	  <p style="font-size:16; color:black"><li>Select the category of expense you would like to add i.e.Transport/ Meal/ Hotel/ Other.</p></li>
                            <p style="font-size:16; color:black"><li>To Upload receipts, select "Choose file" & import receipt from your computer.</p></li>
                            <p style="font-size:16; color:black"><li>Entered expenses report is shown to Expense Report link.</p></li>
                             <p style="font-size:20; color:red">Submit Expense Report.</p>
	  <p style="font-size:16; color:black"><li>Select "Send Mail" option to submit report. </p></li>
          <p style="font-size:16; color:black"><li>Fill the mailing details.</p></li>
	   <p style="font-size:16; color:black"><li>Add"CC" if any.</p></li>
                            <p style="font-size:16; color:black"><li>Add subject line and submit your expense report.</p></li></div>
									</div>
								</div>
							</div>


								

							<div class="panel panel-default">
								<div class="panel-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse14">
									View previous reports
  
									</a>
								</div>
								<div id="collapse14" class="accordion-body collapse">
									<div class="accordion-inner">
										<div class="answer"><p style="font-size:20; color:red">Viewing previous reports</p>
										
	<p style="font-size:16; color:black"><li>To list out all the submitted reports or saved reports, click on "Saved Documents" button.</p></li>
	  <p style="font-size:16; color:black"><li>A window will appear with a list of previously submitted reports and receipts.</p></li></div>

									</div>
								</div>
							</div>



							<div class="panel panel-default">
								<div class="panel-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse15">
									Update Your Profile
									</a>
								</div>
								<div id="collapse15" class="accordion-body collapse">
									<div class="accordion-inner">
										<div class="answer"><p style="font-size:20; color:red">Update Profile</p>

										
      <p style="font-size:16; color:black"><li>Select "Setting", .</p></li>
      <p style="font-size:16; color:black"><li>Select the tab 'Update Profile'.</p></li>
      <p style="font-size:16; color:black"><li>Enter details.</p></li>
      <p style="font-size:16; color:black"><li>Finally click on submit button.</p></li></div>
									</div>
								</div>
							</div>


							<div class="panel panel-default">
								<div class="panel-heading">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse16">
									Update Your Password
									</a>
								</div>
								<div id="collapse16" class="accordion-body collapse">
									<div class="accordion-inner">
										<div class="answer">	<p style="font-size:20; color:red"> Update Password</p>
										
      <p style="font-size:16; color:black"><li>Select "Setting", .</p></li>
      <p style="font-size:16; color:black"><li>Select the tab 'Update Password'.</p></li>
      <p style="font-size:16; color:black"><li>Enter Old Password.</p></li>
      <p style="font-size:16; color:black"><li>Enter New Password twice for confirmation.</p></li>
      <p style="font-size:16; color:black"><li>Click on Submit Button.</p></li>
                                 
	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	    </div>
</div>
	    <!-- Footer -->
         
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

    </body>
</html>