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

            
            $userInfo = $this->dbOperation->getUserInfo($username);
            $userorder= $this->dbOperation->getUserOrders($username);
            $output = file_get_contents(__DIR__ . '/../html/sidebar.html');           

            
            if ($userInfo) { //la condizione sarebbe sempre true ugualmente
            //mostro i dati personali del utente
            $htmlTemplate = file_get_contents(__DIR__ . '/../html/informazioniUtente.html');           
            $output = str_replace("{{nome}}", $userInfo['nome'], $htmlTemplate);
            $output = str_replace("{{cognome}}", $userInfo['cognome'], $output);
            $output = str_replace("{{eta}}", $userInfo['data_nascita'], $output);
            $output = str_replace("{{indirizzo}}", $userInfo['indirizzo'], $output);
            $output = str_replace("{{email}}", $userInfo['email'], $output);
            $output .= "<div class='section' id='modifica'>";
            $output .= "<h2 >Modifica informazioni account account</h2>";

            if (isset($_SESSION['update_form_errors'])) {
                foreach ($_SESSION['update_form_errors'] as $error) {
                    $output .= '    <p>' . $error . '</p>';
                }
                unset($_SESSION['update_form_errors']);
            }
            
            $htmlform = file_get_contents(__DIR__ . '/../html/UpdateDataUser.html');
            $output .= str_replace("{{username}}", $username, $htmlform);
            $output.="</div>";

            $output.= "<div class='section' id='ordini'>";
            $output .= "<h2 >Ordini</h2>";
            if(!empty($userorder)) {
                // $output .= "<p id=dtable>La tabella ha 5 colonne ed informa su tutti gli ordini effettuati dallo utente visualizzando Numero ordine, Data di acquisto, tipologia di biglietto, descrizione,prezzo totale</p>";
                // $output .= "<table id='tabellaordini' aria-describedby='dtable'>";
                // $output .= "<caption>Ordini Effettuati</caption>";
                // $output .= "<thead>";
                // $output .= "<tr>";
                // $output .= "<th scope='col'>Numero Ordine</th>";
                // $output .= "<th scope='col'>Data Acquisto</th>";
                // $output .= "<th scope='col'>Tipologia Biglietto</th>";
                // $output .= "<th scope='col'>Descrizione</th>";
                // $output .= "<th scope='col'>Prezzo Totale</th>";
                // $output .= "</tr>";
                // $output .= "</thead>";
                // $output .= "<tbody>";
                
                    
                //foreach ($userorder as $order) {
                //    $output .= "<tr>";
                //    $output .= "<td data-title='Numero Ordine'>" . $order['numero_ordine'] . "</td>";
                //    $output .= "<td data-title='Data Acquisto'><time datetime='" . $order['data_acquisto'] . "'>" . $order['data_acquisto'] . "</time></td>";
                //    $output .= "<td data-title='Tipologia Biglietto'> " . $order['tipo_biglietto'] . "</td>";
                //    $output .= "<td data-title='Descrizione'>". $order["descrizione"] . "</td>";
                //    $output .= "<td data-title='Prezzo Totale'>" . $order['prezzo_totale'] . "€</td>";
                //    $output .= "</tr>";
                //}
                //#chiusra tabelle    
                //$output .= "</tbody>";
                //$output .= "</table>";
                $table = file_get_contents(__DIR__ . '/../html/table/tabellaOrdiniUtente.html'); 
                $rows = "";
                foreach ($userorder as $order) {
                    $singleRow = file_get_contents(__DIR__ . '/../html/table/rowTabellaOrdiniUtente.html');
                    $singleRow = str_replace("{{numero_ordine}}", $order['numero_ordine'], $singleRow);
                    $singleRow = str_replace("{{data_acquisto}}", $order['data_acquisto'], $singleRow);
                    $singleRow = str_replace("{{tipo_biglietto}}", $order['tipo_biglietto'], $singleRow);
                    $singleRow = str_replace("{{descrizione}}", $order['descrizione'], $singleRow);
                    $singleRow = str_replace("{{prezzo_totale}}", $order['prezzo_totale'], $singleRow);

                    $rows .= $singleRow;
                }

                $output .= str_replace("{{rows}}", $rows, $table);

                } else {
                    $output .= "<p>Nessun ordine effettuato.</p>";
                }
                $output .= "</div>";
                $output .= "<div class='section' id='elimina' >";
                $output .="<h2 >Elimina account</h2>";
                $output .= "<div id='elimina-account'>";
                $output .= "<p>Ti ricordiamo che durante l'eliminazione del tuo account verranno cancellati, dal nostro sistema, i seguenti dati personali:</p>";
                $output .= "<li>Nome</li><li>Cognome</li><li>Indirizzo di residenza</li><li>Data di nascita</li>";
                $output .= "<p>E i seguenti dati relativi al tuo account:</p>";
                $output .= "<li>E-mail</li><li>Username</li><li>Password</li>";
                $output .= "<p>Per eliminare il tuo account ti consigliamo di visitare la nostra pagina dedicata cliccando <a href='eliminazione.php' tabindex=0>qui</a></p></div>";
                $output .= "</div>";
            }}
        return $output;}
            
}


?>