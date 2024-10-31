// Função para validação do email através de RegEx simples de email. Precisa apenas conter um @
function validateEmail(email) {
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return emailPattern.test(email);
}

// Após carregamento do DOM da página
document.addEventListener("DOMContentLoaded", function () {
  const emailInput = document.getElementById("email");
  const emailFeedback = document.getElementById("emailFeedback");

  // Validação de e-mail oninput
  emailInput.addEventListener("input", function () {
    if (validateEmail(emailInput.value)) {
      emailInput.classList.remove("is-invalid");
      emailInput.classList.add("is-valid");
      emailFeedback.style.display = "none"; // Esconde feedback
    } else {
      emailInput.classList.remove("is-valid");
      emailInput.classList.add("is-invalid");
      emailFeedback.style.display = "block"; // Mostra feedback
    }
  });
});

function habilitarEdicao() {
  const emailInput = document.getElementById("email");
  const okbutton = document.getElementById("okbutton");

  emailInput.removeAttribute("readonly"); // Remove o atributo readonly
  emailInput.focus(); // Foca no campo para edição

  okbutton.style.display = "inline-block"; // Exibe o botão "Ok"
  // Atualiza o valor do campo oculto ao submeter o formulário
  okbutton.onclick = function () {
    document.getElementById("hiddenEmail").value = emailInput.value;
  };
}
