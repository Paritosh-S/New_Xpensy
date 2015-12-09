<?php
// Fetching Values from URL.
$name = $_POST['name1'];
$email = $_POST['email1'];
$message = $_POST['message1'];
$contact = $_POST['contact1'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
if (!preg_match("/^[0-9]{10}$/", $contact)) {
echo "<span>* Please Fill Valid Contact No. *</span>";
} else {
$subject = $name;
// To send HTML mail, the Content-type header must be set.
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.'support@xpensy.com'. "\r\n"; // Sender's Email
$headers .= 'Cc:' . $email. "\r\n"; // Carbon copy to Sender



$template1 = '<!DOCTYPE html>
<html lang="en" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-family: sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;font-size: 10px;-webkit-tap-highlight-color: rgba(0,0,0,0);">
<head style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
  <title style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">Bootstrap Example</title>
  <meta charset="utf-8" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
  <meta name="viewport" content="width=device-width, initial-scale=1" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"></script>
</head>
<body style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;margin: 0;font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size: 14px;line-height: 1.42857143;color: #333;background-color: #fff;">

<div class="jumbotron" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding-top: 30px;padding-bottom: 30px;margin-bottom: 30px;color: inherit;background-color: #eee;">
<center style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
<img src="http://xpensy.com/img/bluehighres.png" alt="Xpensy Logo" -webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;border: 0;vertical-align: middle;page-break-inside: avoid;max-width: 100%!important;">
  <h5 style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-family: inherit;font-weight: 500;line-height: 1.1;color: inherit;margin-top: 10px;margin-bottom: 10px;font-size: 14px;">Expense Reports Simplified...</h5>      
  <p style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;orphans: 3;widows: 3;margin: 0 0 10px;margin-bottom: 15px;font-size: 21px;font-weight: 200;"><strong style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;">Thank You ..For Contacting Us.</strong><br style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;"> <h6 style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-family: inherit;font-weight: 500;line-height: 1.1;color: inherit;margin-top: 10px;margin-bottom: 10px;font-size: 12px;">Our support team will get back to you soon.</h6></p>
<a href="http://xpensy.com/" class="btn btn-info" role="button" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;background-color: #5bc0de;color: #fff;text-decoration: underline;cursor: pointer;display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height: 1.42857143;text-align: center;white-space: nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action: manipulation;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;background-image: none;border: 1px solid transparent;border-radius: 4px;border-color: #46b8da;">Let's Go To XPENSY</a>
</center>
</div>

<div class="container" style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;">
  <p style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;orphans: 3;widows: 3;margin: 0 0 10px;">This is contact confirmation mail.</p>      
  <p style="-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;orphans: 3;widows: 3;margin: 0 0 10px;"></p>      
</div>

</body>
</html>';










$sendmessage = "<div >" . $template1 . "</div>";
// Message lines should not exceed 70 characters (PHP rule), so wrap it.
$sendmessage = wordwrap($sendmessage, 100);



$headers1 = 'MIME-Version: 1.0' . "\r\n";
$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers1 .= 'From: '. $email. "\r\n"; // Sender's Email
$template1 = '<div style="padding:50px; color:black;">Hello Admin, you have message from' . $name . ',<br/><br/>'

. 'Name:' . $name . '<br/>'
. 'Email:' . $email . '<br/>'
. 'Contact No:' . $contact . '<br/>'
. 'Message:' . $message . '<br/><br/>';

$sendmessage1 = "<div style=\"background-color:#f2f2f2; color:black;\">" . $template1 . "</div>";
// Message lines should not exceed 70 characters (PHP rule), so wrap it.
$sendmessage1 = wordwrap($sendmessage1, 70);


// Send mail by PHP Mail Function.
mail($email,$subject, $sendmessage, $headers);
mail('support@xpensy.com',$subject, $sendmessage1, $headers1);
echo "Your Message has been sent successfully.";
}
} else {
echo "<span>* invalid email *</span>";
}
?>