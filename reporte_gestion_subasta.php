<?php
require('../tmarketused/fpdf185/fpdf.php'); // Asegúrate de que la ruta sea correcta si has colocado fpdf.php en otro directorio

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('Reporte de Subastas'), 0, 1, 'C');
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

// Agregar la tabla de subastas
$pdf->SetFont('Arial', '', 10);

$pdf->Cell(10, 10, 'ID', 1, 0, 'C');
$pdf->Cell(40, 10, 'Producto de Subasta', 1, 0, 'C');
$pdf->Cell(50, 10, 'Fecha de Inicio de la Subasta', 1, 0, 'C');
$pdf->Cell(50, 10, 'Fecha de Fin de la Subasta', 1, 0, 'C');
$pdf->Cell(45, 10, 'Precio de Inicio de la Subasta', 1, 1, 'C');

// Obtener los datos de la base de datos
include "modelo/conexion.php";
$sql = $conexion->query("SELECT * FROM subasta");
while ($datos = $sql->fetch_object()) {
    $pdf->Cell(10, 10, $datos->ID_SUBASTA, 1, 0, 'C');
    $pdf->Cell(40, 10, utf8_decode($datos->PRODUCTO_SUBASTA), 1, 0, 'C');
    $pdf->Cell(50, 10, $datos->FECHA_INICIO_SUBASTA, 1, 0, 'C');
    $pdf->Cell(50, 10, $datos->FECHA_FIN_SUBASTA, 1, 0, 'C');
    $pdf->Cell(45, 10, $datos->PRECION_INICIO_SUBASTA, 1, 1, 'C');
}

// Salida del archivo PDF
$pdf->Output();
?>
