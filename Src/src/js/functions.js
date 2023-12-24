let imgIndex = 0;

document.addEventListener("DOMContentLoaded", function () {
  carosello();
});

document.addEventListener("DOMContentLoaded", function () {
  triggerView();
  countdownFestival();
});

const getCountdown = (eventDate) => {
  let countdownFestival = eventDate.getTime();

  let oggi = new Date().getTime();
  let intervallo = countdownFestival - oggi;

  let giorni = Math.floor(intervallo / (1000 * 60 * 60 * 24));
  let ore = Math.floor((intervallo % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  let minuti = Math.floor((intervallo % (1000 * 60 * 60)) / (1000 * 60));
  let secondi = Math.floor((intervallo % (1000 * 60)) / 1000);

  if (intervallo < 0) return null;

  return "| " + giorni + "d " + ore + "h " + minuti + "m " + secondi + "s ";
};
function countdownFestival() {
  const DOMELEMENT = document.getElementById("intervalloFestival");
  const eventDate = new Date("Jul 5, 2024 12:00:00");
  setInterval(() => {
    const countDown = getCountdown(eventDate);
    DOMELEMENT.innerHTML = countDown || "EXPIRED";
  }, 1000);
}
function triggerView() {
  const df = document.getElementById("dataFestival");
  const cd = document.getElementById("intervalloFestival");
  let type = true;
  setInterval(() => {
    type = !type;
    if (type) {
      df.style.display = "block";
      cd.style.display = "none";
    } else {
      df.style.display = "none";
      cd.style.display = "block";
    }
  }, 4000);
}

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

//funzione per andare ad aggiungere un paragrafo al div di errore
function appendError(conteinerId, message) {
  const errorElement = document.createElement("p");
  errorElement.setAttribute("role", "alert");
  errorElement.setAttribute("aria-live", "assertive");
  errorElement.setAttribute("aria-atomic", "true");
  errorElement.textContent = message;
  conteinerId.appendChild(errorElement);
}

function contineCaratteriSpeciali(stringa) {
  // espressione regolare che prende tutti i caratteri speciali
  const espressione = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
  return espressione.test(stringa);
}
function formatoData(stringa) {
  // Espressione regolare per corrispondere al formato data standard (YYYY-MM-DD)
  const espressione = /^\d{4}-\d{2}-\d{2}$/;
  return !espressione.test(stringa);
}
function formatoOra(stringa) {
  // Espressione regolare per corrispondere al formato ora standard (HH:mm)
  const espressione = /^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/;
  return !espressione.test(stringa);
}

function validazioneFormAggiutaEvento() {
  const errorContainer = document.getElementById(
    "errorContainerAggiuntaEvento"
  );
  errorContainer.innerHTML = "";
  //mi prendo tutti i valori dei campi di imput
  const artistName = document.forms["formAggiuntaEvento"]["artist_name"].value;
  const date = document.forms["formAggiuntaEvento"]["date"].value;
  const hour = document.forms["formAggiuntaEvento"]["hour"].value;
  const description = document.forms["formAggiuntaEvento"]["description"].value;

  //per l'immagine tocca fare cosi altrimenti non ci si riesce a validare
  const image = document.getElementById("image").files[0];

  let isValid = true;
  if (artistName.trim() === "") {
    isValid = false;
    document.getElementById("artist_name").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Nome dell'artista è obbligatorio!");
  } else {
    document
      .getElementById("artist_name")
      .setAttribute("aria-invalid", "false");
  }
  if (contineCaratteriSpeciali(artistName)) {
    isValid = false;
    document.getElementById("artist_name").setAttribute("aria-invalid", "true");
    appendError(
      errorContainer,
      "Il nome dell'artista non può contenere caratteri speciali!"
    );
  } else {
    document
      .getElementById("artist_name")
      .setAttribute("aria-invalid", "false");
  }
  if (description.trim() === "") {
    isValid = false;
    document.getElementById("description").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "La descrizione è obbligatoria!");
  } else {
    document
      .getElementById("artist_name")
      .setAttribute("aria-invalid", "false");
  }
  if (contineCaratteriSpeciali(description)) {
    isValid = false;
    document.getElementById("description").setAttribute("aria-invalid", "true");
    appendError(
      errorContainer,
      "La descrizione non può contenere caratteri speciali!"
    );
  } else {
    document
      .getElementById("description")
      .setAttribute("aria-invalid", "false");
  }
  if (formatoData(date)) {
    isValid = false;
    document.getElementById("date").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Inserisci una data valida!");
  } else {
    document.getElementById("date").setAttribute("aria-invalid", "false");
  }
  if (formatoOra(hour)) {
    isValid = false;
    document.getElementById("hour").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Inserisci un'orario valido!");
  } else {
    document.getElementById("hour").setAttribute("aria-invalid", "false");
  }

  //validazione immagine
  const estensioniAmmesse = ["image/jpeg", "image/png", "image/gif"];
  const dimensioneMassima = 1 * 1024 * 1024; // 1 MB
  if (!image) {
    isValid = false;
    document.getElementById("image").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "L'immagine è obbligatoria!");
  } else if (!estensioniAmmesse.includes(image.type)) {
    isValid = false;
    document.getElementById("image").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Formato del file immagine non supportato!");
  } else if (image.size > dimensioneMassima) {
    isValid = false;
    document.getElementById("image").setAttribute("aria-invalid", "true");
    appendError(
      errorContainer,
      "La dimensione del file immagine non deve superare 1 MB!"
    );
  } else {
    document.getElementById("image").setAttribute("aria-invalid", "false");
  }
  if (isValid) {
    return true;
  }

  return false;
}

//altrimenti non funziona perchè il form viene istanziato solo dopo
document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("formAggiuntaEvento")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      if (validazioneFormAggiutaEvento()) {
        event.target.submit();
      }
      return false;
    });
});

document.addEventListener("DOMContentLoaded", function () {
  var newPasswordField = document.getElementById("nuova_password");
  var confirmPasswordField = document.getElementById("conferma_password2");
  var oldPasswordField = document.getElementById("vecchia_password");

  // Aggiungi un gestore agli eventi per il campo di input della nuova password
  newPasswordField.addEventListener("input", function () {
    // Rendi i campi obbligatori solo se la nuova password ha un valore
    confirmPasswordField.required = this.value.trim() !== "";
    oldPasswordField.required = this.value.trim() !== "";
  });
});

//calcolare il prezzo totale del biglietto, prima di inviare l'acquisto al submit

function calculateTotalPrice(id) {
  var quantitaInput = document.getElementById("quantita-" + id);
  var prezzoTotaleParagraph = document.getElementById("prezzo-totale-" + id);
  var prezzoElement = document.getElementById("prezzo-" + id);

  // Ottenere il valore contenuto all'interno del <dd>
  var prezzoSingolo = parseFloat(prezzoElement.textContent.trim());
  var quantita = parseInt(quantitaInput.value, 10);
  var prezzoTotale = prezzoSingolo * quantita;

  // Aggiorna il testo del paragrafo
  if (!isNaN(prezzoSingolo) && !isNaN(quantita) && quantita > 0) {
    prezzoTotaleParagraph.innerHTML =
      "Prezzo totale: " + prezzoTotale.toFixed(2) + "€";
    prezzoTotaleParagraph.style.display = "block";
  } else {
    prezzoTotaleParagraph.style.display = "none";
  }
}

// Aggiungi event listener per ogni campo di quantità
document.addEventListener("DOMContentLoaded", function () {
  var quantitaInputs = document.querySelectorAll('[id^="quantita-"]');

  quantitaInputs.forEach(function (input) {
    var id = input.id.split("-")[1];
    input.addEventListener("input", function () {
      calculateTotalPrice(id);
    });
  });
});
