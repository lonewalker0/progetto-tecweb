let imgIndex = 0;
let caroselloj = 0;

document.addEventListener("DOMContentLoaded", function () {
  var quantitaInputs = document.querySelectorAll('[id^="quantita-"]');

  quantitaInputs.forEach(function (input) {
    var id = input.id.split("-")[1];
    input.addEventListener("input", function () {
      calculateTotalPrice(id);
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var form = document.getElementById("formAggiuntaEvento");
  if (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      if (validazioneFormAggiutaEvento()) {
        event.target.submit();
      }
      return false;
    });
  }
});

/*document.addEventListener("DOMContentLoaded", function () {
  var form = document.getElementById("formLogin");
  if (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      if (validazioneFormLogin()) {
        event.target.submit();
      }
      return false;
    });
  }
});*/

document.addEventListener("DOMContentLoaded", function () {
  var form = document.getElementById("RegistrationForm");
  if (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      if (validazioneFormRegistrazione()) {
        event.target.submit();
      }
      return false;
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  var newPasswordField = document.getElementById("nuova_password");
  var confirmPasswordField = document.getElementById("conferma_password2");
  var oldPasswordField = document.getElementById("vecchia_password");
  if (newPasswordField && confirmPasswordField && oldPasswordField) {
    // Aggiungi un gestore agli eventi per il campo di input della nuova password
    newPasswordField.addEventListener("input", function () {
      // Rendi i campi obbligatori solo se la nuova password ha un valore
      confirmPasswordField.required = this.value.trim() !== "";
      oldPasswordField.required = this.value.trim() !== "";
    });
  }
});

if (window.location.pathname === "/progetto-git/index.php") {
  document.addEventListener("DOMContentLoaded", function () {
    carosello();
    countdownFestival();
    triggerView();
    document.addEventListener("scroll", scrollView);
  });
}

//eventListener per la visualizzazione dell'errore
document.addEventListener("DOMContentLoaded", function () {
  var errorDiv = document.getElementById("error_login");
  if (errorDiv) {
    errorDiv.style.display = "block"; // Mostra il messaggio di errore
    setTimeout(function () {
      errorDiv.style.display = "none"; // Nascondi il messaggio di errore dopo 2.5 secondi
    }, 2500); // 2500 millisecondi corrispondono a 2.5 secondi
  }
});
//funzione per il countdown del festival
const getCountdown = (eventDate) => {
  let countdownFestival = eventDate.getTime();

  let oggi = new Date().getTime();
  let intervallo = countdownFestival - oggi;

  let giorni = Math.floor(intervallo / (1000 * 60 * 60 * 24));
  let ore = Math.floor((intervallo % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  let minuti = Math.floor((intervallo % (1000 * 60 * 60)) / (1000 * 60));
  let secondi = Math.floor((intervallo % (1000 * 60)) / 1000);

  if (intervallo < 0) return null;

  return " " + giorni + "d " + ore + "h " + minuti + "m " + secondi + "s ";
};
//funzione per il countdown del festival
function countdownFestival() {
  const DOMELEMENT = document.getElementById("intervalloFestival");
  const eventDate = new Date("Jul 5, 2024 12:00:00");
  setInterval(() => {
    const countDown = getCountdown(eventDate);
    DOMELEMENT.innerHTML = countDown || "EXPIRED";
  }, 1000);
}
//funzione per il countdown del festival
function triggerView() {
  const df = document.getElementById("dataFestival");
  const cd = document.getElementById("intervalloFestival");
  let type = true;
  setInterval(() => {
    type = !type;
    if (type) {
      df.classList.add("data-block");
      df.classList.remove("data-none");
      cd.classList.add("countdown-none");
      cd.classList.remove("countdown-block");
    } else {
      df.classList.add("data-none");
      df.classList.remove("data-block");
      cd.classList.add("countdown-block");
      cd.classList.remove("countdown-none");
    }
  }, 4000);
}

function carosello() {
  let i;
  let img = document.getElementsByClassName("carosello-none");
  let puntini = document.getElementsByClassName("puntini");
  for (i = 0; i < img.length; i++) {
    if (caroselloj > 0) {
      img[i].classList.remove("carosello-block");
    }
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
      img[imgIndex - 1].classList.add("carosello-block");
      puntini[imgIndex - 1].className += " active";
    }
  }
  caroselloj++;
  setTimeout(carosello, 4000); //Cambia l'immagine del carosello ogni 4 secondi
}




//funzione che fa visualizzare il bordo con animazione sotto la scritta programma
function scrollView()
{
  let animazione = document.querySelectorAll(".programma-animation");
  let animazione2 = document.querySelectorAll(".programma-animation2");
  for(var i = 0; i < animazione.length; i++)
  {
    let altezza = window.innerHeight;
    let top = animazione[i].getBoundingClientRect().top;
    let visibile = 150;
    if(top < altezza - visibile)
    {
      animazione[i].classList.add("active");
      animazione2[i].classList.add("active");
    }
    else
    {
      animazione[i].classList.remove("active");
      animazione2[i].classList.remove("active");
    }
  }

}
//funzione per andare ad aggiungere un paragrafo al div di errore
function appendError(conteinerId, message) {
  const errorElement = document.createElement("p");
  errorElement.setAttribute("role", "alert");
  errorElement.setAttribute("aria-live", "assertive");
  errorElement.setAttribute("aria-atomic", "true");
  errorElement.textContent = message;
  conteinerId.appendChild(errorElement);
}

function StringaValida(string) {
  // This regex pattern checks for HTML tags or entities
  const pattern = /<[^>]*>|&[^;]+;/;
  return !pattern.test(string);
}

function isValidAge(age) {
  if (!Number.isInteger(age) || age <= 0) {
      return false;
  }
  var minAge = 16;
  return age >= minAge;
}
function isValidEmail(email) {
  // Pattern per la validazione dell'indirizzo email
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  var isEmailValid = emailPattern.test(email);

  var hasHtmlTagsOrEntities = !StringaValida(email);

  return isEmailValid && !hasHtmlTagsOrEntities;
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
  if (!StringaValida(artistName)) {
    isValid = false;
    document.getElementById("artist_name").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Il nome del artista non accetta codice HTML!");
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
  if (!StringaValida(description)) {
    isValid = false;
    document.getElementById("description").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Nella descrizione non è ammesso codice HTML!");
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

function validazioneFormLogin(){
  const errorContainer = document.getElementById(
    "error_login"
  );
  
  const username = document.forms["formLogin"]["username"].value;
  const password = document.forms["formLogin"]["password"].value;

  let isValid = true;
  if (!StringaValida(username)) {
    isValid = false;
    document.getElementById("username").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "questo campo non accetta codice HTML!");
  } else {
    document
      .getElementById("username")
      .setAttribute("aria-invalid", "false");
  }
  if (!StringaValida(password)) {
    isValid = false;
    document.getElementById("password").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "questo campo non accetta codice HTML!");
  } else {
    document
      .getElementById("password")
      .setAttribute("aria-invalid", "false");
  }
  return isValid;
  

}

function validazioneFormRegistrazione(){
  const errorContainer = document.getElementById(
    "errorContainerRegistrazione"
  );
  errorContainer.innerHTML = "";
  const nome = document.forms["RegistrationForm"]["nome"].value;
  const cognome = document.forms["RegistrationForm"]["cognome"].value;
  const eta = document.forms["RegistrationForm"]["eta"].value;
  const indirizzo = document.forms["RegistrationForm"]["indirizzo"].value;
  const email = document.forms["RegistrationForm"]["email"].value;
  const username = document.forms["RegistrationForm"]["username"].value;
  const password = document.forms["RegistrationForm"]["password"].value;
  const confermapassword = document.forms["RegistrationForm"]["confermaPassword"].value;

  let isValid = true;
  if (!StringaValida(nome)) {
    isValid = false;
    document.getElementById("nome").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "questo campo non accetta codice HTML!");
  } else {
    document
      .getElementById("nome")
      .setAttribute("aria-invalid", "false");
  }
  if (!StringaValida(cognome)) {
    isValid = false;
    document.getElementById("cognome").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "questo campo non accetta codice HTML!");
  } else {
    document
      .getElementById("cognome")
      .setAttribute("aria-invalid", "false");
  }
  if (!isValidAge(eta)) {
    isValid = false;
    document.getElementById("eta").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "eta non valida");
  } else {
    document
      .getElementById("eta")
      .setAttribute("aria-invalid", "false");
  }
  if (!StringaValida(indirizzo)) {
    isValid = false;
    document.getElementById("indirizzo").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "questo campo non accetta codice HTML!");
  } else {
    document
      .getElementById("indirizzo")
      .setAttribute("aria-invalid", "false");
  }
  if (!StringaValida(username)) {
    isValid = false;
    document.getElementById("username").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "questo campo non accetta codice HTML!");
  } else {
    document
      .getElementById("username")
      .setAttribute("aria-invalid", "false");
  }
  if (!StringaValida(password)) {
    isValid = false;
    document.getElementById("password").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "questo campo non accetta codice HTML!");
  } else {
    document
      .getElementById("password")
      .setAttribute("aria-invalid", "false");
  }
  if (!StringaValida(confermapassword)) {
    isValid = false;
    document.getElementById("confermaPassword").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "questo campo non accetta codice HTML!");
  } else {
    document
      .getElementById("confermaPassword")
      .setAttribute("aria-invalid", "false");
  }
  if (!isValidEmail(email)) {
    isValid = false;
    document.getElementById("email").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "formato email non valido");
  } else {
    document
      .getElementById("email")
      .setAttribute("aria-invalid", "false");
  }
  if (password !== confermapassword) {
    isValid = false;
    appendError(errorContainer, "Le password non coincidono");
  }
  return isValid;
  

}
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