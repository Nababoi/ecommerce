<?php
require_once('../vendor/autoload.php');
require("../Controlador/C_mercadoPago.php");

// Crear una nueva instancia de TCPDF
$pdf = new TCPDF();

// Agregar una página al PDF
$pdf->AddPage();

if(isset($total)){
    $pdf->writeHTML("Precio total: $" . $total);

    // Establecer el nombre del archivo PDF que se descargará
    $filename = 'factura.pdf';

    // Salida del PDF a la pantalla
    $pdf->Output($filename, 'D');
}

?>
