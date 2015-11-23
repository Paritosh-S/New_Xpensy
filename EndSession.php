<?php
error_reporting(0);
session_start();
			

		//{ Below commented code here }
		
		unset($_SESSION['login']);
		unset($_SESSION['userid']);
		session_destroy();
		header("Location: index.php");
							
			/*include('dbcon.php');
			$R = 0;
			$stmt = $dbh->prepare("CALL sp_DelAttachment(?,?)");
			$stmt->execute(array($User,$R));
			while($row = $stmt->fetch())
			{
				$folder = "uploads/";
				unlink($folder.$row[0]);
				$folder.$row[0];
			}
			$rownum = 0;
			$stmt = $dbh->prepare("CALL sp_DelRow(?,?)");
			$stmt->execute(array($User,$rownum));
			$dbh->connection = null; */			
	
?>