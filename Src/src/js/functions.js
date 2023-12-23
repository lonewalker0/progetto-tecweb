document.addEventListener("DOMContentLoaded", function () {
  let imgIndex = 0;
  carosello();
});

function carosello() {
  let i;
  let img = document.getElementsByClassName("carosello");
  let puntini = document.getElementsByClassName("puntini");
  for (i = 0; i < img.length; i++) {
    img[i].style.display = "none";
  }
  imgIndex++;
  if (imgIndex > img.length) {
    imgIndex = 1;
  }
  for (i = 0; i < puntini.length; i++) {
    puntini[i].className = puntini[i].className.replace(" active", "");
  }
  for (i = 0; i < img.length; i++) {
    if (i === imgIndex - 1) {
      img[imgIndex - 1].style.display = "block";
      puntini[imgIndex - 1].className += " active";
    }
  }
  setTimeout(carosello, 2000); //Cambia l'immagine del carosello ogni 2 secondi
}

function validateForm() {
  // Validazione dell'età (deve essere maggiore di 16)
  var etaInput = document.getElementById("eta");
  var etaError = document.getElementById("etaError");
  if (etaInput.value < 16) {
    etaError.textContent = "Devi avere almeno 16 anni.";
    return false;
  } else {
    etaError.textContent = "";
  }

  // Validazione delle password (devono coincidere)
  var passwordInput = document.getElementById("password");
  var confermaPasswordInput = document.getElementById("confermaPassword");
  var passwordError = document.getElementById("passwordError");

  if (passwordInput.value !== confermaPasswordInput.value) {
    passwordError.textContent = "Le password non coincidono.";
    return false;
  } else {
    passwordError.textContent = "";
  }

  // Restituisce true solo se tutte le validazioni sono superate
  return true;
}

document.addEventListener("DOMContentLoaded", function () {
  var errorDiv = document.getElementById("error_login");
  if (errorDiv) {
    errorDiv.style.display = "block"; // Mostra il messaggio di errore
    setTimeout(function () {
      errorDiv.style.display = "none"; // Nascondi il messaggio di errore dopo 2.5 secondi
    }, 2500); // 2500 millisecondi corrispondono a 2.5 secondi
  }
});


document.addEventListener('DOMContentLoaded', function () {
  var newPasswordField = document.getElementById('nuova_password');
  var confirmPasswordField = document.getElementById('conferma_password2');
  var oldPasswordField = document.getElementById('vecchia_password');

  // Aggiungi un gestore agli eventi per il campo di input della nuova password
  newPasswordField.addEventListener('input', function () {
      // Rendi i campi obbligatori solo se la nuova password ha un valore
      confirmPasswordField.required = this.value.trim() !== '';
      oldPasswordField.required = this.value.trim() !== '';
  });
});