<?php

    require ("../Modelos/M_productoU.php");
    $conexion = new ProductoUnitario();
    $datosProductosU = $conexion->obtenerProductoUnidad($_GET['id']);
    require("../Vistas/V_productoU.php");
    
// }
    
    

?>