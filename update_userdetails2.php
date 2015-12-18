<?php
error_reporting(0);
session_start();
if(isset($_SESSION['login']))
{
	$User = $_SESSION['login'];
	$UserID = $_SESSION['userid'];
}
else
{
	echo "Session Expired! Login Again.";	
	header("Location: EndSession.php");
}
if(isset($_POST['name']) && isset($_POST['mobileno']) && isset($_POST['emailid']))
	{				
		if(isset($_REQUEST['Update']))
		{
			try
                        {
					$nm = $_POST['name'];
					$gender = 'N';
					$MobileNo = $_POST['mobileno'];
					$EmailID2 = $_POST['emailid'];
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
						$_SESSION['pname'] = "Welcome! ".$nm;
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
		
	}	
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>User Details</title>
<style>
		.form {
    margin-left:180px;
    margin-right:auto;
    width: 450px;
    height: 530px;
    border: 9px solid 
 #233b6b;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius:25px 2px 25px 2px;
    //background:#4766a3;//#7088b7;//#798295;// #677080;//#adbbd6;//#8499c1;//#335599;//#C0C0C0 ;//rgba(0, 0, 0, 0.5); //
    
	background: #6397cb;
    background: -moz-linear-gradient(top, #6397cb 0%, #999999 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#6397cb), color-stop(100%,#999999));
    background: -webkit-linear-gradient(top,  #6397cb 0%,#999999 100%);
   background: -o-linear-gradient(top,   #6397cb 0%,#999999 100%);
    background: -ms-linear-gradient(top, #6397cb 0%,#999999 100%);
    background: linear-gradient(top, #6397cb 0%,#999999 100%);
	
	
	-moz-box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    -webkit-box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    box-shadow: 0 0 4px 4px gray;
    overflow: hidden; 
	margin-top:66px;
	opacity:0.9;
}

.name {
    width: 276px;
    height: 35px;
   border: 1px solid rgba(0,0,0,.7);
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box; 
    display:block;
    font-family: 'Source Sans Pro', sans-serif;
    font-size:18px;
    color:white;
    padding-left:20px;
    padding-right:20px;
    margin-left:-390px;
	background: rgba(0, 0, 0, 0.4); //url("images/gemicon_name.png") no-repeat scroll 16px 16px; 
	  padding-left:45px;
	  align:center;
	     box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
		  overflow: hidden; 
		  opacity:6.5;
}

.btn 
{
    cursor:pointer;
}

::-webkit-input-placeholder {
	  color: white;
}

:-moz-placeholder{ 
    color: white; 
}

::-moz-placeholder {
    color: white;
}

:-ms-input-placeholder {  
	  color: white; 
}

.name:focus { 
	  background-color: rgba(0, 0, 0, 0.6);
	  overflow: hidden; 
	
}

.btn {
	  width: 138px;
	  height: 41px;
	  -moz-border-radius: 4px;
	  -webkit-border-radius: 4px;
	  border-radius: 4px;
	  float:left;
    border: 1px solid #253737;
    background-color: #233b6b;
    padding: 10.5px 21px;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    -moz-box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    text-shadow: #333333 0 1px 0;
    color: #e1e1e1;
		 margin-left:41px;
	 margin-top:-6px

}



</style>
<script type="text/javascript">
function autoRefresh()
{
	window.location = window.location.href;
}
</script>
</head>
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
<body oncontextmenu="return false;" style="font-family:Segoe UI;font-size:12;">
<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
	{
        $MobileNo = $_POST['mobileno'];
        $EmailID2 = $_POST['emailid'];
        $valid_arr = array();
        $error_arr = array();
			if(preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/',$EmailID2))
				{
					$valid_arr['emailid'] = $EmailID2;
				}
             else{
                    $error_arr['emailid'] = 'Please enter valid email address';
                }
	
			if (strlen($_POST["mobileno"])  >= 10)
			{
				$valid_arr['mobileno'] = $MobileNo;
			}
			else{
                    $error_arr['mobileno'] = 'Mobile No must be of 10 digits';
                }
	}
?>
<form id="user_details" method="post" action="" class="form" onSubmit="return validateUserdetails()">
<div style="width:850px;">
<table border="0" cellpadding="5" cellspacing="0" width="650" align="center" >

	<tr >
		<td height="34" colspan="2" align="center" style="color:white;  font-weight:bold;  text-transform:uppercase; font-size:24;  "><label style="margin-left:-385px; margin-top:50%;">Update Your Profile</label></td>
	</tr>
	<tr>		
		<td  align="center"><input type='text' style="font-size:14; font-family:calibri;" name='name' class='name'  placeholder='Name' value='<?php echo $name; ?>' /><br></td>
	</tr>
	<!--tr>

		<td style="color:white;  font-weight:bold;  text-transform:uppercase; font-size:24; margin-left:30px;align:center" ><input type="radio"  name="gender"  value="M" <?php echo $chM; ?>>Male<input type="radio" name="gender" value="F" <?php echo $chF; ?>>Female</td>
	</tr-->
	<tr>
		
		<td align="center"> <input type="number" style="font-size:14;" name="mobileno" maxlength="10" class='name' placeholder='Mobile No'  value='<?php echo $mob;?>'/><label style="font-size:14px;color:white; margin-left:-300px; "><?php echo $error_arr['mobileno'];?></label></td>
	</tr>
	<tr>
	
	    <td align="center"><input type="email" style="font-size:14;" name="emailid" class='name' placeholder='Email Id' value='<?php echo $email;?>'/> <label style="font-size:14px;color:white;margin-left:-300px; "><?php echo $error_arr['emailid'];?></label></td><br>
	</tr>
	
	<tr>
		
		<td  align="center"> <input type='text' style="font-size:14;" name='company' class='name'  placeholder='Company'  value='<?php echo $company; ?>' /><br></td>
	</tr>
	<tr>
		
		<td  align="center"> <input type='text' style="font-size:14;" name='branch' class='name' placeholder='Branch'  value='<?php echo $branch; ?>' /><br></td>
	</tr>
	<tr>
		
		<td  align="center"> <input type='text' style="font-size:14;" name='designation' class='name'  placeholder='Designation' value='<?php echo $desig; ?>' /><br></td>
	</tr>
	<tr>
  <td colspan="2" align="center" ><input type="submit" onclick="autoRefresh()" name="Update" value="Update" class="btn" style="font-weight:bold;  text-transform:uppercase; font-size:24;"> 

</td>
	<tr class="tablefooter"><td colspan="3" style="color:#FFFFFF "><?php echo $message; ?></td></tr>
</table>
</div>
</form>
<!-- New code starts here -->

</body>
</html>