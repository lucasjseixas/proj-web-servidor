function validateEmail(email) {
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  return emailPattern.test(email);
}

function validatePassword(senha) {
  const numberPattern = /\d/g;
  const numbers = senha.match(numberPattern);
  return numbers && numbers.length >= 3;
}

document.addEventListener("DOMContentLoaded", function () {
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("senha");
  const emailFeedback = document.getElementById("emailFeedback");
  const senhaFeedback = document.getElementById("senhaFeedback");

  // Validação de e-mail oninput
  emailInput.addEventListener("input", function () {
    if (validateEmail(emailInput.value)) {
      emailInput.classList.remove("is-invalid");
      emailInput.classList.add("is-valid");
      emailFeedback.style.display = "none";  // Esconde feedback
    } else {
      emailInput.classList.remove("is-valid");
      emailInput.classList.add("is-invalid");
      emailFeedback.style.display = "block";  // Mostra feedback
    }
  });

  // Validação de senha oninput
  passwordInput.addEventListener("input", function () {
    if (validatePassword(passwordInput.value)) {
      passwordInput.classList.remove("is-invalid");
      passwordInput.classList.add("is-valid");
      senhaFeedback.style.display = "none";  // Esconde feedback
    } else {
      passwordInput.classList.remove("is-valid");
      passwordInput.classList.add("is-invalid");
      senhaFeedback.style.display = "block";  // Mostra feedback
    }
  });

  // Validação no submit do formulário
  document
    .getElementById("emailForm")
    .addEventListener("submit", function (event) {
      if (!validateEmail(emailInput.value)) {
        event.preventDefault();
        alert("Por favor, insira um e-mail válido.");
      }

      if (!validatePassword(passwordInput.value)) {
        event.preventDefault();
        alert("A senha deve conter pelo menos 3 números.");
      }
    });
});
