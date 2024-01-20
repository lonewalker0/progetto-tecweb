<?php

class BigliettiEntry {
    private $validita;
    private $tipologia;
    private $prezzo;

    private $id;

    private $template; 

    public function __construct($id,$validita,$tipologia,$prezzo )
    {
        $this->id = $id;
        $this->validita = $validita;
        $this->tipologia = $tipologia;
        $this->prezzo = $prezzo;

        try {
        $this->template = file_get_contents(__DIR__ . '/../html/biglietti.html');
        
        if ($this->template === false) {
            throw new Exception("Failed to load template from file");
        }
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
    }

    public function generateHTML(): string
    {
        
        
        $html = str_replace(
            ['{{validita}}', '{{tipologia}}','{{prezzo}}','{{id}}'],
            [$this->validita, $this->tipologia, $this->prezzo, $this->id],
            $this->template
        );

        return $html;
    }



}


?>