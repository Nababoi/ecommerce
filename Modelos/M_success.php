<?php

if (isset($_GET['status'])) {
    $status = $_GET['status'];

    if ($status === 'approved') {
        //CODIGO DE PRUEBA...
        echo "<h1>Compra exitosa en Mercado Pago</h1>";
        echo "<p>¡Gracias por tu compra!</p>";

    } elseif ($status === 'rejected') {
        echo "<h1>Pago rechazado!</h1>";

    } elseif ($status === 'pending') {
        echo "<h1>Pago pendiente!</h1>";
    }
}
















//ESTE CODIGO YA ESTABA EN ESTE ARCHIVO...
// // Verificar si el parámetro 'transaction_completed' está presente
// if (isset($_GET['transaction_completed']) && $_GET['transaction_completed'] === 'true') {
//     // Obtener la URL de pago de la cookie
//     $payment_url = isset($_COOKIE['payment_url']) ? $_COOKIE['payment_url'] : '';

//     echo "<h1>Compra exitosa en Mercado Pago</h1>";
//     echo "<p>¡Gracias por tu compra!</p>";

//     // Mostrar el botón para volver al sitio
//     if (!empty($payment_url)) {
//         echo "<button onclick=\"window.location.href='$payment_url'\">Volver al sitio</button>";
//     } else {
//         echo "<p>Error: No se pudo obtener la URL de pago.</p>";
//     }
// } else {
//     echo "<h1>Error en la transacción</h1>";
// }

?>
