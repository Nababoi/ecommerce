<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amor & Moda</title>
    <link rel="stylesheet" href="Estilos/styleChat.css">
    
</head>
<body>
    <!-- codigo del chat -->
    <button class="open-button"onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
   <form action="./Controlador/C_chatbots.php" class="form-container" method="POST">
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script src="https://kit.fontawesome.com/d8bd919f93.js" crossorigin="anonymous"></script>
<script src="./Modelos/chatbots.js"></script>

</body>
</html>