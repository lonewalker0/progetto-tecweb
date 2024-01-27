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
        $output="";
        if (!empty($username)) {
            $output.="<h1>Ciao ". $_SESSION['username']."!</h1>";
            $userInfo = $this->dbOperation->getUserInfo($username);
            $userorder= $this->dbOperation->getUserOrders($username);
            $output .= file_get_contents(__DIR__ . '/../html/sidebar.html');           

            
            if ($userInfo) { //la condizione sarebbe sempre true ugualmente
            //mostro i dati personali del utente
            
            $htmlTemplate = file_get_contents(__DIR__ . '/../html/informazioniUtente.html');           
            $output1 = str_replace("{{nome}}", $userInfo['nome'], $htmlTemplate);
            $output1 = str_replace("{{cognome}}", $userInfo['cognome'], $output1);
            $output1 = str_replace("{{eta}}", $userInfo['data_nascita'], $output1);
            $output1 = str_replace("{{indirizzo}}", $userInfo['indirizzo'], $output1);
            $output1 = str_replace("{{email}}", $userInfo['email'], $output1);
            $output.=$output1;
            $output .= "<div class='section' id='modifica'>";
            
            $output .= "<h2>Modifica Dati</h2>";
            

            $output .= "<div id='errorupdate' role='alert' aria-live='polite' aria-atomic='true' >";
            if (isset($_SESSION['update_form_errors'])) {
                foreach ($_SESSION['update_form_errors'] as $error) {
                    $output .= '<p>' . $error . '</p>';
                }
                unset($_SESSION['update_form_errors']);
            }
            $output .= "</div>";
            
            $htmlform = file_get_contents(__DIR__ . '/../html/UpdateDataUser.html');
            $output .= str_replace("{{username}}", $username, $htmlform);
            $output.="</div>";

            $output.= "<div class='section' id='ordini'>";
            if(!empty($userorder)) {
                $table = file_get_contents(__DIR__ . '/../html/table/tabellaOrdiniUtente.html'); 
                $rows = "";
                foreach ($userorder as $order) {
                    $singleRow = file_get_contents(__DIR__ . '/../html/table/rowTabellaOrdiniUtente.html');
                    $singleRow = str_replace("{{numero_ordine}}", $order['numero_ordine'], $singleRow);
                    $singleRow = str_replace("{{data_acquisto}}", $order['data_acquisto'], $singleRow);
                    $singleRow = str_replace("{{validita}}", $order['validita'], $singleRow);
                    $singleRow = str_replace("{{tipologia}}", $order['tipologia'], $singleRow);
                    $singleRow = str_replace("{{quantita}}", $order['quantita'], $singleRow);
                    $singleRow = str_replace("{{prezzo_totale}}", $order['prezzo_totale'], $singleRow);

                    $rows .= $singleRow;
                }

                $output .= str_replace("{{rows}}", $rows, $table);
                $output.="</div>";
                } else {
                    $output .= "<h2>Non hai ancora effettuato ordini!</h2>";
                    $output.="</div>";
                }
                $output .= file_get_contents(__DIR__ . '/../html/eliminazioneAccount.html');
            }}
        return $output;}
            
}


?>