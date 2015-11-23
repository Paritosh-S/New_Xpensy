<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Expense | Product</title>

    <!-- Bootstrap Core CSS -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="CSS/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
	#P_links1
	{
		width:103%;
		height:10%;
		position:absolute;
		//margin-top:0%;
		margin-left:-8%;
		z-index:1;	
		background-color:#262626;
		font-family:Calibri;
		//border-radius: 5px 5px 5px 5px;
		//top: 441px;
	}
	.P_anchor
	{
		//margin:10px;
		font-weight:bold;
		color:#FFFFFF;
		font-style:none;
	}
	.P_anchor:hover
	{
		//margin:10px;
		color:#FFFFFF;
	}

	</style>
</head>

<body style=" background-color:#F0F7FA;  background-repeat: no-repeat; " oncontextmenu="return false" >

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     <img height="60"  style="margin-left:-41px;" src="images/Logo3.png" alt="">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                  <li><a href="index.php" class="P_anchor">Home</a></li>
                    </li>
                    <li>
                        <a href="contact_new.php" class="P_anchor">Contact</a>
                    </li>
                    <li class="dropdown">
                        <a href="about_new.php" class="P_anchor">About</a>
                    </li>
                    <li>
                        <a href="help.php" class="P_anchor">Help</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="P_anchor">Other Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="Product_new.php" class="color"><font size="3px"><img style="vertical-align: bottom; width: 22px; height: 22px;" title="Product" alt="" src="images/product.png">Product</font></a>
                            </li>
                            <li>
                                <a href="Customer_new.php"class="color"><font size="3px"><img style="vertical-align: bottom; width: 22px; height: 22px;" title="Customers" alt="" src="images/customer.png">Customers</font></a>
                            </li>
                            <li>
                                <a href="LearnMore_new.php" class="color"><font size="3px"><img style="vertical-align: bottom; width: 22px; height: 22px;" title="Learn More" alt="" src="images/more.png">Ask about Services</font></a>
                            </li>
                        </ul>
                    </li>
					<li class="dropdown">
                        <a href="login.php" class="P_anchor">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Product</h3>
                <!--ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                     <li class="active">Product</li>
                </ol-->
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
				<h2 style="text-align:center; box-shadow: 5px 5px 5px #888888; height:40px; background-color:#666666; color:white;">For Business</h2>
					  <p style="text-align:center;font-size:22px;">Simplified expense reporting your employees will love</p>
					  <center><h5>Streamline the way your employees report expenses, the way expenses are approved, and the way you export that information to your accounting package.</h5><center>
					  
				<h2 style="text-align:center; box-shadow: 5px 5px 5px #888888; height:40px; background-color:#666666; color:white;">For Personal</h2>
					  <p style="text-align:center;font-size:22px;">Expense management made easy</p>
					  <center><h5>The best way to track and organize all of life are expenses, at home or on the go, all for free.</h5></center>
				<br>
				<img src="images/AppFlow.png" height="180" width="600" style="border-radius:20px; box-shadow: 5px 5px 5px #888888;">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <!--footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer-->
		<div style="cursor:pointer; bottom:-10px; left:5%; position:fixed; z-index:11;">
			<br><br>
			<a href=""><img style="width: 30px; height: 30px;" title="Follow us on Twitter" src="images/Twitter_logo2.png"></a>	<a href=""><img style="width: 30px; height: 30px;" title="Share Youtube video" src="images/YouTube-icon2.png"></a>
				<a href=""><img style="width: 30px; height: 30px;" title="Follow us on G+" src="images/g+2.png"></a>
			<br>
			<br>
		</div>
<!--div id="P_links1"><br>
		<span style="margin-left:50%; color:#FFFFFF; font-style:italic;"><a href="" class="P_anchor">Policy and Terms</a>&nbsp;|&nbsp;<a href="" class="P_anchor">FAQ</a>&nbsp;|&nbsp;<a href="" class="P_anchor">About our Ads</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Copyright &copy; 2015 Vulcan Infotech</span>
</div-->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>