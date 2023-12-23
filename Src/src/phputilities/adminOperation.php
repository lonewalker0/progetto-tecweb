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
        $html .= '<p>Manutenzione del programma</p>';
        foreach ($events as $event) {
            $html .= $event->generateEliminationHTML();
        }
        $html .= '</div>';

       
        if (isset($_SESSION['add_event_form_errors'])) {
            $html .=  '<div id="error-message">';
            foreach ($_SESSION['add_event_form_errors'] as $error) {
                $html .=  '<div>' . $error . '</div>';
            }
            $html .=  '</div>';
            unset($_SESSION['add_event_form_errors']);
        }
        
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
        $html .= $formContent;
        $html .= '</div>';


        return $html;
    }
}

?>

