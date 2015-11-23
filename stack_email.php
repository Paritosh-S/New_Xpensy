<?php
session_start();
error_reporting(0);

require_once("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->CharSet="UTF-8";
$mail->SMTPSecure = 'ssl';
$mail->Host = 'secure174.servconfig.com'; //'gator4198.hostgator.com'; //'smtp.mail.yahoo.com';
$mail->Port =	465; //465;  //587;
$mail->Username ="no_reply@xpensy.net";		//$_POST['usr']; //'gnavjyot@yahoo.com';
$mail->Password = 'admin@xpensy'; //$_POST['pwd'];
$mail->SMTPAuth = true;

$mail->From = "no_reply@xpensy.net"; //"no_reply@vulcaninfotech.com"; //'gnavjyot@yahoo.com';
$mail->Sender = "no_reply@xpensy.net"; //"no_reply@vulcaninfotech.com";

$ccc = explode(",", $_POST['MailCC']);
foreach($ccc as $ccMail)
{
if(isset($ccMail) && $ccMail != '')
{
        
	$mail->AddCC($ccMail);
}
}
$mail->FromName = 'Xpensy Report';
$pname = substr($_SESSION['pname'],8);
$mail->SetFrom("no_reply@xpensy.net",$pname); //Name of user


$mail->AddReplyTo($_SESSION['login'],$pname); //('gnavjyot@yahoo.com', 'Information');

$mail->IsHTML(true);
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
$mail->Subject    = $_POST['MailSubject'];
ob_start();
include('email.php');
$mail->Body = ob_get_contents();
ob_end_clean();
$mail->Body .= 
"
<br><br><br>
You have received this email from <b>".$pname."</b>. Please reply to the sender of this email at ".$_SESSION['login']."<br><br>Thank you.";

//code starts for multiple recipients 

$to = explode(",", $_POST['MailTo']);
foreach($to as $toMail)
{
	$mail->AddAddress($toMail);
}
// code end for multiple recipients
	
	$R = 0;
	$stmt = $dbh->prepare("CALL sp_DelAttachment(?,?)");
	$stmt->execute(array($User,$R));
	while($row = $stmt->fetch())
	{
             if($row[0] != '')
             {
		$mail->AddAttachment("uploads/".$row[0]);
             }
	}
if(!$mail->Send())
{
  echo "Failed";
  //$_SESSION['mail'] = "Mailer Error: " . $mail->ErrorInfo;
  //header("Location: MailMe.php");
}
else
{
   echo "Success";
  //$_SESSION['mail']="True";
  //header("Location: MailMe.php");
}
?>