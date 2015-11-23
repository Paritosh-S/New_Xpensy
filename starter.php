<?php 

session_start();

	error_reporting(0);

	try
	{
		If(isset($_SESSION['login']) && isset($_SESSION['userid']))
		{
			$User=$_SESSION['login'];
			$UserID = $_SESSION['userid'];			
		}
		else
		{
			header("Location: index.php");
		}		
	}
	catch(Exception $ex)
	{
		session_destroy();
		header("Location: EndSession.php");
	}
?>
<html lang="en">
<head>


 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">






<link rel="shortcut icon" href="images/e.ico" type="image/x-icon"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Expense | <?php echo $pname=$_SESSION['pname'];?></title>

    <!-- Bootstrap Core CSS -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="CSS/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="CSS/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="CSS/new.css" rel="stylesheet" type="text/css">
	 
	<script src="startbootstrap-sb-admin-1.0.3/js/jquery.js"></script>

	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
  <script src="js/jQuery-2.1.3.min.js" type="text/javascript"></script>

	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]> 
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	#pop{
	position:fixed ;
	border:3px solid #00003d;
	//background:#3b3b6f;
	background: #2e4d8a;
    background: -moz-linear-gradient(top,  #2e4d8a 0%, #999999 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#2e4d8a), color-stop(100%,#999999));
    background: -webkit-linear-gradient(top,  #2e4d8a 0%,#999999 100%);
	background: -o-linear-gradient(top,   #2e4d8a 0%,#999999 100%);
    background: -ms-linear-gradient(top,   #2e4d8a 0%,#999999 100%);
    background: linear-gradient(top,  #2e4d8a 0%,#999999 100%);
	width:190px;
	padding:10px 15px;
	color:white;
	border-radius:10px 0px 10px 0px;
	box-shadow:2px 2px 2px 2px gray;
	z-index:99;
	margin-left:190px;
	
	
	//display:none;
	
	}
	.sidecolor
	{
	background: #2e4d8a;
    background: -moz-linear-gradient(top,  #2e4d8a 0%, #999999 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#2e4d8a), color-stop(100%,#999999));
    background: -webkit-linear-gradient(top,  #2e4d8a 0%,#999999 100%);
	background: -o-linear-gradient(top,   #2e4d8a 0%,#999999 100%);
    background: -ms-linear-gradient(top,   #2e4d8a 0%,#999999 100%);
    background: linear-gradient(top,  #2e4d8a 0%,#999999 100%);
	z-index:9999;
	}
	</style>
	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
	</script>
<script src="js/jQuery-2.1.3.min.js"></script>
<script>
   $("#amount1").on("keyup", function(){
    var valid = /^\d{0,10}(\.\d{0,2})?$/.test(this.value),
        val = this.value;
    
    if(!valid){
        console.log("Invalid input!");
        this.value = val.substring(0, val.length - 1);
    }
});
</script>
<script>

/*
$("#amount").on("keyup", function(){
    var valid = /^\d{0,10}(\.\d{0,2})?$/.test(this.value),
        val = this.value;
    
    if(!valid){
        console.log("Invalid input!");
        this.value = val.substring(0, val.length - 1);
    }
});
   $("#amount1").on("keyup", function(){
    var valid = /^\d{0,10}(\.\d{0,2})?$/.test(this.value),
        val = this.value;
    
    if(!valid){
        console.log("Invalid input!");
        this.value = val.substring(0, val.length - 1);
    }
});
$("#amount2").on("keyup", function(){
    var valid = /^\d{0,10}(\.\d{0,2})?$/.test(this.value),
        val = this.value;
    
    if(!valid){
        console.log("Invalid input!");
        this.value = val.substring(0, val.length - 1);
    }
});

   $("#amount3").on("keyup", function(){
    var valid = /^\d{0,10}(\.\d{0,2})?$/.test(this.value),
        val = this.value;
    
    if(!valid){
        console.log("Invalid input!");
        this.value = val.substring(0, val.length - 1);
    }
});

   $("#amount4").on("keyup", function(){
    var valid = /^\d{0,10}(\.\d{0,2})?$/.test(this.value),
        val = this.value;
    
    if(!valid){
        console.log("Invalid input!");
        this.value = val.substring(0, val.length - 1);
    }
}); */
</script>
</head>
<body style="background-color:#F0F7FA;" oncontextmenu="return false" >
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top " role="navigation" style=" background: #2e4d8a; background: -moz-linear-gradient(top,  #2e4d8a 0%, #999999 100%);
					 background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#2e4d8a), color-stop(100%,#999999));  background: -webkit-linear-gradient(top,  #2e4d8a 0%,#999999 100%);
					 background: -o-linear-gradient(top,   #2e4d8a 0%,#999999 100%); background: -ms-linear-gradient(top,   #2e4d8a 0%,#999999 100%);background: linear-gradient(top,  #2e4d8a 0%,#999999 100%);">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
		                         <img class=" navbar-left" height="50"  style="margin-left:20px; "  src="images/Logo3.png" alt="">
					<a class="navbar-brand" href="UserProfile.php" style="color:white;  border-radius:5px 5px 5px 5px;" >My Profile</a>
					<a class="navbar-brand" href="UpdateProfile.php" style="color:white;">Settings</a>
					<a class="navbar-brand" href="help.php" style="color:white;">Help</a>



					
            </div>
					<ul class="nav navbar-right top-nav">
						
						<li><a class="dropdown-toggle" data-toggle="dropdown" style="color:white;"><?php echo $_SESSION['pname'];?></a>
							</li>
						<li>
							<a href="EndSession.php" class="dropdown-toggle" style="color:white;"> <b>Logout</b></a>
						</li>
                    </ul>
               
		</nav>
            <!-- Top Menu Items -->
           
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
		<div>
           
		</div>
  
   
            <!-- /.navbar-collapse -->
         <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
					

<div class="container">
		  <div class="col-md-6">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#expense" data-toggle="tab">Expense</a></li>
                  <li><a href="#transport" data-toggle="tab">Transport</a></li>
                  <li><a href="#meal" data-toggle="tab">meal</a></li>
				     <li><a href="#hotel" data-toggle="tab">Hotel</a></li>
					    <li><a href="#other" data-toggle="tab">Other</a></li>
                </ul>
                <div class="tab-content">
                 

				 <div class="active tab-pane" id="expense">
               
                   
               </div><!-- /.tab-pane -->
			   
                 
				 <div class="tab-pane" id="transport">
                    <!-- The timeline -->
					<form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Catagory</label>
                        <div class="col-sm-10">
                         
						  <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Date </label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
					
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Amount</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">currency</label>
                        <div class="col-sm-10">
                         
						  <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        
                      </select>
                        </div>
                      </div>
					   <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                      <input type="file" id="exampleInputFile">
                     </div>
                    </div>
					  
					  <div class="form-group">
					  
                        <div class="col-sm-offset-3 col-sm-15">
                          <button type="submit" class="btn btn-success">Submit</button>
						  <button type="submit" class="btn btn-danger">Reset</button>
                        </div>

                      </div>
					 </form>
                   
					
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="meal">
				  <table>
             <tr><td><?php include 'MainTab/FoodTab.php';?></td></tr>
			 </table>
                  </div><!-- /.tab-pane -->
				  <div class="tab-pane" id="hotel">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Catagory</label>
                        <div class="col-sm-10">
                         
						  <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Date </label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
					
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Amount</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">currency</label>
                        <div class="col-sm-10">
                         
						  <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        
                      </select>
                        </div>
                      </div>
					   <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                      <input type="file" id="exampleInputFile">
                     </div>
                    </div>
					  
					  <div class="form-group">
					  
                        <div class="col-sm-offset-3 col-sm-15">
                          <button type="submit" class="btn btn-success">Submit</button>
						  <button type="submit" class="btn btn-danger">Reset</button>
                        </div>

                      </div>
					 </form>
                  </div><!-- /.tab-pane -->
				  <div class="tab-pane" id="other">
                   <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Catagory</label>
                        <div class="col-sm-10">
                         
						  <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Date </label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
					
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Amount</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">currency</label>
                        <div class="col-sm-10">
                         
						  <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        
                      </select>
                        </div>
                      </div>
					   <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                      <input type="file" id="exampleInputFile">
                     </div>
                    </div>
					  
					  <div class="form-group">
					  
                        <div class="col-sm-offset-3 col-sm-15">
                          <button type="submit" class="btn btn-success">Submit</button>
						  <button type="submit" class="btn btn-danger">Reset</button>
                        </div>

                      </div>
					 </form>
                  </div><!-- /.tab-pane -->
				  
				  
				  
				  
				  
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
			</div>					
				
				
				

			
		
				
				
				
				
				
                    
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<div id="result" class="btn btn-success" style="width:15%;height:auto; position:absolute; top:55%; left:65%;display:none; z-index:7;">
	<label>Record updated successfully...</label>
</div>
   </div>
                <!-- /.row -->
                 <div class="row" style="border-radius:25px;">
                    <div class="col-xs-10 form-group-sm " style="border-radius:25px;">
                        <div style="border-radius:25px;">
                            <table class="table  table-bordered table-curved " style="margin-left:10%;margin-top:-40px"; cellpadding="1" cellspacing="0"   >
									<thead>
									<tr style="height:40px; width:"50px"  >
										<td class="tabheadf" style="border-radius:20px 0px 0px 0px; font-size:16px; "><a style="color:white; text-decoration:none;"  href="UserProfile.php" data-toggle="tooltip" data-placement="right" title="View all expense">CATEGORY</a></td>    
										<td class="tabheadf" style="font-size:16px;">DESCRIPTION</td>
										<td class="tabheadf" style="font-size:16px;"><a style="color:white; text-decoration:none;"  href="UserProfile.php?&C=ClaimDate&ord=1" data-toggle="tooltip" data-placement="right" title="Sort expenses by date">DATE</a></td>		
										<td class="tabheadf" style="font-size:16px;"><a style="color:white; text-decoration:none;" data-toggle="tooltip" data-placement="left" title="Sort expenses by Amount" href="UserProfile.php?&C=ClaimAmt&ord=1">&nbsp&nbsp&nbspAMOUNT&nbsp;&nbsp&nbsp</a></td>
										<td class="tabheadf" style="font-size:16px;">RECEIPT</td>			
										<td class="tabheadf" style="font-size:16px;">ACTION</td>      
									</tr>
									</thead>
<?php
include('dbcon.php');


 /* <input type='submit' class='btn btn-success' value='Upload File' name='rsuploadimg22' />
	   <input type='submit' class='btn btn-danger' value='Remove' name='removersrecpt22' />
	   <input type='file' name='file22' size='50' />
<input type='hidden' name='hiddenid22' value='$idno'>  */



  if(isset($_GET['removersrecpt1']))
  {
	 $getinmage=$_GET['hiddenimage'];
			$folder = "uploads/";
		unlink($folder.$getinmage);					   
	  $resettt='';
	  $getiddd=$_GET['hiddenid1'];
	  echo "$getiddd";
	  	   $sql = "UPDATE tbluserexpenses 
        SET ClaimReceipt=?	WHERE ClaimRowid=?";
$stmt = $dbh->prepare($sql);
$stmt->execute(array($resettt,$getiddd)); 
echo "<script>
alert('Removed Successfully');
window.location.href='UserProfile.php';
</script>";  
  }

  if(isset($_GET['removiimg']))
  {
	 $idofimageempt1=$_GET['removiimg'];
$result11="SELECT * FROM tbluserexpenses WHERE ClaimRowid=?";
					$stmt = $dbh->prepare($result11);
	$stmt->execute(array($idofimageempt1)); 
	while($row11 =$stmt->fetch())
	{
		
		$reciept=$row11['ClaimReceipt'];
		
		
		
	}		

$folder = "uploads/";
		unlink($folder.$reciept);
		$ClaimReceipt11='';
				$sql11 = "UPDATE tbluserexpenses 
			SET ClaimReceipt=?	WHERE ClaimRowid=?";
	$stmt = $dbh->prepare($sql11);
	$stmt->execute(array($ClaimReceipt11,$idofimageempt1)); 
				echo "<script>
	window.location.href='UserProfile.php';
	</script>"; 
  }






if (isset($_REQUEST['ClaimDate'])) 
{
	$ClaimDt = $_REQUEST['ClaimDate'];
	list($dd,$mm,$yyyy)=explode("/",$ClaimDt);
if(is_numeric($yyyy) && is_numeric($mm) && is_numeric($dd)) 
{
    $ClaimDate = $ClaimDt;
	
	$ExCategory = $_REQUEST['ExCategory'];
	$ClmAmt = $_REQUEST['ClaimAmt'];
	
	$countDot = substr_count($ClmAmt,".");
	list($rs,$ps) = explode('.',$ClmAmt);
	if(is_numeric($rs))
	{
		if($ps != null && is_numeric($ps) && $countDot == 1)
		{
			$dot = substr($ps,0,2);
			$ClaimAmt = $rs.".".$dot;
			
			$Curr = $_REQUEST['Curr'];
			if(isset($_REQUEST['Descr']))
			{
				$ClaimClass = stripslashes($_REQUEST['Descr']);
			}
		        else if(isset($_POST['hotelnm']) && isset($_POST['hotellocation']))
		        {
		                $ClaimClass = $_POST['hotelnm'].", ".$_POST['hotellocation'];
		        }
			else
			{
				$ClaimClass = '';
			}
		}
		else if(($ps == null || $ps == '') && $countDot == 0)
		{
			$ClaimAmt = $rs;
			$Curr = $_REQUEST['Curr'];
			if(isset($_REQUEST['Descr']))
			{
				$ClaimClass = stripslashes($_REQUEST['Descr']);
			}
		        else if(isset($_POST['hotelnm']) && isset($_POST['hotellocation']))
		        {
		                $ClaimClass = $_POST['hotelnm'].", ".$_POST['hotellocation'];
		        }
			else
			{
				$ClaimClass = '';
			}
		}
		else
		{
			echo "<Script>alert('Invalid Amount!');</script>";
		}
	}
	else
	{
		echo "<Script>alert('Invalid Amount!');</script>";
	}
}
else
{
	echo "<Script>alert('Invalid Date format!');</script>";
}
 
}
/* After add button clicked */	
if (isset($_POST['Add'])) 
{
		if (isset($_FILES['ClaimReceipt']))
		{
			$varCount = rand();
			$Receipt = $_FILES['ClaimReceipt'];
			$file_type= $_FILES['ClaimReceipt']['type'];			
			$file_path=$_FILES["ClaimReceipt"]["tmp_name"];

                        if($file_type == "image/jpeg")
                        {
                         $f_type = "jpeg";
                        }
                        else if($file_type == "image/png")
                        {
                          $f_type = "png";
                        }
                        else if($file_type == "image/jpg")
                        {
                          $f_type = "jpg";
                        }

			$file_name = $UserID."_".$varCount.".".$f_type;			
			if($file_type!= '' && ($file_type="image/jpeg" || $file_type="image/png" || $file_type="image/jpg"))
			{
				move_uploaded_file($file_path,"uploads/".$file_name);
				$ClaimReceipt = $file_name;
				$warning = '';
			}
			else
			{
				//echo $warning = "Please check format '.jpeg or .png' for attachments and its size < 500 kb";
			}
		}
		Else
		{   
			$ClaimReceipt = '';					
		}
                
                if($Curr != '')
                {
		   $stmt = $dbh->prepare("CALL sp_AddExpensesEntry(?,?,?,?,?,?,?)");	
		   $stmt ->execute(array($User,$ExCategory,$ClaimDate,$ClaimAmt,$ClaimClass,$ClaimReceipt,$Curr));
		   $dbh->connection = null;
                }
		$_POST = null;
		$_REQUEST = null;
		
}
 // Add button code
 
If(isset($_REQUEST['Delete'])) //delete a row
{
	$A = $_REQUEST['Delete'];
	$stmt = $dbh->prepare("CALL sp_DelAttachment(?,?)");
	$stmt->execute(array($User,$A));
	while($row = $stmt->fetch())
	{
		$folder = "uploads/";
		unlink($folder.$row[0]);
	}
	$stmt = $dbh->prepare("CALL sp_DelRow(?,?)");
	$stmt->execute(array($User,$A));
	$dbh->connection = null;
	$_POST = null;
	$_REQUEST = null;
}
if(isset($_REQUEST['DelAll'])) // delete all entries of user manually
{	
	$Del = $_REQUEST['DelAll'];
	$R = 0;
	$stmt = $dbh->prepare("CALL sp_DelAttachment(?,?)");
	$stmt->execute(array($User,$R));
	while($row = $stmt->fetch())
	{
		$folder = "uploads/";
		unlink($folder.$row[0]);
	}
	$rownum = 0;
	$stmt = $dbh->prepare("CALL sp_DelRow(?,?)");
	$stmt->execute(array($User,$rownum));

$dbh->connection = null;
unset($_REQUEST['DelAll']);
}

if(isset($_REQUEST['Update'])) // Update entries of user manually
{
	 $class = stripslashes($_REQUEST['ECClass']);
	 $Amount = $_REQUEST['ECAmt'];
	 $dated = $_REQUEST['ECDate'];
	list($dd,$mm,$yyyy)=explode("/",$dated);
	if ((is_numeric($yyyy)) && (is_numeric($mm)) && (is_numeric($dd))) 
	{
	     list($rs,$ps)=explode(".",$Amount);
	     
	     $countDot = substr_count($Amount,".");
	     if(is_numeric($rs))
	     {
		
		
		if($ps != null && is_numeric($ps) && $countDot == 1)
		{
			$dot = substr($ps,0,2);
			$Amt = $rs.".".$dot;
			$U = $_REQUEST['Update'];
		}
		else if(($ps == null || $ps == '') && $countDot == 0)
		{
			$Amt = $rs;
			$U = $_REQUEST['Update'];
		}
		else
		{
			echo "<Script>alert('Invalid Amount!');</script>";
		}
		try
		{
		$stmt = $dbh->prepare("CALL sp_UpdateRow(?,?,?,?,?)");
		$stmt->execute(array($User,$class,$dated,$Amt,$U));
		$dbh->connection = null;
		//echo "updated";
		echo "<script>
			setTimeout(function() {
			document.getElementById('result').style.display = 'block';
			setTimeout(function() {
			           $('#result').show();
			           $('#result').fadeOut('slow');
			    },2000);
			});
			</script>";
		}
		catch(PDOException $ex)
		{
			$ex->getMessage();
		}
    }
    else
    {
        echo "<Script>alert('Invalid Amount!');</script>";
    }
}
else
{
echo "<Script>alert('Invalid date format!');</script>";
}
}
IF(isset($_REQUEST['C']))
{
	$C = $_REQUEST['C'];
}
else
{
	$C = "";
}
$stmt1 = $dbh->prepare("CALL sp_CategorySort(?,?)");
$stmt1->execute(array($User,$C));
$i = 0;
try
{
while ($row1 = $stmt1->fetch()) 
{
?>	
<tr class=m>
										<form action="" method="POST" name="Update" role="form">
												<td class=tabval title="Sort by Category">
													<a href=UserProfile.php?&C=<?php echo $row1[0];?>><Label style="color:black; cursor:hand; font-weight:Bold; text-decoration: none; text-align:center; border:0; background: transparent;" name="ECcategory"><strong><strong><?php echo $row1[0]; ?></strong></strong></label></a>
												</td>
												<td class=tabval>
													<textarea class="form-control" style="-moz-text-align-last: font-weight:bold; center; text-align-last: center; border:0; background: transparent;" maxlength="100" rows=1 cols="25" name="ECClass"><?php echo $row1[3]; ?></textarea>
												</td>
												<td class=tabval align=center>
													<input type="text" size="9" style="text-align:center; border:0; background: transparent;" name="ECDate" value="<?php echo $row1[1]; ?>">
												</td>
												<td class=tabval style="font-weight:bold; font-size:16px; font-family:callibri;">
													INR<input type="text" maxlength="10" id="amount" size="4" style="text-align:center; border:0; background: transparent;" name="ECAmt" value="<?php echo $row1[2]; ?>">
												</td>
												<td class=tabval>
												<?php
												if($row1[5] != '')
												{
												
												//<center><a href="" data-toggle="modal" data-target=".bs-example-modal-lg"><img src=images/Attach-icon.png width="25px" height="22px" ></a></center>
																		
																		$idddd=$row1[4];
													 echo "<center><a href='' data-toggle='modal' role='button' data-target='#exceed$idddd' ><img src=images/Attach-icon.png width=15px height=12px /></a></center>";
												 echo"  <div id='modals'>
		  <div class='modal fade' id='exceed$idddd' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header' >
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title' id='myModalLabel' >Image<h4>
      </div>
      <div class='modal-body'>
	  <img src='uploads/$row1[5]' class='img-responsive'><br />
    
<input type='hidden' name='hiddenid11' value='$idddd'> 
<br />
  
      </div>
      <div class='modal-footer'>
       <a href='popupfile.php?idd=$idddd' class='btn btn-success' >Change Receipt</a>
 <input type='hidden' name='hiddenimage11' value='$row1[5]'> 
	   <input type='hidden' name='hiddenidrs11' value='$idddd'> 
	   
         <a href='UserProfile.php?removiimg=$idddd' class='btn btn-danger' >Remove</a>
		 </div>
    </div>
  </div>
</div>";
						
													
												}
												else{
													$idempty=$row1[4];
													 echo "<center><a href='popupfile.php?idd=$idempty' style='color:black;text-decoration:none;'>Add Receipt</a></center>";
												
											


											}
												?>
												</td>
												<td class=tabval align=center>
												<a class=red href="UserProfile.php?&Delete=<?php echo $row1[4];?>" style="font-size:12; text-:none;" onclick="confirm('Are you sure you want to delete this record?')" data-toggle="tooltip" data-placement="right" title="Delete this expense"> DELETE </a>
												<input type=hidden value="<?php echo $row1[4]; ?>" name="Update">
												<input type=submit value=SAVE style="width:45px;height:18px; font-size:12; background-color:white; cursor:hand;" data-toggle="tooltip" data-placement="right" title="Update this expense">
												</td>
<!-- Modal -->

										</form>
									</tr>
<?php
}
}
catch(PDOException $ex)
{
   //echo "No records available";
}

$stmt1 = $dbh->prepare("CALL sp_SumOfCategory(?,?)");
$stmt1->execute(array($User,$C));
$result1 = $stmt1->fetchColumn();
if($result1 != '')
{
list($rup,$ps)=explode(".",$result1 );
$paise = substr($ps,0,2);
$InrAmt = $rup.".".$paise;
?>

									<tr valign=bottom style="height:40px;">
										<td colspan="8" align="right"  style=" border-bottom-style:double;  border-left-style:double;  border-right-style:double; height:25px; background: #2e4d8a; background: -moz-linear-gradient(top,  #2e4d8a 0%, #999999 100%);
											 background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#2e4d8a), color-stop(100%,#999999));  background: -webkit-linear-gradient(top,  #2e4d8a 0%,#999999 100%);
											 background: -o-linear-gradient(top,   #2e4d8a 0%,#999999 100%); background: -ms-linear-gradient(top,   #2e4d8a 0%,#999999 100%);background: linear-gradient(top,  #2e4d8a 0%,#999999 100%);" >
												<table width=100% border=0  >
													<tr>
														<td width=10%></td>
														<td align=right  width=9% style="color:white;"><strong>Total:</td>
														<td bgcolor="white" width=5% height=10% style="text-align:center; font-family:callibri; font-weight:bold; font-size:16px; color:black;"><strong><?php echo "INR ".$InrAmt; ?></strong></td>
														<td width=10% >&nbsp;</td>
												 </tr>
											</table>
										</td>
									</tr>

<?php 
}
$dbh->connection = null;
include('dbcon.php');
IF(isset($_REQUEST['C']))
{
	$C = $_REQUEST['C'];
}
else
{
	$C = '';
}

$stmt = $dbh->prepare("CALL sp_DCategorySort(?,?)");
$stmt->execute(array($User,$C));
$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>		
									<tr class=m>
										<form action="" method="GET" name="Update" role="form" enctype="multipart/form-data">
												<td class=tabval title="Sort by Category">
													<a href=UserProfile.php?&C=<?php echo $row[0];?>><Label style="color:black; cursor:hand; font-weight:Bold; text-decoration: none; text-align:center; border:0; background: transparent;" name="ECcategory"><strong><strong><?php echo $row[0]; ?></strong></strong></label></a>
												</td>
												<td class=tabval>
													<textarea class="form-control" style="-moz-text-align-last: font-weight:bold; center; text-align-last: center; border:0; background: transparent;" maxlength="100" rows=1 cols="25" name="ECClass"><?php echo $row[3]; ?></textarea>
												</td>
												<td class=tabval align=center>
													<input type="text" size="9" style="text-align:center; border:0; background: transparent;" name="ECDate" value="<?php echo $row[1]; ?>">
												</td>
												<td class=tabval style="font-weight:bold; font-size:16px; font-family:callibri;">
													US$<input type="text"  size="4" style="text-align:center; border:0; background: transparent;" name="ECAmt" value="<?php echo $row[2]; ?>">
												</td>
												<td class=tabval>
												<?php
												if($row[5] != '')
												{
												
												//<center><a href="" data-toggle="modal" data-target=".bs-example-modal-lg"><img src=images/Attach-icon.png width="25px" height="22px" ></a></center>
																		
																		$iddddd=$row[4];
													 echo "<center><a href='' data-toggle='modal' role='button'  data-target='#exceed$iddddd' ><img src=images/Attach-icon.png width=15px height=12px /></a></center>";
												 echo"  <div id='modals'>
		  <div class='modal fade' id='exceed$iddddd' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header' >
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title' id='myModalLabel' >Image<h4>
      </div>
      <div class='modal-body'>
	  <img src='uploads/$row[5]' class='img-responsive'><br />
      

<input type='hidden' name='hiddenid1' value='$iddddd'> 
<br />
  
      </div>
      <div class='modal-footer'>
       <a href='popupfile.php?idd=$iddddd' class='btn btn-success'>Change Receipt</a>
 <input type='hidden' name='hiddenimage' value='$row[5]'> 
	   <input type='hidden' name='hiddenidrs1' value='$iddddd'> 
	   <input type='submit' class='btn btn-danger' value='Remove' name='removersrecpt1' />
         </div>
    </div>
  </div>
</div>";
						
													
												}
												else{
													$idempty=$row[4];
													
													 echo "<center><a href='popupfile.php?idd=$idempty' style='color:black;text-decoration:none;'>Add Receipt</a></center>";
												
		  
									}
												?>
												</td>
												<td class=tabval align=center>
												<a class=red href="UserProfile.php?&Delete=<?php echo $row[4];?>" style="font-size:12; text-:none;" onclick="confirm('Are you sure you want to delete this record?')" data-toggle="tooltip" data-placement="right" title="Delete this expense"> DELETE </a>
												<input type=hidden value="<?php echo $row[4]; ?>" name="Update">
												<input type=submit value=SAVE style="width:45px;height:18px; font-size:12; background-color:white; cursor:hand;" data-toggle="tooltip" data-placement="right" title="Update this expense">
												</td>
<!-- Modal -->

										</form>
									</tr>
									<?php
									}
									}
									catch(PDOException $ex)
									{
									   //echo "No records available";
									}
									$stmt = $dbh->prepare("CALL sp_DSumOfCategory(?,?)");
									$stmt->execute(array($User,$C));
									$rowcount = $stmt->fetchColumn();
									if($rowcount != '')
									{
										list($rup,$ps)=explode(".",$rowcount );
										$paise = substr($ps,0,2);
										$InrAmt = $rup.".".$paise;
									?>
										<tr valign=bottom  style="height:40px;">
											<td  colspan="8" align="right"  style=" border-bottom-style:double;  border-left-style:double;  border-top-style:double;border-radius:0px 0px 20px 0px; height:35px; background: #2e4d8a; background: -moz-linear-gradient(top,  #2e4d8a 0%, #999999 100%);
												 background: -webkit-gradienlot(linear, left top, left bottom, color-stop(0%,#2e4d8a), color-stop(100%,#999999));  background: -webkit-linear-gradient(top,  #2e4d8a 0%,#999999 100%);
												 background: -o-linear-gradient(top,   #2e4d8a 0%,#999999 100%); background: -ms-linear-gradient(top,   #2e4d8a 0%,#999999 100%);background: linear-gradient(top,  #2e4d8a 0%,#999999 100%);" >

														<table width=100% border=0 >
															<tr >
																<td width=10%></td>
																<td align=right  width=9% style="color:white;margin-left:40px;"><strong>Total:</td>
																<td bgcolor="white" width=5% height=10% style="text-align:center; font-family:callibri; font-weight:bold; font-size:16px; color:black; "><strong><strong><?php echo "$ ".$rowcount; ?></strong></td>
																<td width=10% >&nbsp;</td>
															 </tr>
														</table>
											</td>
										</tr>
										</tbody>
							</table>
		</div>
<!-- Modal -->
   <?php 
}
else
{
	echo "</table>
	</div>";
}
$dbh->connection = null; ?>
						<!--div style="cursor:pointer; margin-top:10; left:90px; position:relative; z-index:11; margin-left:-90px;">
							<br><br>
								<a href=""><img style="width: 30px; height: 30px;" title="Follow us on Twitter" src="images/Twitter_logo2.png"></a>	<a href=""><img style="width: 30px; height: 30px;" title="Share Youtube video" src="images/YouTube-icon2.png"></a>
								<a href=""><img style="width: 30px; height: 30px;" title="Follow us on G+" src="images/g+2.png"></a>
							<br><br>
						</div>
						
</div>
<div id="foot" style="position:fixed; z-index:100; bottom:2; height:50px; width:100%;">
<div class="fb-like" style="position:Fixed;bottom:55px; left:20; z-index:10" data-href="https://www.facebook.com/pages/9-Softplanet-Software-Developers/318139231592495?ref=hl" data-width="50" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true"></div>					
</div-->

 <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
<script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/flot-data.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
  
  <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


 <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
  
  
</body>

</html>