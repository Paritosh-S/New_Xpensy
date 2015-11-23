	<?php error_reporting(0); session_start(); ?>
	<?php
	include('dbcon.php');
	error_reporting(0);
		try
		{
			If(isset($_SESSION['login']) && isset($_SESSION['userid']))
			{
				$User=$_SESSION['login'];
				$UserID = $_SESSION['userid'];			
			}
			else
			{
				header("Location: index.php");
			}		
		}
		catch(Exception $ex)
		{
			session_destroy();
			header("Location: EndSession.php");
		}

	?>

	<html lang="en">
	<head>
	<link rel="shortcut icon" href="images/e.ico" type="image/x-icon"/>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>E-Expense | <?php echo $pname=$_SESSION['pname'];?></title>

		<!-- Bootstrap Core CSS -->
		<link href="CSS/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="CSS/sb-admin.css" rel="stylesheet">
		<!-- Morris Charts CSS -->
		<link href="CSS/plugins/morris.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="CSS/new.css" rel="stylesheet" type="text/css">
		 
		<script src="startbootstrap-sb-admin-1.0.3/js/jquery.js"></script>

		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>
	  
		
	</head>
	<body bgcolor="#E6E6FA">
	<?php

	if(isset($_GET['idd']))
	{
		$idofimageempt=$_GET['idd'];
		
		echo "<div class='modal-dialog'>
					<div class='modal-content'>
					  <div class='modal-header'>
					
						<a href='UserProfile.php' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></a>
						<h4 class='modal-title'>Choose Image</h4>
					  </div>
					  <div class='modal-body'>
					  <form action='' method='POST' enctype='multipart/form-data'>
						<input type='file' name='file2' accept='.jpg,.png,.jpeg'/>
					  </div>
					  <div class='modal-footer'>
						<button type='sumbit' class='btn btn-outline' name='submit'>Upload</button>
					  </form>
					  </div>
					</div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->";
		
		
		
		
	}
	else{
		echo "<script>

	window.location.href='UserProfile.php';
	</script>"; 	
		
		
	}
	if(isset($_POST['submit']))
	{
		
	
	if (isset($_FILES['file2']))
			{
				
				$varCount = rand();
				$Receipt = $_FILES['file2'];
				$file_type= $_FILES['file2']['type'];			
				$file_path=$_FILES["file2"]["tmp_name"];

							if($file_type == "image/jpeg")
							{
							 $f_type = "jpeg";
							}
							else if($file_type == "image/png")
							{
							  $f_type = "png";
							}
							else if($file_type == "image/jpg")
							{
							  $f_type = "jpg";
							}
				if($file_type!= '' && ($file_type="image/jpeg" || $file_type="image/png" || $file_type="image/jpg"))
				{
					$result="SELECT * FROM tbluserexpenses WHERE ClaimRowid=?";
					$stmt = $dbh->prepare($result);
	$stmt->execute(array($idofimageempt)); 
	while($row =$stmt->fetch())
	{
		
		$reciept=$row['ClaimReceipt'];
		$ExCategory = $row['ExCategory'];
                $amt = $row['ClaimAmount'];
		
		
	}
        $rand = rand();
        $file_name = $ExCategory."_".$amt."_ID".$rand.".".$f_type;
        move_uploaded_file($file_path,"uploads/".$file_name);
	$ClaimReceipt = $file_name;
			if($reciept=='')
			{				
					
					 $sql11 = "UPDATE tbluserexpenses 
			SET ClaimReceipt=?	WHERE ClaimRowid=?";
	$stmt = $dbh->prepare($sql11);
	$stmt->execute(array($ClaimReceipt,$idofimageempt)); 
				echo "<script>
	window.location.href='UserProfile.php';
	</script>"; 	
/* 
$sql11 = "UPDATE tbluserexpenses 
			SET ClaimReceipt='$ClaimReceipt' WHERE ClaimRowid='$idofimageempt'";
		mysqli_query($dbh,$sql11);
		echo "<script>
	alert('updated successfully');
	window.location.href='UserProfile.php';
	</script>"; */ 
			}
			else{
				$folder = "uploads/";
		unlink($folder.$reciept);
				$sql11 = "UPDATE tbluserexpenses 
			SET ClaimReceipt=?	WHERE ClaimRowid=?";
	$stmt = $dbh->prepare($sql11);
	$stmt->execute(array($ClaimReceipt,$idofimageempt)); 
				echo "<script>
	window.location.href='UserProfile.php';
	</script>"; 	
				
			}
		
	}
				else
				{
					//echo $warning = "Please check format '.jpeg or .png' for attachments and its size < 500 kb";
				echo "<script>
	alert('File format not supported');
	window.location.href='UserProfile.php';
	</script>"; 
				}

		
		
		} 
	}
				  
	 ?>        
			  










	 
	</body>
	<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Morris Charts JavaScript -->
		
	  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  
	</html>