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
        
        
        $this->mainHTML =  file_get_contents(__DIR__ . '/../html/carosello.html');

        
        #Loop through the EventEntry instances and generate HTML
        $this->mainHTML .= '<div id="program"><p>Il nostro Programma</p>';
        foreach ($this->eventEntries as $event) {
            $this->mainHTML .= $event->generateHTML();
        }

        $this->mainHTML .= '</div>';


        $this->mainHTML .=  file_get_contents(__DIR__ . '/../html/sponsor.html');


        return $this->mainHTML;
    }
}



?>