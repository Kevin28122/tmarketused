<?php
require('../tmarketused/fpdf185/fpdf.php'); // Asegúrate de que la ruta sea correcta si has colocado fpdf.php en otro directorio

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('Reporte de Ventas'), 0, 1, 'C');
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

// Agregar la tabla de ventas
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(10, 10, 'ID', 1, 0, 'C');
$pdf->Cell(60, 10, 'Nombre del Cliente de la Venta', 1, 0, 'C');
$pdf->Cell(40, 10, 'Fecha de la Venta', 1, 0, 'C');
$pdf->Cell(40, 10, 'Hora de la Venta', 1, 0, 'C');
$pdf->Cell(40, 10, 'Total de la Venta', 1, 1, 'C');

// Obtener los datos de la base de datos
include "modelo/conexion.php";
$sql = $conexion->query("SELECT * FROM venta");
while ($datos = $sql->fetch_object()) {
    $pdf->Cell(10, 10, $datos->ID_VENTA, 1, 0, 'C');
    $pdf->Cell(60, 10, utf8_decode($datos->NOMBRE_CLIENTE_VENTA), 1, 0, 'C');
    $pdf->Cell(40, 10, $datos->FECHA_VENTA, 1, 0, 'C');
    $pdf->Cell(40, 10, $datos->HORA_VENTA, 1, 0, 'C');
    $pdf->Cell(40, 10, $datos->TOTAL_VENTA, 1, 1, 'C');
}

// Salida del archivo PDF
$pdf->Output();
?>
