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
