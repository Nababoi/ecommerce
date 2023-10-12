<?php

class RegistarUsuarios {
    
    public function registrarUsuario($nombre, $apellido, $email, $telefono, $saltHex, $hashContraseña, $rolElegido) {
        require("conexion.php");

        try {
            $query = "INSERT INTO usuarios (nombre, apellido, email, telefono, valorSalt, hashContrasena, rol)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
                
            $resultado = $conn->prepare($query);

            $resultado->bind_param("sssssss", $nombre, $apellido, $email, $telefono, $saltHex, $hashContraseña, $rolElegido);

            $resultado->execute();
            
            return;
        }catch(Exception $e){
            header("Location: ../Vistas/V_error.php");
        }
    }

    public function checkMailRegistrado($email) {
        require("conexion.php");

        try {
            $query = "SELECT * FROM usuarios WHERE email = ?";
                
            $resultado = $conn->prepare($query);

            $resultado->bind_param("s", $email);

            $resultado->execute();

            $resultado = $resultado->get_result();
            
            return $resultado;

        }catch(Exception $e){
            header("Location: ../Vistas/V_error.php");
        }
    }
    
}

?>