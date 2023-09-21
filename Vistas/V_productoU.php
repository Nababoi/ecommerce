<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Estilos/style.css">
    <!-- Después cambiar en document el nombre del producto -->
</head>
<body>
<?php 
    require("navbar.php");
?>
<div class="ContenedorProductosU">
    <?php 
        // Definir una variable para controlar si ya hemos mostrado los detalles del producto
        $mostradoDetalles = false;
    ?>

    <form method="POST" action="../Controlador/C_productoCompraU.php"> <!-- Reemplaza "tu_script_php.php" con la URL de tu script PHP que procesará el formulario -->
        <?php 
        while ($fila = mysqli_fetch_assoc($datosProductosU)) {
            if (!$mostradoDetalles) {
                // Mostrar los detalles del producto (nombre, precio, imagen, etc.)
                echo '<div class="container">';
                echo '<div class="row">';
                echo '<div class="col-md-6 contenedorFotoProductoU">';
                echo '<img src="../' . $fila["img"] . '" class="card-img-top imagenU" alt="...">';
                echo '</div>';
                echo '<div class="col-md-6 contenedorDetallesU">';
                echo '<h2 class="tituloU">' . $fila["nombre"] . '</h2>';
                echo '<input type="hidden" name="idU" value="' . $fila["id"] . '" readonly>'; // Input oculto y de solo lectura
                echo '<div class="ContenedorTalles">';
                echo '<div class="ContenedorTalleU">';
                echo '<label for="talla">Seleccionar Talla:</label>';
                echo '<select name="talla" class="form-control" id="talla">';
                $mostradoDetalles = true; // Marcar como mostrados los detalles del producto
            }
            
            if ($fila["cantidad"] > 0) {
                // Agregar opciones de talla basadas en los datos de la base de datos
                echo '<option value="' . $fila["talleCodigo"] . '">' . $fila["talleCodigo"] . '</option>';
            }
        }

        // Cerrar las etiquetas de select y div si ya hemos mostrado los detalles
        if ($mostradoDetalles) {
            echo '</select>';
            echo '</div>'; // Cerrar el div ContenedorTalleU
            echo '</div>'; // Cerrar el div ContenedorTalles
            echo '<input type="number" name="cantidad" class="form-control text-center inputU" id="cantidad" value="1">';
            echo '<button type="submit" class="btn botonU btn-block" id="comprar">Comprar</button>';
            echo '</div>'; // Cerrar el div contenedorDetallesU
            echo '</div>'; // Cerrar el div row
            echo '</div>'; // Cerrar el div container
        }
        ?>
    </form>
</div>
</body>
</html>
