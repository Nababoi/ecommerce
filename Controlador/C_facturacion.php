<?php
require_once ("../vendor/autoload.php");
require_once("../Controlador/C_mercadoPago.php");
//factura en pdf

// Verifica si $payment_info está definido y si su índice 'status' es 'approved'
if (isset($payment_info) && $payment_info['status'] == 'approved') {
    // Recupera la información de la venta desde donde la hayas almacenado (por ejemplo, en una base de datos)
    $total;

    // Genera la factura en PDF
    generateInvoice($total);

    // Puedes redirigir al usuario a una página de confirmación o simplemente mostrar un mensaje
    echo "¡Venta exitosa! La factura se ha descargado automáticamente.";
} else {
    // La venta no fue exitosa, maneja según tus necesidades
    echo "La venta no fue exitosa.";
}

function generateInvoice($total) {
    // Crea una instancia de TCPDF
    $pdf = new TCPDF();

    // Agrega una página al PDF
    $pdf->AddPage();

    // Establece el contenido del PDF (puedes personalizar esto según tus necesidades)
    $content = "
    Detalles de la factura:
    Total: $total
    ";

    $pdf->writeHTML($content, true, false, true, false, '');

    // Guarda el PDF en el servidor o muestra en el navegador
    $pdf->Output('factura.pdf', 'D'); // 'D' para descargar directamente en el navegador
}
?>
