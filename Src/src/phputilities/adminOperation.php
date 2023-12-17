<?php
include('DBOperation.php'); 

class adminOperation
{
    private $dbOperation;

    public function __construct()
    {
        $dbOperation = new DBOperation(); 
        $this->dbOperation = $dbOperation;
    }

    public function getMain(): string
{
    $html = "<h1>Welcome Admin!</h1>";

    $events = $this->dbOperation->getEventEntries();

    $html .= '<div id="ProgramManagement">';
    
    foreach ($events as $event) {
        $html .= $event->generateEliminationHTML();
    }

    $html .= '</div>';
    $html .= '</div>';

    // Add more admin-specific HTML content as needed

    return $html;
}
    // Add other admin-specific methods here
}

?>

