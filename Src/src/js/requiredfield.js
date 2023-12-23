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
