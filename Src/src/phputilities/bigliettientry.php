<?php

class BigliettiEntry {
    private $nome;
    private $image;
    private $datetime_inizio;
    private $datetime_fine;
    private $description;
    private $prezzo;

    private $id;

    private $template; 

    public function __construct($id,$nome,$description, $image, $datetime_inizio, $datetime_fine,$prezzo )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->image = $image;
        $this->datetime_inizio = $datetime_inizio;
        $this->datetime_fine = $datetime_fine;
        $this->description = $description;
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
            ['{{nome}}', '{{image}}', '{{datetime_inizio}}', '{{datetime_fine}}', '{{Description}}','{{prezzo}}','{{id}}'],
            [$this->nome, $this->image, $this->datetime_inizio, $this->datetime_fine, $this->description, $this->prezzo, $this->id],
            $this->template
        );

        return $html;
    }



}


?>