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
    <div id="chatbox"></div>
    <textarea placeholder="Type message.." name="msg" required></textarea>
    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>


<script src="https://kit.fontawesome.com/d8bd919f93.js" crossorigin="anonymous"></script>

<!-- script del chabots -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('form');
  const chatbox = document.getElementById('chatbox'); // Obtener el div del chatbox
  const chatInput = document.querySelector('textarea');

  form.addEventListener('submit', function (e) {
      e.preventDefault(); // Evita que el formulario se envíe automáticamente

      const userMessage = chatInput.value.trim();

      if (userMessage !== '') {
          // Realiza una solicitud AJAX para obtener la respuesta del chatbot
          const xhr = new XMLHttpRequest();
          xhr.open('POST', './Controlador/C_chatbots.php', true);
          xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xhr.onreadystatechange = function () {
              if (xhr.readyState === 4 && xhr.status === 200) {
                  const response = xhr.responseText;

                  // Agrega la respuesta del chatbot al chatbox
                  const chatMessage = document.createElement('p');
                  chatMessage.textContent = response;
                  chatbox.appendChild(chatMessage);

                  // Limpia el cuadro de entrada
                  chatInput.value = '';
              }
          };
          xhr.send('msg=' + userMessage);
      }
  });
});

// Otras funciones para abrir y cerrar el chatbox (puedes mantenerlas en tu archivo JavaScript si lo prefieres)
function openForm() {
  document.getElementById('myForm').style.display = 'block';
}

function closeForm() {
  document.getElementById('myForm').style.display = 'none';
}

</script>

</body>
</html>