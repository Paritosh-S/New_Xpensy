<?php 
if(isset($_POST['Submit'])){
	// code for check server side validation
	if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){  
		$msg="<span style='color:red'>Mismatch!</span>";// Captcha verification is incorrect.		
	}else{// Captcha verification is Correct. Final Code Execute here!		
		$msg="<span style='color:green'>Matched!</span>";		
	}
}
?>
<html>
<head>
<meta charset="utf-8">

<link href="CSS/styles.css" rel="stylesheet">
<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
<style>
.button
{
background: #D60419;
background: -moz-linear-gradient(top,  #D60419 0%, #999999 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#D60419), color-stop(100%,#999999));
background: -webkit-linear-gradient(top,  #D60419 0%,#999999 100%);
background: -o-linear-gradient(top,   #D60419 0%,#999999 100%);
background: -ms-linear-gradient(top,   #D60419 0%,#999999 100%);
background: linear-gradient(top,  #D60419 0%,#999999 100%);
z-index:9999;
Height:35px; width:60%;
color: white;
border:1px solid #331E20;
border-color: #331E20;
}
.button:hover
{
font-weight:bold;
}
</style>

</head>
<body>
  <center>
  <table class="" width="100%">
    <?php if(isset($msg)){?>
    <tr>
      <td align="center" valign="top"><?php echo $msg;?></td> 
    </tr>
    <?php } ?>
    <tr>
               <td align="center">
                        <label for='message'>Enter characters you see:</label><br>
                        <div class="col-xs-5"><input name="captcha_code" type="text" title="Enter Captcha code" class="form-control" style="text-align:center;"></div>			
			<img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg' style="border:1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href='javascript: refreshCaptcha();'><img src="images/reload.png" height="30px" width="30px" title="Refresh Captcha"></a>
			<br><br>
			<input  id="BtnSignup" class="btn btn-success" value="Create Account" name="Submit" type="Submit" onsubmit="return validate();">
		</td>
    </tr>
  </table>
  </center>

</body>
</html>