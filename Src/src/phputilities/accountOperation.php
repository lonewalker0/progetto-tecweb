<?php

class accountOperation {

    private $dbOperation;

    public function __construct()
    {
        $dbOperation = new DBOperation(); 
        $this->dbOperation = $dbOperation;
    }

    public function getMain(): string{

        $username = isset($_SESSION["username"]) ? $_SESSION["username"] : '';

        if (!empty($username)) {
            // Recupera le informazioni dell'utente
            $userInfo = $this->dbOperation->getUserInfo($username);

            // Assicurati che l'array restituito contenga le informazioni dell'utente
            if ($userInfo) {
                // Costruisci la stringa HTML per visualizzare le informazioni dell'utente
                $output = "<p>Nome: " . $userInfo['nome'] . "</p>";
                $output .= "<p>Cognome: " . $userInfo['cognome'] . "</p>";
                $output .= "<p>Età: " . $userInfo['eta'] . "</p>";
                $output .= "<p>Indirizzo: " . $userInfo['indirizzo'] . "</p>";
                $output .= "<p>Email: " . $userInfo['email'] . "</p>";

                return $output;
            } else {
                return "<p>Utente non trovato.</p>";
            }
        } else {
            return "<p>Sessione non valida. Utente non autenticato.</p>";
        }
    } 

}




          


?>