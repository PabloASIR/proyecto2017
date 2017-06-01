<?php
require('../libreria/fpdf.php');
require_once("../connection.php");
class PDF extends FPDF
{
//Pie de página
function Footer()
{
$this->SetY(-10);
$this->SetFont('Arial','I',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(30,5,"usuario",1,0,'C');
$pdf->Cell(50,5,"Email",1,0,'C');
$pdf->Cell(30,5,"privilegio",1,0,'C');
$pdf->Cell(30,5,"idioma",1,0,'C');

$pdf->ln();
//Aquí escribimos lo que deseamos mostrar
 if ($result = $connection->query("SELECT *
  FROM users;")) {
 	while($obj = $result->fetch_object()) {
$pdf->Cell(30,5,$obj->user_login,1,0,'C');
$pdf->Cell(50,5,$obj->user_email,1,0,'C');
$pdf->Cell(30,5,$obj->user_nicename,1,0,'C');
$pdf->Cell(30,5,$obj->user_language,1,0,'C');


$pdf->ln();
}
}
$pdf->output();
?>

    Contact GitHub API Training Shop Blog About
