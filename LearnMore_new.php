<?php
error_reporting(E_ERROR);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Expense | Learn More</title>

    <!-- Bootstrap Core CSS -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="CSS/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap_contact.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
	#P_links1
	{
		width:103%;
		height:10%;
		position:absolute;
		//margin-top:0%;
		margin-left:-8%;
		z-index:1;	
		background-color:#262626;
		font-family:Calibri;
		//border-radius: 5px 5px 5px 5px;
		//top: 441px;
	}
	.P_anchor
	{
		//margin:10px;
		font-weight:bold;
		color:#FFFFFF;
		font-style:none;
	}
	.P_anchor:hover
	{
		//margin:10px;
		color:#FFFFFF;
	}

	</style>
</head>

<body style=" background-color:#F0F7FA;  background-repeat: no-repeat; " oncontextmenu="return false" >
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


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     <img height="60"  style="margin-left:-41px;" src="images/Logo3.png" alt="">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                  <li><a href="index.php" class="P_anchor">Home</a></li>
                    </li>
                    
                    <li>
                        <a href="contact_new.php" class="P_anchor">Contact</a>
                    </li>
                    <li class="dropdown">
                        <a href="about_new.php" class="P_anchor">About</a>
                    </li>
                    <li>
                        <a href="help.php" class="P_anchor">Help</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="P_anchor">Other Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="Product_new.php" class="color"><font size="3px"><img style="vertical-align: bottom; width: 22px; height: 22px;" title="Product" alt="" src="images/product.png">Product</font></a>
                            </li>
                            <li>
                                <a href="Customer_new.php"class="color"><font size="3px"><img style="vertical-align: bottom; width: 22px; height: 22px;" title="Customers" alt="" src="images/customer.png">Customers</font></a>
                            </li>
                            <li>
                                <a href="LearnMore_new.php" class="color"><font size="3px"><img style="vertical-align: bottom; width: 22px; height: 22px;" title="Learn More" alt="" src="images/more.png">Ask about Services</font></a>
                            </li>
                        </ul>
                    </li>
					<li class="dropdown">
                        <a href="login.php" class="P_anchor">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Ask Services   <small>Discover more about Expense</small></h3>
                <!--ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Ask Services</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->


<div class="container">

<!-- Contact Form - START -->
<div class="container">
    <div class="row">
            <div class="well well-sm">
                <form class="form-horizontal" name="learnmore" id="learnmore" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onSubmit="return validatePassword()">
                    <fieldset>
					<center><p style="font-size:22px;">Fill the form below to know more about us!!</p></center>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="name" name="name" type="text" placeholder="Name" class="form-control">
								<label style="color:red;margin-left:-100px font-size:4;"> <?php echo $nameErr;?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="cmpny_name" type="text" name='cmpny_name' placeholder="Company Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="emailid" type="text" name="emailid" placeholder="Email ID" class="form-control">
								<label style="color:red;margin-left:-100px;font-size:4;"><?php echo $emailErr;?></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="contact" type="text" name="contact" placeholder="Contact No" class="form-control">
								<label style="color:red;margin-left:-80px;font-size:4;"><?php echo $contactErr;?></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message"  placeholder="How can we help you?" name='title' rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="Submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
						 <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <?php if(isset($_REQUEST['Submit'])) echo $message; ?>
                            </div>
                        </div>
						
                    </fieldset>
                </form>
            </div>

    </div>
</div>

<style>
    .header {
        color: #36A0FF;
        font-size: 27px;
        padding: 10px;
    }

    .bigicon {
        font-size: 35px;
        color: #36A0FF;
    }
</style>

<!-- Contact Form - END -->

</div>



        <!-- Content Row -->
        <!--div class="row">
            <div class="col-lg-12">
				<h2 style="text-align:center; box-shadow: 5px 5px 5px #888888; height:40px; background-color:#666666; color:white;">Discover more about Expense</h2>
					  <p style="text-align:center;font-size:22px;">Fill the form below to know more about us!!</p>
					  <center>
					  <form name="learnmore" id="learnmore" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return validatePassword()" style="background-color:#E5E5E5; height:450px; width:650px; border-radius:5px; box-shadow: 3px 4px 5px #666666;">
						<p>&nbsp;</p>
						
						<div style="width:850px;height:400px; font-family:'Times New Roman', Times, serif;">
						  <table width="479" height="383" border="0" align="center" cellpadding="7" cellspacing="0" class="tblSaveForm" style=" margin-left:250px; margin-top:45px;">
							<tr >
							  <td width="137" align="left"><label style="color:#000033;margin-left:-150px;font-size:24px">First Name</label></td>
							  <td width="314" align="left"><input align="center" maxlength="15" type='text' name='fname' placeholder="Your First Name" size="30px" style="margin-left:-100px;" ><br>
								<label style="color:red;margin-left:-100px font-size:4;"> <?php echo $nameErr;?></label></td>
							</tr>
							
							<tr >
							  <td align="left"><label style="color:#000033;margin-left:-150px;font-size:24px;">Last Name</label></td>
							  <td align="left"><input type='text' align="center" maxlength="15" name='lname' placeholder="Last Name" size="30px" style="margin-left:-100px;"/><br>
							<label style="color:red;margin-left:-100px font-size:4;"><?php  echo $lnameErr;?></label></td>
							</tr>
							
							<tr >
							  <td height="39" align="left"><label style="color:#000033;margin-left:-150px;font-size:24px">Company</label></td>
							  <td align="left"><input type='text' align="center" maxlength="15" name='cmpny_name' placeholder="Company Name" size="30px" style="margin-left:-100px;"/></td>
							</tr>
							
							<tr>
							  <td align="left"><label style="color:#000033;margin-left:-150px;font-size:24px">EmailID</label></td>
							  <td align="left"><input type="text" align="center" maxlength="45" name="emailid" placeholder="Email ID" size="30px"style="margin-left:-100px;"/><br>
								&nbsp;&nbsp;&nbsp;&nbsp;<label style="color:red;margin-left:-100px;font-size:4;"><?php echo $emailErr;?></label></td>
						
							</tr>
							
							<tr>
							  <td align="left"><label style="color:#000033;margin-left:-150px;font-size:24px">Contact</label></td>
							  <td align="left"><input type="text" align="center" maxlength="10" name="contact" placeholder="Contact No" size="30px"style="margin-left:-100px;" /><br>
								<label style="color:red;margin-left:-80px;font-size:4;"><?php echo $contactErr;?></label></td>
							</tr>
							<tr>
							  <td align="left"><label style="color:#000033;margin-left:-150px;font-size:24px">Subject</label></td>
							  <td align="left"><textarea type='text' maxlength="50" placeholder="How can we help you?" name='title' rows="3" cols="27" style="margin-left:-100px; resize:none;"  /></textarea></td>
							
							</tr>
							<tr>
							  <td colspan="2" align="center"><input type="submit" name="Submit" value="SUBMIT" style="background-color:#000066;padding:5px;box-shadow: 5px 5px 5px #888888;border-radius:5px;color:#B0E0E6;width:95px ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							</tr>
							<tr>
							  <td colspan="2" align="center"><?php if(isset($_REQUEST['Submit'])) echo $message; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
							</tr>
						  </table>
						</div>
						
			</form>
			</center>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <!--footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer-->
		<div style="cursor:pointer; bottom:-10px; left:5%; position:fixed; z-index:11;">
			<br><br>
			<a href=""><img style="width: 30px; height: 30px;" title="Follow us on Twitter" src="images/Twitter_logo2.png"></a>	<a href=""><img style="width: 30px; height: 30px;" title="Share Youtube video" src="images/YouTube-icon2.png"></a>
				<a href=""><img style="width: 30px; height: 30px;" title="Follow us on G+" src="images/g+2.png"></a>
			<br>
			<br>
		</div>
<!--div id="P_links1"><br>
		<span style="margin-left:50%; color:#FFFFFF; font-style:italic;"><a href="" class="P_anchor">Policy and Terms</a>&nbsp;|&nbsp;<a href="faq.php" class="P_anchor">FAQ</a>&nbsp;|&nbsp;<a href="" class="P_anchor">About our Ads</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Copyright &copy; 2015 Vulcan Infotech</span>
</div-->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>