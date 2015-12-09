<?php
session_start();
if(isset($_SESSION['login']) && isset($_SESSION['userid']) && isset($_SESSION['pname']))
{
	header("Location: UserProfile.php");
	exit;
}
else if(isset($_GET['access_google_id']))
{
	$_SESSION['pname']="Welcome! ".$_GET['access_google_name'];
	$_SESSION['userid']=substr($_GET['access_google_id'],12);
	$_SESSION['login']=$_GET['access_google_email'];
        header("location:UserProfile.php");
}
else
{
        header("Location: index.php");
        session_destroy();
}
?>