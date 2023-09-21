<?php

    class ProductosModCrud{
        private $conn;

        public function ModProducto($id,$nombre, $precio, $categoria){
            require("conexion.php");
            $query = "call modProducto(?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssss",$id, $nombre, $precio, $categoria);
            $stmt->execute();
            header("Location: ../index.php");
            return $stmt->affected_rows;
        }

}
    
?>