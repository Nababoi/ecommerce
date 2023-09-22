<?php

class RegistarUsuarios {
    
    public function registrarUsuario($nombre, $apellido, $email, $telefono, $saltHex, $hashContraseña, $esAdmin) {
        require("conexion.php");

        try {
            $query = "INSERT INTO usuarios (nombre, apellido, email, telefono, valorSalt, hashContrasena, esAdmin)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
                
            $resultado = $conn->prepare($query);

            $resultado->bind_param("sssssss", $nombre, $apellido, $email, $telefono, $saltHex, $hashContraseña, $esAdmin);

            $resultado->execute();
            
            return;
        }catch(Exception $e){
            header("Location: ../Vistas/V_error.php");
        }
    }
}

?>