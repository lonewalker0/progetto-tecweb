<?php

class PageBuilder {

    public static function buildPage($breadcrumb, $breadcrumblen, $title,  $keyword, $description, $main): string {

        $html = file_get_contents(__DIR__ . '/../html/layout/struttura.html');
        $header = file_get_contents(__DIR__ . '/../html/layout/header.html');
        $footer = file_get_contents(__DIR__ . '/../html/layout/footer.html');
        
        $html = str_replace('{{header}}', $header, $html);
        $html = str_replace('{{keyword}}', $keyword, $html);
        $html = str_replace('{{title}}', $title, $html); 
        $menu = self::createMenu($breadcrumb); 
        $html = str_replace('{{menu}}', $menu, $html);
        $html = str_replace('{{description}}', $description, $html);
        $html = str_replace('{{breadcrumblen}}',$breadcrumblen,$html);
        $html = str_replace('{{breadcrumb}}', $breadcrumb, $html);
        $html = str_replace('{{main}}', $main, $html);
        $html = str_replace('{{footer}}', $footer, $html);

        return $html;
    }
    
    private static function Find_The_Right_a_to_be_removed($menu, $breadcrumb): string {
        // Cerca la corrispondenza tra la breadcrumb e gli elementi del menu
        preg_match_all('/<li\b[^>]*>(?:(?!<\/?li\b[^>]*>).|(?R))*<\/li>/', $menu, $matches);
        //viene creato un array matches che continiene tutti i li; 
        // Ottieni gli elementi <li> corrispondenti alla breadcrumb
        foreach ($matches[0] as $item) {
            if (stripos($item, $breadcrumb) !== false) {
                // Rimuovi i tag <a> dall'elemento <li>
                $liWithoutATags = self::removeATags($item);
    
                // Replace the original <li> in $menu with the modified one
                $menu = str_replace($item, $liWithoutATags, $menu);
                return $menu;
            }
        }
        return $menu; 


    }

    private static function createMenu($breadcrumb): string {
        $menu = file_get_contents(__DIR__ . '/../html/layout/menu.html');
        $menu = self::Find_The_Right_a_to_be_removed($menu, $breadcrumb); 
        return $menu; 
    }


    private static function removeATags($li_not_modified): string {
        // Use a more comprehensive regex and the 's' modifier
        $limodified = preg_replace('/<a\b([^>]*)>(.*?)<\/a>/s', '$2', $li_not_modified);
        return $limodified;
    }
        

}
?>