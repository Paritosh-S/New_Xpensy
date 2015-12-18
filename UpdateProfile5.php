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
	
if(isset($_SESSION['login']))
{
	$User=$_SESSION['login'];
	$UserID = $_SESSION['userid'];
}
else
{
	echo "Session Expired! Login Again.";	
	header("Location: EndSession.php");
}
	
		if(isset($_REQUEST['UpdateProf']))
		{
			$MobileNo = $_POST['mobileno'];
			$EmailID2 = $_POST['emailid'];
	
			if (strlen($_POST["mobileno"])  >= 10)
			{
				try
            {
					$nm = $_POST['Uname'];
					$gender = 'NA';
					$compny = $_POST['company'];
					$brnch = $_POST['branch'];
					$desig = $_POST['designation'];
                        		
					include('dbcon.php');
					$stmt = $dbh->prepare("CALL sp_UpdateUserInfo(?,?,?,?,?)");
					$stmt->execute(array($nm,$User,$gender,$MobileNo,$EmailID2));
					$Flag = $stmt->fetchColumn();
					include('dbcon.php');
					$dbh->connection = NULL;
					$stmt1 = $dbh->prepare("CALL sp_UpdateEmpInfo(?,?,?,?)");
					$stmt1->execute(array($UserID,$compny ,$brnch ,$desig ));
					$Flag1 = $stmt1->fetchColumn();						
					$dbh->connection = NULL;
									
					//if($Flag == '1' && $Flag1 == '1')
					if($Flag == '1' && $Flag1 == '1')
					{
						//$_SESSION['Umessage'] = $flag;
						$message = "<img src='images/Tick.png' width=25px height=18px valign=bottom> Updated successfully";
						$_SESSION['pname'] = 'Welcome! '.$nm;
						//Header('Location: '.$_SERVER['PHP_SELF']);
						
					}
					else
					{
						//$_SESSION['Umessage'] = $flag;
						$message = "<img src='images/x.png' width=25px height=20px valign=bottom> Not updated, try again";
					}
					
			}
			catch(PDOException $ex)
			{
				//echo $ex->getMessage();
			}
			}
			else
			{
               $error_arr['mobileno'] = 'Mobile No must be of 10 digits';
            }			
		}

	if(isset($_REQUEST['UpdatePass']))
	{
		 $UserPass = $_REQUEST['confirmPassword'];
		  $Oldpass = $_POST['currentPassword'];
		 $NewPass = $_POST['newPassword'];
		 $UserPassword = md5(md5($UserPass));
		//$oldpass=$_POST['currentPassword'];

		
		if($_POST['newPassword'] == $_POST['confirmPassword'])
		{
			$Oldpass = md5(md5($Oldpass));
			$NewPass = md5(md5($NewPass));
			try
			{
				include('dbcon.php');
				$stmt = $dbh->prepare("CALL sp_UpdateUserPass(?,?,?)");
				$stmt->execute(array($UserID,$Oldpass,$NewPass));
				$flag = $stmt->fetchColumn();
				$dbh->connection = NULL;
				if($flag == '1')
				{
					//$_SESSION['Umessage'] = $flag;
					$message = "<img src='images/Tick.png' width=25px height=18px valign=bottom> Updated successfully";
				}
				else if($flag == '0')
				{
					//$_SESSION['Umessage'] = $flag;
					$message = "<img src='images/x.png' width=25px height=20px valign=bottom> Please input correct details!";
				}
			}
			catch(PDOException $ex)
			{
				echo $ex->getMessage();
				$_SESSION['Umessage'] = "Not Updated error occured";
				//echo "not Updated error occured";
				$dbh->connection = NULL;
			}
		}
		else
		{
			$message = "<img src='images/x.png' width=25px height=20px valign=bottom> Password string mismatched!";
		}
					//echo "Updated
		
	}	
	
try
{
include('dbcon.php');
$sql = "select u.Name,u.Gender,u.MobileNo,u.EmailID2,e.EmpCompany,e.EmpBranch,e.EmpDesignation
 from tbluserdetails u inner join tblempdetails e on u.UserID = e.UserID where u.UserID = '$UserID'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
while($result = $stmt->fetch())
{
	$name = $result[0];
	//$gen = $result[1];
	$mob = $result[2];
	$email = $result[3];
	$company = $result[4];
	$branch = $result[5];
	$desig = $result[6];
}
}
catch(PDOException $ex)
{
	
}
?>

<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<!--script type="text/javascript">
function autoRefresh()
{
	window.location = window.location.href;

}
</script-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>XPENSY | <?php echo substr($_SESSION['pname'],9); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
<style>


</style>
<script>
		$(document).ready(function()
		{
			$('[data-toggle="tooltip"]').tooltip();   
		});
		</script>
		<script src="new_login_signup.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="hold-transition skin-blue sidebar-mini" style="font-family:Segoe UI;font-size:12;">
  <?php 
try
{
include('dbcon.php');
$sql = "select u.Name,u.Gender,u.MobileNo,u.EmailID2,e.EmpCompany,e.EmpBranch,e.EmpDesignation
 from tbluserdetails u inner join tblempdetails e on u.UserID = e.UserID where u.UserID = '$UserID'";
$stmt = $dbh->prepare($sql);
$stmt->execute();
while($result = $stmt->fetch())
{
	$name = $result[0];
	//$gen = $result[1];
	$mob = $result[2];
	$email = $result[3];
	$company = $result[4];
	$branch = $result[5];
	$desig = $result[6];
}
}
catch(PDOException $ex)
{
	
}
?>
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

       <!-- Logo -->
        <a class="logo" href="http://xpensy.com/UserProfile.php" >
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <img class=" navbar-left" height="41"  style="margin-left:-14px; "   src="img/darkwhite.png" alt="XPENSY">
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="dist/img/default.png" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo substr($_SESSION['pname'],9); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
<img src="dist/img/default.png" class="img-circle" alt="User Image">

                    <p>
<?php echo substr($_SESSION['pname'],9); ?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="UpdateProfile.php" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="EndSession.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
             
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
<img src="dist/img/default.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo substr($_SESSION['pname'],9); ?></p>
              <!-- Status -->
             
            </div>
          </div>

          <!-- search form (Optional) -->
          
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
           
            <!-- Optionally, you can add icons to the links -->
			<li><a href="UserProfile.php"><i class="fa fa-edit"></i> <span>Create Report</span></a></li>
                      
			<li><a href="MailMe.php"><i class="fa fa-envelope"></i> <span>E-Mail Current Report</span></a></li>
                        <li><a href="ViewReports.php"><i class="fa fa-files-o"></i> <span>Saved Reports</span></a></li>
                        <li class="active"><a href="UpdateProfile.php" ><i class="fa fa-cogs"></i> <span>User Profile</span> </a></li>
                     
			 
			   

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">



<!---------------------------------------------------------------------accordion------------------------------------------------------->
<div class="col-md-6 col-md-offset-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Profile Setting</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Edit Profile
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body">
                          <form id="user_details" method="POST" action="" class="form" >
                  <div class="box-body">
				  
				   <div class="form-group">
                       
                      <input type="text" name='Uname' class='form-control'  placeholder='Name' value='<?php echo $name; ?>'>
                    </div>
					<div class="form-group">					                    
                      <input type="text" class="form-control"  name="mobileno"  class='name' placeholder='Mobile No'  value='<?php echo $mob;?>'/>
					  <?php echo $error_arr['mobileno'];?>
                    </div>
					 <div class="form-group">
                      
                      <input type="email" name="emailid" class='form-control' placeholder='Email Id' value='<?php echo $email;?>'>
					  <?php echo $error_arr['emailid'];?>
                    </div>
					
					<!--div class="form-group">
                      
                      <input type="text" class='form-control' name='company' class='name'  placeholder='Company'  value='<?php echo $company; ?>'>
                    </div-->
					
					<!--div class="form-group">
                      
                      <input type="text" class='form-control' name='branch' class='name' placeholder='Branch'  value='<?php echo $branch; ?>'>
                    </div-->
					
					<!--div class="form-group">
                      
                      <input type="text" class='form-control' name='designation' class='name'  placeholder='Designation' value='<?php echo $desig; ?>'>
                    </div-->

                         <div class="form-group">
                    <input type="submit" onclick="autoRefresh()" name="UpdateProf" value="Update" class="btn btn-primary" > 
                  </div>
                   
                  </div><!-- /.box-body -->

                 
				  <?php echo $message; ?>
                </form>
                     </div>
                      </div>
                    </div>
                    <div class="panel box box-success">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Change Password
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="box-body">
 <div class="form-group">
                         <form method="POST" action="" name="frmChange" class="form"  onSubmit="return validatePassword()">
                
                  
				  
				                    <input name="currentPassword" type="password" class="form-control" placeholder="Old Password" required>
							<span id="currentPassword" class="required"></span><BR>
					   <input type="password" name="newPassword" class="form-control" placeholder="Enter New Password" required>

					   <span id="newPassword" class="required"></span>
					   <br>
					<input type="password" name="confirmPassword" class="form-control" placeholder="Re-Enter New Password" required>
					<span id="cofirmPassword" class="required"></span><br>
                  </div><!-- /.box-body -->
<div class="box-footer">
                    <input type="submit" onclick="autoRefresh()" name="UpdatePass" value="Update" class="btn btn-success" > 
					
                 

                </form>
                        </div>
                      </div>
                    </div>
                  <div class="panel box box-danger">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Delete Account
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="box-body">

<div class="form-group">
                   <!-- <a  class="btn btn-Danger type="submit" href="delete_acc.php?UserName=<?php echo $_SESSION['login']?>" onclick="return confirm('Are you sure, delete this records?')"><p class="btn btn-block btn-danger">Delete Account</p></a>
                    <input type="submit" onclick="autoRefresh()" name="" value="Delete Account" class="btn btn-Danger" >--> 
                 

<form name="delrpt" method="post" action="">
					 <input type="submit" class="btn btn-danger " name="btndel" value="Delete all reports" onclick="return confirm('Are you sure you want to delete all records?');">
					 </form>
<?php
include('dbcon.php');

$email = $_SESSION['login'];

if(isset($_REQUEST['btndel']) || isset($_REQUEST['key']))// delete all entries of user manually
{
	if(isset($_REQUEST['btndel']) && $_REQUEST['btndel']!=null)
	{
		$R = 0;
	}
	else if(isset($_REQUEST['key']) || $_REQUEST['key']!=null)
	{
		$R = $_REQUEST['f'];
	}
try
{
        echo $email;
        $ran = rand();
        $stmt5 = "UPDATE tbluserdetails SET ActCode ='$ran' WHERE UserName ='$email' ";      
        $stmt6 = $dbh->prepare("$stmt5");
        $stmt6 -> execute();

	$stmt3 = $dbh->prepare("CALL sp_DelReports(?,?)");
	$stmt3->execute(array($UserID,$R));
	while($row = $stmt3->fetch())
	{
		$folder = "PDFDOCS/";
		unlink($folder.$row[0].".pdf");
	}
	$dbh->connection = null;
	include('dbcon.php');
	$stmt4 = $dbh->prepare("CALL sp_DelSingleReport(?,?)");
	$stmt4->execute(array($UserID,$R));
         $dbh->connection = null;
include('dbcon.php');
       $A = $_REQUEST['Delete'];
	$stmt = $dbh->prepare("CALL sp_DelAttachment(?,?)");
	$stmt->execute(array($User,$R));
	while($row = $stmt->fetch())
	{
		$folder = "uploads/";
		unlink($folder.$row[0]);
	}
	$stmt = $dbh->prepare("CALL sp_DelRow(?,?)");
	$stmt->execute(array($User,$R));
	$dbh->connection = null;
	$_POST = null;
	$_REQUEST = null;




if(session_destroy()) // Destroying All Sessions
{
echo " <script> alert('Account deactivated successfully!! but you can log in again with your Google & Facebook Account !!');
window.location.href='http://xpensy.com/';
</script>";

}


}
catch(Exception $e)
{
	$e->getMessage();
}


}
?>

 </div>
 



                         


                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
<!------------------------------------accordion closed------------------------------>











        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
  ©2015 All rights reserved | <a href="http://xpensy.com/index.php">Xpensy</a>
        </div>
        <!-- Default to the left -->
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
  </body>
</html>