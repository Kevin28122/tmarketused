<?php
require('../tmarketused/fpdf185/fpdf.php'); // Asegúrate de que la ruta sea correcta si has colocado fpdf.php en otro directorio

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('Reporte de Productos'), 0, 1, 'C');
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

// Agregar la tabla de productos
$pdf->SetFont('Arial', '', 7);

$pdf->Cell(10, 10, 'ID', 1, 0, 'C');
$pdf->Cell(35, 10, utf8_decode('Nombre del Producto'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Descripción del Producto'), 1, 0, 'C');
$pdf->Cell(30, 10, utf8_decode('Cantidad del Producto'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Nombre del Comprador'), 1, 0, 'C');
$pdf->Cell(40, 10, utf8_decode('Teléfono del Comprador'), 1, 1, 'C');

// Obtener los datos de la base de datos
include "modelo/conexion.php";
$sql = $conexion->query("SELECT * FROM producto");
while ($datos = $sql->fetch_object()) {
    $pdf->Cell(10, 10, $datos->ID_PRODUCTO, 1, 0, 'C');
    $pdf->Cell(35, 10, utf8_decode($datos->NOMBRE_PRODUCTO), 1, 0, 'C');
    $pdf->Cell(40, 10, utf8_decode($datos->DESCRIPCION_PRODUCTO), 1, 0, 'C');
    $pdf->Cell(30, 10, $datos->CANTIDAD_PRODUCTO, 1, 0, 'C');
    $pdf->Cell(40, 10, utf8_decode($datos->NOMBRE_COMPRADOR), 1, 0, 'C');
    $pdf->Cell(40, 10, $datos->TELEFONO_COMPRADOR, 1, 1, 'C');
}

// Salida del archivo PDF
$pdf->Output();
?>
