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
$headers .= 'From: '.'support@xpensy.net'. "\r\n"; // Sender's Email
$headers .= 'Cc:' . $email. "\r\n"; // Carbon copy to Sender
$template = '<div style="padding:50px; color:black;">Hello ' . $name . ',<br/>'
. '<br/>Thank you...! For Contacting Us.<br/><br/><br/><br/>'
. 'Name:' . $name . '<br/><br/>'
. 'Email:' . $email . '<br/><br/>'
. 'Contact No:' . $contact . '<br/><br/>'
. 'Message:' . $message . '<br/><br/><br/><br/>'
. 'This is a Contact Confirmation mail.'
. '<br/>'
. '</div>';
$sendmessage = "<div style=\"background-color:#F0F0F0; color:black;\">" . $template . "</div>";
// Message lines should not exceed 70 characters (PHP rule), so wrap it.
$sendmessage = wordwrap($sendmessage, 70);



$headers1 = 'MIME-Version: 1.0' . "\r\n";
$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers1 .= 'From: '. $email. "\r\n"; // Sender's Email
$template1 = '<div style="padding:50px; color:black;">Hello Admin, you have message from' . $name . ',<br/><br/>'

. 'Name:' . $name . '<br/>'
. 'Email:' . $email . '<br/>'
. 'Contact No:' . $contact . '<br/>'
. 'Message:' . $message . '<br/><br/>';

$sendmessage1 = "<div style=\"background-color:#F0F0F0; color:black;\">" . $template1 . "</div>";
// Message lines should not exceed 70 characters (PHP rule), so wrap it.
$sendmessage1 = wordwrap($sendmessage1, 70);


// Send mail by PHP Mail Function.
mail($email,$subject, $sendmessage, $headers);
mail('support@xpensy.net',$subject, $sendmessage1, $headers1);
echo "Your Message has been sent successfully.";
}
} else {
echo "<span>* invalid email *</span>";
}
?>