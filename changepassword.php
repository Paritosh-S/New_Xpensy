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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!--link rel="stylesheet" type="text/css" href="CSS/usrprof.css" /-->
<script src="new_login_signup.js"></script>
<title>Change Password</title>
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
<style>
		.form {
   margin-left:195px;
    margin-right:auto;
    width: 350px;
    height: 440px;
   padding:30px;
    border: 9px solid 
 #233b6b;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 25px 2px  25px 2px; 
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
   // background:#4766a3;//#7088b7;//rgba(0, 0, 0, 0.5);

background: #6397cb;
    background: -moz-linear-gradient(top, #6397cb 0%, #999999 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#6397cb), color-stop(100%,#999999));
    background: -webkit-linear-gradient(top,  #6397cb 0%,#999999 100%);
   background: -o-linear-gradient(top,   #6397cb 0%,#999999 100%);
    background: -ms-linear-gradient(top, #6397cb 0%,#999999 100%);
    background: linear-gradient(top, #6397cb 0%,#999999 100%);
	
    -moz-box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    -webkit-box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    overflow: hidden; 
	margin-top:74px;
	opacity:0.9;
}



.name {
    width: 276px;
    height: 48px;
    border: 1px solid rgba(0,0,0,.4);
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box; 
    display:block;
    font-family: 'Source Sans Pro', sans-serif;
    font-size:18px;
    color:white;
    padding-left:20px;
    padding-right:20px;
    margin-bottom:20px;
}

.btn {
    cursor:pointer;
}

.name {
	  background: rgba(0, 0, 0,0.3) url("images/gemicon_name.png") no-repeat scroll 16px 16px; 
	  padding-left:45px;
	  align:center;
	      box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
}



::-webkit-input-placeholder {
   color:white;
}

:-moz-placeholder { /* Firefox 18- */
   color: white;  
}

::-moz-placeholder {  /* Firefox 19+ */
   color: white;  
}

:-ms-input-placeholder {  
   color: white;  

}

.name:focus { 
	  background-color: rgba(0, 0, 0, 0.6);
   // -moz-box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
   // -webkit-box-shadow: 0 0 5px 1px rgba(255,255,255,.5);
   // box-shadow: 0 0 5px 1px rgba(255,255,255,.6);
	  overflow: hidden; 
	  
}

.btn {
	  width: 138px;
	  height: 44px;
	  -moz-border-radius: 4px;
	  -webkit-border-radius: 4px;
	  border-radius: 4px;
	  float:right;
    border: 1px solid #253737;
    background: #233b6b;
    //background: -webkit-gradient(linear, left top, left bottom, from(#6da5a3), to(#416b68));
   // background: -webkit-linear-gradient(top, #6da5a3, #416b68);
   // background: -moz-linear-gradient(top, #6da5a3, #416b68);
    //background: -ms-linear-gradient(top, #6da5a3, #416b68);
   // background: -o-linear-gradient(top, #6da5a3, #416b68);
   // background-image: -ms-linear-gradient(top, #6da5a3 0%, #416b68 100%);
    //padding: 10.5px 21px;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    -moz-box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    box-shadow: rgba(255,255,255,0.1) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    text-shadow: #333333 0 1px 0;
    color: #e1e1e1;
	margin-top:-15px;
}

.btn:hover {
    border: 1px solid #253737;
    text-shadow: #333333 0 1px 0;
    background: #233b6b;
    //background: -webkit-gradient(linear, left top, left bottom, from(#77b2b0), to(#416b68));
   // background: -webkit-linear-gradient(top, #77b2b0, #416b68);
  //  background: -moz-linear-gradient(top, #77b2b0, #416b68);
  //  background: -ms-linear-gradient(top, #77b2b0, #416b68);
   // background: -o-linear-gradient(top, #77b2b0, #416b68);
  //  background-image: -ms-linear-gradient(top, #77b2b0 0%, #416b68 100%);
    color: #fff;
 }

.btn:active {
   // margin-top:1px;
    text-shadow: #333333 0 -1px 0;
    border: 1px solid #253737;
    background: #233b6b;
    //background: -webkit-gradient(linear, left top, left bottom, from(#416b68), to(#416b68));
   // background: -webkit-linear-gradient(top, #416b68, #609391);
   // background: -moz-linear-gradient(top, #416b68, #6da5a3);
   // background: -ms-linear-gradient(top, #416b68, #6da5a3);
   // background: -o-linear-gradient(top, #416b68, #6da5a3);
    //background-image: -ms-linear-gradient(top, #416b68 0%, #6da5a3 100%);
    color: #fff;
    -webkit-box-shadow: rgba(255,255,255,0) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    -moz-box-shadow: rgba(255,255,255,0) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
    box-shadow: rgba(255,255,255,0) 0 1px 0, inset rgba(255,255,255,0.7) 0 1px 0;
   }

</style>
</head>


<body >
<center>



<form method="post" action="" name="frmChange" class="form"  onSubmit="return validatePassword()">
<table border="0" cellpadding="7" cellspacing="0" align="center" class="tblSaveForm">

<tr class="tableheader">
<td height="34" colspan="2" align="center" style="color:#B0E0E6; text-transform:uppercase; font-size:20" ><img src="images/icon_changePassword.png"></td>
</tr>
<tr>

<td><input type="password" name="currentPassword" required class="name" placeholder="Current Password"/><span id="currentPassword" class="required"></span></td>
</tr>
<tr>

<td><input type="password" name="newPassword" required placeholder="New Password"   class="name" class="txtField"/><span id="newPassword" class="required"></span></td>
</tr>

<td><input type="password" name="confirmPassword" required placeholder=" Confirm password"  class="name" class="txtField"/><span id="confirmPassword" class="required"></span></td>
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" name="Update" value="Update" class="btn" style="font-weight:bold;  text-transform:uppercase; font-size:24;"> 

</td>
</tr>
<tr class="tablefooter"><td colspan="2" align="center" style="color:#FFFFFF "><?php echo $message; ?></td></tr>
</table>


</form>
</center>
</body>


</html>