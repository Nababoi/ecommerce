<?php
session_start();
require("../Modelos/M_realizarCompra.php");
require("../Modelos/conexion.php");
require '../vendor/autoload.php';

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

    // SDK de Mercado Pago
    use MercadoPago\MercadoPagoConfig;
    // Agrega credenciales
    MercadoPagoConfig::setAccessToken("TU_ACCESS_TOKEN_DE_PRODUCCION"); // Utiliza tu Access Token de producción

    // Aquí debes configurar tu preferencia de pago en Mercado Pago
    $client = new PreferenceClient();
    $preference = $client->create([
      "items"=> array(
        array(
          "title" => "Meu produto",
          "quantity" => 1,
          "currency_id" => "BRL",
          "unit_price" => 100
        )
      )
    ]);

    // Redirige al usuario a la página de Mercado Pago para completar el pago
    header("Location: " . $preference['init_point']);
    exit();
}
?>
