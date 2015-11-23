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

<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini" oncontextmenu="return false;" style="font-family:Segoe UI;font-size:12;">
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
<img src="dist/img/default.png" class="user-image" alt="User Image"><?php echo substr($_SESSION['pname'],9); ?>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"></span>
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
              <p>                     <?php echo substr($_SESSION['pname'],9) ?></p>
              <!-- Status -->
             
            </div>
          </div>

          <!-- search form (Optional) -->

          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            
            <!-- Optionally, you can add icons to the links -->
			<li><a href="UserProfile.php"><i class="fa fa-edit"></i> <span>Create Reports</span></a></li>
                        <li><a href="MailMe.php"><i class="fa fa-envelope"></i> <span>E-Mail Current Report</span></a></li>                        
                        <li class="active"><a href="ViewReports.php"><i class="fa fa-files-o"></i> <span>Saved Reports</span></a></li>
			<li><a href="UpdateProfile.php"><i class="fa fa-cogs"></i> <span>User Profile</span></a></li>
<!--<li><a href="#" data-toggle="modal" data-target="#myModal_editSavedReports"><i class="fa fa-cogs"></i> <span>Edit Saved Reports</span></a></li>
			<li><a href="#" data-toggle="modal" data-target="#myModal_editSavedReports"><i class="fa fa-cogs"></i> <span>Email Saved Reports</span></a></li> -->
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
 <section class="content">
          <div class="row">
            <!-- left column -->
           
            <!-- right column -->
            <div>
              <!-- Horizontal Form -->
              
                <!-- /.box-header -->
                <!-- form start -->
                       <section class="content">
 <div class="row" >
<div class="col-md-5 col-md-offset-10">
					 <form name="delrpt" method="post" action="">
					 <input type="submit" class="btn btn-danger" name="btndel" value="Delete all reports" onclick="return confirm('Are you sure you want to delete all records?');">
					 </form>
</div>
					</div>	
					<?php
include('dbcon.php');
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
}
catch(Exception $e)
{
	$e->getMessage();
}

$dbh->connection = null;
unset($_REQUEST['btndel']);
}
?>
          <div class="row">
            
              <div class="box">
               <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered" style="font-family:Segoe UI;font-size:12;">
                    <tr>
                      <th style="width: 15px;" bgcolor="#D8D8D8">Report Type</th>
                      <th style="width:100px;text-align:center;" bgcolor="#D8D8D8">Report Name</th>
                      <th style="width:20px;text-align:center;" bgcolor="#D8D8D8">Report Date</th>
                      <th style="width: 40px;text-align:center;" bgcolor="#D8D8D8">Report File</th>
                    </tr>
<?php
include('dbcon.php');
if(isset($_REQUEST['key']))
{
	$REQ = $_REQUEST['DelPDF'];
	$stmt=$dbh->prepare("Delete from tblreportstore where ReportID = '$REQ'");
	$stmt->execute();	
	$file = $_REQUEST['f'].".pdf";
	$folder = "PDFDOCS/";
	unlink($folder.$file);
}

$stmt=$dbh->prepare("Select PDFName,PDFDate,ReportID,PDFType,PDFTitle from tblreportstore where UserID = '$UserID' order by ReportID desc");
$stmt->execute();
$count = $stmt->rowCount();
if($count <= 0)
{
?>
	<tr style="width:100%px; text-align:center;">
	<td colspan=4 >No records found...</td>
	</tr>
<?php
}
Else
{
while($row=$stmt->fetch())
{
?>
	<tr>
		<td style="width:10%; text-align:center;"><?php $type = $row[3]; if($type == 'Rpt'){echo "<img src='images/Rpt.png' style='width:35px; height:40px;'>";} else {echo "<img src='images/Rct.png' style='width:35px; height:40px;'>";}?></td>
		<td style="width:35%; text-align:center;"><?php echo $row[4];?></td>
		<td style="width:20%;text-align:center;"><?php echo $row[1];?></td>
		<td style=" width:40%; text-align:center;">
			<a href="PDFDOCS/<?php echo $row[0].".pdf";?>" target="_blank">
				<img title="Click to Download" src="images/pdf.png" width="35px" height="40px"></a>
				<br>
<a   href="#" data-toggle="modal" data-target="#myModal_editSavedReports">Edit</a>/
<a  href="#" data-toggle="modal"  data-target="#myModal_editSavedReports">Email</a>/
				<a href="PDFDOCS/<?php echo $row[0].".pdf";?>" target="_blank"  >Download</a>&nbsp;/<a  href="ViewReports.php?&DelPDF=<?php $r = md5(rand()); echo $row[2]."&key=".$r."&f=".$row[2];?>" onclick="return confirm('Are you sure you want to delete ?')" >Delete</a>&nbsp;
<?php
}
}
$dbh->Connection = Null;
?>
                  </table>
                </div><!-- /.box-body -->
               
              </div><!-- /.box -->

              </div><!-- /.box -->
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
        <strong>Copyright &copy; 2015 <a href="#">Xpensy</a>.</strong> All rights reserved.
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
 <!-- Modal -->
  <div class="modal fade" id="myModal_editSavedReports" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">Upgrade Yourself</h4></center>
        </div>
        <div class="modal-body">
          ExpensesGoblin started @ 2015 with vulcan's burning hatred for generating awful expense reports business and travel expense and can be the hassle for administrator and staff, but with this Application, you will streamline your employee's expense reporting process. With features like flexible expense report ,customization to your corporate travel expense policy.You will save time and money when managing expenses and speed up expense reimbursement for employees.Now,it is simplified to submit expense from any location across the globe.
        </div>
        <div class="modal-footer">
          
  <a href="http://www.expensegoblin.net/version1" class="btn btn-success">Go To ExpenseGoblin</a>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

  </body>
</html>