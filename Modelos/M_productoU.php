<?php

    class ProductoUnitario{
        private $conn;

        public function obtenerProductoUnidad($id){
            require ("conexion.php");
            $query = "SELECT * FROM productos where id = ?";
            $stmt = $conn->prepare($query);

            $stmt->bind_param("s", $id);
            $stmt->execute();
            
            // Devolvemos el resultado de la consulta
            return $stmt->get_result();
    }

}
    
?>