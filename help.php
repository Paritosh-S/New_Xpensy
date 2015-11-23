<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
       <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>XPENSY | HOME</title>
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
		
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		

        <script src="js/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
         <style>
	
.thumbnail {
    position:relative;
    overflow:hidden;

}
 
.caption {
    position:absolute;
    top:0;
    right:0;
    background:rgba(66, 139, 202, 0.75);
    width:100%;
    height:100%;
    padding:2%;
    display: none;
    text-align:center;
    color:#fff !important;
    z-index:2;
}
	</style>
	
	
	<script>
	$( document ).ready(function() {
    $("[rel='tooltip']").tooltip();    
 
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
});
	</script>
	
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
						<li class="active">
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
		</div>	
	
        <!-- Page Title -->
						
                     <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 style="margin-top:32px;">Help</h1>
					</div>
				</div>
			</div>
		</div>

<div class="container" style="margin-top:32px;">

   

        <div class="col-md-4">
         <center><h4>SIGN UP | LOGIN</h4> </center>           
            <div class="thumbnail btn" data-toggle="modal" data-target="#myModal_signup">
                <div class="caption"><br><br>
                    <h4>Sign | Login</h4>
                    
                   
                    <!--a href="" class="label label-default" rel="tooltip" title="View More" data-toggle="modal" data-target="#myModal_signup">View More</a--></p>
                </div>
                <img src="image/signup1.png" alt="image" width ="100%" height="100%">
            </div>
      </div>

        <div class="col-md-4">
<center><h4>GENERATE  EXPENSE  REPORT</h4> </center>            
            <div class="thumbnail btn" data-toggle="modal" data-target="#myModal_generate_report">
                <div class="caption"><br><br>
                    <h4>Generate Expense Report</h4>
                    
                   
                    <!--a href="" class="label label-default" rel="tooltip" title="View More" data-toggle="modal" data-target="#myModal_generate_report">View More</a--></p>
                </div>
                <img src="image/transport1.png" alt="image" width ="100%" height="100%">
            </div>
      </div>

      <div class="col-md-4">  
<center><h4>GENERATE  PDF  OF  REPORT</h4> </center>          
            <div class="thumbnail btn" data-toggle="modal" data-target="#myModal_generate_pdf">
                <div class="caption"><br><br>
                    <h4>Generate PDF of Report</h4>
                    
                   
                    <!--a href="" class="label label-default" rel="tooltip" title="View More" data-toggle="modal" data-target="#myModal_generate_pdf">View More</a--></p>
                </div>
                <img src="image/pdf1.png" alt="image" width ="100%" height="100%">
            </div>
      </div>
        
</div><!--container-->



<div class="container">

        <div class="col-md-4">  
<center><h4>SUBMIT  EXPENSE  REPORT</h4> </center>          
            <div class="thumbnail btn" data-toggle="modal" data-target="#myModal_submit_report">
                <div class="caption"><br><br>
                    <h4>Submit Expense Report</h4>
                    
                   
                    <!--a href="" class="btn" rel="tooltip" title="View More" data-toggle="modal" data-target="#myModal_submit_report">View More</a--></p>
                </div>
                <img src="image/submit1.png" alt="image" width ="100%" height="100%">
            </div>
      </div>


        <div class="col-md-4">    
            <center><h4>UPDATE  PROFILE</h4> </center>        
            <div class="thumbnail btn" data-toggle="modal" data-target="#myModal_update_profile">
                <div class="caption"><br><br>
                    <h4>Update Profile</h4>
                    
                   
                    <!--a href="" class="label label-default" rel="tooltip" title="View More" data-toggle="modal" data-target="#myModal_update_profile">View More</a--></p>
                </div>
                <img src="image/profile1.png" alt="image" width ="100%" height="100%">
            </div>
      </div>

        <div class="col-md-4">  
            <center><h4>UPDATE  PASSWORD</h4> </center>          
            <div class="thumbnail btn" data-toggle="modal" data-target="#myModal_update_password">
                <div class="caption"><br><br>
                    <h4>Update Password</h4>
                    
                   
                    <!--a href="" class="label label-default" rel="tooltip" title="View More" data-toggle="modal" data-target="#myModal_update_password">View More</a--></p>
                </div>
                <img src="image/password1.png" alt="image" width ="100%" height="100%">
            </div>
      </div>

</div><!--container-->
	
<!-- Modal signup-->
  <div class="modal fade" id="myModal_signup" role="dialog" style="margin-top:5%;">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">SIGNUP | LOGIN</h4></center>
        </div>

        <div class="modal-body">
							<div class="row">
								<div class="col-md-9">
									<a href="#">
										<img src="image/signup1.png" alt="image" width ="100%" height="350px">
									</a>
								</div>
					                        <div class="col-md-3">
								<ul>
								<p style="font-size:20; color:red">1.Sign Up/ Login</p>
                                                                <p style="font-size:16; color:black"><li>Create an account to use xpensy.</p></li>
                                                                <p style="font-size:16; color:black"><li>Click on "Register Here". </p></li>
                                                                <p style="font-size:16; color:black"><li>Fill up registration details and click on "Create account".</p></li>
                                                                <p style="font-size:16; color:black"><li>Click on registration link which is sent to your Email ID.</p></li>
                                                                <p style="font-size:16; color:black"><li>Once you have registered, click on Login tab, Enter email address and password to get access of our services.</p></li>
								</ul>
									
								</div>
							</div>
							
							
					 
		</div>

       </div>
      
    </div>
  </div>

<!-- Modal generate report-->
  <div class="modal fade" id="myModal_generate_report" role="dialog" style="margin-top:5%;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">GENERATE EXPENSE REPORT</h4></center>
        </div>
        <div class="modal-body">
							<div class="row">
								<div class="col-md-8">
									<a href="#">
										<img src="image/generate_expense.gif" alt="image" width ="100%" height="350px">
									</a>
								</div>
					                        <div class="col-md-4">
								<ul>
								<p style="font-size:16; color:black"><li>Select the category of expense which you would like to add i.e.Transport/ Meal/ Hotel/ Other.</p></li>
                            <p style="font-size:16; color:black"><li>To Upload receipts, select "Choose file" & import receipt from your computer.</p></li>
                            <p style="font-size:16; color:black"><li>Entered expenses report is shown in your Expense Report link.</p></li> 
								</ul>
									
								</div>
							</div>
							
							
					 
					</div>

        
      </div>
      
    </div>
  </div>

<!-- Modal submit report-->
  <div class="modal fade" id="myModal_submit_report" role="dialog" style="margin-top:5%;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">SUBMIT EXPENSE REPORT</h4></center>
        </div>
        <div class="modal-body">
							<div class="row">
								<div class="col-md-8">
									<a href="#">
										<img src="image/send_mail.gif" alt="image" width ="100%" height="350px">
									</a>
								</div>
					                        <div class="col-md-4">
								<ul>
								 <p style="font-size:16; color:black"><li>Click on "Send Mail" option to submit report. </p></li>
          <p style="font-size:16; color:black"><li>Fill up the mailing details.</p></li>
	   <p style="font-size:16; color:black"><li>Add "CC" if any.</p></li>
                            <p style="font-size:16; color:black"><li>Add the subject line and submit your report.</p></li>
								</ul>
									
								</div>
							</div>
							
							
					 
					</div>

        
      </div>
      
    </div>
  </div>

<!-- Modal generate PDF-->
  <div class="modal fade" id="myModal_generate_pdf" role="dialog" style="margin-top:5%;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">GENERATE PDF OF EXPENSE REPORT</h4></center>
        </div>
        <div class="modal-body">
							<div class="row">
								<div class="col-md-8">
									<a href="#">
										<img src="image/generate_pdf.gif" alt="image" width ="100%" height="350px">
									</a>
								</div>
					                        <div class="col-md-4">
								<ul>
								<p style="font-size:16; color:black"><li>Generate PDF of the report by simply clicking on "Reports".</p></li>
          <p style="font-size:16; color:black"><li>This report will be saved into your account.</p></li>
	  <p style="font-size:16; color:black"><li>You may also save  a copy of the PDF file to your local memory.</p></li>
								</ul>
									
								</div>
							</div>
							
							
					 
					</div>

        
      </div>
      
    </div>
  </div>

<!-- Modal update profile-->
  <div class="modal fade" id="myModal_update_profile" role="dialog" style="margin-top:5%;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">UPDATE PROFILE</h4></center>
        </div>
        <div class="modal-body">
							<div class="row">
								<div class="col-md-8">
									<a href="#">
										<img src="image/update_profile.gif" alt="image" width ="100%" height="350px">
									</a>
								</div>
					                        <div class="col-md-4">
								<ul>
								 <p style="font-size:16; color:black"><li>Select "Setting", .</p></li>
      <p style="font-size:16; color:black"><li>Select the tab 'Update Profile'.</p></li>
      <p style="font-size:16; color:black"><li>Enter the details.</p></li>
      <p style="font-size:16; color:black"><li>Finally click on "Submit" button.</p></li>
								</ul>
									
								</div>
							</div>
							
							
					 
					</div>

        
      </div>
      
    </div>
  </div>

<!-- Modal update password-->
  <div class="modal fade" id="myModal_update_password" role="dialog" style="margin-top:5%;">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">UPDATE PASSWORD</h4></center>
        </div>
       <div class="modal-body">
							<div class="row">
								<div class="col-md-8">
									<a href="#">
										<img src="image/update_pswrd.gif" alt="image" width ="100%" height="350px">
									</a>
								</div>
					                        <div class="col-md-4">
								<ul>
								<p style="font-size:16; color:black"><li>Select "Setting", .</p></li>
      <p style="font-size:16; color:black"><li>Select the tab 'Update Password'.</p></li>
      <p style="font-size:16; color:black"><li>Enter Old Password.</p></li>
      <p style="font-size:16; color:black"><li>Enter New Password twice for confirmation.</p></li>
      <p style="font-size:16; color:black"><li>Click on Submit Button.</p></li>
								</ul>
									
								</div>
							</div>
							
							
					 
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

    </body>
</html>