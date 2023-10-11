<?php
session_start();
require("navbar.php");

// Verifica si hay productos en el carrito
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    echo '<div class="container mt-5">';
    echo '<h2 class="mb-4">Carrito de Compras</h2>';
    
    $total = 0; // Inicializa la variable para el total
    
    foreach ($_SESSION['carrito'] as $key => $producto) {
        echo '<div class="row border rounded p-3 mb-3 d-flex justify-content-between">';
        echo '<div class="col-md-2">';
        echo '<img src="../img/' . $producto['imagen'] . '" alt="' . $producto['nombre'] . '" class="img-fluid">';
        echo '</div>';
        echo '<div class="col-md-2">';
        echo '<h5>' . $producto['nombre'] . '</h5>';
        echo '<p>Talla: ' . $producto['talla'] . '</p>';
        echo '<p>Precio $: ' . $producto['precio'] . ' x ' . $producto['cantidad'] . '</p>'; // Precio por cantidad
        echo '</div>';
        echo '<div class="col-md-2">';
        echo '<label for="cantidad">Cantidad:</label>';
        echo '<input type="number" readonly name="cantidad_comprar[]" value="' . $producto['cantidad'] . '" >';
        echo '</div>';
        echo '<div class="col-md-2">';
        echo '<form method="post" action="../Controlador/C_eliminarProductoCarrito.php">';
        echo '<input type="hidden" name="producto_key" value="' . $key . '">';
        echo '<button type="submit" class="btn btn-danger">Eliminar</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        
        $subtotal = $producto['precio'] * $producto['cantidad'];
        $total += $subtotal;
    }

    // Muestra la suma total de todos los productos
    echo '<div class="text-center">';
    echo '<p>Total $: ' . $total . '</p>';
    echo '<form method="post" action="../Controlador/C_realizarCompra.php">
    <button type="submit" class="btn btn-primary" name="comprar">Comprar</button>
    </form>
    ';
    echo '</div>';
    
    echo '</div>';
} else {
    echo '<div class="container mt-5">';
    echo '<p>No hay productos en el carrito.</p>';
    echo '</div>';
}

// Puedes agregar un botón de compra o continuar comprando aquí

//footer
require("footer.php");
?>
