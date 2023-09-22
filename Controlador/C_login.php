<?php
    require '../Modelos/M_login.php';
    

    $conexion = new Login();


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $emailIngresado = $_POST["email"];
        $contraseñaIngresada = $_POST["password"];

        // Combina la contraseña del usuario con el salt


        $resultado = $conexion->buscarUsuario($emailIngresado);

    // Comprueba si se encontró un usuario con ese correo
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $valorSaltBD = $fila["valorSalt"];
            $hashContrasenaBD = $fila["hashContrasena"];

            $comprobarContrasena = $contraseñaIngresada . $valorSaltBD;

            // Verifica la contraseña proporcionada con la almacenada en la base de datos
            if (password_verify($comprobarContrasena, $hashContrasenaBD)) {
                echo "DATOS CORRECTOS!....  (PROVISORIO)";
                exit;
            } 
        }

        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var datosIncorrectos = document.getElementById("datosIncorrectos");
                    if (datosIncorrectos) {
                        datosIncorrectos.style.display = "block";
                    }
                });
            </script>';

    }

    require '../Vistas/V_login.php';

?>