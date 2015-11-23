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
<center>


<div class="col-md-7">
               <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Expense</h3>
                </div><!-- /.box-header -->
               <!-- /.box-header -->
			   
                <div class="box-body"> 
				<div class="table-responsive">
                  <table class="table" style="font-family:Segoe UI; font-size:12;">
                    <tr bgcolor="#3870a8" style="color:white;">
					
                      <th width="2%" bgcolor="#3c8dbc" >Category</th>
                      <th width="43%" style="text-align:center;" bgcolor="#3c8dbc">Description</th>
                      <th width="25%" style="text-align:center;" bgcolor="#3c8dbc">Date</th>
                      <th  style="text-align:center;width: 40px" bgcolor="#3c8dbc">Amount</th>
                    </tr>
                   <!-- Table generation code start -->
				   
<?php
include('dbcon.php');
$C="";
$stmt1 = $dbh->prepare("CALL sp_CategorySort(?,?)");
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

$stmt1 = $dbh->prepare("CALL sp_SumOfCategory(?,?)");
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
$stmt = $dbh->prepare("CALL sp_DSumOfCategory(?,?)");
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
$stmt2 = $dbh->prepare("CALL sp_CategorySort(?,?)");
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

$dbh->connection=null;
include('dbcon.php');

$stmt = $dbh->prepare("CALL sp_DCategorySort(?,?)");
$stmt->execute(array($User,$C));
while($showimage1 = $stmt->fetch())
{
if($showimage1[5] != null)
{
echo " <tr class='mailbox-attachments clearfix' widdth='100px'><td><a target='_blank' href='uploads/$showimage1[5]'><span class='mailbox-attachment-icon has-img'><img src='uploads/$showimage1[5]' alt='Attachment' title='Click to enlarge'/></span></a>";
echo "<div class='mailbox-attachment-info'>
                        <a target='_blank' href='uploads/$showimage1[5]' class='mailbox-attachment-name'><i class='fa fa-camera'></i>&nbsp;&nbsp;&nbsp;$ &nbsp;$showimage1[0]&nbsp;$showimage1[1]</a>
                      </div>";
echo " </td>";





}
else
{
	//echo "No attachments found";
}
}
$dbh->connection=null;
?></tr></tabel>
<!--<div class="">
<ul class='mailbox-attachments clearfix'>
<?php
include('dbcon.php');
//<!--$stmt2 = $dbh->prepare('SELECT ClaimReceipt,ExCategory,ClaimDate FROM tbluserexpenses WHERE UserName=? ORDER BY ClaimDate,ClaimRowid,Currency');-->
$stmt = $dbh->prepare("CALL sp_DCategorySort(?,?)");
$stmt->execute(array($User,$C));
while($showimage = $stmt->fetch())
{
if($showimage[5] != null)
{
	echo "<li><a target='_blank' href='uploads/$showimage[5]'><span class='mailbox-attachment-icon has-img'><img src='uploads/$showimage[5]' alt='Attachment' title='Click to enlarge'/></span></a>";
echo "<div class='mailbox-attachment-info'>
                        <a target='_blank' href='uploads/$showimage[5]' class='mailbox-attachment-name'><i class='fa fa-camera'></i>&nbsp;&nbsp;&nbsp;$ &nbsp;$showimage[0]&nbsp;$showimage[1]</a>
                      </div>";
echo " </li>";
}
else
{
	//echo "No attachments found";
}
}
$dbh->connection=null;
?>
</ul><!--</div>-->
              </div><!-- /.box -->
              <!-- general form elements disabled -->
              
                  </form>
                </div><!-- /.box-body -->
				</div>


























</center>
</body>
</html>