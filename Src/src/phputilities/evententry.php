<?php
class EventEntry
{
    private $performer;
    private $image;
    private $datetime;
    private $time;
    private $description;

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
            throw new Exception("Failed to load template from file: $templateFilePath");
        }
        } catch (Exception $e) {
            // Handle the exception, log it, or rethrow it as needed
            echo "An error occurred: " . $e->getMessage();
        }
    }

    public function generateHTML(): string
    {
        // Replace placeholders in the template with actual values
        $html = str_replace(
            ['{{performer}}', '{{image}}', '{{datetime}}', '{{time}}', '{{Description}}'],
            [$this->performer, $this->image, $this->datetime, $this->time, $this->description],
            $this->template
        );

        return $html;
    }
}
    ?>