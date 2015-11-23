<?php 
$servername = "localhost:8888";
$username = "root";
$password = "1077";
$db="test";
try {
 $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	
require('fpdf.php');

$mypdf =new FPDF;

$mypdf->AddPage();

$mypdf->SetFont('Helvetica', 'B', 14);
$mypdf->Write(5,'Report of Expanse');
$mypdf->Ln();

$mypdf->SetFontSize(10);
$mypdf->Ln();
$mypdf->Write(5,'© 2015 , vulcaninfotech.com');
$mypdf->Ln();

$mypdf->Ln(5);

$mypdf->Cell(20 ,5,'UserName', 1);
$mypdf->Cell(21 ,5, 'ExCategory', 1);
$mypdf->Cell(20 ,5, 'ClaimDate', 1);
$mypdf->Cell(20 ,5, 'ClaimFrom ', 1);
$mypdf->Cell(17 ,5, 'ClaimTo', 1);
$mypdf->Cell(20 ,5, 'ClaimAmt', 1);
$mypdf->Cell(20 ,5, 'ClaimDesc ', 1);
$mypdf->Cell(24 ,5, 'ClaimReceipt', 1);
$mypdf->Cell(22 ,5, 'ClaimRowid ', 1);
$mypdf->Ln();
$mypdf->SetFont('Arial','B',9);

  $sql= "SELECT * FROM  tbluserexpenses" ;
  $result=$conn->prepare($sql);  
  $result->execute();  
  
        while ($row = $result->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)) 
		{   
			$mypdf->Cell(20 ,5,$row[0] , 1);
			$mypdf->Cell(21 ,5,$row[1], 1);
			$mypdf->Cell(20 ,5,$row[2], 1);
			$mypdf->Cell(20 ,5,$row[3], 1);
			$mypdf->Cell(17 ,5,$row[4] , 1);
			$mypdf->Cell(20 ,5,$row[5], 1);
			$mypdf->Cell(20 ,5,$row[6] , 1);
			$mypdf->Cell(24 ,5,$row[7] , 1);			
			$mypdf->Cell(22 ,5,$row[8] , 1);
			$mypdf->Ln();
        }	$mypdf->Cell(184 ,5,'total : ', 1);
		
$mypdf->AddPage();
	  $result->execute();  
	  $i = 0;
		while ($row = $result->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)) 
		{ 
	     $i = $i + 50;
         $r ="uploads/".$row[7];
			if($i==50)
			{ $mypdf->Image($r,5,10,200);
			 } 
			else
			{ $i=$i+15; $mypdf->Image($r,5,$i,200);}
		
	    } 
		$mypdf->AddPage();     
$mypdf->Output('yourfilename.pdf','F');
 ?>
 
 
	
		
		
		
	
	
	
	
	