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

        // AddEventForm div with the form
        $html .= '<div id="addEventForm">';
        $html .= file_get_contents(__DIR__ . '/../html/form/addEventForm.htm0l');
        $html .= '</div>';

        return $html;
    }
}

?>

