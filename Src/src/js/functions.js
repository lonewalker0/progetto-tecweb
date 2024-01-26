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


document.addEventListener("DOMContentLoaded", function() {
  var label = document.getElementById("menuToggleLabel");
  var checkbox = document.getElementById("menuToggle");
  if(label && checkbox){
  label.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
      checkbox.checked = !checkbox.checked;}
  });}
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


document.addEventListener("DOMContentLoaded", function () {
  var menu = document.querySelector('.menu');
  var originalMenuPosition = menu.offsetTop; 

  window.addEventListener('scroll', function() {
      if (window.scrollY >= originalMenuPosition) { 
          menu.classList.add('fixed-menu');
      } else {
          menu.classList.remove('fixed-menu');
      }
  });
});




document.addEventListener("DOMContentLoaded", function () {
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
});

document.addEventListener("DOMContentLoaded", function () {
  var form = document.getElementById("formeliminaaccount");
  if (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      if (
        validazioneFormEliminazioneUser()      
      ) {
        event.target.submit();
      }
      return false;
    });
  }
});

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
  var form = document.getElementById("formUpdate");
  if (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      if (validazioneFormUpdate()) {
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

document.addEventListener("DOMContentLoaded", function () {
  if (window.location.pathname.indexOf('index.php') > -1) {
    var scrollToTopBtn = document.getElementById("scrollToTopBtn");
    var navEventi = document.getElementById("navEventi");

    

    window.addEventListener("scroll", function () {
      if (window.scrollY > 600) {
        // Aggiungi la classe 'show' e rimuovi la classe 'hide'
        scrollToTopBtn.classList.add("show");
        scrollToTopBtn.classList.remove("hide");
        
      } else {
        // Aggiungi la classe 'hide' e rimuovi la classe 'show'
        scrollToTopBtn.classList.add("hide");
        scrollToTopBtn.classList.remove("show");
        
      }
    });

    scrollToTopBtn.addEventListener("click", function () {
      // Scorrimento graduale al navEventi
      var navEventiPosition = navEventi.offsetTop;
      window.scrollTo({ top: navEventiPosition - 150, behavior: "smooth" });
    });

  }
});

if (window.location.pathname.indexOf('index.php') > -1) {
  document.addEventListener("DOMContentLoaded", function () {
    carosello();
    document.addEventListener("scroll", scrollView);
  });
}

document.addEventListener("DOMContentLoaded", function () {
  countdownFestival();
  triggerView();
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

function triggerView() {
  const df = document.getElementById("dataFestival");
  const cd = document.getElementById("intervalloFestival");

  let type = true;
  setInterval(() => {
    if (type) {
      df.classList.remove("accessibleShow");
      df.classList.add("accessibleHide");
      cd.classList.remove("accessibleHide");
      cd.classList.add("accessibleShow");
    } else {
      df.classList.remove("accessibleHide");
      df.classList.add("accessibleShow");
      cd.classList.remove("accessibleShow");
      cd.classList.add("accessibleHide");
    }
    type = !type;
  }, 4000);
}

function carosello() {
  let caroselloimg;
  let idfoto = "foto";
  let i;
  let img = document.querySelector("#carosello-foto"); //mi rappresenta tutto il carosello, nel suo insieme (senza comprendere i puntini)
  let imgtot = img.querySelectorAll("*").length; //mi rappresenta il numero di foto del carosello
  let puntini = document.getElementsByClassName("puntini");

  for (i = 0; i < imgtot; i++) {
    if (caroselloj > 0) {
      caroselloimg = document.getElementById(idfoto + i); //mi rappresenta la foto in cui sto lavorando in quel momento
      caroselloimg.classList.remove("fade");
      caroselloimg.classList.add("foto-hide");
    }
  }
  imgIndex++;
  if (imgIndex > imgtot) {
    imgIndex = 1;
  }
  for (i = 0; i < puntini.length; i++) {
    puntini[i].className = puntini[i].className.replace(" active", "");
  }
  for (i = 0; i < imgtot; i++) {
    if (i === imgIndex - 1) {
      caroselloimg = document.getElementById(idfoto + i);
      caroselloimg.classList.add("fade");
      caroselloimg.classList.remove("foto-hide");
      puntini[imgIndex - 1].className += " active";
    }
  }
  caroselloj++;
  setTimeout(carosello, 4000); //Cambia l'immagine del carosello ogni 4 secondi
}

//funzione che fa visualizzare il bordo con animazione sotto la scritta programma
function scrollView() {
  let animazione = document.querySelectorAll(".programma-animation");
  let animazione2 = document.querySelectorAll(".programma-animation2");
  for (var i = 0; i < animazione.length; i++) {
    let altezza = window.innerHeight;
    let top = animazione[i].getBoundingClientRect().top;
    let visibile = 150;
    if (top < altezza - visibile) {
      animazione[i].classList.add("active");
      animazione2[i].classList.add("active");
    } else {
      animazione[i].classList.remove("active");
      animazione2[i].classList.remove("active");
    }
  }
}
//funzione per andare ad aggiungere un paragrafo al div di errore
function appendError(conteinerId, message) {
  const errorElement = document.createElement("p");
  
  errorElement.textContent = message;
  conteinerId.appendChild(errorElement);
}

function StringaValida(string) {
  const pattern = /<[^>]*>|&[^;]+;/;
  

  return  !pattern.test(string);
}

function lunghezzaValida(string, minLength, maxLength) {
  const lunghezza = string.length;
  return lunghezza >= minLength && lunghezza <= maxLength;
}

function isValidAddressFormat(address) {
  // L'indirizzo deve iniziare con "Via" o "Piazza", seguito da un numero civico e terminare con una città
  const regex = /^(Via|Piazza)\s[\p{L}\s]+\d+[\w\s,.\-]+[A-Za-z\s,.\-]+[A-Za-z]{2,}$/ui;
  return regex.test(address);
}

function isValidAge(dateOfBirth) {
  var currentDate = new Date();
  var birthdateArray = dateOfBirth.split("-");
  var birthdate = new Date(
    birthdateArray[0],
    birthdateArray[1] - 1,
    birthdateArray[2]
  );
  var minAge = 16;

  var minBirthdate = new Date(currentDate);
  minBirthdate.setFullYear(currentDate.getFullYear() - minAge);

  return birthdate <= minBirthdate;
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
  }else if(!lunghezzaValida(artistName,4,50)){
    isValid = false;
    document.getElementById("artist_name").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Lunghezza campo artista deve essere compreso tra 4 e 50 caratteri!");

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
  }else if(!lunghezzaValida(description,5,300)){
    isValid = false;
    document.getElementById("description").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Lunghezza stringa non valida: minimo 5 caratteri,massimo 300 caratteri!");
  }
  else {
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
  const allowedDates = ["2024-07-05", "2024-07-06", "2024-07-07"];
  if (!allowedDates.includes(date)) {
        isValid = false;
        document.getElementById("date").setAttribute("aria-invalid", "true");
        appendError(errorContainer, "La data deve essere 5, 6 o 7 Luglio 2024!");
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

function validazioneFormLogin() {
  const errorContainer = document.getElementById("error_login");
  errorContainer.innerHTML = "";

  const fieldsToValidate = [
    {
      name: "username",
      htmlErrorMessage: "Il campo username non accetta codice HTML!",
      lengthErrorMessage: "L'username deve avere una lunghezza compresa tra 4 e 25 caratteri.",
    },
    {
      name: "password",
      htmlErrorMessage: "Il campo password non accetta codice HTML!",
      lengthErrorMessage: "La password deve avere una lunghezza compresa tra 4 e 50 caratteri.",
    },
  ];

  let isValid = true;

  fieldsToValidate.forEach((field) => {
    const value = document.forms["formLogin"][field.name].value;

    if (!StringaValida(value)) {
      isValid = false;
      document.getElementById(field.name).setAttribute("aria-invalid", "true");
      appendError(errorContainer, field.htmlErrorMessage);
    } else if (!lunghezzaValida(value, (field.name === "username" ? 4 : 4), (field.name === "username" ? 25 : 50))) {
      isValid = false;
      document.getElementById(field.name).setAttribute("aria-invalid", "true");
      appendError(errorContainer, field.lengthErrorMessage);
    } else {
      document.getElementById(field.name).setAttribute("aria-invalid", "false");
    }
  });

  return isValid; // Aggiunto per restituire il risultato della validazione
}

function validazioneFormRegistrazione() {
  const errorContainer = document.getElementById("errorContainerRegistrazione");
  
  errorContainer.innerHTML = "";
  const nome = document.forms["RegistrationForm"]["nome"].value;
  const cognome = document.forms["RegistrationForm"]["cognome"].value;
  const eta = document.forms["RegistrationForm"]["dataNascita"].value;

  const indirizzo = document.forms["RegistrationForm"]["indirizzo"].value;
  const email = document.forms["RegistrationForm"]["email"].value;
  const username = document.forms["RegistrationForm"]["username"].value;
  const password = document.forms["RegistrationForm"]["password"].value;
  const confermapassword =
    document.forms["RegistrationForm"]["confermaPassword"].value;

  let isValid = true;
  if (!StringaValida(nome)) {
    isValid = false;
    document.getElementById("nome").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Campo nome non accetta codice HTML!");
  } else if(!lunghezzaValida(nome,2,45)){
    isValid = false;
    document.getElementById("nome").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Lunghezza nome non valida caratteri consentiti tra 2 e 45!");

  }
    else {
    document.getElementById("nome").setAttribute("aria-invalid", "false");
  }
  if (!StringaValida(cognome)) {
    isValid = false;
    document.getElementById("cognome").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Campo cognome non accetta codice HTML!");
  } else if(!lunghezzaValida(cognome,2,45)){
    isValid = false;
    document.getElementById("cognome").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Lunghezza cognome non valida caratteri consentiti tra 2 e 45!");
  }  
  else {
    document.getElementById("cognome").setAttribute("aria-invalid", "false");
  }
  if (!isValidAge(eta)) {
    isValid = false;
    document.getElementById("dataNascita").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Devi avere almeno 16 anni per registrarti!");
  } else {
    document
      .getElementById("dataNascita")
      .setAttribute("aria-invalid", "false");
  }
  if (!StringaValida(indirizzo)) {
    isValid = false;
    document.getElementById("indirizzo").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Campo indirizzo non accetta codice HTML!");
  } else if(!lunghezzaValida(indirizzo,5,80)){
    isValid = false;
    document.getElementById("indirizzo").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Lunghezza indirizzo non valida: caratteri consentiti tra 5 e 80!");
  } else if (!isValidAddressFormat(indirizzo)){
    isValid = false;
    document.getElementById("indirizzo").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "L'indirizzo deve iniziare con 'via' o 'piazza', avere un numero civico, una virgola e a seguire la città!");
  }
  else {
    document.getElementById("indirizzo").setAttribute("aria-invalid", "false");
  }
  if (!StringaValida(username)) {
    isValid = false;
    document.getElementById("username").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Campo username non accetta codice HTML!");
  } else if(!lunghezzaValida(username,4,25)){
    isValid = false;
    document.getElementById("username").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Lunghezza stringa non valida, caratteri consentiti tra 4 e 25!");
  }
  
  else {
    document.getElementById("username").setAttribute("aria-invalid", "false");
  }
  if (!StringaValida(password)) {
    isValid = false;
    document.getElementById("password").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Campo password non accetta codice HTML!");
  } else if(!lunghezzaValida(password,4,50)){
    isValid = false;
    document.getElementById("password").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Lunghezza password non valida caratteri consentiti tra 4 e 50!");
  } 
  else {
    document.getElementById("password").setAttribute("aria-invalid", "false");
  }
  if (!StringaValida(confermapassword)) {
    isValid = false;
    document
      .getElementById("confermaPassword")
      .setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Campo conferma password non  accetta codice HTML!");
  } else if(!lunghezzaValida(confermapassword,4,50)){
    isValid = false;
    document
      .getElementById("confermaPassword")
      .setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Lunghezza conferma password non valida: caratteri consentiti tra 4 e 50!");
  }
  
  else {
    document
      .getElementById("confermaPassword")
      .setAttribute("aria-invalid", "false");
  }
  if (!isValidEmail(email)) {
    isValid = false;
    document.getElementById("email").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "formato email non valido!");
  } else {
    document.getElementById("email").setAttribute("aria-invalid", "false");
  }
  if (password !== confermapassword) {
    isValid = false;
    //document.getElementById('passwordError').innerHTML = "Le password non coincidono!";
    appendError(errorContainer, "Le password non coincidono!");
  }
  if(!isValid)
  {
    errorContainer.scrollIntoView({behavior: 'smooth'});
  }
  return isValid;
}

function validazioneFormUpdate() {
  const errorContainer = document.getElementById("errorupdate");
  errorContainer.innerHTML = "";
  const indirizzo = document.forms["formUpdate"]["indirizzo"].value;
  const email = document.forms["formUpdate"]["email"].value;
  const nuovapassword = document.forms["formUpdate"]["nuova_password"].value;
  const confermapassword =
    document.forms["formUpdate"]["conferma_password2"].value;
  const passwordvecchia =
    document.forms["formUpdate"]["vecchia_password"].value;

  let isValid = true;
  if (indirizzo.trim() !== "") {
    if (!StringaValida(indirizzo)) {
      isValid = false;
      document.getElementById("indirizzo").setAttribute("aria-invalid", "true");
      appendError(errorContainer, "Campo indirizzo non accetta codice HTML!");
    } else if(!lunghezzaValida(indirizzo,5,80)){
      isValid = false;
      document.getElementById("indirizzo").setAttribute("aria-invalid", "true");
      appendError(errorContainer, "Lunghezza indirizzo non valida: caratteri consentiti da 5 a 80!");
    }else if (!isValidAddressFormat(indirizzo)){
      isValid = false;
      document.getElementById("indirizzo").setAttribute("aria-invalid", "true");
      appendError(errorContainer, "L'indirizzo deve iniziare con 'via' o 'piazza', avere un numero civico, una virgola e a seguire la città!");
    }
    else {
      document
        .getElementById("indirizzo")
        .setAttribute("aria-invalid", "false");
    }
  }
  if (email.trim() !== "") {
    if (!isValidEmail(email)) {
      isValid = false;
      document.getElementById("email").setAttribute("aria-invalid", "true");
      appendError(errorContainer, "Campo email non accetta codice HTML!");
    }else {
      document.getElementById("email").setAttribute("aria-invalid", "false");
    }
  }
  if (
    passwordvecchia.trim() !== "" ||
    nuovapassword.trim() !== "" ||
    confermapassword.trim() !== ""
  ) {
    if (
      !StringaValida(passwordvecchia) ||
      !StringaValida(nuovapassword) ||
      !StringaValida(confermapassword)
    ) {
      isValid = false;
      document
        .getElementById("vecchia_password")
        .setAttribute("aria-invalid", "true");
      document
        .getElementById("nuova_password")
        .setAttribute("aria-invalid", "true");
      document
        .getElementById("conferma_password2")
        .setAttribute("aria-invalid", "true");
      appendError(
        errorContainer,
        "Le password non accettano codice HTML!."
      );
    } else if(!lunghezzaValida(passwordvecchia,4,50)||
    !lunghezzaValida(nuovapassword,4,50) ||
    !lunghezzaValida(confermapassword,4,50)
    ){
      isValid = false;
      document
        .getElementById("vecchia_password")
        .setAttribute("aria-invalid", "true");
      document
        .getElementById("nuova_password")
        .setAttribute("aria-invalid", "true");
      document
        .getElementById("conferma_password2")
        .setAttribute("aria-invalid", "true");
      appendError(
        errorContainer,
        "Lunghezza password non valida: caratteri consentiti tra 4 e 50!"
      );
    }
    else {
      // Verifica che la nuova password e la conferma coincidano
      if (nuovapassword.trim() !== confermapassword.trim()) {
        isValid = false;
        document
          .getElementById("nuova_password")
          .setAttribute("aria-invalid", "true");
        document
          .getElementById("conferma_password2")
          .setAttribute("aria-invalid", "true");
        appendError(
          errorContainer,
          "La nuova password e la conferma password non coincidono."
        );
      } else {
        document
          .getElementById("vecchia_password")
          .setAttribute("aria-invalid", "false");
        document
          .getElementById("nuova_password")
          .setAttribute("aria-invalid", "false");
        document
          .getElementById("conferma_password2")
          .setAttribute("aria-invalid", "false");
      }
    }
  }

  return isValid;
}

function validazioneFormEliminazioneUser() {
  const errorContainer = document.getElementById("errorContainerEliminazione");
  errorContainer.innerHTML = "";
  const password = document.forms["formeliminaaccount"]["password"].value;
  let isValid = true;
  if (!StringaValida(password)) {
    isValid = false;
    document.getElementById("password").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Campo password non accetta codice HTML!");
  } else if(!lunghezzaValida(password,4,50)){
    isValid = false;
    document.getElementById("password").setAttribute("aria-invalid", "true");
    appendError(errorContainer, "Lunghezza password non valida: caratteri consentiti tra 4 e 50!");
  }else {
    document.getElementById("password").setAttribute("aria-invalid", "false");
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

  // Aggiorna il testo del paragrafo e gestisci le classi
  if (!isNaN(prezzoSingolo) && !isNaN(quantita) && quantita > 0) {
    prezzoTotaleParagraph.innerHTML =
      "Prezzo totale: " + prezzoTotale.toFixed(2) + "€";
    prezzoTotaleParagraph.classList.remove("accessibleHide");
    prezzoTotaleParagraph.classList.add("accessibleShow");
  } else {
    prezzoTotaleParagraph.classList.remove("accessibleShow");
    prezzoTotaleParagraph.classList.add("accessibleHide");
  }
}