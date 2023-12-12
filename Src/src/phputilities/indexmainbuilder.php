<?php
include('evententry.php'); 
include('DBAccess.php'); 

class IndexMainBuilder
{
    private $eventEntries = [];
    private $mainHTML = '';

    public function __construct()
    {
        
        $query = "SELECT * FROM Programma";  
        $dbAccess = new DBAccess();
        if ($dbAccess->openConnection()) {
            $result = $dbAccess->executeQuery($query); 
        }
        $dbAccess->closeConnection(); 
        //apro la connessione con il db, faccio la query, e chiudo la connessione;

        if($result){
            while ($row = $result->fetch_assoc()) {
                $event = new EventEntry(
                    $row['artist_name'],
                    $row['image_path'],
                    $row['date'],
                    $row['hour'],
                    $row['description']
                );
                $this->eventEntries[] = $event;
        }}

    }

    public function buildMainHTML(): string{
        // Loop through the EventEntry instances and generate HTML
        foreach ($this->eventEntries as $event) {
            $this->mainHTML .= $event->generateHTML();
        }
        return $this->mainHTML;
    }
}



?>