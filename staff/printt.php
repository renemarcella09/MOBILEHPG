<?php
include '../conn.inc';
include_once '../fpdf/fpdf.php';

$sql = "SELECT * FROM vin";
$result = mysqli_query($conn, $sql);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(0, 10, 'Wanted Vehicle Information List', 0, 1, 'C'); 

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(40, 10, 'engine', 1, 0, 'C');
$pdf->Cell(40, 10, 'chassis', 1, 0, 'C');
$pdf->Cell(15, 10, 'type', 1, 0, 'C');
$pdf->Cell(40, 10, 'Rname', 1, 0, 'C');
$pdf->Cell(60, 10, 'Address', 1, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);

while ($row = mysqli_fetch_assoc($result)) {
$pdf->Cell(40, 10, $row['engine'], 1, 0, 'C');
$pdf->Cell(40, 10, $row['chassis'], 1, 0, 'C');
$pdf->Cell(15, 10, $row['type'], 1, 0, 'C');
$pdf->Cell(40, 10, $row['Rname'], 1, 0, 'C');
$pdf->Cell(60, 10, $row['Address'], 1, 1, 'C');
}

$pdf->Output();

mysqli_close($conn);
?>
