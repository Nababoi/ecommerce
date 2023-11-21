<?php
    session_start();
    // if (isset($_SESSION['nombre'])){
    // require("../Vistas/navbar.php");
    require ("../Modelos/M_productoCrud.php");
    $conexion = new ProductosCrud();
    $datos = $conexion->altaProducto($_POST['nombre'],$_POST['precio'],$_POST['ganancia'],$_POST['categoria'],$_POST['talle'],$_POST['cantidad']);
    header("Location: ../index.php");
    // require("../Vistas/V_VistaHambur.php");
    
// }
    
    

?>