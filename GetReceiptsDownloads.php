<?php 

session_start();

	error_reporting(0);

	try
	{
		If(isset($_SESSION['login']) && isset($_SESSION['userid']) && isset($_REQUEST['Title']))
		{
			$User=$_SESSION['login'];
			$UserID = $_SESSION['userid'];
                        $title = $_REQUEST['Title'];			
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

include('dbcon.php');
require "fpdf/fpdf.php";
class PDF extends FPDF
	{
		function Header()
		{

			//date_default_timezone_set("Asia/Kolkata");
			$date = date('d-m-Y H:i:s');
			//Logo
			$this->Image('images/xlogo7.jpg',8,7,30);
			//Arial bold 15
			$this->SetFont('Arial','B',15);
			//Move to the right
			$this->Cell(80);
			//Title
			$this->Cell(170,5,'Expense Receipts',0,0,'C');
			$this->Ln();
			$this->SetFont('Arial','B',8);
			$this->Cell(80);
			$this->Cell(170,5,$date,0,0,'C');
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
			$this->Cell(0,10,'Powered by XPENSY',0,0,'C');
		}
	}
$mypdf = new PDF;
$mypdf->AddPage();
$mypdf->SetFont('Helvetica', 'B', 10);
$mypdf->Ln(10);
try
{
	$sql= "SELECT ClaimReceipt,ExCategory,ClaimDate	FROM  tbluserexpenses
	Where `ClaimReceipt` != '' AND `UserName`= '$User'";
	$result=$dbh->prepare($sql); 
	$result->execute();
        $res = $result->rowCount();
if($res > 0)
{
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
				$mypdf->Image($r,45,40,105);
				$mypdf->Ln();
				$mypdf->Cell(10 ,10,$row[1],0);
				$mypdf->Ln(4);
				$mypdf->Cell(10 ,10,$row[2],0);
			} 
			else
			{ 
				$m=$i-$m;
				$mypdf->Ln($m);
				$mypdf->Image($r,45,$i+10,105);
				$mypdf->Cell(10 ,-45,$row[1],0);
				$mypdf->Ln(4);
				$mypdf->Cell(10 ,-45,$row[2],0);
				$i=$i+90;
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
				$mypdf->Cell(10 ,-45,$row[1],0);
				$mypdf->Ln(4);
				$mypdf->Cell(10 ,-45,$row[2],0);
				$i=$i+85;
			}
			$count++; 
		}
		  
	}
	$stmt = $dbh->prepare("CALL sp_StorePDF(?,?,?,?)");	
	$stmt ->execute(array($UserID,'ATMT','Rcp',$title));
	$name = $stmt->fetch();
	$PDFName = $name[0];
        $mypdf->Output("PDFDOCS/".$PDFName.".pdf");
	//$mypdf->Output();
        echo "Receipt PDF generated successfully! <a href='ViewReports.php'>View now</a>";
}
else
{
        echo "No Receipts uploaded!";
}
}
catch(Exception $ex)
{
	echo "Please upload the images with original file extension and try again"; 
}
?>