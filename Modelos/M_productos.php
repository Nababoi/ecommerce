<?php

    class ConexionBd{
        private $conn;

        public function obtenerProductos(){
            require ("conexion.php");
            $query = "SELECT * FROM productos";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $resultado = $stmt->get_result();
            return $resultado;
    }

}
    
?>