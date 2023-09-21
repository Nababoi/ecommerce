<?php

   
require("../Modelos/M_productoMod.php");
$Act = new ProductosModCrud();
$Act->ModProducto($_POST['id'],$_POST['nombre'],$_POST['precio'],$_POST['categoria']);
// require("../Vista/VModificar.php");
?>