<?php
session_start();
require("../Modelos/M_realizarCompra.php");
require("../Modelos/conexion.php");
require '../vendor/autoload.php';


// Crear una instancia del modelo
$compraModel = new CompraModel($conn);

if (isset($_POST['comprar'])) {
    // Recorre los productos en el carrito
    foreach ($_SESSION['carrito'] as $producto) {
        $productoTalleId = $producto['idU'];
        $cantidadVender = $producto['cantidad'];

        // Llama al método del modelo para comprar el producto
        if ($compraModel->comprarProducto($productoTalleId, $cantidadVender)) {
            // La compra fue exitosa, puedes hacer algo aquí si es necesario
        } else {
            echo "Error al ejecutar el procedimiento almacenado: " . mysqli_error($conn);
        }
    }

    // Limpia el carrito después de la compra
    unset($_SESSION['carrito']);

    // Cierra la conexión a la base de datos
    $conn->close();

    
    //aca va la api de mercado pago

    MercadoPago\SDK::setAccessToken('TEST-4808156112961165-102416-f319912a4a575a0ed10c567e5d0a2bd5-1520338902');
    $preference = new MercadoPago\Preference();

    $item = new MercadoPago\Item();
    $item->title = "Compra en Amor & Moda";
    $item->quantity = 1;
    $item->unit_price = $total;

    $preference->items = array($item);

    $preference->back_url = array(
      "success"=>"http://localhost/ecommerce/index.php",
      "failure"=>"http://localhost/ecommerce/fallo.php");
        
    $preference->auto_return = "approved";
    //esto es para que no haya operaciones en pendiente, solo hay aprobadas o rechazadas
    $preference->binary_mode = true;

    $preference->save();
  }
?>

