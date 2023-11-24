<?php
    // require_once('../vendor/autoload.php');
    // require("../Controlador/C_mercadoPago.php");

    // if (session_status() == PHP_SESSION_NONE) {
    //     session_start();
    // }

    // if (isset($_SESSION['total'])) {
        
    //     $total = $_SESSION['total'];

    //     // Crear una nueva instancia de TCPDF
    //     $pdf = new TCPDF();

    //     // Agregar una página al PDF
    //     $pdf->AddPage();

    //     $pdf->writeHTML("Precio total: $" . $total);

    //     // Establecer el nombre del archivo PDF que se descargará
    //     $filename = 'factura.pdf';

    //     // Salida del PDF a la pantalla
    //     $pdf->Output($filename, 'D');
    // }


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

        // Agregar un logo
        $logoPath = '../img/logo.png'; // Reemplaza con la ruta de tu logo
        $pdf->Image($logoPath, 10, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        // Agregar texto decorativo
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->SetTextColor(255, 0, 0); // Establecer color de texto en rojo
        $pdf->Text(80, 20, 'NO VALIDO COMO FACTURA');

        $pdf->SetTextColor(0, 0, 0); // Restaurar color de texto a negro
        $pdf->SetFont('helvetica', '', 12);

        $pdf->writeHTML("Precio total: $" . $total);

        // Establecer el nombre del archivo PDF que se descargará
        $filename = 'factura.pdf';

        // Salida del PDF a la pantalla
        $pdf->Output($filename, 'I');
    }
?>


