<?php
session_start();
error_reporting(0);
	if(isset($_REQUEST['rdr']) && isset($_REQUEST['identity']))
	{
		$salt=$_REQUEST['rdr'];
		$id=$_REQUEST['identity'];
		require_once('dbcon.php');
		$stmt = $dbh->prepare("CALL sp_CheckActStatus(?,?)");
		$stmt->execute(array($id,$salt));
		while($row = $stmt->fetch())
		{
			$res = $row[0];
                        $userid=$row[1];
                        $login=$row[2];
			$name = $row[3];
		}
		if($res == '1')
		{
			$message = "Congratulations! you have successfully activated your Xpensy account. <br>Redirecting you...Please wait";
                        $_SESSION['userid']=$userid;
                        $_SESSION['login']=$login;
                        $_SESSION['pname']="Welcome! ".$name;
		}
		else
		{
			$message = "Activation link expired! Please register again to use our services <br>
			<a href='index.php' style='color:blue; text-decoration:underline;'>Visit Xpensy home</a>";
		}
	}
?>
<html>
<head>
<script type="text/javascript">
function reload()
{
    window.setTimeout(function () {
        location.href = "login.php";
    }, 8000);
}
</script>
</head>
<body oncontextmenu="return false" style="font-family:Segoe UI; font-size:16;" onload="reload()">
<center>
<div style="top:30%; left:28%; position:absolute; width:40%; height:20%;">
<p><?php echo $message; ?></p></div>
</center>
</body>
</html>