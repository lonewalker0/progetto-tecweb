<?php

include('DBOperation.php'); 

class IndexMainBuilder
{
    private $eventEntries = [];
    private $mainHTML = '';
    

    public function __construct()
    {
    
        $dbOperation = new DBOperation();
        $this->eventEntries = $dbOperation->getEventEntries();

    }

    public function buildMainHTML(): string{
        
        #qui manca da creare ancora tutto il carosello e il fatto che manco il counter




        #Loop through the EventEntry instances and generate HTML
        $this->mainHTML = '<div id="program"><p>Programma</p>';
        foreach ($this->eventEntries as $event) {
            $this->mainHTML .= $event->generateHTML();
        }

        $this->mainHTML .= '</div>';
        return $this->mainHTML;
    }
}



?>