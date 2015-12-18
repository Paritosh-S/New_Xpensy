<!DOCTYPE html>
<html lang="en">
  
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="google-site-verification" content="ndmgowRAJAHrYvlYX3Q3JmHXZjQ-elXbG_X4bV7_LRc" />
    <title>Xpensy | Home</title>

    <link href="css1/font-awesome.min.css" rel="stylesheet">
    
    <link href="css1/bootstrap.css" rel="stylesheet">

    <link href="css1/style.css" rel="stylesheet">

    <script type="text/javascript" src="js1/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js1/bootstrap.js"></script>
    <script type="text/javascript" src="js1/plugins.js"></script>

    <script type="text/javascript" src="js1/banzhow.js"></script>
  </head>

 
  <body>
    

    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
<a href="index.php">
     <img src="img/Xpensy.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right">   
            <li><a href="login.php">Login</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>


    
    <div id="myCarousel" class="carousel slide">
      <!-- Indicators -->
       

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <div class="fill" style="background-image:url('img/slide/image.jpg');"></div>
            <div class="carousel-caption"><br>
              <h2>Expense reports the <span style="color:#28ABCC;">easy way!</span></h2>
			  Automate travel and business expense reporting. Streamline approvals. Gain visibility and control over spending.
              <a href="signup.php" class="button">SIGN UP NOW</a>
            </div>
          </div>


         
        </div>

        <!-- Controls -->
        
    </div>
  <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <div class="block-icon">
			<i class="fa fa-pencil"></i>
            </div>
            <div class="block-body">
              <h2>Send Report Easily</h2>
              <div class="line-subtitle"></div>
              <p>With the help of Xpensy Send report easily and quickly</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="block-icon">
             <i class="fa fa-mobile"></i>
            </div>
            <div class="block-body">
              <h2>Send reports from your Smart Phone</h2>
              <div class="line-subtitle"></div>
              <p>Sending reports from your Smart Phone is now easy</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="block-icon">
            <i class="fa fa-file-text-o"></i>
            </div>
            <div class="block-body">
              <h2>Replace Excel sheet</h2>
              <div class="line-subtitle"></div>
              <p>Xpensy gives you an option to replace excel sheet</p>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.section -->
    
    
    
    
    <footer>
      <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-4">
            <a class="footer-brand" href="index.php"> <img src="img/footerlogo.png"></a>
   <!--  <p>       Xpensy started @ 2015 with vulcan's burning hatred for generating awful expense reports business and travel expense.With features like flexible expense report you will save time and money when managing expenses .Now,it is simplified to submit expense from any location across the globe.</p>-->
            
          </div>
          <div class="col-lg-4 col-md-4">
            <h3>Social Links</h3>
            <address>
              
            <!--  <a href="#"><i class="fa fa-thumbs-o-up"></i> Help </a><br><br>-->
             <ul class="list-inline list-unstyled social-networks">
              <li>
                <a href="https://www.facebook.com/Xpensy-199237910411268/?ref=hl">
                  <div class="icon-social icon-social-facebook normal">
                    <i class="fa fa-facebook"></i>
                    
                  </div>
                  <div class="icon-social hover">
                    <i class="fa fa-facebook"></i>
                  </div>
                </a>
              </li>

              <!--<li>
                <a href="#">
                  <div class="icon-social icon-social-twitter normal">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <div class="icon-social hover">
                    <i class="fa fa-twitter"></i>
                  </div>
                </a>
              </li>-->

             <!-- <li>
                <a href="#">
                  <div class="icon-social icon-social-google-plus normal">
                    <i class="fa fa-google-plus"></i>
                  </div>
                  <div class="icon-social hover">
                    <i class="fa fa-google-plus"></i>
                  </div>
                </a>
              </li>-->

             </ul>
             
            </address>
          </div>
          <div class="col-lg-4 col-md-4">
            <h3>CONTACT US</h3>
            <form action="" method="POST">
            <div class="input-group">
              <input type="email" placeholder="Email" name="email"  class="form-control"><br><br>
			   <textarea name="message" class="form-control" rows="3" cols="40" id="input4" placeholder="Message"></textarea><br><br>
<input type="submit" name="submit1" value="Submit" class="btn btn-primary">
            </div><!-- /input-group -->
			</form>
          </div>
        </div><!-- /.row -->

      </div><!-- /.container -->
    </footer>

    <div class="footer-after">
      <div class="container">
        <div class="row">
          <p class="col-md-10">©2015 All rights reserved | <a href="xpensy.net">Xpensy</a></p>
        
        </div><!-- /.row -->
      </div>
    </div>
    
   
    
    

  </body>
</html>
<?php
// Fetching Values from URL.
if(isset($_POST['submit1']))
{

$email = $_POST['email'];

$message = $_POST['message'];

$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed

   if(!empty($email))
   {
    if(!empty($message))
	{
	  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

$subject = $name;
// To send HTML mail, the Content-type header must be set.
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.'no_reply@xpensy.net'. "\r\n"; // Sender's Email
$headers .= 'Cc:' . $email. "\r\n"; // Carbon copy to Sender
$template = '
<html>
<head>
</head>
<body>
<div style="padding:50px; color:black; background-color:#e5f2ff;">
<div style="background-color:#e5f2ff; color:black;">
<center><img href="#" alt="logo" src="http://xpensy.net/footerlogo.png" height="130px" width="130px">
<h3>Expense Reports...Simplified</h3>
</div>

<br>
<center>
<h2>Hello ' . $name . ','
. '<br>'
. 'Thank you...! For Contacting Us.<br/><br/><br/><br/></h2>'
//. 'Name:' . $name . '<br/><br/>'
//. 'Email:' . $email . '<br/><br/>'
//. 'Contact No:' . $contact . '<br/><br/>'
. 'Message:' . $message . '<br/><br/><br/><br/>'
. '<h2><a style="text-decoration: none;"  href="http://xpensy.net/index.php" class="btn btn-info">Visit Xpensy</a><br></h2>'
. '</center><br><br>'
. 'This is a Contact Confirmation mail.'
. '<br/>'
. '</div>' 
. '</body></html>';

$template1 = "<!DOCTYPE html>
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
<img src='http://xpensy.net/img/bluehighres.png' alt='Xpensy Logo' style='width: 200px;height: 70px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;border: 0;vertical-align: middle;page-break-inside: avoid;max-width: 100%!important;'>
  <h5 style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-family: inherit;font-weight: 500;line-height: 1.1;color: inherit;margin-top: 10px;margin-bottom: 10px;font-size: 14px;'>Expense Reports Simplified...</h5>      
  <p style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;orphans: 3;widows: 3;margin: 0 0 10px;margin-bottom: 15px;font-size: 21px;font-weight: 200;'><strong style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-weight: 700;'>Thank You ..For Contacting Us.</strong><br style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;'> <h6 style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;font-family: inherit;font-weight: 500;line-height: 1.1;color: inherit;margin-top: 10px;margin-bottom: 10px;font-size: 12px;'>Our support team will get back to you soon.</h6></p>
<a href='http://xpensy.net/' class='btn btn-info' role='button' style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;background-color: #5bc0de;color: #fff;text-decoration: underline;cursor: pointer;display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height: 1.42857143;text-align: center;white-space: nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action: manipulation;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;background-image: none;border: 1px solid transparent;border-radius: 4px;border-color: #46b8da;'>Let's Go To XPENSY</a>
</center>
</div>

<div class='container' style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;'>
  <p style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;orphans: 3;widows: 3;margin: 0 0 10px;'>This is contact confirmation mail.</p>      
  <p style='-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;orphans: 3;widows: 3;margin: 0 0 10px;'></p>      
</div>

</body>
</html>";

$sendmessage = "<div >" . $template1 . "</div>";
// Message lines should not exceed 70 characters (PHP rule), so wrap it.
$sendmessage = wordwrap($sendmessage, 100);



$headers1 = 'MIME-Version: 1.0' . "\r\n";
$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers1 .= 'From: '. $email. "\r\n"; // Sender's Email
$template1 = '<div style="padding:50px; color:black;">Hello Admin, you have message from' . $name . ',<br/><br/>'



. 'Email:' . $email . '<br/><br/>'
. 'Message:' . $message . '<br/><br/>';

$sendmessage1 = "<div style=\"background-color:#F0F0F0; color:black;\">" . $template1 . "</div>";
// Message lines should not exceed 70 characters (PHP rule), so wrap it.
$sendmessage1 = wordwrap($sendmessage1, 70);


// Send mail by PHP Mail Function.
mail($email,$subject, $sendmessage, $headers);
mail('support@xpensy.net',$subject, $sendmessage1, $headers1);
//mail($email,$subject, $sendmessage, $headers);
//mail('no_reply@xpensy.net',$subject, $sendmessage1, $headers1);

echo "<script type='text/javascript'>alert('Message sent successfully')</script>";


} else {
echo "<script type='text/javascript'>alert('Invalid email')</script>";
}
	}else{ echo "<script type='text/javascript'>alert('Message cannot be empty')</script>";}
   }else{echo "<script type='text/javascript'>alert('Email cannot be empty')</script>";}


}
?>