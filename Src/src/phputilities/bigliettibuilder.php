<?php

include('DBOperation.php'); 

class BigliettiBuilder
{
    private $bigliettiEntries = [];
    private $mainHTML = '';
    

    public function __construct()
    {
    
        $dbOperation = new DBOperation();
        $this->bigliettiEntries = $dbOperation->getBigliettiEntries();

    }

    public function buildBigliettoHtml(): string{
        

        
        $bigliettiHtml = ''; // Variabile separata per contenere l'HTML dei biglietti

        foreach ($this->bigliettiEntries as $biglietto) {
            $bigliettiHtml .= $biglietto->generateHTML();
        }

        // Concatena l'HTML dei biglietti alla proprietà $mainHTML
        $this->mainHTML .= '<div id="biglietti"><p>Biglietti</p>' . $bigliettiHtml . '</div>';

        return $this->mainHTML;
    }
}

?>