<?php
require("../fpdf/fpdf.php");

//echo '<link rel="icon" type="image/png" href="../logo 2016.png">';
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
  $this->Image('../logo 2016.png',10,8,33);
   // Arial bold 15
   $this->SetFont('Times','',12);
   // Movernos a la derecha
   $this->Cell(50);
   // Título
   $this->Cell(180,20,utf8_decode('Ventas del Dia Trigales de Oro ® '),1,0,'C');
   // Salto de línea
   $this->Ln(20);
   $this->Ln(20);

   //Encabezado
   $this->Cell(20,6,'NOTA',1,0,'C',0);
   $this->Cell(80,6,'NOMBRE',1,0,'C',0);
   $this->Cell(100,6,'DIRECCION',1,0,'C',0);
   $this->Cell(40,6,'PIEZAS VENDIDAS',1,0,'C',0);
   $this->Cell(40,6,utf8_decode('TOTAL'),1,1,'C',0);


}

// Pie de página
function Footer()
{
   // Posición: a 1,5 cm del final
   $this->SetY(-15);
   // Arial italic 8
   $this->SetFont('Arial','I',7);
   // Número de página
   $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo(),0,0,'C');
}
}

require("../Conexion/conexion.php");
$fecha=date("Y-m-d");

$sql="SELECT * FROM ventas WHERE fecha='$fecha'";
$result=$conexion->query($sql);
$sql2="SELECT SUM(total) as sumaTotal FROM ventas WHERE fecha='$fecha'";
$result2=$conexion->query($sql2);



$pdf=new PDF("L");
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
//$pdf->Cell(40,10,utf8_decode('¡HOLA CHUY, EFREN Y TODOS'));

while ($row = mysqli_fetch_array($result)) {
    $pdf->Cell(20,6,utf8_decode($row['id']),1,0,'C');
    $pdf->Cell(80,6,utf8_decode($row['nombre']),1,0,'C');
    $pdf->Cell(100,6,utf8_decode($row['direccion']),1,0,'C',0);
    $pdf->Cell(40,6,utf8_decode($row['piezasVen']),1,0,'C');
    $pdf->Cell(40,6,utf8_decode($row['total']),1,1,'C');

}
$pdf->Ln(5);
$pdf->Cell(200,6,'',0,0,'C',0);
$pdf->Cell(40,6,utf8_decode("Total: "),1,0,'C');

while ($row2 = mysqli_fetch_array($result2)) {
  $pdf->Cell(40,6,utf8_decode($row2['sumaTotal']),1,0,'C');
}

$fecha2=date("d-m-Y");
mysqli_close($conexion);

$pdf->Output("Ventas de ".$fecha2.".pdf","D");

 ?>
