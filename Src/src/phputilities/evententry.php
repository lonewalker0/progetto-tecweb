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

        try {
        $this->template = file_get_contents(__DIR__ . '/../html/event.html');
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
            ['{{performer}}', '{{image}}', '{{datetime}}', '{{time}}', '{{Description}}'],
            [$this->performer, $this->image, $this->datetime, $this->time, $this->description],
            $this->template
        );

        return $html;
    }

    
    public function generateEliminationHTML(): string
{
    $html = '<div class="event-container">';
    $html .= '   <img src="' . $this->image . '" alt="foto di ' . $this->performer . '">';
    $html .= '   <p>Artista: ' . $this->performer . '</p>';
    $html .= '   <p>Data: ' . $this->datetime . '</p>';
    $html .= '   <p>Ora: ' . $this->time . '</p>';
    $html .= '   <p>Descrizione: ' . $this->description . '</p>';

    // Form to handle deletion
    $html .= '   <form action="phputilities/eventEleminationHandler.php" method="post">';
    $html .= '       <input type="hidden" name="event_artist" value="' . $this->performer . '">';
    $html .= '       <button type="submit" name="delete_event">Delete</button>';
    $html .= '   </form>';

    $html .= '</div>';

    return $html;
}

}
    ?>