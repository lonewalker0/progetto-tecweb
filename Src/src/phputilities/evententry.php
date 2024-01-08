<?php
class EventEntry
{
    private $performer;
    private $image;
    private $datetime;
    private $time;
    private $description;
    private $template; 

    

    public function __construct($performer, $image, $datetime, $time, $description)
    {
        $this->performer = $performer;
        $this->image = $image;
        $this->datetime = $datetime;
        $this->time = $time;
        $this->description = $description;

        
    }

    public function generateHTML(): string
    {
        
        try {
            $this->template = file_get_contents(__DIR__ . '/../html/event.html');
            if ($this->template === false) {
                throw new Exception("Failed to load template from file");
            }
            } catch (Exception $e) {
                echo "An error occurred: " . $e->getMessage();
            }

        $html = str_replace(
            ['{{performer}}', '{{image}}', '{{datetime}}', '{{time}}', '{{Description}}'],
            [$this->performer, $this->image, $this->datetime, $this->time, $this->description],
            $this->template
        );

        return $html;
    }

    
    public function generateEliminationHTML(): string
{
    $html = '<div class="event-container">';
    $html .= '   <img src="' . $this->image . '" alt="ritratto dello artista ' . $this->performer . '">';
    $html .= '   <dl>';
    $html .= '       <dt>Artista:</dt>';
    $html .= '       <dd>' . $this->performer . '</dd>';

    $html .= '       <dt>Data:</dt>';
    $html .= '       <dd>' . $this->datetime . '</dd>';

    $html .= '       <dt>Ora:</dt>';
    $html .= '       <dd>' . $this->time . '</dd>';

    $html .= '       <dt>Descrizione:</dt>';
    $html .= '       <dd>' . $this->description . '</dd>';
    $html .= '   </dl>';

    // Form to handle deletion
    $html .= '   <form action="phputilities/eventEleminationHandler.php" method="post">';
    $html .= '       <input type="hidden" name="event_artist" value="' . $this->performer . '">';
    $html .= '       <input type="submit" name="delete_event" value="Delete">';
    $html .= '   </form>';

    $html .= '</div>';

    return $html;
}

}
    ?>