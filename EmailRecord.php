<?php
session_start();
$User = $_SESSION['login'];
include('dbcon.php');
?>
<html>
<head>

</head>
<body>

 <center>
               <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Expense</h3>
                </div><!-- /.box-header -->
               <!-- /.box-header -->
			   
                <div class="box-body"> 
				<div class="table-responsive">
                  <table class="table table-bordered" width="800px" cellpadding="10px" style="text-align:center">
                    <tr bgcolor="#3870a8" style="color:white;">
					
                      <th style="text-align:center" width="20%" bgcolor="#3c8dbc" >Category</th>
                      <th style="text-align:center" width="43%" style="text-align:center;" bgcolor="#3c8dbc">Description</th>
                      <th style="text-align:center" width="25%" bgcolor="#3c8dbc">Date</th>
                      <th style="text-align:center" style="width: 40px" bgcolor="#3c8dbc">Amount</th>
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
 <textarea readonly name="Descr" class="form-control" rows="1" cols="25" placeholder="Description" maxlength="100" style="resize:vertical; background: transparent;">
		<?php echo $row1[3]; ?></textarea>



		
	</td>
	<td>
		
		<?php echo $row1[1]; ?>
	</td>
	<td>
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

$stmt1 = $dbh->prepare("CALL sp_SumOfCategory(?,?)");
$stmt1->execute(array($User,$C));
$result1 = $stmt1->fetchColumn();
if($result1 != '')
{
?>
<tr valign=bottom>
	<td bgcolor="#D8D8D8" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:double; height:15px;" >
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
		<textarea readonly name="Descr" class="form-control"  rows="1" cols="25" placeholder="Description" maxlength="100" style="resize:vertical; background: transparent;">
		<?php echo $row[3]; ?></textarea>
	</td>
	<td>
		<?php echo $row[1]; ?>
	</td>
	<td>
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
$stmt = $dbh->prepare("CALL sp_DSumOfCategory(?,?)");
$stmt->execute(array($User,$C));
$rowcount = $stmt->fetchColumn();
if($rowcount != '')
{
?>
<tr valign=bottom>
	<td bgcolor="#D8D8D8" colspan="8" align="right"  style="border-radius: 5px 5px 5px 5px; border-bottom-style:double; height:15px;" >
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

              </div><!-- /.box -->
              <!-- general form elements disabled -->
              
                  </form>
                </div><!-- /.box-body -->
				</div>
              </div><!-- /.box -->
</center>
</body>
</html>