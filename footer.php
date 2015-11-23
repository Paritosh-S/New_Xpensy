<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, links, icons" />

	<title>Distributed Footer</title>

	<!--link rel="stylesheet" href="CSS/demo1.css"-->
	<link rel="stylesheet" href="CSS/footer-distributed.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">
        
     ul li{
       
        
        position: relative;
       
        line-height: 20px;
        right:0;
    } ul li a{
        display: block;
        padding: 5px 10px;
        color: #fff;
        
        text-decoration: none;
    }
    
    ul li a:hover{
        color: #fff;
        
    }
    ul li ul{
        display: none;
        position: absolute;
        z-index: 999;
        
    }
    ul li:hover ul{
        display: block; /* display the dropdown */
    }
    
</style>
<style>

		/* latin-ext */
@font-face {
  font-family: 'Fauna One';
  font-style: normal;
  font-weight: 400;
  src: local('Fauna One'), local('FaunaOne-Regular'), url(http://fonts.gstatic.com/s/faunaone/v4/ev-FaPpZYwwjm7lSlYKlFRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Fauna One';
  font-style: normal;
  font-weight: 400;
  src: local('Fauna One'), local('FaunaOne-Regular'), url(http://fonts.gstatic.com/s/faunaone/v4/cSd7NBXNFQWK4oX1706dY1tXRa8TVwTICgirnJhmVJw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
/* latin */
@font-face {
  font-family: 'Muli';
  font-style: normal;
  font-weight: 400;
  src: local('Muli'), url(http://fonts.gstatic.com/s/muli/v7/z6c3Zzm51I2zB_Gi7146Bg.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}

#mainform{
width:960px;
margin:20px auto;
padding-top:20px;
font-family: 'Fauna One', serif;
}
#form{
border-radius:2px;
padding:20px 30px;
box-shadow:0 0 15px;
font-size:14px;
font-weight:bold;
width:350px;
margin:20px 250px 0 35px;
float:left;

}
h3{
text-align:center;
font-size:20px;
}
input{
width:100%;
height:35px;
margin-top:5px;
border:1px solid #999;
border-radius:3px;
padding:5px;
}
input[type=button]{
background-color:#123456;
border:1px solid white;
font-family: 'Fauna One', serif;
font-Weight:bold;
font-size:18px;
color:white;
}
textarea{
width:100%;
height:80px;
margin-top:5px;
border-radius:3px;
padding:5px;
resize:none;
}
span{
color:red
}
#note{
color:black;
font-Weight:400;
}
#returnmessage{
font-size:14px;
color:green;
text-align:center;
}
		</style>
</head>

	<body>

		

		<!-- The content of your page would go here. -->

		<footer class="footer-distributed" >

			<div class="footer-left">
                                <div class="col-md-4">
                                  <label style="color:white;">Email:</label> <a href="contact_us.php">support@xpensy.net</a>
                               </div> <!--end col-md-2-->  
                                
				<div class="col-md-2">
                                   <a class="" href="" data-toggle="modal" data-target="#myModal1" style="color:white;">Products</a>
                               </div> <!--end col-md-2-->   
                           
                               <div class="col-md-2">                                   
                                   <a class="" href="" data-toggle="modal" data-target="#myModal2" style="color:white;">Customers</a>
                               </div><!--end col-md-2-->  
                               
                               <div class="col-md-2">
                                   <a class="" href="" data-toggle="modal" data-target="#myModal3" style="color:white;">Know More</a>
                               </div><!--end col-md-2-->

				
			</div>
                        <div class="footer-right">
                               <a href="https://www.facebook.com/xpensynet/"><i class="fa fa-facebook"></i></a>
			       <a href="//plus.google.com/u/0/104491286559844272356"><i class="fa fa-google-plus"></i></a>
				
			</div>

		</footer>


<!-- Modal 1-->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title" style="color:Blue;">Products</h4></center>
        </div>
        <div class="modal-body">
		<center>
		<img src="images/homepage-slider/products.jpg" width="95%" height="20%" style="border-radius:5px 5px 5px 5px; box-shadow:1px 3px 5px #999999;">
		<h4 class="modal-title"><br>For Business</h4></center>
          <p>Simplify expense report your employees will love, Streamline your employees expense report, the way expenses are approved, and the way you export that information to your accounting package.</p>
        </div>
		<div class="modal-body">
		<center><h4 class="modal-title">For Personal</h4></center>
          <p>Expense management made easy.The best way to track and organize all of life's expenses, at home or office, all for free.</p>
        </div>
        <!--div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div-->
      </div>
      
    </div>
  </div>
  
  <!-- Modal 2-->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title" style="color:Blue;">Customers</h4></center>
        </div>
        <div class="modal-body">
		<center>
		<img src="images/homepage-slider/about5.jpg" width="90%" height="30%" style="border-radius:5px 5px 5px 5px; box-shadow:1px 3px 5px #999999;">
		<p><b><br>Our Happy Customers</b><br>See why people choose us as they go-to expense reporting solution!!</p>
		</center>
        </div>
		<div class="modal-body">
		<center><b>Join Our customers in global countries</b></center>
          <center><p><img src="images/logo.jpg" height="10%" width="30%"></p><p><img src="images/vitlogo.png" height="40%" width="40%"></p></center>
		
        </div>
        <!--div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div-->
      </div>
      </div>
    </div>
  </div>
  
  <!-- Modal 3-->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title" style="color:Blue;">Know More</h4></center>
        </div>
        <div class="modal-body">
          
			<div class="container" style="width:80%; height:50%">
			
    <div class="row">
            <div class="well well-sm">
                <!-- Required Div Starts Here -->
<form role="form" role="form" action="" method="POST">
<h3>Contact Form</h3>

<label>Name: <span>*</span></label>
<input type="text" id="name" placeholder="Name"/>
<label>Email: <span>*</span></label>
<input type="text" id="email" placeholder="Email"/>
<label>Contact No: <span>*</span></label>
<input type="text" id="contact" placeholder="10 digit Mobile no."/>

									
									
								
<label>Message:</label>
<textarea id="message" placeholder="Message......."></textarea>
<input type="button" id="submit" value="Send Message"/><br>
<p id="returnmessage"></p>
</form>
            </div>

    </div>
</div>
<script>
$(document).ready(function() {
$("#submit").click(function() {
var name = $("#name").val();
var email = $("#email").val();
var message = $("#message").val();
var contact = $("#contact").val();
$("#returnmessage").empty(); // To empty previous error/success message.
// Checking for blank fields.
if (name == '' || email == '' || contact == '') {
alert("Please Fill Required Fields");
} else {
// Returns successful data submission message when the entered information is stored in database.
$.post("contact_form1.php", {
name1: name,
email1: email,
message1: message,
contact1: contact
}, function(data) {
$("#returnmessage").append(data); // Append returned message to message paragraph.
if (data == "Your Query has been received, We will contact you soon.") {
$("#form")[0].reset(); // To reset form fields on success.
}
});
}
});
});

</script>

	</body>

</html>
