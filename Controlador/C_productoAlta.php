<?php
    session_start();
    // if (isset($_SESSION['nombre'])){
    require("../Vistas/navbar.php");
    require ("../Modelos/M_productoAlta.php");
    $conexion = new ProductosCrud();
    $datos = $conexion->altaProducto($_POST['nombre'],$_POST['precio'],$_POST['categoria']);
    // require("../Vistas/V_VistaHambur.php");
    
// }
    
    

?>