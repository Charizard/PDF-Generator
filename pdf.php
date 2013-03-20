<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>PDF</title>
        <?php
        	require_once('FPDF/fpdf.php');
    		
            class Generate_PDF extends FPDF
            {
				var $workshop,$date,$time,$amount;
				function Generate_PDF($workshop_name)
				{
					$this->FPDF('p','mm','A4');
       				 // Initialization
        			$this->B = 0;
        			$this->I = 0;
        			$this->U = 0;
        			$this->HREF = '';
					$this->workshop = $workshop_name;
					if($this->workshop=="Big Data")
					{
						$this->date="March 2";
						$this->time="9:00 AM";
						$this->amount="500 INR";
					}
					else if($this->workshop=="Windows 8 App Developement")
					{
						$this->date="March 2";
						$this->time="2:00 PM";
						$this->amount="500 INR";
					}
					else if($this->workshop=="CyberForensics and Information Security")
					{
						$this->date="March 1";
						$this->time="9:00 AM";
						$this->amount="600 INR";
					}
				}
            	function Header()
                {
                	$this->Image('images/anna.png',10,10,20);
                	$this->Image('images/itrix.png',70,0,80);
                	$this->Image('images/ceg.png',180,10,20);
                }
                function Footer()
                {
	                $this->SetY(-15);
                    $this->SetFont('Arial', 'B', 10);
                	$this->Cell(0, 10, 'www.itrix.in', 0, 0, 'C');
                }
                function Generate_table()
                {
                	$this->SetFont('Arial', '', 12);
                    $this->SetTextColor(0);
                    $this->SetFillColor(222, 223, 235);
                    $this->SetLineWidth(0.3);
                    $this->Cell(65, 20, "Name", 1, 0, 'C', true);
                    $this->Cell(125, 20, $_POST['name'], 1, 1, 'C', true);
                    $this->Cell(65, 20, "Mail ID:", 1, 0, 'C', false);
                    $this->Cell(125, 20, $_POST['email'], 1, 1, 'C', false);
                    $this->Cell(65, 20, "Contact Number:", 1, 0, 'C', true);
                    $this->Cell(125, 20, "+91".$_POST['phone'], 1, 1, 'C', true);
                    $this->Cell(65, 20, "Amount:", 1, 0, 'C', false);
                    $this->Cell(125, 20, $this->amount, 1, 1, 'C', false);
                    $this->Cell(65, 20, "College:", 1, 0, 'C', true);
                    $this->Cell(125, 20, $_POST['college'], 1, 1, 'C', true);
                	$this->SetFont('Arial', 'B', 15);
                    $this->Cell(65, 20, "Workshop:", 1, 0, 'C', false);
                    $this->Cell(125, 20, $this->workshop, 1, 1, 'C', false);
                	$this->SetFont('Arial', '', 12);
                    $this->Cell(65, 20, "Date and Time:", 1, 0, 'C', true);
                    $this->Cell(125, 20, $this->date.", ".$this->time, 1, 1, 'C', true);
                    $this->Cell(65, 20, "Venue:", 1, 0, 'C', false);
                    $this->Cell(125, 20, "Vivekananda Auditorium, CEG", 1, 1, 'C', false);
                }
                
                function Generate() {
					$this->AddPage();
            		$this->SetFont('Arial', '', 12);
            		$this->Ln(40);
            		$this->Cell(500, 13, "\t\t\t\t\t\t\t\t\tThis is your ticket for the Workshop that you have Registered. Please take a print out of this", 0, 'C');
            		$this->Ln(10);
            		$this->Cell(500, 13, "ticket and bring it on the respective day. Also Register yourself at the Hospitality Desk before you", 0, 'C');
            		$this->Ln(10);
            		$this->Cell(500, 13, "attend the Workshop. See you at ITrix 13 !!!", 0, 'C');
            		$this->Ln(20);
            		$this->Generate_table();
            		$this->Cell(0, 13, "PS: Do bring your College ID Cards.", 0, 0, 'C');
            		$this->Output($this->workshop.".pdf", 'F');
				}
            }
			
            $folder = substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
            
			if($_POST['bigdata'])
			{
	            $pdf_bigdata = new Generate_PDF($_POST['bigdata']);
				$pdf_bigdata->Generate();
				
           		$file1 = "http://".$_SERVER['SERVER_NAME'].$folder.$_POST['bigdata'].".pdf";
			}
			if($_POST['win8'])
			{
	            $pdf_win8 = new Generate_PDF($_POST['win8']);
				$pdf_win8->Generate();
				
 	           	$file2 = "http://".$_SERVER['SERVER_NAME'].$folder.$_POST['win8'].".pdf";
			}
			if($_POST['cyber'])
			{
	            $pdf_cyber = new Generate_PDF($_POST['cyber']);
				$pdf_cyber->Generate();
				
            	$file3 = "http://".$_SERVER['SERVER_NAME'].$folder.$_POST['cyber'].".pdf";
			}
            
           	
        ?>
	</head>
	<body>
		<div id="download">
        	<a href="<?php echo $file1 ?>">Download</a> the Big Data Ticket.<br/>
        	<a href="<?php echo $file2 ?>">Download</a> the Windows 8 Ticket.<br/>
        	<a href="<?php echo $file3 ?>">Download</a> the CyberForensics Ticket.<br/>
        </div>
    </body>
</html>
