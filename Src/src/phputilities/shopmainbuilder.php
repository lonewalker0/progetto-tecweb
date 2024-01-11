<?php

include('DBOperation.php'); 

class ShopMainBuilder
{
    private $shopItems = [];
    private $mainHTML = '';
    

    public function __construct()
    {
        $dbOperation = new DBOperation();
        $this->shopItems = $dbOperation->getMerchItems();
    }

    public function buildMainHTML(): string
    {
        
        $this->mainHTML = '<div id="live-info"><p>
        I nostri prodotti sono acquistabili esclusivamente al nostro festival negli appositi punti vendita.
        Per quanto riguarda taglie e vestibilità sarà possibile provare i capi prima di acquistarli.
        </p></div>';

        $this->mainHTML .= '<div id="shop">';
        foreach ($this->shopItems as $item) {
            $this->mainHTML .= $item->generateHTML();
        }
        $this->mainHTML .= '</div>';

        
        
        return $this->mainHTML;
    }
}
