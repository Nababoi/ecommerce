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


        // Obtener datos necesarios de la preferencia (ajusta según tu lógica)
        $idU = $_POST['idU'];  // Ejemplo, ajusta según tu lógica
        $cantidad = $_POST['cantidad'];  // Ejemplo, ajusta según tu lógica

        // Llamar al procedimiento almacenado compraProducto
        require("../Modelos/conexion.php");
        $stmt = $conn->prepare("CALL compraProducto(?, ?)");
        $stmt->bind_param("ii", $idU, $cantidad);

        if ($stmt->execute()) {
            echo "<p>Procedimiento de compraProducto ejecutado con éxito.</p>";
        } else {
            echo "<p>Error al ejecutar el procedimiento de compraProducto.</p>";
        }

        $stmt->close();
        $conn->close();

    } elseif ($status === 'rejected') {
        echo "<h1>Pago rechazado!</h1>";

    } elseif ($status === 'pending') {
        echo "<h1>Pago pendiente!</h1>";
    }
}
?>
