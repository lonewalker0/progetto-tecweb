<?php

class BigliettiEntry {
    private $nome;
    private $description;
    private $prezzo;

    private $id;

    private $template; 

    public function __construct($id,$nome,$description,$prezzo )
    {
        $this->id = $id;
        $this->nome = $nome;
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
            ['{{nome}}', '{{Description}}','{{prezzo}}','{{id}}'],
            [$this->nome, $this->description, $this->prezzo, $this->id],
            $this->template
        );

        return $html;
    }



}


?>