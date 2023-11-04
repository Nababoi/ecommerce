<?php
require_once("../Modelos/M_chatbots.php");

if (isset($_POST['msg'])) {
    $userMessage = $_POST['msg'];

    $chatbot = new Chatbots();
    $response = $chatbot->getResponse($userMessage);

    // Devuelve la respuesta del chatbot
    echo $response;
} else {
    // Manejo de error, si es necesario
    echo "Error en la solicitud.";
}
?>
