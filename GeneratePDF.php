<?php
error_reporting(0);
?>
<!--?php 
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
/* $mypdf->Write(5,'Expense Report');
$mypdf->Ln();
$mypdf->SetFontSize(10);
$mypdf->Ln();
$mypdf->Write(10,'© 2015 , vulcaninfotech.com');
$mypdf->Ln(); */
//$mypdf->Ln(10);
$mypdf->setFillColor(230,230,230);
$mypdf->Cell(30 ,10, 'Category', 1, 0, 'C',true);
$mypdf->setFillColor(230,230,230);
$mypdf->Cell(95 ,10, 'Description', 1, 0, 'C',true);
$mypdf->setFillColor(230,230,230);
$mypdf->Cell(30 ,10, 'Receipt Date', 1, 0, 'C',true);
$mypdf->setFillColor(230,230,230);
$mypdf->Cell(30 ,10, 'Amount', 1, 0, 'C',true);
$mypdf->Ln();
$mypdf->SetFont('Arial','B',9);
try
{
	$sql= "SELECT UserName,ExCategory, date_format(ClaimDate, '%d-%m-%Y'),ClaimAmt,ClaimDesc, ClaimReceipt FROM  tbluserexpenses
	Where `UserName`= '$User'" ;
	$result=$dbh->prepare($sql);  
	$result->execute();    
	while ($row = $result->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)) 
	{
		$mypdf->Cell(30 ,10,$row[1], 1, 0, 'C');
		$x = $mypdf->GetX();
		$y = $mypdf->GetY();
		$mypdf->MultiCell(95 ,5,$row[4] ,1,'C');
		$mypdf->setXY($x+95,$y);
		$mypdf->Cell(30 ,10,$row[2], 1, 0, 'C');
		$mypdf->setXY($x+125,$y);
		$Amt = $Currency." ".$row[3];
		$mypdf->Cell(30 ,10,$Amt, 1, 0, 'C');
		$mypdf->Ln(12);
	}
	$sql="select SUM(ClaimAmt) from tbluserexpenses Where `UserName`= '$User'";
	$result1=$dbh->prepare($sql);  
	$result1->execute();
	$total = $result1->fetchColumn();
	$x = $mypdf->GetX();
	$y = $mypdf->GetY();	
	$mypdf->setXY($x+145,$y-2);
	$mypdf->Cell(40 ,5,"Total :     ".$Currency." ".$total, 1);
	/* $result->execute();  
	$count = 1;
	$i=100;
	$mypdf->Ln(5);
	while ($row = $result->fetch()) 
	{  
		if($count<=3)
		{
			if($row[5]=='noprev')
			{
				//$r = "images/".$row[5].".jpg";
				$r = "No image available.";
				if($count==1)
				{
					$m=$i-100; 
					$mypdf->Ln($m);
					$x = $mypdf->GetX();
					$y = $mypdf->GetY();
					$mypdf->Cell($r ,10,$row[1],10);
					$mypdf->setXY($x+35,$y+2);
					$mypdf->Cell(30 ,5,$r,10);
					$mypdf->Ln(3);
					$mypdf->Cell($r ,10,$row[2],10);
				} 
				else
				{ 
					$m=$i-25;
					$mypdf->Ln($m);
					$x = $mypdf->GetX();
					$y = $mypdf->GetY();
					$mypdf->Cell($r ,10,$row[1],10);
					$mypdf->setXY($x+35,$y+2);
					$mypdf->Cell(30 ,5,$r,10);
					$mypdf->Ln(3);
					$mypdf->Cell($r ,10,$row[2],10);
					$i=$i+25;
				}
				$count++; 
			}
			else
			{
				$r = "uploads/".$row[5];
				if($count==1)
				{ 
					$m=$i-100; 
					$mypdf->Ln($m);
					$mypdf->Image($r,45,10,10);
					$mypdf->Ln();
					$mypdf->Cell(10 ,10,$row[1],0);
					$mypdf->Ln(4);
					$mypdf->Cell(10 ,10,$row[2],0);
				} 
				else
				{ 
					$m=$i-$m;
					$mypdf->Ln($m);
					$mypdf->Image($r,45,$i,100);
					$mypdf->Cell(10 ,10,$row[1],0);
					$mypdf->Ln(4);
					$mypdf->Cell(10 ,10,$row[2],0);
					$i=$i+25;
				}
				$count++; 
			}	
		}
		else 
		{
			$mypdf->AddPage();
			$count=1; 
			$i=100; 
			if($row[5]=='noprev')
			{
				//$r = "images/".$row[5].".jpg";
				$r = "No image available.";
				if($count==1)
				{
					$m=$i-100; 
					$mypdf->Ln($m);
					$x = $mypdf->GetX();
					$y = $mypdf->GetY();
					$mypdf->Cell($r ,10,$row[1],10);
					$mypdf->setXY($x+35,$y+2);
					$mypdf->Cell(30 ,5,$r,10);
					$mypdf->Ln(4);
					$mypdf->Cell($r ,10,$row[2],10);
				} 
				else
				{ 
					$m=$i-25;
					$mypdf->Ln($m);
					$x = $mypdf->GetX();
					$y = $mypdf->GetY();
					$mypdf->Cell($r ,10,$row[1],10);
					$mypdf->setXY($x+35,$y+2);
					$mypdf->Cell(30 ,5,$r,10);
					$mypdf->Ln(4);
					$mypdf->Cell($r ,10,$row[2],10);
					$i=$i+25;
				}
				$count++; 
			}
			else
			{
				$r = "uploads/".$row[5];
				if($count==1)
				{ 
					$m=$i-25; 
					$mypdf->Ln($m);
					$mypdf->Image($r,45,10,100);
					$mypdf->Ln();
					$mypdf->Cell(10 ,10,$row[1],0);
					$mypdf->Ln(4);
					$mypdf->Cell(10 ,10,$row[2],0);
				} 
				else
				{ 
					$m=$i-$m;
					$mypdf->Ln($m);
					$mypdf->Image($r,45,$i,100);
					$mypdf->Cell(10 ,10,$row[1],0);
					$mypdf->Ln(4);
					$mypdf->Cell(10 ,10,$row[2],0);
					$i=$i+25;
				}
				$count++; 
			}
		}
		  
	} */
	$mypdf->Output();
}
catch(Exception $ex)
{
	//echo $ex->getMessage();
}
?-->