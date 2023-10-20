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
            echo '<p>Precio: ' . $producto['precio'] . ' x ' . $producto['cantidad'] . '</p>'; // Precio por cantidad
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

        echo '<div class="text-center">';
        echo '<p>Total: ' . $total . '</p>';
        echo '<form method="post" action="../Controlador/C_realizarCompra.php">
        <button type="submit" class="btn btn-primary" name="comprar">Comprar</button>
        </form>';
        echo '</div>';
        
        echo '</div>';
    } else {
        echo '<div class="container mt-5">';
        echo '<p>No hay productos en el carrito.</p>';
        echo '</div>';
    }
    
    if (isset($_SESSION['error_message'])) {
        $error_message = $_SESSION['error_message'];
        unset($_SESSION['error_message']);
    
        echo '<div id="errorModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Error en la compra</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>' . $error_message . '</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>';
    
        echo '<script>
            $(document).ready(function () {
                $("#errorModal").modal("show");
            });
        </script>';
    }
?>

