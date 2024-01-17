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
        $this->mainHTML .='<div id="programma-menu">';
        $this->mainHTML .= '<h1>Programma</h1>';
        $this->mainHTML .= '<div class="programma-animation"></div><div class="programma-animation2"></div>';
        
        $dates = ['2024-07-05', '2024-07-06', '2024-07-07']; //date in programma

        $this->mainHTML .=  file_get_contents(__DIR__ . '/../html/navEventi.html');
        $this->mainHTML .= '</div>';
        foreach ($dates as $date) {
            $this->mainHTML .= "<div id='giornata" . str_replace('-', '', $date) . "'>";
            $this->mainHTML .= "<h2><time datetime='$date'>$date</time></h2>"; 

            foreach ($this->eventEntries as $event) {
                if ($event->getDate() === $date) {
                    $this->mainHTML .= $event->generateHTML();
                }
            }
            
            $this->mainHTML .= "</div>";}
    


        $this->mainHTML .=  file_get_contents(__DIR__ . '/../html/sponsor.html');
        $this->mainHTML .= '<button id="scrollToTopBtn" class="hide" aria-label="Torna in alto" tabindex="0" ><span class="visually-hidden">Torna Su</span></button>';


        return $this->mainHTML;
    
}

}

?>