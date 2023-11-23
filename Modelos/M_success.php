<?php

require_once('../vendor/autoload.php');
//$pdf = new TCPDF();

if (isset($_GET['status'])) {
    $status = $_GET['status'];

    if ($status === 'approved') {
        //CODIGO DE PRUEBA...
        echo "<h1>Compra exitosa en Mercado Pago</h1>";
        echo "<p>¡Gracias por tu compra!</p>";
        echo '<a href="../Controlador/C_facturacion.php"><button>Descargar Factura</button></a>';


    } elseif ($status === 'rejected') {
        echo "<h1>Pago rechazado!</h1>";

    } elseif ($status === 'pending') {
        echo "<h1>Pago pendiente!</h1>";
    }
}
?>
