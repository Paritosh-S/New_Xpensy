<?php 

session_start();
include('dbcon.php');


$checkemptyreportINR=$_GET['checkamtinr'];
$subject=$_GET['subject'];
$checkemptyreportUSD=$_GET['checkamtusd'];


if ($checkemptyreportINR>0 || $checkemptyreportUSD>0 )
{

//echo"$checkemptyreportINR";
//echo"$subject";
//echo"$checkemptyreportUSD";
$user = $_SESSION['login'];
date_default_timezone_set("Asia/Calcutta");
$datetime= date('Y-m-d H:i:s');
	
$stmt = $dbh->prepare("CALL sp_SendData(?,?)");
$stmt->execute(array($user,$subject));

echo "<script>
//alert('Report send Successfully');
window.location.href='UserProfile.php';
</script>";



}
else
{
	echo "<script>
alert('Error! Make sure you have atleast 1 expense entered');
window.location.href='UserProfile.php';
</script>";
}


?>












?>