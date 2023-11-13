<?php

    class ProductosModCrud{
        private $conn;

        public function ModProducto($id, $nombre, $precio, $porcentajeGanancia, $categoria, $talle, $cantidad){
            require("conexion.php");
            $query = "call modificarProducto(?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssssss", $id, $nombre, $precio, $porcentajeGanancia, $categoria, $talle, $cantidad);
            $stmt->execute();

            return $stmt->affected_rows;
        }

}
    
?>