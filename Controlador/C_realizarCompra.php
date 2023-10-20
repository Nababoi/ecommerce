<?php
session_start();

require("../Modelos/M_realizarCompra.php");
require("../Modelos/conexion.php");
$conexion = $conn;

if ($conexion->connect_error) {
    die("Error al conectar con la base de datos: " . $conexion->connect_error);
}

$compraModel = new CompraModel($conexion);

if (isset($_POST['comprar'])) {
    $error = false; // Variable para controlar si hubo errores en la compra

    foreach ($_SESSION['carrito'] as $producto) {
        $productoTalleId = $producto['idU'];
        $cantidadVender = $producto['cantidad'];

        try {
            if (!$compraModel->comprarProducto($productoTalleId, $cantidadVender)) {
                // Error en la compra, marca la variable de error y detiene el ciclo
                $error = true;
                break;
            }
        } catch (mysqli_sql_exception $e) {
            // Manejar la excepción y guardar el mensaje de error en una variable de sesión
            $_SESSION['error_message'] = $e->getMessage();
            $error = true;
            break;
        }
    }

    if (!$error) {
        // Si no hubo errores, procede con la compra

        // Limpia el carrito después de la compra
        unset($_SESSION['carrito']);

        // Cierra la conexión a la base de datos
        $conexion->close();

        // Redirige al usuario a una página de confirmación de compra o a donde necesites
        header("Location: ../index.php");
        exit();
    } else {
        // Si hubo errores en la compra, redirige de nuevo a la página del carrito
        header("Location: ../Vistas/V_carrito.php");
        exit();
    }
}



?>
