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
                $output = "<h2>Informazioni account</h2>";
                $output .= "<dl>"; // Inizio lista descrittiva

                $output .= "<dt>Nome:</dt>";
                $output .= "<dd>" . $userInfo['nome'] . "</dd>";

                $output .= "<dt>Cognome:</dt>";
                $output .= "<dd>" . $userInfo['cognome'] . "</dd>";

                $output .= "<dt>Età:</dt>";
                $output .= "<dd>" . $userInfo['eta'] . "</dd>";

                $output .= "<dt>Indirizzo:</dt>";
                $output .= "<dd>" . $userInfo['indirizzo'] . "</dd>";

                $output .= "<dt>Email:</dt>";
                $output .= "<dd>" . $userInfo['email'] . "</dd>";

                $output .= "</dl>";       

                $output .= "<h3>Modifiche account</h3>";
                $output .= "<form action='phputilities/updateUserInfo.php' method='post'>";
                $output .= "<fieldset>";
                $output .= "<legend>Aggiornamento dati</legend>";
                $output .= "<p><label for='indirizzo'>Indirizzo:</label> <input type='text' id='indirizzo' name='indirizzo'></p>";
                $output .= "<p><label for='email'>Email:</label> <input type='text' id='email' name='email'></p>";
                $output .= "<p><label for='nuova_password'>Nuova Password:</label> <input type='password' id='nuova_password' name='nuova_password'></p>";
                $output .= "<p><label for='conferma_password2'>Conferma Nuova Password:</label> <input type='password' id='conferma_password2' name='conferma_password'></p>";
                $output .= "<p><label for='vecchia_password'>Vecchia Password:</label> <input type='password' id='vecchia_password' name='vecchia_password'></p>";
                $output .= "<input type='hidden' name='username' value='" . $username . "'>";
                $output .= "</fieldset>";
                $output .= "<input type='submit' value='Salva modifiche'>";
                $output .= "</form>";
                $output .= "<h2>Ordini</h2>";
                if(!empty($userorder)) {
                    $output .= "<table id='tabellaordini' summary='La tabella ha 5 colonne ed informa su tutti gli ordini effettuati dallo utente visualizzando Numero ordine, Data di acquisto, tipologia di biglietto, descrizione,prezzo totale>";
                    $output .= "<caption>Ordini Effettuati</caption>";
                    $output .= "<thead>";
                    $output .= "<tr>";
                    $output .= "<th scope='col'>Numero Ordine</th>";
                    $output .= "<th scope='col'>Data Acquisto</th>";
                    $output .= "<th scope='col'>Tipologia Biglietto</th>";
                    $output .= "<th scope='col'>Descrizione</th>";
                    $output .= "<th scope='col'>Prezzo Totale</th>";
                    $output .= "</tr>";
                    $output .= "</thead>";
                    $output .= "<tbody>";
                    
                    foreach ($userorder as $order) {
                        $output .= "<tr>";
                        $output .= "<td data-title='Numero Ordine'>" . $order['numero_ordine'] . "</th>";
                        $output .= "<td data-title='Data Acquisto'><time datetime='" . $order['data_acquisto'] . "'>" . $order['data_acquisto'] . "</time></td>";
                        $output .= "<td data-title='Tipologia Biglietto'> " . $order['tipo_biglietto'] . "</td>";
                        $output .= "<td data-title='Descrizione'>". $order["descrizione"] . "</td>";
                        $output .= "<td data-title='Prezzo Totale'>" . $order['prezzo_totale'] . "€</td>";
                        $output .= "</tr>";
                    }
                    
                    $output .= "</tbody>";
                    $output .= "</table>";
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