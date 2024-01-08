<?php
class MerchItem
{
    private $productId; 
    private $productImage;
    private $productName;
    private $productColor;
    private $productPrice;
    private $productLongDescription;
    private $template; 

    public function __construct($productId, $productImage, $productName, $productColor, $productPrice, $productLongDescription)
    {
        $this->productId = $productId; 
        $this->productImage = $productImage;
        $this->productName = $productName;
        $this->productColor = $productColor;
        $this->productPrice = $productPrice;
        $this->productLongDescription = $productLongDescription;

        try {
            $this->template = file_get_contents(__DIR__ . '/../html/merchitem.html');
            if ($this->template === false) {
                throw new Exception("Failed to load template from file");
            }
            } catch (Exception $e) {
                echo "An error occurred: " . $e->getMessage();
            }
    }

    public function generateHTML(): string
    {
        $html = $this->template;

        $html = str_replace('{{productId}}', $this->productId, $html);
        $html = str_replace('{{productImage}}', $this->productImage, $html);
        $html = str_replace('{{productName}}', $this->productName, $html);
        $html = str_replace('{{productColor}}', $this->productColor, $html);
        $html = str_replace('{{productPrice}}', $this->productPrice, $html);
        $html = str_replace('{{productDescription}}', $this->productLongDescription, $html);

        return $html;
    }
}
?>
