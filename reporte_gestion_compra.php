<?php
require('../tmarketused/fpdf185/fpdf.php'); // Asegúrate de que la ruta sea correcta si has colocado fpdf.php en otro directorio

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('Reporte de Compras'), 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . ' / {nb}', 0, 0, 'C');
    }
}

// Crear una nueva instancia de la clase PDF
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();

// Agregar la tabla de compras
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(20, 10, 'ID', 1, 0, 'C');
$pdf->Cell(60, 10, 'Nombre del Producto', 1, 0, 'C');
$pdf->Cell(50, 10, 'Fecha de Compra', 1, 0, 'C');
$pdf->Cell(40, 10, 'Total de la Compra', 1, 1, 'C');

// Obtener los datos de la base de datos
include "modelo/conexion.php";
$sql = $conexion->query("SELECT * FROM compra");
while ($datos = $sql->fetch_object()) {
    $pdf->Cell(20, 10, $datos->ID_COMPRA, 1, 0, 'C');
    $pdf->Cell(60, 10, utf8_decode($datos->NOMBRE_PRODUCTO), 1, 0, 'C');
    $pdf->Cell(50, 10, $datos->FECHA_COMPRA, 1, 0, 'C');
    $pdf->Cell(40, 10, $datos->TOTAL_COMPRA, 1, 1, 'C');
}

// Salida del archivo PDF
$pdf->Output();
?>
