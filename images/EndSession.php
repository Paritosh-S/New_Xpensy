<?php
	session_start();
	error_reporting(E_ERROR);
	if(isset($_SESSION['login']))
		{
			echo $User=$_SESSION['login'];
			include('dbcon.php');
			$R = 0;
			$stmt = $dbh->prepare("CALL sp_DelAttachment(?,?)");
			$stmt->execute(array($User,$R));
			while($row = $stmt->fetch())
			{
				$folder = "uploads/";
				unlink($folder.$row[0]);
				Echo $folder.$row[0];
			}
			$rownum = 0;
			$stmt = $dbh->prepare("CALL sp_DelRow(?,?)");
			$stmt->execute(array($User,$rownum));
			$dbh->connection = null;
			session_destroy();
			header("Location: index.php");
		}
		else
		{
			session_destroy();
			header("Location: index.php");
		}
	
?>