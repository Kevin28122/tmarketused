<?php
require('../tmarketused/fpdf185/fpdf.php'); // Asegúrate de que la ruta sea correcta si has colocado fpdf.php en otro directorio

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('Informe de Clientes'), 0, 1, 'C');
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

// Agregar la tabla de clientes
$pdf->SetFont('Arial', '', 10);

$pdf->Cell(10, 10, utf8_decode('ID'), 1, 0, 'C');
$pdf->Cell(35, 10, utf8_decode('Nombre'), 1, 0, 'C');
$pdf->Cell(35, 10, utf8_decode('Apellido'), 1, 0, 'C');
$pdf->Cell(20, 10, utf8_decode('Ciudad'), 1, 0, 'C');
$pdf->Cell(30, 10, utf8_decode('Dirección'), 1, 0, 'C');
$pdf->Cell(42, 10, utf8_decode('Email'), 1, 0, 'C');
$pdf->Cell(20, 10, utf8_decode('Fecha Nac.'), 1, 1, 'C');

// Obtener los datos de la base de datos
include "modelo/conexion.php";
$sql = $conexion->query("SELECT * FROM cliente");
while ($datos = $sql->fetch_object()) {
    $pdf->Cell(10, 10, $datos->ID_CLIENTE, 1, 0, 'C');
    $pdf->Cell(35, 10, utf8_decode($datos->NOMBRE_CLIENTE), 1, 0, 'C');
    $pdf->Cell(35, 10, utf8_decode($datos->APELLIDO), 1, 0, 'C');
    $pdf->Cell(20, 10, utf8_decode($datos->CIUDAD), 1, 0, 'C');
    $pdf->Cell(30, 10, utf8_decode($datos->DIRECCION), 1, 0, 'C');
    $pdf->Cell(42, 10, utf8_decode($datos->EMAIL_CLIENTE), 1, 0, 'C');
    $pdf->Cell(20, 10, $datos->FECHA_NAC_CLIENTE, 1, 1, 'C');
}

// Salida del archivo PDF
$pdf->Output();
?>
