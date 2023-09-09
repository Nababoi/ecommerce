<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="ContenedorProductos">
    <?php
    while ($fila = mysqli_fetch_assoc($datosProductos)){?>
<div class="card" style="width: 13rem;">
  <img src="<?php echo $fila["img"];?>" class="card-img-top" alt="...">
  <div class="card-body "style="width: 13rem;">
    <h5 class="card-title"><?php echo $fila["nombre"];?>
</h5>
    <p class="card-text"><?php echo $fila["precio"];?></p>
  </div>
</div>
<?php } ?>
</div>
</div>
</body>
</html>