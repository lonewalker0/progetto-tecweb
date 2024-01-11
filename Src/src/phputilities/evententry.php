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

    public function getDate(): string{
        return $this->datetime; 
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

        //$html = str_replace(
        //    ['{{performer}}', '{{image}}', '{{datetime}}', '{{time}}', '{{Description}}'],
        //    [$this->performer, $this->image, $this->datetime, $this->time, $this->description],
        //    $this->template
        //);
        $html = str_replace(
            ['{{performer}}', '{{image}}', '{{time}}', '{{Description}}'],
            [$this->performer, $this->image, $this->time, $this->description],
            $this->template
        );

        return $html;
    }

    
    public function generateEliminationHTML(): string
{
    try {
        $this->template = file_get_contents(__DIR__ . '/../html/eventElimination.html');
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

}
    ?>