<?php
session_start();
$User = $_SESSION['login'];
$pname = substr($_SESSION['pname'],8);
include('dbcon.php');
?>
<html>
<head>
<link href="CSS/new.css" rel="stylesheet" type="text/css">
<link href="CSS/ExpenseProfile.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style>
#qq
{
border-style: solid;
    border-top-style: dotted;
}
</style>
</head>
<body>

 
<!--<table class="table" bgcolor="" width="100%" border="1" style="text-align:center;border-collapse: collapse; color:black;text-align:center;border-style: solid; "  >-->
<center>
               <div class="">
                <div class="">
<img href="#" alt="logo" src="http://xpensy.net/version2/images/xlogo7.jpg" height="130px" width="130px">
<!--<h4 style="color:orange">E<h3 style="color:blue" >xpense</h3> </h4><h4 style="color:orange">R</h4><h3 style="color:blue" >eports</h3>...<h4 style="color:orange">S</h4><h3 style="color:blue" >implified</h3>-->
<h3>Expense Reports...Simplified</h3>
                </div><!-- /.box-header -->
               <!-- /.box-header -->
			   
                <div class="box-body">
 
<!--//<div class="table-responsive">
//<table class="table" bgcolor="#D8D8D8" width="80%" border="0" style="text-align:center;border-collapse: collapse; color:black;text-align:center;border-style: solid; "  >
//<tr style="text-align:center" width="80%"><td ><b>Expense Report Details</b></td></tr>
//<?php
//echo"<tr style='text-align:center' width='80%' ><td> From: <b>".$pname."</b> </td></tr>";
//echo"<tr style='text-align:center' width='80%'><td> Email: <b>".$User."</b> </td></tr>";
//?>
//<tr style='text-align:center' width='80%'><td ></td></tr>
//</table>
//</div>-->
<div class="table-responsive">
<table class="tabel"  border="1" width="80%" cellspacing="0" cellpadding="5" style="border-collapse: collapse; color:black;text-align:center;border-style: solid;" >

<tr bgcolor="#3c8dbc" style="text-align:center" width="80%" height="30px"><td style="color:white" colspan="4" rowspan=""><b>Expense Report Details</b></td></tr>
 <tr bgcolor="#F1F1F1" border="1"   style="color:black;text-align:center;">
<th style="text-align:center" width="13%"  >Category</th>
 <th style="text-align:center" width="40%"  >Description</th>
<th style="text-align:center" width="13%" >Date</th>
<th style="text-align:center" width="13%" >Amount</th>
 </tr>
                   <!-- Table generation code start -->
				   
<?php
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

<tr border="1"  >
	<td border="1" >
		<?php echo $row1[0]; ?>
	</td>
	<td style="text-align:left" >
 <label  maxlength="100" style="resize:vertical; ">
		<?php echo $row1[3]; ?></label>



		
	</td>
	<td border="1" style="border-style: solid;
   ">
		
		<?php echo $row1[1]; ?>
	</td>
	<td style="text-align:right;" >
		<?php echo "₹ ".$row1[2]; ?>
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
<tr valign="center">
	<td bgcolor="#F1F1F1" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:single; height:15px;" >
		<table width=100% >
			<tr>
				
				<td align=right  width=55%  ><strong>Transportation Total:</td>
				<td  width=10% style="text-align:right;"><strong><?php echo "₹ ".$result1; ?></strong></td>
                                
			 </tr>
		</table>
	</td>
</tr>




<?php 
}
$dbh->connection = null;
include('dbcon.php');
$C="";
$stmt = $dbh->prepare("CALL sp_CategorySort_meal(?,?)");
$stmt->execute(array($User,$C));

$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>	
<tr border="1">
	<td>
		<?php echo $row[0]; ?>
	</td>
	<td style="text-align:left" >
 <label  maxlength="100" style="resize:vertical; ">
		<?php echo $row[3]; ?></label>



		
	</td>
	<td>
		<?php echo $row[1]; ?>
	</td>
	<td style="text-align:right;" >
		<?php echo "₹ ".$row[2]; ?>
	</td>
</tr>

<?php
}
}
catch(PDOException $ex)
{
   //echo "No records available";
}
$stmt = $dbh->prepare("CALL sp_SumOfCategory_meal(?,?)");
$stmt->execute(array($User,$C));
$rowcount = $stmt->fetchColumn();
if($rowcount != '')
{
?>
<tr valign="center">
	<td bgcolor="#F1F1F1" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:single; height:15px;" >
		<table width=100% border=0>
			<tr>
				<td align=right  width=55%  ><strong>Meals Total:</td>
				<td  width=10% style="text-align:right;"><strong><?php echo "₹ ".$rowcount; ?></strong></td>
			 </tr>
		</table>
	</td>
</tr>


<!--//<tr><td colspan="4">You have received this email from <b><?php echo $pname; ?></b>. Please reply to the sender of this email at <?php echo $User; ?><br><br>Thank you. </td>	</tr>-->
<?php 
}
$dbh->connection = null;
?>

<!------------------------------------------------------------------------ lodging      -->
<?php 

$dbh->connection = null;
include('dbcon.php');
$C="";
$stmt = $dbh->prepare("CALL sp_CategorySort_lodging(?,?)");
$stmt->execute(array($User,$C));

$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>	
<tr border="1">
	<td>
		<?php echo $row[0]; ?>
	</td>
	<td style="text-align:left" >
 <label  maxlength="100" style="resize:vertical; ">
		<?php echo $row[3]; ?></label>



		
	</td>
	<td>
		<?php echo $row[1]; ?>
	</td>
	<td style="text-align:right;" >
		<?php echo "₹ ".$row[2]; ?>
	</td>
</tr>

<?php
}
}
catch(PDOException $ex)
{
   //echo "No records available";
}
$stmt = $dbh->prepare("CALL sp_SumOfCategory_lodging(?,?)");
$stmt->execute(array($User,$C));
$rowcount = $stmt->fetchColumn();
if($rowcount != '')
{
?>
<tr valign="center">
	<td bgcolor="#F1F1F1" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:single; height:15px;" >
		<table width=100% border=0>
			<tr>
				<td align=right  width=55%  ><strong>Lodging Total:</td>
				<td  width=10% style="text-align:right;"><strong><?php echo "₹ ".$rowcount; ?></strong></td>
			 </tr>
		</table>
	</td>
</tr>


<!--//<tr><td colspan="4">You have received this email from <b><?php echo $pname; ?></b>. Please reply to the sender of this email at <?php echo $User; ?><br><br>Thank you. </td>	</tr>-->
<?php 
}
$dbh->connection = null;
?>


<?php 

$dbh->connection = null;
include('dbcon.php');
$C="";
$stmt = $dbh->prepare("CALL sp_CategorySort_other(?,?)");
$stmt->execute(array($User,$C));

$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>	
<tr border="1">
	<td>
		<?php echo $row[0]; ?>
	</td>
	<td style="text-align:left" >
 <label  maxlength="100" style="resize:vertical; ">
		<?php echo $row[3]; ?></label>



		
	</td>
	<td>
		<?php echo $row[1]; ?>
	</td>
	<td style="text-align:right;" >
		<?php echo "₹ ".$row[2]; ?>
	</td>
</tr>

<?php
}
}
catch(PDOException $ex)
{
   //echo "No records available";
}
$stmt = $dbh->prepare("CALL sp_SumOfCategory_other(?,?)");
$stmt->execute(array($User,$C));
$rowcount = $stmt->fetchColumn();
if($rowcount != '')
{
?>
<tr valign="center">
	<td bgcolor="#F1F1F1" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:single; height:15px;" >
		<table width=100% border=0>
			<tr>
				<td align=right  width=55%  ><strong>Other Total:</td>
				<td  width=10% style="text-align:right;"><strong><?php echo "₹ ".$rowcount; ?></strong></td>
			 </tr>
		</table>
	</td>
</tr>


<!--//<tr><td colspan="4">You have received this email from <b><?php echo $pname; ?></b>. Please reply to the sender of this email at <?php echo $User; ?><br><br>Thank you. </td>	</tr>-->
<?php 
}
$dbh->connection = null;
?>

<!--                                                                                                       rupees total->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


<?php 

$dbh->connection = null;
include('dbcon.php');
$C="";
$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='INR' ORDER BY ExCategory,ClaimDate";
	$stmt=$dbh->prepare($sql);  
	$stmt->execute();

$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>	
<!--<tr border="1">
	<td>
		<?php echo $row[1]; ?>
	</td>
	<td style="text-align:left" >
 <label  maxlength="100" style="resize:vertical; ">
		<?php echo $row[4]; ?></label>



		
	</td>
	<td>
		<?php echo $row[2]; ?>
	</td>
	<td style="text-align:right;" >
		<?php echo "$ ".$row[3]; ?>
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
<tr valign="center">
	<td bgcolor="#8bbdda" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:single; height:30px;" >
		<table width=100% border=0>
			<tr>
				<td align=right  width=55%  ><strong>₹ Grand Total:</td>
				<td  width=10% style="text-align:right;"><strong><?php echo "₹ ".$rowcount; ?></strong></td>
			 </tr>
		</table>
	</td>
</tr>


<!--//<tr><td colspan="4">You have received this email from <b><?php echo $pname; ?></b>. Please reply to the sender of this email at <?php echo $User; ?><br><br>Thank you. </td>	</tr>-->
<?php 
}
$dbh->connection = null;
?>


<!--  

<?php 

$dbh->connection = null;
include('dbcon.php');
$C="";
$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='USD' ORDER BY ExCategory,ClaimDate";
	$stmt=$dbh->prepare($sql);  
	$stmt->execute();

$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>	
<tr border="1">
	<td>
		<?php echo $row[1]; ?>
	</td>
	<td style="text-align:left" >
 <label  maxlength="100" style="resize:vertical; ">
		<?php echo $row[4]; ?></label>



		
	</td>
	<td>
		<?php echo $row[2]; ?>
	</td>
	<td style="text-align:right;" >
		<?php echo "$ ".$row[3]; ?>
	</td>
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
?>
<tr valign="center">
	<td bgcolor="#F1F1F1" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:single; height:15px;" >
		<table width=100% border=0>
			<tr>
				<td align=right  width=55%  ><strong>Total:&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td  width=10% style="text-align:right;"><strong><?php echo "$ ".$rowcount; ?></strong></td>
			 </tr>
		</table>
	</td>
</tr>


<!--//<tr><td colspan="4">You have received this email from <b><?php echo $pname; ?></b>. Please reply to the sender of this email at <?php echo $User; ?><br><br>Thank you. </td>	</tr>-->
<?php 
}
$dbh->connection = null;
?>





























<!------------------------------------------------------------------------ dollar transporttaion     -->
<?php 

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
<tr border="1">
	<td>
		<?php echo $row[0]; ?>
	</td>
	<td style="text-align:left" >
 <label  maxlength="100" style="resize:vertical; ">
		<?php echo $row[3]; ?></label>



		
	</td>
	<td>
		<?php echo $row[1]; ?>
	</td>
	<td style="text-align:right;" >
		<?php echo "$ ".$row[2]; ?>
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
<tr valign="center">
	<td bgcolor="#F1F1F1" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:single; height:15px;" >
		<table width=100% border=0>
			<tr>
				<td align=right  width=55%  ><strong>Transportation Total:</td>
				<td  width=10% style="text-align:right;"><strong><?php echo "$ ".$rowcount; ?></strong></td>
			 </tr>
		</table>
	</td>
</tr>


<!--//<tr><td colspan="4">You have received this email from <b><?php echo $pname; ?></b>. Please reply to the sender of this email at <?php echo $User; ?><br><br>Thank you. </td>	</tr>-->
<?php 
}
$dbh->connection = null;
?>




<!------------------------------------------------------------------------ dollar Meals     -->
<?php 

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
<tr border="1">
	<td>
		<?php echo $row[0]; ?>
	</td>
	<td style="text-align:left" >
 <label  maxlength="100" style="resize:vertical; ">
		<?php echo $row[3]; ?></label>



		
	</td>
	<td>
		<?php echo $row[1]; ?>
	</td>
	<td style="text-align:right;" >
		<?php echo "$ ".$row[2]; ?>
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
<tr valign="center">
	<td bgcolor="#F1F1F1" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:single; height:15px;" >
		<table width=100% border=0>
			<tr>
				<td align=right  width=55%  ><strong>Meals Total:</td>
				<td  width=10% style="text-align:right;"><strong><?php echo "$ ".$rowcount; ?></strong></td>
			 </tr>
		</table>
	</td>
</tr>


<!--//<tr><td colspan="4">You have received this email from <b><?php echo $pname; ?></b>. Please reply to the sender of this email at <?php echo $User; ?><br><br>Thank you. </td>	</tr>-->
<?php 
}
$dbh->connection = null;
?>




















<!------------------------------------------------------------------------ dollar Meals     -->
<?php 

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
<tr border="1">
	<td>
		<?php echo $row[0]; ?>
	</td>
	<td style="text-align:left" >
 <label  maxlength="100" style="resize:vertical; ">
		<?php echo $row[3]; ?></label>



		
	</td>
	<td>
		<?php echo $row[1]; ?>
	</td>
	<td style="text-align:right;" >
		<?php echo "$ ".$row[2]; ?>
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
<tr valign="center">
	<td bgcolor="#F1F1F1" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:single; height:15px;" >
		<table width=100% border=0>
			<tr>
				<td align=right  width=55%  ><strong>Lodging Total:</td>
				<td  width=10% style="text-align:right;"><strong><?php echo "$ ".$rowcount; ?></strong></td>
			 </tr>
		</table>
	</td>
</tr>


<!--//<tr><td colspan="4">You have received this email from <b><?php echo $pname; ?></b>. Please reply to the sender of this email at <?php echo $User; ?><br><br>Thank you. </td>	</tr>-->
<?php 
}
$dbh->connection = null;
?>






<!------------------------------------------------------------------------ dollar Meals     -->
<?php 

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
<tr border="1">
	<td>
		<?php echo $row[0]; ?>
	</td>
	<td style="text-align:left" >
 <label  maxlength="100" style="resize:vertical; ">
		<?php echo $row[3]; ?></label>



		
	</td>
	<td>
		<?php echo $row[1]; ?>
	</td>
	<td style="text-align:right;" >
		<?php echo "$ ".$row[2]; ?>
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
<tr valign="center">
	<td bgcolor="#F1F1F1" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:single; height:15px;" >
		<table width=100% border=0>
			<tr>
				<td align=right  width=55%  ><strong>Others Total:</td>
				<td  width=10% style="text-align:right;"><strong><?php echo "$ ".$rowcount; ?></strong></td>
			 </tr>
		</table>
	</td>
</tr>


<!--//<tr><td colspan="4">You have received this email from <b><?php echo $pname; ?></b>. Please reply to the sender of this email at <?php echo $User; ?><br><br>Thank you. </td>	</tr>-->
<?php 
}
$dbh->connection = null;
?>








<?php 

$dbh->connection = null;
include('dbcon.php');
$C="";
$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='USD' ORDER BY ExCategory,ClaimDate";
	$stmt=$dbh->prepare($sql);  
	$stmt->execute();

$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>	
<!--<tr border="1">
	<td>
		<?php echo $row[1]; ?>
	</td>
	<td style="text-align:left" >
 <label  maxlength="100" style="resize:vertical; ">
		<?php echo $row[4]; ?></label>



		
	</td>
	<td>
		<?php echo $row[2]; ?>
	</td>
	<td style="text-align:right;" >
		<?php echo "$ ".$row[3]; ?>
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
<tr valign="center">
	<td bgcolor="#8bbdda" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:single; height:30px;" >
		<table width=100% border=0>
			<tr>
				<td align=right  width=55%  ><strong>$ Grand Total:</td>
				<td  width=10% style="text-align:right;"><strong><?php echo "$ ".$rowcount; ?></strong></td>
			 </tr>
		</table>
	</td>
</tr>


<!--//<tr><td colspan="4">You have received this email from <b><?php echo $pname; ?></b>. Please reply to the sender of this email at <?php echo $User; ?><br><br>Thank you. </td>	</tr>-->
<?php 
}
$dbh->connection = null;
?>


<!--  

<?php 

$dbh->connection = null;
include('dbcon.php');
$C="";
$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='USD' ORDER BY ExCategory,ClaimDate";
	$stmt=$dbh->prepare($sql);  
	$stmt->execute();

$i = 0;
try
{
while ($row = $stmt->fetch()) 
{
?>	
<tr border="1">
	<td>
		<?php echo $row[1]; ?>
	</td>
	<td style="text-align:left" >
 <label  maxlength="100" style="resize:vertical; ">
		<?php echo $row[4]; ?></label>



		
	</td>
	<td>
		<?php echo $row[2]; ?>
	</td>
	<td style="text-align:right;" >
		<?php echo "$ ".$row[3]; ?>
	</td>
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
?>
<tr valign="center">
	<td bgcolor="#8bbdda" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:single; height:25px;" >
		<table width=100% border=0>
			<tr>
				<td align=right  width=55%  ><strong>$ Grand Total:</td>
				<td  width=10% style="text-align:right;"><strong><?php echo "$ ".$rowcount; ?></strong></td>
			 </tr>
		</table>
	</td>
</tr>


<!--//<tr><td colspan="4">You have received this email from <b><?php echo $pname; ?></b>. Please reply to the sender of this email at <?php echo $User; ?><br><br>Thank you. </td>	</tr>-->
<?php 
}
$dbh->connection = null;
?>







				   
				   <!-- Table generating code ends here -->
                  </table>
				  </div>
                </div><!-- /.box-body -->
               
              </div><!-- /.box -->

              </div><!-- /.box -->
              <!-- general form elements disabled -->
              
                  </form>
                </div><!-- /.box-body -->
				</div>
              </div><!-- /.box -->

</center>


</body>
</html>