<?php

   
require("../Modelos/M_productoMod.php");
$Act = new ProductosModCrud();
$Act->ModProducto($_GET['id'],$_POST['nombre'],$_POST['precio'],$_POST['ganancia'],$_POST['categoria'],$_POST['talle'],$_POST['cantidad']);
// require("../Vista/VModificar.php");
?>