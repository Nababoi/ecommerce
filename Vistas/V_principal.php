<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/style.css">
    <title>Amor & Moda</title>
    <!-- Despues cambiar en document el nombre del producto -->
</head>
<body>

  <div class="ContenedorPadre">
    <br><br>
<div class="ContenedorProductos">
    <?php
    while ($fila = mysqli_fetch_assoc($datosProductos)){?>
<div class="card" style="width: 12rem;">
  <img src="<?php echo $fila["img"];?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $fila["nombre"];?>
</h5>
    <p class="card-text">$<?php echo $fila["precioVenta"];?></p>
    <!-- <button type="submit" class="btn btn-primary">Subir</button> -->
    <div class="btnComprar">
    <a href="Controlador/C_productoU.php?id=<?php echo $fila['id'];?>" class="btn btn-comprar">Comprar</a>
    </div>
  </div>
</div>
<?php } ?>
</div>
<?php require("V_chatbots.php"); ?>
<?php require("footer.php"); ?>
</div>
</div>
</body>
</html>