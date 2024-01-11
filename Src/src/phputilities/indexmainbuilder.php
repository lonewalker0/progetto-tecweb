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
        $this->mainHTML .= '<h1>Programma';
        $this->mainHTML .= '<div class="programma-animation"></div><div class="programma-animation2"></div></h1>';
        
        $dates = ['2024-07-05', '2024-07-06', '2024-07-07']; //date in programma

        $this->mainHTML .=  file_get_contents(__DIR__ . '/../html/navEventi.html');

        foreach ($dates as $date) {
            $this->mainHTML .= "<div id='giornata" . str_replace('-', '', $date) . "'>";
            $this->mainHTML .= "<h2>$date</h2>"; 

            foreach ($this->eventEntries as $event) {
                if ($event->getDate() === $date) {
                    $this->mainHTML .= $event->generateHTML();
                }
            }
            
            $this->mainHTML .= "</div>";}
    


        $this->mainHTML .=  file_get_contents(__DIR__ . '/../html/sponsor.html');


        return $this->mainHTML;
    
}

}

?>