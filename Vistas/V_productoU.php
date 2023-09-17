<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Estilos/style.css">

    <!-- Despues cambiar en document el nombre del producto -->
</head>
<body>
<?php 
    require("navbar.php");
?>
<div class="ContenedorProductos">
    <?php 
        // Definir una variable para controlar si ya hemos mostrado los detalles del producto
        $mostradoDetalles = false;

        while ($fila = mysqli_fetch_assoc($datosProductosU)) {
            if (!$mostradoDetalles) {
                // Mostrar los detalles del producto (nombre, precio, imagen, etc.)
                echo '<div class="container">';
                echo '<div class="row">';
                echo '<div class="col-md-8 contenedorFotoProductoU">';
                echo '<img src="../' . $fila["img"] . '" class="card-img-top imagenU" alt="...">';
                echo '</div>';
                echo '<div class="col-md-4 contenedorDetallesU">';
                echo '<h2 class="tituloU">' . $fila["nombre"] . '</h2>';
                echo '<h2 class="tituloU">' . $fila["id"] . '</h2>';
                echo '<p class="precioU">$' . $fila["precio"] . '</p>';
                echo '<div class="ContenedorTalles">';
                $mostradoDetalles = true; // Marcar como mostrados los detalles del producto
            }
            
            if ($fila["cantidad"] > 0) {
                // Mostrar los recuadros de tallas con stock disponible
                echo '<div class="recuadro">';
                echo '<span class="valor">' . $fila["talleCodigo"] . '</span>';
                echo '</div>';
            }
        }

        // Cerrar las etiquetas de div si ya hemos mostrado los detalles
        if ($mostradoDetalles) {
            echo '</div>';
            echo '<input type="number" class="form-control text-center inputU" id="cantidad" value="1">';
            echo '<button class="btn botonU btn-block" id="comprar">Comprar</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    ?>
</div>
</div>
</body>
</html>