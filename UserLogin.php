<?php
if(isset($_POST['UName']) && isset($_POST['UPassword']))
{
	$Email = $_POST['UName'];
	$Pass = $_POST['UPassword'];
	$Atyp = "G";

	/*** begin our session ***/
	session_start();
	Try
	{
		$UPass = md5(md5($Pass));
		require_once('dbcon.php');
		$stmt = $dbh->prepare("CALL sp_UserLogin(?,?)");	
		$stmt ->execute(array($Email,$Atyp));
		//$user_pass = $stmt->fetch();
		while($row = $stmt->fetch())
		{
			$flag = $row[0];
			$_SESSION['userid'] = $row[1];
			$user_pass = $row[2];
            		$_SESSION['pname'] = "Welcome! ".$row[3];
		}
		$dbh->connection = null;
		/*** if we have no result then fail boat ***/
		if($user_pass != $UPass)
		{
			$_SESSION['message']='L';
			header("Location: login.php");
			//echo "L";
		}
		else if($user_pass == $UPass && $flag == 0)
		{
			$_SESSION['message']='P';
			header("Location: login.php");
			//echo "P";
		}
		/*** if we do have a result, all is well ***/
		else
		{
				//echo "true";
				/*** tell the user we are logged in ***/
				$_SESSION['login']=$Email;			
				if (isset($_POST['RememberMe']))
				{
					/* Set cookie to last 1 year */
					setcookie('Username', $Email, time()+60*60*24,'/');
					setcookie('Password', $Pass, time()+60*60*24,'/');
					setcookie('Account', $Atyp, time()+60*60*24,'/');
				}
				
				$MdEmail = md5(md5($Email));
				$MdAcType = md5(md5($Atyp));
				$Salt1 = md5(rand());
				header("Location: UserProfile.php?&".$MdEmail.$Salt1."A$".$MdAcType."ver354er84gdf12ves3rt4cx31v3g854dsrfg8");
		}
	}
	catch(PDOException $ex)
	{
		//echo $ex->getMessage();
		$_SESSION['message']='L';
		header("Location: index.php");
	}
}
else
{
	$_SESSION['message']='L';
	header("Location: login.php");
	//echo "L";
}
exit ;
?>