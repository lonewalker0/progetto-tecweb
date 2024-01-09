<?php

include('DBOperation.php'); 

class PrivacyBuilder
{
    private $mainHTML = '';

    public function buildMainHTML(): string
    {
        
        $this->mainHTML =  file_get_contents(__DIR__ . '/../html/privacy.html');
        return $this->mainHTML;
    }
}
?>