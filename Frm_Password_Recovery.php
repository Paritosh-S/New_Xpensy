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
$mail->Host = 'cp-30.webhostbox.net'; //'secure174.servconfig.com'; //'gator4198.hostgator.com'; //'smtp.mail.yahoo.com';
$mail->Port =	465; //465; //465    587;
$mail->Username ="no_reply@xpensy.com";		//$_POST['usr']; //'gnavjyot@yahoo.com';
$mail->Password = 'vulcaninfotech'; //$_POST['pwd'];
$mail->SMTPAuth = true;

$mail->From = "no_reply@xpensy.com"; //'gnavjyot@yahoo.com';
$mail->Sender = "no_reply@xpensy.com";
//$mail->AddCC($_POST['MailCC']);
$mail->FromName = 'Xpensy.com';
$mail->SetFrom("no_reply@xpensy.com",'Xpensy.com'); //Name of user

$mail->IsHTML(true);
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
$mail->Subject    = 'Reset your password for XPENSY';

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
$mail->Body    = "<!DOCTYPE html>
<html lang='en' style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-family: sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;font-size: 10px;-webkit-tap-highlight-color: rgba(0,0,0,0);'>
<head style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;'>
  <title style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;'>Bootstrap Example</title>
  <meta charset='utf-8' style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;'>
  <meta name='viewport' content='width=device-width, initial-scale=1' style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;'>
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js' style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js' style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;'></script>
</head>
<body style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin: 0;font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size: 14px;line-height: 1.42857143;color: #333;background-color: #fff;'>

<div class='jumbotron' style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding-top: 30px;padding-bottom: 30px;margin-bottom: 30px;color: inherit;background-color: #eee;'>
<center style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;'>
<img src='http://xpensy.com/img/darkblack.png' alt='Xpensy Logo' style='width: 200px;height: 100px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;border: 0;vertical-align: middle;page-break-inside: avoid;max-width: 100%!important;'>
  <h5 style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-family: inherit;font-weight: 500;line-height: 1.1;color: inherit;margin-top: 10px;margin-bottom: 10px;font-size: 14px;'>Expense Reports Simplified...</h5>      
  <p style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;orphans: 3;widows: 3;margin: 0 0 10px;margin-bottom: 15px;font-size: 21px;font-weight: 200;'>We have received your request to reset your password, please click on the following link and reset your password</p>


<a href='http://www.Xpensy.com/ResetPassword.php?&AT=$AT&identity=$uid&tracker=$pwd' class='btn btn-info' role='button'  style=' -webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;background-color: #5bc0de;color: #fff;text-decoration: underline;cursor: pointer;display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height: 1.42857143;text-align: center;white-space: nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action: manipulation;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;background-image: none;border: 1px solid transparent;border-radius: 4px;border-color: #46b8da; ' >Reset Password</a>
</center>
</div>

<div class='container' style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;'>
  <p style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;orphans: 3;widows: 3;margin: 0 0 10px;'>This is contact confirmation mail.</p>      
  <p style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;orphans: 3;widows: 3;margin: 0 0 10px;'></p>      
</div>

</body>
</html>";
$mail->AddAddress($toemail) ;
unset($_POST['UName']);
      if(!$mail->Send())
      {
         echo "Sorry! Unable to process your request please try again!";
      }
      else
      {
         echo "<img src='images/Tick.png' width='25px' height='20px' valign='bottom'> Success! Please reset your password by visiting the link that we have sent on your registered email. <a  style='font-style:calibri; color: blue; font-size: 14;' href='http://Xpensy.com/'>Back to home</a>";
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