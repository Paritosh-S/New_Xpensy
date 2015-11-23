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

<script>
function SendMail(To,Cc,Subject) 
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      if(xhttp.responseText == "Success")
      {
      document.getElementById('display').innerHTML = "<img src='images/Tick.png' height='15px' width='18px'> Mail sent successfully!";
      setTimeout(function() {
                        //document.getElementById('display').className="btn btn-success"
			document.getElementById('display').style.display = 'block';
			setTimeout(function() {
			           $('#display').show();
			           $('#display').fadeOut('slow');
			    },4000);
			});
       }
       else
       {
         document.getElementById('display').innerHTML = "<img src='images/x.png' height='15px' width='18px'> Mail not sent!";
         setTimeout(function() {
                        //document.getElementById('display').className="btn btn-danger"
			document.getElementById('display').style.display = 'block';
			setTimeout(function() {
			           $('#display').show();
			           $('#display').fadeOut('slow');
			    },4000);
			});
       }
    }
  }
  xhttp.open("POST", "stack_email.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("MailTo="+To+"&MailCC="+Cc+"&MailSubject="+Subject);
}
</script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini" oncontextmenu="return false;" style="font-family:Segoe UI; font-size:12;">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          
          <!-- logo for regular state and mobile devices -->
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
                  <span class="hidden-xs"><?php echo substr($_SESSION['pname'],9); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
              <img src="dist/img/default.png" class="img-circle" alt="User Image">
                    <p><?php echo substr($_SESSION['pname'],9); ?>
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
            <div class="pull-left info"><br>
             <?php echo substr($_SESSION['pname'],9); ?>
              <!-- Status -->
            
            </div>
          </div>

          <!-- search form (Optional) -->

          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
           
            <!-- Optionally, you can add icons to the links -->
			<li><a href="UserProfile.php"><i class="fa fa-edit"></i> <span>Create Reports</span></a></li>
                        <!--<li><a href="GetReceiptsDownloads.php"><i class="fa fa-file-text-o"></i> <span>Generate PDF Receipts</span></a></li>-->
                        <!--li><a href="Get PDF Download.php"><i class="fa fa-file-o"></i> <span>Generate PDF Report</span></a></li-->
                        <li class="active"><a href="MailMe.php"><i class="fa fa-envelope"></i> <span>E-Mail Current Report</span></a></li>
                        <li><a href="ViewReports.php"><i class="fa fa-files-o"></i> <span>Saved Reports</span></a></li>
                        <li><a href="UpdateProfile.php"><i class="fa fa-cogs"></i> <span>User Profile</span></a></li>
                        <!--<li><a href=""><i class="fa fa-trash o"></i> <span>Delete all</span></a></li>-->
			   
           
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
            Send Mail
           
          </h1>
          
        </section>

        <!-- Main content -->
 <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-5">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Recipient</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <div class="form-group">
					
                      <label for="exampleInputEmail1"></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="MailTo" style="font-family:Segoe UI; font-size:12;" placeholder="Email To:" required>
                    </div>
	           <div class="form-group">
					
                      <label for="exampleInputEmail1"></label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="MailCC" style="font-family:Segoe UI; font-size:12;" placeholder="Email cc:">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1"></label>
                      <input type="text" class="form-control" id="exampleInputPassword1"name="MailSubject" style="font-family:Segoe UI; font-size:12;" placeholder="Subject:" required>
                    </div>
                    <div class="form-group">
                     <p id='display' style="display:none;"></p>
                    </div>
                  </div><!-- /.box-body -->
                  
                  <div class="box-footer">
                    <button type="button" onclick="SendMail(MailTo.value,MailCC.value,MailSubject.value)" style="font-family:Segoe UI; font-size:12;" class="btn btn-primary" name="BtnMail">Send</button>
                  </div>
                </form>
              </div><!-- /.box -->

              <!-- Form Element sizes -->
             

            

          

            </div><!--/.col (left) -->
            <!-- right column -->
           
              <!-- Horizontal Form -->
              
                <!-- /.box-header -->
                <!-- form start -->
                      
          
            <div class="col-md-7">
               <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Expense</h3>
                </div><!-- /.box-header -->
               <!-- /.box-header -->
			   
                <div class="box-body"> 
				<div class="table-responsive">
                  <table class="table table-bordered" style="font-family:Segoe UI; font-size:12;">
                    <tr bgcolor="#3870a8" style="color:white;">
					
                      <th width="2%" bgcolor="#3c8dbc" >Category</th>
                      <th width="43%" style="text-align:center;" bgcolor="#3c8dbc">Description</th>
                      <th width="25%" style="text-align:center;" bgcolor="#3c8dbc">Date</th>
                      <th  style="text-align:center;width: 40px" bgcolor="#3c8dbc">Amount</th>
                    </tr>
                  














<!-- Table for rs transportation -->
				   
<?php
$dbh->connection = null;
include('dbcon.php');
$C="";
$stmt1 = $dbh->prepare("CALL sp_CategorySort_transportation(?,?)");
$stmt1->execute(array($User,$C));
$i = 0;
try
{
while ($row1 = $stmt1->fetch()) 
{
?>

<tr class=m>
	<td>
		<?php echo $row1[0]; ?>
	</td>
	<td>
 <textarea readonly name="Descr" class="form-control" rows="1" cols="25" placeholder="Description" maxlength="100" style="resize:vertical; background: transparent; font-size:12;">
		<?php echo $row1[3]; ?></textarea>
	</td>
	<td>
		<center><?php echo $row1[1]; ?></center>
	</td>
	<td>
		<center><?php echo "₹ ".$row1[2]; ?></center>
	</td>
</tr>

<?php
}

}
catch(PDOException $ex)
{
   //echo "No records available";
}

$stmt1 = $dbh->prepare("CALL sp_SumOfCategory_transportation(?,?)");
$stmt1->execute(array($User,$C));
$result1 = $stmt1->fetchColumn();
if($result1 != '')
{
?>
<tr valign=bottom>
	<td bgcolor="#D8D8D8" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:double; height:35px;" >
		<table width=100% border=0>
			<tr>
				<td width=15%></td>
				<td align=right  width=20% style="color:white;" ><strong>Total:&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td bgcolor="white" width=10% style="text-align:center;"><strong><?php echo "₹ ".$result1; ?></strong></td>
                                <td width=1%></td>
			 </tr>
		</table>
	</td>
</tr>






<!-- Table for meal-->
				   
<?php
}
$dbh->connection = null;
include('dbcon.php');
$C="";
$stmt1 = $dbh->prepare("CALL sp_CategorySort_meal(?,?)");
$stmt1->execute(array($User,$C));
$i = 0;
try
{
while ($row1 = $stmt1->fetch()) 
{
?>

<tr class=m>
	<td>
		<?php echo $row1[0]; ?>
	</td>
	<td>
 <textarea readonly name="Descr" class="form-control" rows="1" cols="25" placeholder="Description" maxlength="100" style="resize:vertical; background: transparent; font-size:12;">
		<?php echo $row1[3]; ?></textarea>
	</td>
	<td>
		<center><?php echo $row1[1]; ?></center>
	</td>
	<td>
		<center><?php echo "₹ ".$row1[2]; ?></center>
	</td>
</tr>

<?php
}

}
catch(PDOException $ex)
{
   //echo "No records available";
}

$stmt1 = $dbh->prepare("CALL sp_SumOfCategory_meal(?,?)");
$stmt1->execute(array($User,$C));
$result1 = $stmt1->fetchColumn();
if($result1 != '')
{
?>
<tr valign=bottom>
	<td bgcolor="#D8D8D8" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:double; height:35px;" >
		<table width=100% border=0>
			<tr>
				<td width=15%></td>
				<td align=right  width=20% style="color:white;" ><strong>Total:&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td bgcolor="white" width=10% style="text-align:center;"><strong><?php echo "₹ ".$result1; ?></strong></td>
                                <td width=1%></td>
			 </tr>
		</table>
	</td>
</tr>


 





<!-- Table for lodging-->
				   
<?php
}
$dbh->connection = null;
include('dbcon.php');
$C="";
$stmt1 = $dbh->prepare("CALL sp_CategorySort_lodging(?,?)");
$stmt1->execute(array($User,$C));
$i = 0;
try
{
while ($row1 = $stmt1->fetch()) 
{
?>

<tr class=m>
	<td>
		<?php echo $row1[0]; ?>
	</td>
	<td>
 <textarea readonly name="Descr" class="form-control" rows="1" cols="25" placeholder="Description" maxlength="100" style="resize:vertical; background: transparent; font-size:12;">
		<?php echo $row1[3]; ?></textarea>
	</td>
	<td>
		<center><?php echo $row1[1]; ?></center>
	</td>
	<td>
		<center><?php echo "₹ ".$row1[2]; ?></center>
	</td>
</tr>

<?php
}

}
catch(PDOException $ex)
{
   //echo "No records available";
}

$stmt1 = $dbh->prepare("CALL sp_SumOfCategory_lodging(?,?)");
$stmt1->execute(array($User,$C));
$result1 = $stmt1->fetchColumn();
if($result1 != '')
{
?>
<tr valign=bottom>
	<td bgcolor="#D8D8D8" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:double; height:35px;" >
		<table width=100% border=0>
			<tr>
				<td width=15%></td>
				<td align=right  width=20% style="color:white;" ><strong>Total:&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td bgcolor="white" width=10% style="text-align:center;"><strong><?php echo "₹ ".$result1; ?></strong></td>
                                <td width=1%></td>
			 </tr>
		</table>
	</td>
</tr>

 


<!-- Table for other-->
				   
<?php
}
$dbh->connection = null;
include('dbcon.php');
$C="";
$stmt1 = $dbh->prepare("CALL sp_CategorySort_other(?,?)");
$stmt1->execute(array($User,$C));
$i = 0;
try
{
while ($row1 = $stmt1->fetch()) 
{
?>

<tr class=m>
	<td>
		<?php echo $row1[0]; ?>
	</td>
	<td>
 <textarea readonly name="Descr" class="form-control" rows="1" cols="25" placeholder="Description" maxlength="100" style="resize:vertical; background: transparent; font-size:12;">
		<?php echo $row1[3]; ?></textarea>
	</td>
	<td>
		<center><?php echo $row1[1]; ?></center>
	</td>
	<td>
		<center><?php echo "₹ ".$row1[2]; ?></center>
	</td>
</tr>

<?php
}

}
catch(PDOException $ex)
{
   //echo "No records available";
}

$stmt1 = $dbh->prepare("CALL sp_SumOfCategory_other(?,?)");
$stmt1->execute(array($User,$C));
$result1 = $stmt1->fetchColumn();
if($result1 != '')
{
?>
<tr valign=bottom>
	<td bgcolor="#D8D8D8" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:double; height:35px;" >
		<table width=100% border=0>
			<tr>
				<td width=15%></td>
				<td align=right  width=20% style="color:white;" ><strong>Total:&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td bgcolor="white" width=10% style="text-align:center;"><strong><?php echo "₹ ".$result1; ?></strong></td>
                                <td width=1%></td>
			 </tr>
		</table>
	</td>
</tr>


// tables for total rs
<?php 
}
$dbh->connection = null;
include('dbcon.php');
$C="";
$stmt = $dbh->prepare("CALL sp_CategorySort(?,?)");
$stmt->execute(array($User,$C));
$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>	
<!--<tr class=m>
	<td>
		<?php echo $row[0]; ?>
	</td>
	<td>
		<textarea readonly name="Descr" class="form-control"  rows="1" cols="25" placeholder="Description" maxlength="100" style="resize:vertical; background: transparent; font-size:12;">
		<?php echo $row[3]; ?></textarea>
	</td>
	<td>
		<center><?php echo $row[1]; ?></center>
	</td>
	<td>
		<center><?php echo "₹ ".$row[2]; ?></center>
	</td>
</tr>-->

<?php
}
}
catch(PDOException $ex)
{
   //echo "No records available";
}
$stmt = $dbh->prepare("CALL sp_SumOfCategory(?,?)");
$stmt->execute(array($User,$C));
$rowcount = $stmt->fetchColumn();
if($rowcount != '')
{
?>
<tr valign=bottom>
	<td bgcolor="#66a2ff" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:double; height:35px;" >
		<table width=100% border=0>
			<tr>
				<td width=15%></td>
				<td align=right  width=20% style="color:white;"><strong>Total:&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td bgcolor="white" width=10% style="text-align:center;"><strong><?php echo "₹ ".$rowcount; ?></strong></td>
                                <td width=1%></td>
			 </tr>
		</table>
	</td>
</tr>-->












<!--// tables for normal
<?php 
}
$dbh->connection = null;
include('dbcon.php');
$C="";
$stmt = $dbh->prepare("CALL sp_CategorySort(?,?)");
$stmt->execute(array($User,$C));
$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>	
<tr class=m>
	<td>
		<?php echo $row[0]; ?>
	</td>
	<td>
		<textarea readonly name="Descr" class="form-control"  rows="1" cols="25" placeholder="Description" maxlength="100" style="resize:vertical; background: transparent; font-size:12;">
		<?php echo $row[3]; ?></textarea>
	</td>
	<td>
		<center><?php echo $row[1]; ?></center>
	</td>
	<td>
		<center><?php echo "₹ ".$row[2]; ?></center>
	</td>
</tr>

<?php
}
}
catch(PDOException $ex)
{
   //echo "No records available";
}
$stmt = $dbh->prepare("CALL sp_SumOfCategory(?,?)");
$stmt->execute(array($User,$C));
$rowcount = $stmt->fetchColumn();
if($rowcount != '')
{
?>
<tr valign=bottom>
	<td bgcolor="#D8D8D8" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:double; height:35px;" >
		<table width=100% border=0>
			<tr>
				<td width=15%></td>
				<td align=right  width=20% style="color:white;"><strong>Total:&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td bgcolor="white" width=10% style="text-align:center;"><strong><?php echo "₹ ".$rowcount; ?></strong></td>
                                <td width=1%></td>
			 </tr>
		</table>
	</td>
</tr>-->





<!--                                                                  tables for dollars transportation                        -->
<?php 
}
$dbh->connection = null;
include('dbcon.php');
$C="";
$stmt = $dbh->prepare("CALL sp_DCategorySort_transportation(?,?)");
$stmt->execute(array($User,$C));
$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>	
<tr class=m>
	<td>
		<?php echo $row[0]; ?>
	</td>
	<td>
		<textarea readonly name="Descr" class="form-control"  rows="1" cols="25" placeholder="Description" maxlength="100" style="resize:vertical; background: transparent; font-size:12;">
		<?php echo $row[3]; ?></textarea>
	</td>
	<td>
		<center><?php echo $row[1]; ?></center>
	</td>
	<td>
		<center><?php echo "$ ".$row[2]; ?></center>
	</td>
</tr>


<?php
}
}
catch(PDOException $ex)
{
   //echo "No records available";
}
$stmt = $dbh->prepare("CALL sp_DSumOfCategory_transportation(?,?)");
$stmt->execute(array($User,$C));
$rowcount = $stmt->fetchColumn();
if($rowcount != '')
{
?>
<tr valign=bottom>
	<td bgcolor="#D8D8D8" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:double; height:35px;" >
		<table width=100% border=0>
			<tr>
				<td width=15%></td>
				<td align=right  width=20% style="color:white;"><strong>Total:&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td bgcolor="white" width=10% style="text-align:center;"><strong><?php echo "$ ".$rowcount; ?></strong></td>
                                <td width=1%></td>
			 </tr>
		</table>
	</td>
</tr>


<!--                                                                  tables for dollars Meals                       -->
<?php 
}
$dbh->connection = null;
include('dbcon.php');
$C="";
$stmt = $dbh->prepare("CALL sp_DCategorySort_meal(?,?)");
$stmt->execute(array($User,$C));
$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>	
<tr class=m>
	<td>
		<?php echo $row[0]; ?>
	</td>
	<td>
		<textarea readonly name="Descr" class="form-control"  rows="1" cols="25" placeholder="Description" maxlength="100" style="resize:vertical; background: transparent; font-size:12;">
		<?php echo $row[3]; ?></textarea>
	</td>
	<td>
		<center><?php echo $row[1]; ?></center>
	</td>
	<td>
		<center><?php echo "$ ".$row[2]; ?></center>
	</td>
</tr>


<?php
}
}
catch(PDOException $ex)
{
   //echo "No records available";
}
$stmt = $dbh->prepare("CALL sp_DSumOfCategory_meal(?,?)");
$stmt->execute(array($User,$C));
$rowcount = $stmt->fetchColumn();
if($rowcount != '')
{
?>
<tr valign=bottom>
	<td bgcolor="#D8D8D8" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:double; height:35px;" >
		<table width=100% border=0>
			<tr>
				<td width=15%></td>
				<td align=right  width=20% style="color:white;"><strong>Total:&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td bgcolor="white" width=10% style="text-align:center;"><strong><?php echo "$ ".$rowcount; ?></strong></td>
                                <td width=1%></td>
			 </tr>
		</table>
	</td>
</tr>



<!--                                                                  tables for dollars Lodging                 -->
<?php 
}
$dbh->connection = null;
include('dbcon.php');
$C="";
$stmt = $dbh->prepare("CALL sp_DCategorySort_lodging(?,?)");
$stmt->execute(array($User,$C));
$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>	
<tr class=m>
	<td>
		<?php echo $row[0]; ?>
	</td>
	<td>
		<textarea readonly name="Descr" class="form-control"  rows="1" cols="25" placeholder="Description" maxlength="100" style="resize:vertical; background: transparent; font-size:12;">
		<?php echo $row[3]; ?></textarea>
	</td>
	<td>
		<center><?php echo $row[1]; ?></center>
	</td>
	<td>
		<center><?php echo "$ ".$row[2]; ?></center>
	</td>
</tr>


<?php
}
}
catch(PDOException $ex)
{
   //echo "No records available";
}
$stmt = $dbh->prepare("CALL sp_DSumOfCategory_lodging(?,?)");
$stmt->execute(array($User,$C));
$rowcount = $stmt->fetchColumn();
if($rowcount != '')
{
?>
<tr valign=bottom>
	<td bgcolor="#D8D8D8" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:double; height:35px;" >
		<table width=100% border=0>
			<tr>
				<td width=15%></td>
				<td align=right  width=20% style="color:white;"><strong>Total:&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td bgcolor="white" width=10% style="text-align:center;"><strong><?php echo "$ ".$rowcount; ?></strong></td>
                                <td width=1%></td>
			 </tr>
		</table>
	</td>
</tr>




<!--                                                                  tables for dollars others                 -->
<?php 
}
$dbh->connection = null;
include('dbcon.php');
$C="";
$stmt = $dbh->prepare("CALL sp_DCategorySort_other(?,?)");
$stmt->execute(array($User,$C));
$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>	
<tr class=m>
	<td>
		<?php echo $row[0]; ?>
	</td>
	<td>
		<textarea readonly name="Descr" class="form-control"  rows="1" cols="25" placeholder="Description" maxlength="100" style="resize:vertical; background: transparent; font-size:12;">
		<?php echo $row[3]; ?></textarea>
	</td>
	<td>
		<center><?php echo $row[1]; ?></center>
	</td>
	<td>
		<center><?php echo "$ ".$row[2]; ?></center>
	</td>
</tr>


<?php
}
}
catch(PDOException $ex)
{
   //echo "No records available";
}
$stmt = $dbh->prepare("CALL sp_DSumOfCategory_other(?,?)");
$stmt->execute(array($User,$C));
$rowcount = $stmt->fetchColumn();
if($rowcount != '')
{
?>
<tr valign=bottom>
	<td bgcolor="#D8D8D8" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:double; height:35px;" >
		<table width=100% border=0>
			<tr>
				<td width=15%></td>
				<td align=right  width=20% style="color:white;"><strong>Total:&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td bgcolor="white" width=10% style="text-align:center;"><strong><?php echo "$ ".$rowcount; ?></strong></td>
                                <td width=1%></td>
			 </tr>
		</table>
	</td>
</tr>













// tables for original
<?php 
}
$dbh->connection = null;
include('dbcon.php');
$C="";
$stmt = $dbh->prepare("CALL sp_DCategorySort(?,?)");
$stmt->execute(array($User,$C));
$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>	
<!--<tr class=m>
	<td>
		<?php echo $row[0]; ?>
	</td>
	<td>
		<textarea readonly name="Descr" class="form-control"  rows="1" cols="25" placeholder="Description" maxlength="100" style="resize:vertical; background: transparent; font-size:12;">
		<?php echo $row[3]; ?></textarea>
	</td>
	<td>
		<center><?php echo $row[1]; ?></center>
	</td>
	<td>
		<center><?php echo "$ ".$row[2]; ?></center>
	</td>
</tr>-->


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
?>
<tr valign=bottom>
	<td bgcolor="#66a2ff" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:double; height:35px;" >
		<table width=100% border=0>
			<tr>
				<td width=15%></td>
				<td align=right  width=20% style="color:white;"><strong>Total:&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td bgcolor="white" width=10% style="text-align:center;"><strong><?php echo "$ ".$rowcount; ?></strong></td>
                                <td width=1%></td>
			 </tr>
		</table>
	</td>
</tr>



















	
<?php 
}
$dbh->connection = null;
?>
				   
				   <!-- Table generating code ends here -->
                  </table>
				  </div>
                </div><!-- /.box-body -->
               
 
             </div><!-- /.box -->

<!--<div class="">-->
<tabel class="table-responsive" cellspacing="10px">
<tr class="mailbox-attachments clearfix" width="100px" >
 <?php
include('dbcon.php');
//<!--$stmt2 = $dbh->prepare('SELECT ClaimReceipt,ExCategory,ClaimDate FROM tbluserexpenses WHERE UserName=? ORDER BY ClaimDate,ClaimRowid,Currency');-->
$stmt2 = $dbh->prepare("CALL sp_CategorySort_transportation(?,?)");
$stmt2->execute(array($User,$C));
while($showimage = $stmt2->fetch())
{
if($showimage[5] != null)
{
	echo "<td width='100px'><a target='_blank' href='uploads/$showimage[5]'><span class='mailbox-attachment-icon has-img'><img src='uploads/$showimage[5]' alt='Attachment' title='Click to enlarge'/></span></a>";
echo "<div class='mailbox-attachment-info'>
                        <a target='_blank' href='uploads/$showimage[5]' class='mailbox-attachment-name'><i class='fa fa-camera'></i>&nbsp;&nbsp;&nbsp;₹ &nbsp;$showimage[0]&nbsp;$showimage[1]</a> </div>";
echo"</td></tr>";
}}
include('dbcon.php');
//<!--$stmt2 = $dbh->prepare('SELECT ClaimReceipt,ExCategory,ClaimDate FROM tbluserexpenses WHERE UserName=? ORDER BY ClaimDate,ClaimRowid,Currency');-->
$stmt2 = $dbh->prepare("CALL sp_CategorySort_meal(?,?)");
$stmt2->execute(array($User,$C));
while($showimage = $stmt2->fetch())
{
if($showimage[5] != null)
{
	echo "<td width='100px'><a target='_blank' href='uploads/$showimage[5]'><span class='mailbox-attachment-icon has-img'><img src='uploads/$showimage[5]' alt='Attachment' title='Click to enlarge'/></span></a>";
echo "<div class='mailbox-attachment-info'>
                        <a target='_blank' href='uploads/$showimage[5]' class='mailbox-attachment-name'><i class='fa fa-camera'></i>&nbsp;&nbsp;&nbsp;₹ &nbsp;$showimage[0]&nbsp;$showimage[1]</a> </div>";
echo"</td></tr>";
}}
include('dbcon.php');
//<!--$stmt2 = $dbh->prepare('SELECT ClaimReceipt,ExCategory,ClaimDate FROM tbluserexpenses WHERE UserName=? ORDER BY ClaimDate,ClaimRowid,Currency');-->
$stmt2 = $dbh->prepare("CALL sp_CategorySort_lodging(?,?)");
$stmt2->execute(array($User,$C));
while($showimage = $stmt2->fetch())
{
if($showimage[5] != null)
{
	echo "<td width='100px'><a target='_blank' href='uploads/$showimage[5]'><span class='mailbox-attachment-icon has-img'><img src='uploads/$showimage[5]' alt='Attachment' title='Click to enlarge'/></span></a>";
echo "<div class='mailbox-attachment-info'>
                        <a target='_blank' href='uploads/$showimage[5]' class='mailbox-attachment-name'><i class='fa fa-camera'></i>&nbsp;&nbsp;&nbsp;₹ &nbsp;$showimage[0]&nbsp;$showimage[1]</a> </div>";
echo"</td></tr>";
}}
include('dbcon.php');
//<!--$stmt2 = $dbh->prepare('SELECT ClaimReceipt,ExCategory,ClaimDate FROM tbluserexpenses WHERE UserName=? ORDER BY ClaimDate,ClaimRowid,Currency');-->
$stmt2 = $dbh->prepare("CALL sp_CategorySort_Other(?,?)");
$stmt2->execute(array($User,$C));
while($showimage = $stmt2->fetch())
{
if($showimage[5] != null)
{
	echo "<td width='100px'><a target='_blank' href='uploads/$showimage[5]'><span class='mailbox-attachment-icon has-img'><img src='uploads/$showimage[5]' alt='Attachment' title='Click to enlarge'/></span></a>";
echo "<div class='mailbox-attachment-info'>
                        <a target='_blank' href='uploads/$showimage[5]' class='mailbox-attachment-name'><i class='fa fa-camera'></i>&nbsp;&nbsp;&nbsp;₹ &nbsp;$showimage[0]&nbsp;$showimage[1]</a> </div>";
echo"</td></tr>";
}}
include('dbcon.php');
//<!--$stmt2 = $dbh->prepare('SELECT ClaimReceipt,ExCategory,ClaimDate FROM tbluserexpenses WHERE UserName=? ORDER BY ClaimDate,ClaimRowid,Currency');-->
$stmt2 = $dbh->prepare("CALL sp_DCategorySort_transportation(?,?)");
$stmt2->execute(array($User,$C));
while($showimage = $stmt2->fetch())
{
if($showimage[5] != null)
{
	echo "<td width='100px'><a target='_blank' href='uploads/$showimage[5]'><span class='mailbox-attachment-icon has-img'><img src='uploads/$showimage[5]' alt='Attachment' title='Click to enlarge'/></span></a>";
echo "<div class='mailbox-attachment-info'>
                        <a target='_blank' href='uploads/$showimage[5]' class='mailbox-attachment-name'><i class='fa fa-camera'></i>&nbsp;&nbsp;&nbsp;$ &nbsp;$showimage[0]&nbsp;$showimage[1]</a> </div>";
echo"</td></tr>";
}}
include('dbcon.php');
//<!--$stmt2 = $dbh->prepare('SELECT ClaimReceipt,ExCategory,ClaimDate FROM tbluserexpenses WHERE UserName=? ORDER BY ClaimDate,ClaimRowid,Currency');-->
$stmt2 = $dbh->prepare("CALL sp_DCategorySort_meal(?,?)");
$stmt2->execute(array($User,$C));
while($showimage = $stmt2->fetch())
{
if($showimage[5] != null)
{
	echo "<td width='100px'><a target='_blank' href='uploads/$showimage[5]'><span class='mailbox-attachment-icon has-img'><img src='uploads/$showimage[5]' alt='Attachment' title='Click to enlarge'/></span></a>";
echo "<div class='mailbox-attachment-info'>
                        <a target='_blank' href='uploads/$showimage[5]' class='mailbox-attachment-name'><i class='fa fa-camera'></i>&nbsp;&nbsp;&nbsp;$ &nbsp;$showimage[0]&nbsp;$showimage[1]</a> </div>";
echo"</td></tr>";
}}
include('dbcon.php');
//<!--$stmt2 = $dbh->prepare('SELECT ClaimReceipt,ExCategory,ClaimDate FROM tbluserexpenses WHERE UserName=? ORDER BY ClaimDate,ClaimRowid,Currency');-->
$stmt2 = $dbh->prepare("CALL sp_DCategorySort_lodging(?,?)");
$stmt2->execute(array($User,$C));
while($showimage = $stmt2->fetch())
{
if($showimage[5] != null)
{
	echo "<td width='100px'><a target='_blank' href='uploads/$showimage[5]'><span class='mailbox-attachment-icon has-img'><img src='uploads/$showimage[5]' alt='Attachment' title='Click to enlarge'/></span></a>";
echo "<div class='mailbox-attachment-info'>
                        <a target='_blank' href='uploads/$showimage[5]' class='mailbox-attachment-name'><i class='fa fa-camera'></i>&nbsp;&nbsp;&nbsp;$ &nbsp;$showimage[0]&nbsp;$showimage[1]</a> </div>";
echo"</td></tr>";
}}include('dbcon.php');
//<!--$stmt2 = $dbh->prepare('SELECT ClaimReceipt,ExCategory,ClaimDate FROM tbluserexpenses WHERE UserName=? ORDER BY ClaimDate,ClaimRowid,Currency');-->
$stmt2 = $dbh->prepare("CALL sp_DCategorySort_other(?,?)");
$stmt2->execute(array($User,$C));
while($showimage = $stmt2->fetch())
{
if($showimage[5] != null)
{
	echo "<td width='100px'><a target='_blank' href='uploads/$showimage[5]'><span class='mailbox-attachment-icon has-img'><img src='uploads/$showimage[5]' alt='Attachment' title='Click to enlarge'/></span></a>";
echo "<div class='mailbox-attachment-info'>
                        <a target='_blank' href='uploads/$showimage[5]' class='mailbox-attachment-name'><i class='fa fa-camera'></i>&nbsp;&nbsp;&nbsp;$ &nbsp;$showimage[0]&nbsp;$showimage[1]</a> </div>";
echo"</td></tr>";
}}
$dbh->connection=null;
include('dbcon.php');

$stmt = $dbh->prepare("CALL sp_DCategorySort_transportation(?,?)");
$stmt->execute(array($User,$C));
while($showimage1 = $stmt->fetch())
{
if($showimage1[5] != null)
{
 //echo " <tr class='mailbox-attachments clearfix' widdth='100px'><td><a target='_blank' href='uploads/$showimage1[5]'><span class='mailbox-attachment-icon has-img'>
//<img src='uploads/$showimage1[5]' alt='Attachment' title='Click to enlarge'/></span></a>";
//echo "<div class='mailbox-attachment-info'>
                        //<a target='_blank' href='uploads/$showimage1[5]' class='mailbox-attachment-name'><i class='fa fa-camera'></i>&nbsp;&nbsp;&nbsp;$ //&nbsp;$showimage1[0]&nbsp;$showimage1[1]</a>
                      //</div>";
//echo " </td></tr>";


}
else
{
	//echo "No attachments found";
}

}
$dbh->connection=null;
?>

</tabel>





              </div><!-- /.box -->
              <!-- general form elements disabled -->
              
                  </form>
                </div><!-- /.box-body -->
				</div>
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