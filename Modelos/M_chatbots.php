<?php
require("conexion.php");

class Chatbots
{
    public function getResponse($userMessage)
    {
        // Conecta a la base de datos
        $conn = mysqli_connect("localhost", "root", "", "ecom") or die("Database Error");

        // Escapa la consulta del usuario
        $userMessage = mysqli_real_escape_string($conn, $userMessage);

        // Comprueba si la consulta del usuario coincide con la consulta de la base de datos
        $checkQuery = "SELECT replies FROM chatbots WHERE queries LIKE '%$userMessage%'";
        $runQuery = mysqli_query($conn, $checkQuery) or die("Error");

        if (mysqli_num_rows($runQuery) > 0) {
            // Recupera la respuesta de la base de datos según la consulta del usuario
            $rowData = mysqli_fetch_assoc($runQuery);
            // Almacena la respuesta en una variable para enviarla
            $response = $rowData['replies'];
        } else {
            $response = "¡Lo siento, no puedo ayudarte con este inconveniente! Por favor comunícate con el administrador en el siguiente enlace:<br><a href='https://www.configuroweb.com/contacto/'>Contacto</a>";
        }

        return $response;
    }
}
?>
