<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/style.css">
    <title>Document</title>
    <!-- Despues cambiar en document el nombre del producto -->
</head>
<body>
  <div class="ContenedorPadre">
<div class="ContenedorProductos">
    <?php
    while ($fila = mysqli_fetch_assoc($datosProductos)){?>
<div class="card" style="width: 12rem;">
  <img src="<?php echo $fila["img"];?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $fila["nombre"];?>
</h5>
    <p class="card-text">$<?php echo $fila["precio"];?></p>
    <!-- <button type="submit" class="btn btn-primary">Subir</button> -->
    <a href="Controlador/C_productoU.php?id=<?php echo $fila['id'];?>" class="btn btn-primary">Ir</a>
  </div>
</div>
<?php } ?>
</div>
</div>
</div>
</body>
</html>