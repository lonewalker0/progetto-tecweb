<?php
include('DBOperation.php'); 

class adminOperation
{
    private $dbOperation;

    public function __construct()
    {
        $dbOperation = new DBOperation(); 
        $this->dbOperation = $dbOperation;
    }

    
    public function getMain(): string
    {
        $html = '<h2>Bentornato Admin!</h2>';
        
        $html .= '<div id="ProgramManagement">';
        #costruzione del menu per l'elimizazione
        $events = $this->dbOperation->getEventEntries();
        
        $html .= '<div id="errorContainerAggiuntaEvento">'; #è lo stesso container utilizzato dalla validazione di js
        if (isset($_SESSION['add_event_form_errors'])) {
            foreach ($_SESSION['add_event_form_errors'] as $error) {
                $html .= '    <p>' . $error . '</p>';
            }
            unset($_SESSION['add_event_form_errors']);
        }
        $html .= '</div>';
        
        
        $html .= '<div class="section-admin" id="addEventForm">';
        //procedura necessaria a riceare le informazioni del form nel caso di malo inserimento da parte dell'admin a seguito di controllo lato server
        $formContent = file_get_contents(__DIR__ . '/../html/form/addEventForm.html');

        $placeholders = [
            '{{artistName}}',
            '{{date}}',
            '{{hour}}',
            '{{description}}'
        ];
        $form_data = isset($_SESSION['add_event_form_data']) ? $_SESSION['add_event_form_data'] : [];
        unset($_SESSION['add_event_form_data']);
        $replaceValues = [];
        $replaceValues[] = isset($form_data['artist_name']) ? htmlspecialchars($form_data['artist_name']) : '';
        $replaceValues[] = isset($form_data['date']) ? htmlspecialchars($form_data['date']) : '';
        $replaceValues[] = isset($form_data['hour']) ? htmlspecialchars($form_data['hour']) : '';
        $replaceValues[] = isset($form_data['description']) ? htmlspecialchars($form_data['description']) : '';
        #notare htmlspecialchars per evitare che codice maligno possa essere interpretato come html
        $formContent = str_replace($placeholders, $replaceValues, $formContent);
        $html .= $formContent;
        $html .= '</div>';
        
        $html .= '<h2>Manutenzione del programma</h2>';
        $dates = ['2024-07-05', '2024-07-06', '2024-07-07'];
        $html .= file_get_contents(__DIR__ . '/../html/navEventi.html');
        foreach ($dates as $date) {
            $html.= "<div class='section-admin' id='giornata" . str_replace('-', '', $date) . "'>";
            $html .= "<h2> <time datetime='$date'>$date</time></h2>"; 

            foreach ($events as $event) {
                if ($event->getDate() === $date) {
                    $html .= $event->generateEliminationHTML();
                }
            }
            $html .= "</div>";}
        $html .= '</div>';


        return $html;
    }
}

?>

