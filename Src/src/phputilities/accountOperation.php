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

            if (isset($_SESSION['update_form_errors'])) {
                foreach ($_SESSION['update_form_errors'] as $error) {
                    $output .= '    <p>' . $error . '</p>';
                }
                unset($_SESSION['update_form_errors']);
            }
            
            $htmlform = file_get_contents(__DIR__ . '/../html/UpdateDataUser.html');
            $output .= str_replace("{{username}}", $username, $htmlform);
            $output.="</div>";

            $output.= "<class='section' id='ordini'>";
            $output .= "<h2 >Ordini</h2>";
            if(!empty($userorder)) {
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
                $output .= file_get_contents(__DIR__ . '/../html/eliminazioneAccount.html');
            }}
        return $output;}
            
}


?>