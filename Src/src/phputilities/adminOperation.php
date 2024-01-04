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
        $html = "<h1>Welcome Admin!</h1>";

        $html .= '<div id="ProgramManagement">';
        #costruzione del menu per l'elimizazione
        $events = $this->dbOperation->getEventEntries();
        $html .= '<h2>Manutenzione del programma</h2>';
        foreach ($events as $event) {
            $html .= $event->generateEliminationHTML();
        }
        

        $html .= '<div id="errorContainerAggiuntaEvento">'; #è lo stesso container utilizzato dalla validazione di js
        if (isset($_SESSION['add_event_form_errors'])) {
            foreach ($_SESSION['add_event_form_errors'] as $error) {
                $html .= '    <p>' . $error . '</p>';
            }
            unset($_SESSION['add_event_form_errors']);
        }
        $html .= '</div>';
        
        
        $html .= '<div id="addEventForm">';
        $formContent = file_get_contents(__DIR__ . '/../html/form/addEventForm.html');

        // Replace placeholders in the form content
        $placeholders = [
            '{{artistName}}',
            '{{date}}',
            '{{hour}}',
            '{{description}}'
        ];


        #recuperi i dati passati dall'handler dell'aggiunta evento
        $form_data = isset($_SESSION['add_event_form_data']) ? $_SESSION['add_event_form_data'] : [];
        #elimina i dati passati dall'handler dell'aggiunta evento 
        unset($_SESSION['add_event_form_data']);
        $replaceValues = [];

        $replaceValues[] = isset($form_data['artist_name']) ? htmlspecialchars($form_data['artist_name']) : '';
        $replaceValues[] = isset($form_data['date']) ? htmlspecialchars($form_data['date']) : '';
        $replaceValues[] = isset($form_data['hour']) ? htmlspecialchars($form_data['hour']) : '';
        $replaceValues[] = isset($form_data['description']) ? htmlspecialchars($form_data['description']) : '';
        #notare htmlspecialchars per evitare che codice maligno possa essere interpretato come html
        

        $formContent = str_replace($placeholders, $replaceValues, $formContent);
        $html .= "<h3>Aggiungi Evento</h3>";
        $html .= $formContent;
        $html .= '</div>';


        return $html;
    }
}

?>

