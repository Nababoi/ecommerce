<?php

class Login {

    public function buscarUsuario($email) {
        require("conexion.php");

        try {
            $query = "SELECT * FROM usuarios WHERE email = ?";
                
            $resultado = $conn->prepare($query);

            $resultado->bind_param("s", $email);

            $resultado->execute();

            $resultado = $resultado->get_result();
            
            if($resultado->num_rows > 0){
                $fila = $resultado->fetch_assoc();
                session_start();
                $_SESSION['nombre'] = $fila['nombre'];
                $_SESSION['esadmin'] = $fila['esAdmin'];
                if ($fila['esAdmin'] == 'si') {
                    header("Location: ../Controlador/C_productoCrud.php");
                } else {
                    header("Location: ../index.php");
                }            }else{
                session_start();
                $_SESSION['error'] = "Datos incorrectos";
                header("Location: ../index.php");
            }

        }catch(Exception $e){
            header("Location: ../Vistas/V_error.php");
        }
    }
}

?>