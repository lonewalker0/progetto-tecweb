<?php

class PageBuilder {

    public static function buildPage($breadcrumbs, $breadcrumblen, $keyword, $description, $main): string {

        $html = file_get_contents(__DIR__ . '/../../html/layout/struttura.html')
        $header = file_get_contents(__DIR__ . '/../../html/layout/header.html');
        $footer = file_get_contents(__DIR__ . '/../../html/layout/footer.html');
        
        $html = str_replace('{{header}}', $header, $html);
        $html = str_replace('{{keyword}}', $keyword, $html);
        $html = str_replace('{{description}}', $description, $html);
        $html = str_replace('{{breadcrumbs}}', $breadcrumbs, $html);
        $html = str_replace('{{main}}', $main, $html);
        $html = str_replace('{{footer}}', $footer, $html);

        return $html;
    }

    public static function createMenù($breadcrumbs): string
}



 





?>