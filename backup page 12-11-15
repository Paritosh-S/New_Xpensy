<?php
$Name = $_POST['Name'];
$Email = $_POST['UserId'];
$Pass = $_POST['RePassword'];
$Atyp = "G";
session_start();
Try
{
	if(isset($_POST['Submit']))
	{
		if($_POST['RePassword'] == $_POST['UserPassword'])
		{
			if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0)
			{  
				$_SESSION['message']='C'; 
				header("Location: signup.php");	
			}
			else
			{	
					$UPass = md5(md5($Pass));
			
					try
					{
						require_once('dbcon.php');
						$Salt1= rand();
						$stmt= $dbh->prepare("CALL sp_UserRegister(?,?,?,?,?)");
						$stmt->execute(array($Name,$Email,$UPass,$Atyp,$Salt1));		
						while($row = $stmt->fetch())
						{
							$user_name = $row[0];
							$uid = $row[1];
						}
						$dbh->connection = null;
							if($user_name == $Email)
							{
								//If transaction is successful
								$_SESSION['login']=$Email;
								$_SESSION['userid']=$uid;
								$MdEmail = md5(md5($Email));
								$MdAcType = md5(md5($Atyp));
								header("Location: activate.php?&salt=".$Salt1."&id=".$uid."&email=".$Email);
							}
							else
							{
								$_SESSION['message']='E'; 
								header("Location: signup.php");
								exit;
							}		
					}
					catch(Exception $ex)
					{
						echo $ex->getMessage();
							//$_SESSION['message']='S';
							//header("Location: signup.php");
							//exit;
					}				
				$dbh->connection = null;
			}
		}
		Else
		{
			$_SESSION['message']='M';
			header("Location: signup.php");
			exit;
		}
	}
}
catch(Exception $ex)
{
	$_SESSION['user']='I';
	header("Location: signup.php");
	exit;
}
exit ;
?>