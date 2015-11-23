
<?php
error_reporting(0);
session_start();

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
	if(isset($_REQUEST['Update']))
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
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src="new_login_signup.js"></script>
    <title>Change Password</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
/*function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
document.getElementById("currentPassword").innerHTML = "Current password shouldn't be empty";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = "New password shouldn't be empty";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = "Confirm password shouldn't be empty";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = "Password String Mismatch";
output = false;
}
//return output;
}*/
</script>
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
<img class=" navbar-left" height="50"  style="margin-left:20px; "  src="images/Logo3.png" alt="">          		                         
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
              <!-- Messages: style can be found in dropdown.less-->
            

              <!-- Notifications Menu -->
           
              <!-- Tasks Menu -->
            
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
<img src="dist/img/default.png" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $_SESSION['pname'] ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
<img src="dist/img/default.png" class="img-circle" alt="User Image">
                    <p>
<?php echo $_SESSION['pname'] ?>
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
              <p><?php echo $_SESSION['pname'] ?></p>
              <!-- Status -->
              
            </div>
          </div>

          <!-- search form (Optional) -->
         

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
           
            <!-- Optionally, you can add icons to the links -->
			<li><a href="UserProfile.php"><i class="fa fa-edit"></i> <span>Create Reports</span></a></li>
            <li><a href="ViewReports.php"><i class="fa fa-files-o"></i> <span>Saved Documents</span></a></li>
            <li><a href=""><i class="fa fa-trash o"></i> <span>Delete all</span></a></li>
			 <li><a href="Get PDF Download.php"><i class="fa fa-file-o"></i> <span>Reports</span></a></li>
			  <li><a href="GetReceiptsDownloads.php"><i class="fa fa-file-text-o"></i> <span>Receipts</span></a></li>
			   <li><a href="MailMe.php"><i class="fa fa-envelope"></i> <span>Send Mail</span></a></li>
			   
            <li class="treeview">
              <a href="#"><i class="fa fa-cogs"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
               <li><a href="UpdateProfile.php"><i class="fa fa-picture-o"></i> Update your Profile</a></li>
                <li class="active"><a href="pass.php"><i class="fa fa-unlock"></i>Change Password</a></li>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Settings
           
          </h1>
         
        </section>

        <!-- Main content -->
 <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Update Password</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
				
				
				
				
<form method="post" action="" name="frmChange" class="form"  onSubmit="return validatePassword()">
                
                  <div class="box-body">
				  
				                    <input name="currentPassword" type="password" class="form-control" placeholder="Old Password" required>
							<span id="currentPassword" class="required"></span><BR>
					   <input type="password" name="newPassword" class="form-control" placeholder="Enter New Password" required>
					   <span id="newPassword" class="required"></span>
					   <br>
					<input type="password" name="confirmPassword" class="form-control" placeholder="Re-Enter New Password" required>
					<span id="cofirmPassword" class="required"></span><br>
                  </div><!-- /.box-body -->

                                   <div class="box-footer">
                    <input type="submit" onclick="autoRefresh()" name="Update" value="Update" class="btn btn-primary" > 
                  </div>
                </form>
              </div>
			  <!-- /.box -->

              <!-- Form Element sizes -->
             

            

           

            </div><!--/.col (left) -->
            <!-- right column -->
           
              <!-- general form elements disabled -->
              
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
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
