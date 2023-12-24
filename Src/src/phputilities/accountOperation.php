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
            $userorder= $this->dbOperation->getUserOrders($username);

            // Assicurati che l'array restituito contenga le informazioni dell'utente
            if ($userInfo) {
                // Costruisci la stringa HTML per visualizzare le informazioni dell'utente
                $output = "<p>Nome: " . $userInfo['nome'] . "</p>";
                $output .= "<p>Cognome: " . $userInfo['cognome'] . "</p>";
                $output .= "<p>Età: " . $userInfo['eta'] . "</p>";
                $output .= "<p>Indirizzo: " . $userInfo['indirizzo'] . "</p>";
                $output .= "<p>Email: " . $userInfo['email'] . "</p>";

                $output .= "<h3>Modifiche account</h3>";
                $output .= "<form action='phputilities/updateUserInfo.php' method='post'>";
                $output .= "<p><label for='indirizzo'>Indirizzo:</label> <input type='text' id='indirizzo' name='indirizzo'></p>";
                $output .= "<p><label for='email'>Email:</label> <input type='text' id='email' name='email'></p>";
                $output .= "<p><label for='nuova_password'>Nuova Password:</label> <input type='password' id='nuova_password' name='nuova_password'></p>";
                $output .= "<p><label for='conferma_password'>Conferma Nuova Password:</label> <input type='password' id='conferma_password2' name='conferma_password'></p>";
                $output .= "<p><label for='vecchia_password'>Vecchia Password:</label> <input type='password' id='vecchia_password' name='vecchia_password'></p>";
                $output .= "<input type='hidden' name='username' value='" . $username . "'>";
                $output .= "<input type='submit' value='Salva modifiche'>";
                $output .= "</form>";
                $output .= "<h4>Ordini effettuati</h4>";
                if(!empty($userorder)) {
                    
                    foreach ($userorder as $order) {
                        $output .= "<p>Numero d'ordine: " . $order['numero_ordine'] . "</p>";
                        $output .= "<p>Data di acquisto: " . $order['data_acquisto'] . "</p>";
                        $output .= "<p>Tipo di biglietto: " . $order['tipo_biglietto'] . "</p>";
                        $output .= "<p>Descrizione:". $order["descrizione"] . "</p>";
                        $output .= "<p>Prezzo totale: " . $order['prezzo_totale'] . "€</p>";
                        $output .= "<hr>"; // Separatore tra gli ordini
                    }
                } else {
                    $output .= "<p>Nessun ordine effettuato.</p>";
                }
                



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