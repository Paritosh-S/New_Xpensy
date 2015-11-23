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
                        $pname = $_SESSION['Name'];		
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
			         
		}
		function Footer()
		{
			//Position at 1.5 cm from bottom
			$this->SetXY(90,-15);
			//Arial italic 8
			$this->SetFont('Arial','I',10);
			//Page number
			$this->Cell(0,5,'Powered by ',0,0,'C');
                       $this->Image('images/xlogo10.jpg',160,280,22);
		}
	}
$mypdf =new PDF;
$mypdf->AddPage();
$mypdf->SetTextColor(51, 51, 51);
$mypdf->SetFont('Arial', 'I', 10);
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

//Query for If condition



//query for total



//title & total
$mypdf->SetFont('Helvetica', 'B', 11);
$mypdf->setFillColor(265,265,265);
$mypdf->Cell(155 ,8, $Rtitle, '0', 0, 'L',true);






$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='USD'";
$res=$dbh->prepare($sql);  
$res->execute();
$Rcnt1 = $res->rowCount();
if($Rcnt1 > 0)
{
$sql="select SUM(ClaimAmt) from tbluserexpenses Where `UserName`= '$User' AND `Currency`='USD'";
	$result11=$dbh->prepare($sql);  
	$result11->execute();
	$total11 = $result11->fetchColumn();

$mypdf->setFillColor(265,265,265);
$mypdf->Cell(30 ,8, "$ ".$total11, '0', 0, 'R',true);
$mypdf->Ln();
}
else
{
$mypdf->SetFont('Arial', '', 11);
$mypdf->setFillColor(265,265,265);
$mypdf->Cell(30 ,8,"", '0', 0, 'R',true);
$mypdf->Ln();
}



$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='INR'";
$inr=$dbh->prepare($sql);  
$inr->execute();
$inr1 = $inr->rowCount();
if($inr1 > 0)
{
$sql="select SUM(ClaimAmt) from tbluserexpenses Where `UserName`= '$User' AND `Currency`='INR'";
	        $rs=$dbh->prepare($sql);  
	        $rs->execute();
	        $total = $rs->fetchColumn();
$mypdf->setFillColor(265,265,265);
$mypdf->Cell(185 ,8,"INR ".$total, 'B', 0, 'R',true);
$mypdf->Ln();
$mypdf->Ln();
}
else
{
$mypdf->setFillColor(265,265,265);
$mypdf->Cell(185 ,8,"", 'B', 0, 'R',true);
$mypdf->Ln();
$mypdf->Ln();

}


//name & email
$mypdf->SetFont('Arial', '', 10);

$mypdf->setFillColor(265,265,265);
$mypdf->Cell(15 ,6,"ID :-", 0, 0, 'L',true);
$mypdf->SetFont('Arial', '', 10);
$mypdf->setFillColor(265,265,265);
$mypdf->Cell(170 ,6,$row3[2], 0, 0, 'L',true);
$mypdf->Ln();
$mypdf->setFillColor(265,265,265);
$mypdf->Cell(15 ,6,"Name :-", 0, 0, 'L',true);
$mypdf->SetFont('Arial', '', 10);
$mypdf->setFillColor(265,265,265);
$mypdf->Cell(170 ,6,$row1[1], 0, 0, 'L',true);
$mypdf->Ln();
$mypdf->SetFont('Arial', '', 10);
$mypdf->setFillColor(265,265,265);
$mypdf->Cell(15,6, "Email  :-", 0, 0, 'L',true);
$mypdf->SetFont('Arial', '', 10);
$mypdf->setFillColor(265,265,265);
$mypdf->Cell(170,6,$User, 0, 0, 'L',true);
$mypdf->Ln();
$mypdf->SetFont('Arial', '', 10);
$mypdf->setFillColor(265,265,265);
$mypdf->Cell(15,6, "Date   :-", 0, 0, 'L',true);
$date = date('d-m-Y H:i:s');
$mypdf->Cell(170,6,$date, 0, 0, 'L',true);
$mypdf->Ln();
$mypdf->Ln();
$mypdf->Ln();
$mypdf->Ln();



//table heading
$mypdf->SetFont('Arial', '', 10);
$mypdf->setFillColor(178, 211, 230);
$mypdf->SetDrawColor(178, 211, 230);
$mypdf->Cell(30 ,10, 'Category', 1, 0, 'C',true);
$mypdf->setFillColor(178, 211, 230);
$mypdf->Cell(95 ,10, 'Description', 1, 0, 'C',true);
$mypdf->setFillColor(178, 211, 230);
$mypdf->Cell(30 ,10, 'Expense Date', 1, 0, 'C',true);
$mypdf->setFillColor(178, 211, 230);
$mypdf->Cell(30 ,10, 'Amount', 1, 0, 'C',true);
$mypdf->Ln();
$mypdf->SetFont('Arial','',9);
        $x_axis = $mypdf->GetX();
	$y_axis = $mypdf->GetY();








$sql= "SELECT count(ExCategory) from tbluserexpenses Where `UserName`= '$User' ";
$res=$dbh->prepare($sql);  
$res->execute();
$Rcnt = $res->fetchColumn();
if($Rcnt > 0)
{


   $sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='USD' AND ExCategory IN ('Flight','Railway','Taxi','Fairy','Bus') ORDER BY ExCategory,ClaimDate";
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
		$mypdf->Cell(30 ,10,$row[1], 'LTR', 0, 'C');
		$x = $mypdf->GetX();
		$y = $mypdf->GetY();
		$mypdf->MultiCell(95 ,5,$row[4],'T','C');
		$mypdf->setXY($x+95,$y);
		$mypdf->Cell(30 ,10,$row[2], 'LT', 0, 'C');
		$mypdf->setXY($x+125,$y);
		$Amt = "$ ".$row[3];
		$mypdf->Cell(30 ,10,$Amt,'LTR', 0, 'C');
		$mypdf->Ln();
	}
	        $sql="select SUM(ClaimAmt) from tbluserexpenses Where `UserName`= '$User' AND ExCategory IN ('Flight','Railway','Taxi','Fairy','Bus') AND `Currency`='USD'";
	        $result1=$dbh->prepare($sql);  
	        $result1->execute();
	        $total = $result1->fetchColumn();
	         $mypdf->setFillColor(236, 244, 249);
$mypdf->SetFont('Arial','',9);
	$x = $mypdf->GetX();
	$y = $mypdf->GetY();	
      $mypdf->Cell(155 ,10, "Transportation Total :", 'LTB', 0, 'R',true);
      $mypdf->setXY($x+155,$y);
      
        $mypdf->setFillColor(236, 244, 249);

        $mypdf->Cell(30 ,10,"$ ".$total, 'TRB', 0, 'C',true);        

}
/////////////////////////////////////////////////////////////////////////////
	$y = $mypdf->GetY();
	////////////////////////////////////////////////
 




       
	$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='USD' AND ExCategory IN ('Meal') ORDER BY ExCategory,ClaimDate";
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
		$mypdf->Cell(30 ,10,$row[1], 'LTR', 0, 'C');
		$x = $mypdf->GetX();
		$y = $mypdf->GetY();
		$mypdf->MultiCell(95 ,5,$row[4],'T','C');
		$mypdf->setXY($x+95,$y);
		$mypdf->Cell(30 ,10,$row[2], 'LT', 0, 'C');
		$mypdf->setXY($x+125,$y);
		$Amt = "$ ".$row[3];
		$mypdf->Cell(30 ,10,$Amt,'LTR', 0, 'C');
		$mypdf->Ln();
	}
	        $sql="select SUM(ClaimAmt) from tbluserexpenses Where `UserName`= '$User' AND ExCategory IN ('Meal') AND `Currency`='USD'";
	        $result1=$dbh->prepare($sql);  
	        $result1->execute();
	        $total = $result1->fetchColumn();
	         $mypdf->setFillColor(236, 244, 249);
$mypdf->SetFont('Arial','',9);
	$x = $mypdf->GetX();
	$y = $mypdf->GetY();	
      $mypdf->Cell(155 ,10, "Meal Total :", 'LTB', 0, 'R',true);
      $mypdf->setXY($x+155,$y);
      
        $mypdf->setFillColor(236, 244, 249);
        $mypdf->Cell(30 ,10,"$ ".$total, 'TRB', 0, 'C',true);   

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////////
	$y = $mypdf->GetY();
	////////////////////////////////////////////////
 




       
	$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='USD' AND ExCategory IN ('Hotel') ORDER BY ExCategory,ClaimDate";
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
		$mypdf->Cell(30 ,10,$row[1], 'LTR', 0, 'C');
		$x = $mypdf->GetX();
		$y = $mypdf->GetY();
		$mypdf->MultiCell(95 ,5,$row[4] ,'T','C');
		$mypdf->setXY($x+95,$y);
		$mypdf->Cell(30 ,10,$row[2], 'LT', 0, 'C');
		$mypdf->setXY($x+125,$y);
		$Amt = "$ ".$row[3];
		$mypdf->Cell(30 ,10,$Amt,'LTR', 0, 'C');
		$mypdf->Ln();
	}
	        $sql="select SUM(ClaimAmt) from tbluserexpenses Where `UserName`= '$User' AND ExCategory IN ('Hotel') AND `Currency`='USD'";
	        $result1=$dbh->prepare($sql);  
	        $result1->execute();
	        $total = $result1->fetchColumn();
	         $mypdf->setFillColor(236, 244, 249);
$mypdf->SetFont('Arial','',9);
	$x = $mypdf->GetX();
	$y = $mypdf->GetY();	
      $mypdf->Cell(155 ,10, "Lodging Total :", 'LTB', 0, 'R',true);
      $mypdf->setXY($x+155,$y);
      
        $mypdf->setFillColor(236, 244, 249);
        $mypdf->Cell(30 ,10,"$ ".$total, 'TRB', 0, 'C',true);     

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////////
	$y = $mypdf->GetY();
	////////////////////////////////////////////////
 




       
	$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='USD' AND ExCategory IN ('Purchase','Other','Hiring','Fuel','Phone') ORDER BY ExCategory,ClaimDate";
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
		$mypdf->Cell(30 ,10,$row[1], 'LTR', 0, 'C');
		$x = $mypdf->GetX();
		$y = $mypdf->GetY();
		$mypdf->MultiCell(95 ,5,$row[4] ,'T','C');
		$mypdf->setXY($x+95,$y);
		$mypdf->Cell(30 ,10,$row[2], 'LT', 0, 'C');
		$mypdf->setXY($x+125,$y);
		$Amt = "$ ".$row[3];
		$mypdf->Cell(30 ,10,$Amt,'LTR', 0, 'C');
		$mypdf->Ln();
	}
	        $sql="select SUM(ClaimAmt) from tbluserexpenses Where `UserName`= '$User' AND ExCategory IN ('Purchase','Other','Hiring','Fuel','Phone') AND `Currency`='USD'";
	        $result1=$dbh->prepare($sql);  
	        $result1->execute();
	        $total = $result1->fetchColumn();
	         $mypdf->setFillColor(236, 244, 249);
$mypdf->SetFont('Arial','',9);
	$x = $mypdf->GetX();
	$y = $mypdf->GetY();	
      $mypdf->Cell(155 ,10, "Other Total :", 'LTB', 0, 'R',true);
      $mypdf->setXY($x+155,$y);
      
        $mypdf->setFillColor(236, 244, 249);
        $mypdf->Cell(30 ,10,"$ ".$total, 'TRB', 0, 'C',true);

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='INR' AND ExCategory IN ('Flight','Railway','Bus','Fairy','Taxi') ORDER BY ExCategory,ClaimDate";
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
		$mypdf->Cell(30 ,10,$row[1], 'LTR', 0, 'C');
		$x = $mypdf->GetX();
		$y = $mypdf->GetY();
		$mypdf->MultiCell(95 ,5,$row[4] ,'T','C');
		$mypdf->setXY($x+95,$y);
		$mypdf->Cell(30 ,10,$row[2], 'LT', 0, 'C');
		$mypdf->setXY($x+125,$y);
		$Amt = "INR ".$row[3];
		$mypdf->Cell(30 ,10,$Amt,'LTR', 0, 'C');
		$mypdf->Ln();
	}
	        $sql="select SUM(ClaimAmt) from tbluserexpenses Where `UserName`= '$User' AND ExCategory IN ('Flight','Railway','Bus','Fairy','Taxi') AND `Currency`='INR'";
	        $result1=$dbh->prepare($sql);  
	        $result1->execute();
	        $total = $result1->fetchColumn();
	         $mypdf->setFillColor(236, 244, 249);
$mypdf->SetFont('Arial','',9);
	$x = $mypdf->GetX();
	$y = $mypdf->GetY();	
      $mypdf->Cell(155 ,10, "Transportation Total :", 'LTB', 0, 'R',true);
      $mypdf->setXY($x+155,$y);
      
        $mypdf->setFillColor(236, 244, 249);
        $mypdf->Cell(30 ,10,"INR ".$total, 'TRB', 0, 'C',true);  

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////









//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='INR' AND ExCategory IN ('Meal') ORDER BY ExCategory,ClaimDate";
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
		$mypdf->Cell(30 ,10,$row[1], 'LTR', 0, 'C');
		$x = $mypdf->GetX();
		$y = $mypdf->GetY();
		$mypdf->MultiCell(95 ,5,$row[4] ,'T','C');
		$mypdf->setXY($x+95,$y);
		$mypdf->Cell(30 ,10,$row[2], 'LT', 0, 'C');
		$mypdf->setXY($x+125,$y);
		$Amt = "INR ".$row[3];
		$mypdf->Cell(30 ,10,$Amt,'LTR', 0, 'C');
		$mypdf->Ln();
	}
	        $sql="select SUM(ClaimAmt) from tbluserexpenses Where `UserName`= '$User' AND ExCategory IN ('Meal') AND `Currency`='INR'";
	        $result1=$dbh->prepare($sql);  
	        $result1->execute();
	        $total = $result1->fetchColumn();
	         $mypdf->setFillColor(236, 244, 249);
$mypdf->SetFont('Arial','',9);
	$x = $mypdf->GetX();
	$y = $mypdf->GetY();	
      $mypdf->Cell(155 ,10, "Meal Total :", 'LTB', 0, 'R',true);
      $mypdf->setXY($x+155,$y);
      
        $mypdf->setFillColor(236, 244, 249);
        $mypdf->Cell(30 ,10,"INR ".$total, 'TRB', 0, 'C',true);

}




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='INR' AND ExCategory IN ('Hotel') ORDER BY ExCategory,ClaimDate";
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
		$mypdf->Cell(30 ,10,$row[1], 'LTR', 0, 'C');
		$x = $mypdf->GetX();
		$y = $mypdf->GetY();
		$mypdf->MultiCell(95 ,5,$row[4] ,'T','C');
		$mypdf->setXY($x+95,$y);
		$mypdf->Cell(30 ,10,$row[2], 'LT', 0, 'C');
		$mypdf->setXY($x+125,$y);
		$Amt = "INR ".$row[3];
		$mypdf->Cell(30 ,10,$Amt,'LTR', 0, 'C');
		$mypdf->Ln();
	}
	        $sql="select SUM(ClaimAmt) from tbluserexpenses Where `UserName`= '$User' AND ExCategory IN ('Hotel') AND `Currency`='INR'";
	        $result1=$dbh->prepare($sql);  
	        $result1->execute();
	        $total = $result1->fetchColumn();
	         $mypdf->setFillColor(236, 244, 249);
$mypdf->SetFont('Arial','',9);
	$x = $mypdf->GetX();
	$y = $mypdf->GetY();	
      $mypdf->Cell(155 ,10, "Lodging Total :", 'LTB', 0, 'R',true);
      $mypdf->setXY($x+155,$y);
      
        $mypdf->setFillColor(236, 244, 249);
        $mypdf->Cell(30 ,10,"INR ".$total, 'TRB', 0, 'C',true);
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='INR' AND ExCategory IN ('Purchase','Other','Hiring','Fuel','Phone') ORDER BY ExCategory,ClaimDate";
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
		$mypdf->Cell(30 ,10,$row[1], 'LTR', 0, 'C');
		$x = $mypdf->GetX();
		$y = $mypdf->GetY();
		$mypdf->MultiCell(95 ,5,$row[4] ,'T','C');
		$mypdf->setXY($x+95,$y);
		$mypdf->Cell(30 ,10,$row[2], 'LT', 0, 'C');
		$mypdf->setXY($x+125,$y);
		$Amt = "INR ".$row[3];
		$mypdf->Cell(30 ,10,$Amt,'LTR', 0, 'C');
		$mypdf->Ln();
	}
	        $sql="select SUM(ClaimAmt) from tbluserexpenses Where `UserName`= '$User' AND ExCategory IN ('Purchase','Other','Hiring','Fuel','Phone') AND `Currency`='INR'";
	        $result1=$dbh->prepare($sql);  
	        $result1->execute();
	        $total = $result1->fetchColumn();
	         $mypdf->setFillColor(236, 244, 249);
$mypdf->SetFont('Arial','',9);
	$x = $mypdf->GetX();
	$y = $mypdf->GetY();	
      $mypdf->Cell(155 ,10, "Other Total :", 'LTB', 0, 'R',true);
      $mypdf->setXY($x+155,$y);
      
        $mypdf->setFillColor(236, 244, 249);
        $mypdf->Cell(30 ,10,"INR ".$total, 'TRB', 0, 'C',true);
}





















//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*  $sql= "SELECT * from tbluserexpenses Where `UserName`= '$User' AND `Currency`='INR' ORDER BY ExCategory,ClaimDate";
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
                 $mypdf->setXY($
+x_axis,$y_axis);
              }
        
	while ($row = $result->fetch()) 
	{
$mypdf->SetFont('Arial','',9);
		$mypdf->Cell(30 ,10,$row[1], 'LTR', 0, 'C');
		$x = $mypdf->GetX();
		$y = $mypdf->GetY();
		$mypdf->MultiCell(95 ,5,$row[4] ,'T','C');
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

} */

































try
{
	$sql= "SELECT ClaimReceipt,ExCategory,ClaimDate,ClaimAmt,Currency	FROM  tbluserexpenses
	Where `ClaimReceipt` != '' AND `UserName`= '$User'  ORDER BY ExCategory,ClaimDate,Currency";
	$result=$dbh->prepare($sql); 
	$result->execute();
        $res = $result->rowCount();
if($res > 0)
{
        $mypdf->AddPage();
$mypdf->SetFont('Helvetica', '', 10);
$mypdf->Ln(10);
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
				$mypdf->Image($r,45,20,80);
				
				$mypdf->Cell(10 ,10,$row[1],0);
			$mypdf->Ln();
				$mypdf->Cell(10 ,10,$row[2],0);
                                $mypdf->Ln(1);
                                $combo = $row[7]." ".$row[3];
				//$mypdf->Cell(10 ,10,$row[7].$row[3],0);
                                
			} 
			else
			{ 
				$m=$i-$m;
				$mypdf->Ln($m);
				$mypdf->Image($r,45,$i+5,80);
				$mypdf->Cell(10 ,10,$row[1],0);
				$mypdf->Ln();
				$mypdf->Cell(10 ,10,$row[2],0);
                                $mypdf->Ln(1);
				 $combo = $row[7]." ".$row[3];
				//$mypdf->Cell(10 ,10,$row[7].$row[3],0);
                               
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
				$mypdf->Image($r,45,20,80);
				$mypdf->Ln();
				$mypdf->Cell(10 ,10,$row[1],0);
				$mypdf->Ln();
				$mypdf->Cell(10 ,10,$row[2],0);
                                $mypdf->Ln(1);
				 $combo = $row[7]." ".$row[3];
				//$mypdf->Cell(10 ,10,$row[7].$row[3],0);
                               
			} 
			else
			{ 
				$m=$i-$m;
				$mypdf->Ln($m);
				$mypdf->Image($r,45,$i+5,80);
				$mypdf->Cell(10 ,10,$row[1],0);
				$mypdf->Ln();
				$mypdf->Cell(10 ,10,$row[2],0);
                                $mypdf->Ln(1);
				 $combo = $row[7]." ".$row[3];
				//$mypdf->Cell(10 ,10,$row[7].$row[3],0);
                               
				$i=$i+85;
			}
			$count++; 
		}
		  
	}
	
}
else
{
        //echo "No Receipts uploaded!";
}
}
catch(Exception $ex)
{
	//echo "Please upload the images with original file extension and try again"; 
}



















	$stmt = $dbh->prepare("CALL sp_StorePDF(?,?,?,?)");	
	$stmt ->execute(array($UserID,'RPT','Rpt',$Rtitle));
	$name = $stmt->fetch();
	$PDFName = $name[0];
        $dbh->connection = null;
	$mypdf->Output("PDFDOCS/$PDFName.pdf");
	//$mypdf->Output();
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