<?php
if(isset($_REQUEST['forgot']))
{
	$AType = "G";
	$toemail = $_POST['UName'];
}

//error_reporting(E_ERROR);
require_once("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->CharSet="UTF-8";
$mail->SMTPSecure = 'ssl';
$mail->Host = 'secure174.servconfig.com'; //'gator4198.hostgator.com'; //'smtp.mail.yahoo.com';
$mail->Port =	465; //465    587;
$mail->Username ="no_reply@xpensy.net";		//$_POST['usr']; //'gnavjyot@yahoo.com';
$mail->Password = 'admin@xpensy'; //$_POST['pwd'];
$mail->SMTPAuth = true;

$mail->From = "no_reply@xpensy.net"; //'gnavjyot@yahoo.com';
$mail->Sender = "no_reply@xpensy.net";
//$mail->AddCC($_POST['MailCC']);
$mail->FromName = 'Xpensy.net';
$mail->SetFrom("no_reply@xpensy.net",'Xpensy.net'); //Name of user

$mail->IsHTML(true);
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
$mail->Subject    = 'Reset your password';

/* password reset link */
$AT = md5($AType);
include('dbcon.php');
try
{
$stmt = $dbh->prepare("CALL sp_GetPassword(?,?)");
$stmt->execute(array($toemail,$AType));
$row = $stmt->rowCount();
if($row != 0)
{
    while($result = $stmt->fetch())
    {
        $uid = $result[0];
        $pwd = $result[1];
    }
$mail->Body    = "<span style='font-family:Segoe UI;font-size:14;'>We have received your request to reset your password, please click on the following link and reset your password: <br><br> http://www.Xpensy.net/ResetPassword.php?&AT=".$AT."&identity=".$uid."&tracker=".$pwd."</span>";
$mail->AddAddress($toemail) ;
unset($_POST['UName']);
      if(!$mail->Send())
      {
         echo "Sorry! Unable to process your request please try again!";
      }
      else
      {
         echo "<img src='images/Tick.png' width='25px' height='20px' valign='bottom'> Success! Please reset your password by visiting the link that we have sent on your registered email. <a  style='font-style:calibri; color: blue; font-size: 14;' href='http://Xpensy.net/version1'>Back to home</a>";
      }
}
else
{
    echo "No records found! Please check your email address and try again";
}
}
catch(PDOException $e)
{
      echo "Something went wrong, Please try again!";
}
?>