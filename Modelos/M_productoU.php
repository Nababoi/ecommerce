<?php

    class ProductoUnitario{
        private $conn;

        public function obtenerProductoUnidad($id){
            require ("conexion.php");
            $query = "select pt.id, pt.cantidad ,p.img ,p.nombre, p.precio, t.talleCodigo from productos p 
            JOIN producto_talle pt on pt.idProducto = p.id 
            JOIN talle t on t.id = pt.idTalle where p.id = ?;
            ";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $id);
            $stmt->execute();
            
            // Devolvemos el resultado de la consulta
            return $stmt->get_result();
    }

    public function productoAgregarCarrito($nombre, $precio, $talla, $cantidad){
        require("conexion.php");
        // $query = "call altaProducto(?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $nombre, $precio, $talla, $cantidad);
        $stmt->execute();
        header("Location: ../index.php");
        return $stmt->affected_rows;
    }
}
    
?>