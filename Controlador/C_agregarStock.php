<?php

    require ("../Modelos/M_agregarStock.php");
    $stock = new Stock();
    $stock->agregarStock($_GET['id'],$_POST['talle'],$_POST['cantidad'])
    // require("../Vistas/V_formAgregarStock.php");
    
// }
    
    

?>