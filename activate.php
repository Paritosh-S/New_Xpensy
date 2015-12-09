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
$mail->Host = 'cp-30.webhostbox.net'; //'secure174.servconfig.com'; //'gator4198.hostgator.com'; //'smtp.mail.yahoo.com';
$mail->Port =	465;//465; //465;  //587;
$mail->Username ="no_reply@xpensy.com";
$mail->Password = 'vulcaninfotech'; //$_POST['pwd'];
$mail->SMTPAuth = true;

$mail->From = "no_reply@xpensy.com"; //'gnavjyot@yahoo.com';
$mail->Sender = "no_reply@xpensy.com";
//$mail->AddCC($_POST['MailCC']);
$mail->FromName = 'XPENSY';
$mail->SetFrom("no_reply@xpensy.com",'XPENSY'); //Name of user


$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
$mail->Subject    = 'Account activation link';

//$mail->Body    = "Thank you for using our services, we hope you will be satisfied by the services we provide to you. Just one more step required to start using E-Expense, 
//please click the following link: http://xpensy.com/registration.php?&rdr=".$salt."&identity=".$id;

//$msg = "Thank you for using our services, we hope you will be satisfied by the services we provide to you. Just one more step required to start using E-Expense, 
//please click the following link:<a href=' http://xpensy.com/registration.php?&rdr='.$salt.'&identity='.$id; ' class='btn'>click here</a>

$msg1 = "<!DOCTYPE html>
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
  <p style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;orphans: 3;widows: 3;margin: 0 0 10px;margin-bottom: 15px;font-size: 21px;font-weight: 200;'><strong style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;'>Congratulations</strong><br style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;'> We hope you will be satisfied by the services we provide to you.</p>
<a href='http://xpensy.com/registration.php?&rdr=$salt&identity=$id ' class='btn btn-info' role='button'  style=' -webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;background-color: #5bc0de;color: #fff;text-decoration: underline;cursor: pointer;display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height: 1.42857143;text-align: center;white-space: nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action: manipulation;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;background-image: none;border: 1px solid transparent;border-radius: 4px;border-color: #46b8da; ' >Let's Go To XPENSY</a>
</center>
</div>

<div class='container' style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;'>
  <p style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;orphans: 3;widows: 3;margin: 0 0 10px;'>Thanks,</p>      
  <p style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;orphans: 3;widows: 3;margin: 0 0 10px;'>Team XPENSY</p>      
</div>

</body>
</html>";

$mail->Body = $msg1;




$mail->IsHTML(true);
$mail->AddAddress($toemail) ; 
if(!$mail->Send())
{
//echo "<br>Mailer Error: " . $mail->ErrorInfo;
$message="Sorry! <br>Unable to process your request please try again! //<a href='http://xpensy.com' style='font-style:open_sanslight; color: blue; font-size: 16;'>Go Home</a>";
}
else
{
$message = "<Strong>Your registration done successfully.!</strong><br>Please visit your registered email address to activate your account. <span style='font-style:open_sanslight;color: blue; font-size: 16;'>".$toemail."</span>";
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
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
   
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<style>
body { 
  background: url(http://xpensy.com/assets/img/backgrounds/1.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
</head>
<body oncontextmenu="" onload="reload()" >
<center>

<div  class="overlay panel panel-primary" style="top:27%; left:20%; position:absolute; width:35%; height:25%; background:#e5f2ff; border-radius: 25px; box-shadow:15px;">
<p style="font-family:'open_sanslight; font-weight:;"><?php echo $message; ?><br>You will be redirected to the login page...Please wait</p>
<i class="fa fa-refresh fa-lg fa-spin"></i>
</div>
</body>
</center>

</html>