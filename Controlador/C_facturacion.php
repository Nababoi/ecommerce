<?php
    require_once('../vendor/autoload.php');
    require("../Controlador/C_mercadoPago.php");

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['total'])) {
        
        $total = $_SESSION['total'];

        // Crear una nueva instancia de TCPDF
        $pdf = new TCPDF();

        // Agregar una página al PDF
        $pdf->AddPage();

        $pdf->writeHTML("Precio total: $" . $total);

        // Establecer el nombre del archivo PDF que se descargará
        $filename = 'factura.pdf';

        // Salida del PDF a la pantalla
        $pdf->Output($filename, 'D');
    }
?>
