<?php
require 'include/fpdf.php';

include_once 'include/database.php';



class myPDF extends FPDF{
    function header(){
        $db= new PDO("mysql:host=" . HOST .";dbname" . DB_NAME,USER,PASS);

        $sql = "SELECT* FROM nexttel.component";
        $component=$db->query($sql);
        $comp=$component->fetchAll();

        $sql = "SELECT* FROM nexttel.deliver";
        $results=$db->query($sql);
        $result=$results->fetchAll();

        $sql = "SELECT* FROM nexttel.receiver";
        $resu=$db->query($sql);
        $res=$resu->fetchAll();

        $this->SetFont('Times', 'B' , 12);
        $this->cell(25,0,'',0,0,'');
        $this->cell(30,10,'VIETTEL CAMEROUN S.A. ',0,0,'C');
        $this->cell(78,0,'',0,0,'');
        $this->cell(30,10,'REPUBLIC OF CAMEROUN',0,0,'C');

        $this->Ln();
        $this->SetFont('Times', 'BU' , 12);
        $this->cell(25,0,'',0,0,'');
        $this->cell(30,0,'THE YAOUDE DATACENTER ',0,0,'C');
        $this->cell(78,0,'',0,0,'');
        $this->cell(30,0,'PEACE-WORK-FATHERLAND',0,0,'C');

        $this->Ln(17);
        $this->SetFont('Times', 'I' , 12);
        $this->cell(25,0,'',0,0,'');
        $this->cell(30,0,' ',0,0,'C');
        $this->cell(78,0,'',0,0,'');
        $date = date('d/m/Y', time());
        $this->cell(30,0,'Yaounde,  '.$date.'',0,0,'C');
        
        $this->Ln(17);
        $this->SetFont('Times', 'BU' , 12);
        $this->cell(0,0,'HANDOVER',0,0,'C');
        
        $this->Ln(8);
        $this->SetFont('Times', '' , 12);
        $this->cell(0,0,'(No: 11/07/2020/GS YAOUNDE)',0,0,'C');
        
        $this->Ln(10);
        $this->cell(22,0,'',0,0,'');
        $this->cell(0,0,'This is a minute of handover is done in th Yaounde DATA CENTER on the date of ',0,0,'L');
        
        $this->Ln(8);
        $this->cell(23,0,'',0,0,'');
        $this->cell(0,0,' the '.$date.':',0,0,'L');

        $this->Ln(15);
        $this->SetFont('Times', 'B' , 12);
        $this->cell(25,0,'',0,0,'');
        $this->cell(0,0,'PARTY A: REPRESENTATIVE OF DELIVER',0,0,'L');
      
        $this->Ln(10);
        $this->cell(25,0,'',0,0,'');

        $this->SetFont('Times','B',12);
        $this->Cell(70,10,'Name',1,0,'C');
        $this->Cell(70,10,'TEL',1,0,'C');
        $this->Ln(10);
        
        foreach($result as $row){
            $this->Cell(25,0,'',0,0,'');
            $this->Cell(70,10,''.$row['pseudo'].'',1,0,'C');
            $this->Cell(70,10,''.$row['numero'].'',1,0,'C');
            $this->Ln(10);
        }
        
    
        $this->Ln(15);
        $this->SetFont('Times', 'B' , 12);
        $this->cell(25,0,'',0,0,'');
        $this->cell(0,0,'PARTY B: REPRESENTATIVE OF RECEIVER',0,0,'L');

        $this->Ln(10);
        $this->cell(25,0,'',0,0,'');

        $this->SetFont('Times','B',12);
        $this->Cell(70,10,'Name',1,0,'C');
        $this->Cell(70,10,'TEL',1,0,'C');
        $this->Ln(10);
        
        foreach($res as $row){
            $this->Cell(25,0,'',0,0,'');
            $this->Cell(70,10,''.$row['pseudo'].'',1,0,'C');
            $this->Cell(70,10,''.$row['numero'].'',1,0,'C');
            $this->Ln(10);
        }

        $this->Ln(15);
        $this->SetFont('Times','',12);
        $this->cell(22,0,'',0,0,'');
        $this->cell(0,0,'This handover is made to send back components listed bellow from the Yaounde Data ',0,0,'L');
        
        $this->Ln(8);
        $this->cell(23,0,'',0,0,'');
        $this->cell(0,0,' Center to the representative of receiver.',0,0,'L');

        $this->Ln(8);
        $this->SetFont('Times','B',12);
        $this->cell(25,0,'',0,0,'');
        $this->Cell(30,10,'Quantity',1,0,'C');
        $this->Cell(50,10,'Name of components',1,0,'C');
        $this->Cell(30,10,'Serial Number',1,0,'C');
        $this->Cell(30,10,'NOTE',1,0,'C');
        $this->Ln(10);
        
        foreach($comp as $row){
            $this->Cell(25,0,'',0,0,'');
            $this->Cell(30,10,''.$row['quantity'].'',01,0,'C');
            $this->Cell(50,10,''.$row['nom'].'',1,0,'C');
            $this->Cell(30,10,''.$row['SN'].'',1,0,'C');
            $this->Cell(30,10,''.$row['inform'].'',1,0,'C');
            $this->Ln(10);
        }
        
        $this->Ln(15);
        $this->SetFont('Times', 'B' , 12);
        $this->cell(23,0,'',0,0,'');
        $this->cell(35,10,'REPRESENTATIVE',0,0,'C');
        $this->cell(70,0,'',0,0,'');
        $this->cell(35,10,'REPRESENTATIVE ',0,0,'C');

        $this->Ln();
        $this->SetFont('Times', 'B' , 12);
        $this->cell(23,0,'',0,0,'');
        $this->cell(35,0,'OF DELIVER  ',0,0,'C');
        $this->cell(70,0,'',0,0,'');
        $this->cell(35,0,'OF RECEIVER',0,0,'C');

    }

    
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Output();

$sql ="DELETE FROM nexttel.component";
$results=$db->query($sql);  

$sql ="DELETE FROM nexttel.deliver";
$results=$db->query($sql);  

$sql ="DELETE FROM nexttel.receiver";
$results=$db->query($sql);  

$sql = "ALTER TABLE nexttel.receiver AUTO_INCREMENT=0";
$results=$db->query($sql);  

$sql = "ALTER TABLE nexttel.deliver AUTO_INCREMENT=0";
$results=$db->query($sql);  

$sql = "ALTER TABLE nexttel.component AUTO_INCREMENT=0";
$results=$db->query($sql);  

?>