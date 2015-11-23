<?php
error_reporting(0);
?>
<?php 
session_start();
//error_reporting(E_ERROR);
try
{
	if(isset($_SESSION['login']))
	{
		$User=$_SESSION['login'];
		$UserID = $_SESSION['userid'];
		if (isset($_SESSION['curr'])) 
		{
			$Currency = $_SESSION['curr'];
		}
		else
		{
			$Currency = "";
		}
	}
	else
	{
		header("Location: EndSession.php");
	}
}
catch(Exception $ex)
{
	session_destroy();
	header("Location: EndSession.php");
}
include('dbcon.php');
require "fpdf/fpdf.php";
class PDF extends FPDF
	{
		function Header()
		{
			//Logo
			//$this->Image('logo_pb.png',10,8,33);
			//Arial bold 15
			$this->SetFont('Arial','B',15);
			//Move to the right
			$this->Cell(80);
			//Title
			$this->Cell(30,5,'Expense Reports',0,0,'C');
			$this->Ln();
			$this->SetFont('Arial','B',8);
			$this->Cell(80);
			$this->Cell(30,5,'Powered by VulcanInfotech.com',0,0,'C');
			//Line break
			$this->Ln(20);
		}
		function Footer()
		{
			//Position at 1.5 cm from bottom
			$this->SetXY(90,-15);
			//Arial italic 8
			$this->SetFont('Arial','I',8);
			//Page number
			$this->Cell(0,10,'Powered by VulcanInfotech.com',0,0,'C');
		}
	}
$mypdf =new PDF;
$mypdf->AddPage();
$mypdf->SetFont('Helvetica', 'B', 10);
/*$mypdf->Write(5,'Expense Receipts'); */
$mypdf->Ln(10);
try
{
	$sql= "SELECT ClaimReceipt,ExCategory,ClaimDate	FROM  tbluserexpenses
	Where `ClaimReceipt` != '' AND `UserName`= '$User'";
	$result=$dbh->prepare($sql); 
	$result->execute();  
	$count = 1;
	$i=100;
	$mypdf->Ln(5);
	while ($row = $result->fetch()) 
	{
		$r = "uploads/".$row[0];
		if($count<=3)
		{						
			if(1==$count)
			{ 
				$m=$i-100; 
				$mypdf->Ln($m);
				$mypdf->Image($r,45,20,105);
				$mypdf->Ln();
				$mypdf->Cell(10 ,10,$row[1],0);
				$mypdf->Ln(4);
				$mypdf->Cell(10 ,10,$row[2],0);
			} 
			else
			{ 
				$m=$i-$m;
				$mypdf->Ln($m);
				$mypdf->Image($r,45,$i+5,105);
				$mypdf->Cell(10 ,10,$row[1],0);
				$mypdf->Ln(4);
				$mypdf->Cell(10 ,10,$row[2],0);
				$i=$i+85;
			}
			$count++; 
		}	
		else 
		{
			$mypdf->AddPage();
			$count=1; 
			$i=100; 
			if(1==$count)
			{ 
				$m=$i-100; 
				$mypdf->Ln($m);
				$mypdf->Image($r,45,20,105);
				$mypdf->Ln();
				$mypdf->Cell(10 ,10,$row[1],0);
				$mypdf->Ln(4);
				$mypdf->Cell(10 ,10,$row[2],0);
			} 
			else
			{ 
				$m=$i-$m;
				$mypdf->Ln($m);
				$mypdf->Image($r,45,$i+5,105);
				$mypdf->Cell(10 ,10,$row[1],0);
				$mypdf->Ln(4);
				$mypdf->Cell(10 ,10,$row[2],0);
				$i=$i+85;
			}
			$count++; 
		}
		  
	}
$mypdf->Output();
}
catch(Exception $ex)
{
	//echo $ex->getMessage();
}
?>