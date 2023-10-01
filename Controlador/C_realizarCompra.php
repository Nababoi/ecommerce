<?php
session_start();
require("../Modelos/M_realizarCompra.php");
// Conexión a la base de datos
require("../Modelos/conexion.php");
$conexion = $conn;

if ($conexion->connect_error) {
    die("Error al conectar con la base de datos: " . $conexion->connect_error);
}

// Crear una instancia del modelo
$compraModel = new CompraModel($conexion);

if (isset($_POST['comprar'])) {
    // Recorre los productos en el carrito
    foreach ($_SESSION['carrito'] as $producto) {
        $productoTalleId = $producto['idU'];
        $cantidadVender = $producto['cantidad'];

        // Llama al método del modelo para comprar el producto
        if ($compraModel->comprarProducto($productoTalleId, $cantidadVender)) {
            // La compra fue exitosa, puedes hacer algo aquí si es necesario
        } else {
            echo "Error al ejecutar el procedimiento almacenado: " . mysqli_error($conexion);
        }
    }

    // Limpia el carrito después de la compra
    unset($_SESSION['carrito']);

    // Cierra la conexión a la base de datos
    $conexion->close();

    // Redirige al usuario a una página de confirmación de compra o a donde necesites
    header("Location: ../Vistas/confirmacion_compra.php");
    exit();
}
?>
