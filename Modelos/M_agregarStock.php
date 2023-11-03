<?php

    class Stock{
        private $conn;

        public function agregarStock($id, $talle, $cantidad){
            require("conexion.php");
            $query = "call agregarStock(?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss",$id, $talle, $cantidad);
            $stmt->execute();
            header("Location: ../index.php");
            return $stmt->affected_rows;
        }

}
    
?>