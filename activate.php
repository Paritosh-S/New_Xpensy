<?php
if(isset($_REQUEST['salt']))
{
	$salt=$_REQUEST['salt'];
	unset($_REQUEST['salt']);
	$id = $_REQUEST['id'];
	$toemail = $_REQUEST['email'];
}

//error_reporting(E_ERROR);
require_once("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->CharSet="UTF-8";
$mail->SMTPSecure = 'ssl';
$mail->Host = 'secure174.servconfig.com'; //'gator4198.hostgator.com'; //'smtp.mail.yahoo.com';
$mail->Port =	465; //465;  //587;
$mail->Username ="no_reply@xpensy.net";
$mail->Password = 'admin@xpensy'; //$_POST['pwd'];
$mail->SMTPAuth = true;

$mail->From = "no_reply@xpensy.net"; //'gnavjyot@yahoo.com';
$mail->Sender = "no_reply@xpensy.net";
//$mail->AddCC($_POST['MailCC']);
$mail->FromName = 'XPENSY';
$mail->SetFrom("no_reply@xpensy.net",'XPENSY'); //Name of user

$mail->IsHTML(true);
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
$mail->Subject    = 'Account activation link';
$mail->Body    = "Thank you for using our services, we hope you will be satisfied by the services we provide to you. Just one more step required to start using E-Expense, 
please click the following link: http://xpensy.net/version2/registration.php?&rdr=".$salt."&identity=".$id;
$mail->AddAddress($toemail) ; 
if(!$mail->Send())
{
//echo "<br>Mailer Error: " . $mail->ErrorInfo;
$message="Sorry! Unable to process your request please try again! <a href='http://xpensy.net' style='font-style:calibri; color: blue; font-size: 14;'>Go Home</a>";
}
else
{
$message = "Congratulations! your registration is successful. Please activate your account by visiting the link that we have sent on your registered email address <span style='font-style:calibri; color: blue; font-size: 14;'>".$toemail."</span>";
}
?>
<html>
<head>
<script type="text/javascript">
function reload()
{
    window.setTimeout(function () {
        location.href = "index.php";
    }, 5000);
}
</script>
</head>
<body oncontextmenu="" onload="reload()" bgcolor="#9DA19F">
<center>
<div style="top:30%; left:28%; position:absolute; width:40%; height:20%; background:#CFFADF; border-radius: 25px; box-shadow:15px;">
<p style="font-family:calibri; font-weight:bold;"><?php echo $message; ?><br>You will be shortly redirected to the login page...Please wait</p></div>
</body>
</center>

</html>