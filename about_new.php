<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
       <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>XPENSY | ABOUT</title>
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
		

        <script src="js/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>    </head>
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
						<li class="active">
							<a href="about_new.php">About us</a>
						</li>
						<li>
							<a href="help.php">Help</a>
						</li>
						<li>
							<a href="contact_us.php">Contact us</a>
						</li>
						
						<li><a href="login.php">LogIn</a></li>
<li><a href="signup.php">Sign Up</a></li>
					</ul>
				</nav>
			</div>
		</div>	<br>
       <!-- Page Title -->
		<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
			<div class="col-lg-12">
				<img src="images/about2.jpg"  class="img-responsive" width ="350%" height="300px" style="box-shadow:1px 3px 5px #666666;"><br>
				<p>Xpensy started @ 2015 with vulcan's burning hatred for generating awful expense reports business and travel expense and can be the hassle for administrator and staff,   but with this Application,  you will streamline your employee's expense reporting process.   With features like flexible expense report
,customization to your corporate travel expense policy.You will save time and money when managing expenses and speed up expense reimbursement for employees.Now,it is simplified to submit expense from any location across the globe. </p>	
					
			<div class="container-fluid">
			  <div class="row" style="box-shadow:1px 3px 3px #999999;">
				<div class="col-sm-3 col-md-6" style="background-color:#FAFAFA;"><br>
				<center>
				
				 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4">Xpensy Benefits</button>
				 </center><br> 
				</div>
				<div class="col-sm-9 col-md-6" style="background-color:#FAFAFA;"><br>
				  <center>
			
				 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5">Xpensy Services</button>
				 </center><br>
				</div>
			  </div>
			</div>
			
			</div>
			
			
			

		  </div>
			
			</div>
			 
			<!-- Modal 4 -->
			  <div class="modal fade" id="myModal4" role="dialog" style="margin-top:10%;">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <center><h4 class="modal-title" style="color:blue;">Xpensy Benefits</h4></center>
					</div>
					<div class="modal-body">
							<div class="row">
								<div class="col-md-6">
									<a href="#">
										<img class="img-responsive" src="images/Business-Expenses.jpg" alt="">
									</a>
								</div>
								<div class="col-md-6">
									<ul>
											<li>Easy to submit your customized expense report.</li>
											<li>Paperless, fast processing.</li>
											<li>Saved time and money.</li>
											  <li>Speed up expense reimbursement for the employees.</li>
											   <li>Easy to access your previous expense reports.</li>
											<li>Analyze and create custom expense reports.</li>
										   <li>The Path to Mastering Your Expenses.</li>
                                                                                   
										   
										  
										</ul>
									
								</div>
							</div>
							
					
					</div>
					
				  </div>
				</div>
			  </div>
			  
			  
			  <!-- Modal 5 -->
			  <div class="modal fade" id="myModal5" role="dialog" style="margin-top:10%;">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <center><h4 class="modal-title" style="color:blue;">Xpensy Services</h4></center>
					</div>
					<div class="modal-body">
							<div class="row">
								<div class="col-md-7">
									<a href="#">
										<img class="img-responsive" src="images/bckgrnd.jpg" alt="">
									</a>
								</div>
								<div class="col-md-5">
									<ul>
									   
										<li>Mobile access.</li>							       
										<li>Flexible.</li>
										 <li>User Support Desk.</li>
										<li>Quick implementation.</li>
										<li>Powerful and robust.</li>
										<li>Highly secured.</li>
									</ul>
									
								</div>
							</div>
							
							
					 
					</div>
					
				  </div>
				</div>
			  </div>
			
					</div><!--end container-->
       
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