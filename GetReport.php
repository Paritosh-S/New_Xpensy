<?php 

session_start();

	error_reporting(0);

	try
	{
		If(isset($_SESSION['login']) && isset($_SESSION['userid']) && isset($_REQUEST['Title']))
		{
			$User=$_SESSION['login'];
			$UserID = $_SESSION['userid'];
                        $Rtitle = $_REQUEST['Title'];			
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
require "fpdf/fpdf.php";
class PDF extends FPDF
	{
		function Header()
		{
			//date_default_timezone_set("Asia/Kolkata");
			$date = date('d-m-Y H:i:s');
			//Logo
			$this->Image('images/xlogo7.jpg',10,8,33);
			//Arial bold 15
			$this->SetFont('Arial','B',15);
			//Move to the right
			$this->Cell(80);
			//Title
			$this->Cell(170,5,'Expense Refwwefwefeports',0,0,'C');
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
$mypdf =new PDF;
$mypdf->AddPage();
$mypdf->SetFont('Arial', 'I', 10);
/* $mypdf->Write(5,'Expense Report');
$mypdf->Ln();
$mypdf->SetFontSize(10);
$mypdf->Ln();
$mypdf->Write(10,'© 2015 , XPENSY');
$mypdf->Ln(); */
//$mypdf->Ln(10);here comes ur fuckin code.








try
{
 include('dbcon.php');
$sql1= "SELECT * from tbluserdetails Where `UserName`= '$User'";
	$result=$dbh->prepare($sql1);  
	$result->execute();
        $row1 = $result->fetch();
$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User'";
	$result=$dbh->prepare($sql);  
	$result->execute();
        $row = $result->fetch();
$sql2= "SELECT * from tblreportstore Where `UserID`= '$UserID'";
	$result1=$dbh->prepare($sql2);  
	$result1->execute();
        $row3 = $result1->fetch();

$mypdf->SetFont('Arial', 'B', 12);

$mypdf->setFillColor(265,265,265);
$mypdf->Cell(185 ,12,"Name :-   ".$row1[1], 0, 0, 'L',true);
$mypdf->Ln();
$mypdf->setFillColor(265,265,265);
$mypdf->Cell(185,12, "Email :-   ".$row[0], 0, 0, 'L',true);
$mypdf->Ln();
$mypdf->Ln();
$mypdf->SetFont('Arial', 'B', 15);
$mypdf->setFillColor(240,240,240);
$mypdf->Cell(185 ,12, $Rtitle, 1, 0, 'C',true);
$mypdf->Ln();



$mypdf->SetFont('Arial', '', 10);
$mypdf->setFillColor(240,240,240);
$mypdf->Cell(30 ,10, 'Category', 1, 0, 'C',true);
$mypdf->setFillColor(240,240,240);
$mypdf->Cell(95 ,10, 'Description', 1, 0, 'C',true);
$mypdf->setFillColor(240,240,240);
$mypdf->Cell(30 ,10, 'Receipt Date', 1, 0, 'C',true);
$mypdf->setFillColor(240,240,240);
$mypdf->Cell(30 ,10, 'Amount', 1, 0, 'C',true);
$mypdf->Ln();
$mypdf->SetFont('Arial','',9);
        $x_axis = $mypdf->GetX();
	$y_axis = $mypdf->GetY();


$sql= "SELECT count(ExCategory) from tbluserexpenses Where `UserName`= '$User'";
$res=$dbh->prepare($sql);  
$res->execute();
$Rcnt = $res->fetchColumn();
if($Rcnt > 0)
{
	$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='USD'";
	$result=$dbh->prepare($sql);  
	$result->execute();
        while ($row = $result->fetch())	
	{
		$mypdf->Cell(30 ,10,$row[1], 'LTR', 0, 'C');
		$x = $mypdf->GetX();
		$y = $mypdf->GetY();
		$mypdf->MultiCell(95 ,5,trim($row[4]) ,'T');
		$mypdf->setXY($x+95,$y);
		$mypdf->Cell(30 ,10,$row[2], 'LT', 0, 'C');
		$mypdf->setXY($x+125,$y);
		$Amt = "$ ".$row[3];
		$mypdf->Cell(30 ,10,$Amt, 'LTR', 0, 'C');
		$mypdf->Ln();
	}
	$sql="select SUM(ClaimAmt) from tbluserexpenses Where `UserName`= '$User' AND `Currency`='USD'";
	$result1=$dbh->prepare($sql);  
	$result1->execute();
	$total = $result1->fetchColumn();
            $mypdf->setFillColor(240,240,240);
$mypdf->SetFont('Arial','B',9);
	$x = $mypdf->GetX();
	$y = $mypdf->GetY();	
      $mypdf->Cell(125 ,10, '', '1', 0, 'C',true);
      $mypdf->setXY($x+125,$y);
      $mypdf->setFillColor(240,240,240);
	$mypdf->Cell(30 ,10,"Total :", '1', 0, 'C',true);
        $mypdf->setXY($x+155,$y);
        $mypdf->setFillColor(240,240,240);
        $mypdf->Cell(30 ,10,"$".$total, '1', 0, 'C',true);

	$y = $mypdf->GetY();
	
        
	$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='INR'";
	$result=$dbh->prepare($sql);  
	$result->execute();
        $RCount = $result->rowCount();
        
        
        
        if($RCount > 0)
        {
            $y = $mypdf->GetY();
              if($y != $y_axis)
              {
                 $mypdf->setXY($x_axis,$y+10);
              }
              else
              {
                 $mypdf->setXY($x_axis,$y_axis);
              }
        
	while ($row = $result->fetch()) 
	{
$mypdf->SetFont('Arial','',9);
		$mypdf->Cell(30 ,10,$row[1], 'LtR', 0, 'C');
		$x = $mypdf->GetX();
		$y = $mypdf->GetY();
		$mypdf->MultiCell(95 ,5,trim($row[4]) ,'T');
		$mypdf->setXY($x+95,$y);
		$mypdf->Cell(30 ,10,$row[2], 'LT', 0, 'C');
		$mypdf->setXY($x+125,$y);
		$Amt = "INR ".$row[3];
		$mypdf->Cell(30 ,10,$Amt,'LTR', 0, 'C');
		$mypdf->Ln();
	}
	        $sql="select SUM(ClaimAmt) from tbluserexpenses Where `UserName`= '$User' AND `Currency`='INR'";
	        $result1=$dbh->prepare($sql);  
	        $result1->execute();
	        $total = $result1->fetchColumn();
	         $mypdf->setFillColor(240,240,240);
$mypdf->SetFont('Arial','B',9);
	$x = $mypdf->GetX();
	$y = $mypdf->GetY();	
      $mypdf->Cell(125 ,10, '', '1', 0, 'C',true);
      $mypdf->setXY($x+125,$y);
      $mypdf->setFillColor(240,240,240);
	$mypdf->Cell(30 ,10,"Total :", '1', 0, 'C',true);
        $mypdf->setXY($x+155,$y);
        $mypdf->setFillColor(240,240,240);
        $mypdf->Cell(30 ,10,"INR".$total, '1', 0, 'C',true);        
        }







$mypdf->AddPage();
$mypdf->SetFont('Helvetica', 'B', 10);
$mypdf->Ln(10);

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


























	$stmt = $dbh->prepare("CALL sp_StorePDF(?,?,?,?)");	
	$stmt ->execute(array($UserID,'ATMT','Rcp',$title));
	$name = $stmt->fetch();
	$PDFName = $name[0];
        $mypdf->Output("PDFDOCS/".$PDFName.".pdf");
	//$mypdf->Output();
        echo "Receipt PDF generated successfully! <a href='ViewReports.php'>View now</a>";
echo "Report generated successfully! <a href='ViewReports.php'>View now</a>";
}
else
{
        echo "Error! Make sure you have atleast 1 expense entered";
}
}
catch(Exception $ex)
{
	//echo $ex->getMessage();
}
?>