<?php
session_start();
error_reporting(0);
if(isset($_SESSION['userid']) && isset($_SESSION['login']) && isset($_SESSION['pname']))
{
	header("Location:UserProfile.php");
}
else
{
	header("Location:../index.php");
}
?>