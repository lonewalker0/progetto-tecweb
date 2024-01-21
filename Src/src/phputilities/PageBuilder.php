<?php

class PageBuilder {

    public static function buildPage($breadcrumb, $breadcrumblen, $title,  $keyword, $description, $main): string {

        $html = file_get_contents(__DIR__ . '/../html/layout/struttura.html');
        $header = file_get_contents(__DIR__ . '/../html/layout/header.html');
        
        if (trim($breadcrumb) === 'Home') {
        $header = self::removeHomeLogoLink($header); 
        }


        $footer = file_get_contents(__DIR__ . '/../html/layout/footer.html');
        $footer = self::resolveCircularLinks($footer, $breadcrumb);                             //rimuove il link circolare della privacy policy 
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
        

        if (trim($breadcrumb) === 'Home') {
            $html = self::removeLinkAndSubsequentTextFromHTML($html); 
            }

        return $html;
    }

    public static function removeHomeLogoLink($input) {
        // Regular expression to match <a> tags with variations in case
        $pattern = '/<a\b[^>]*href\s*=\s*(\'|")[^\'"]*\.?\.?\/?index\.php\1[^>]*>(.*?)<\/a>/si';
    
        // Replace the matched <a> tags with their content
        $output = preg_replace($pattern, '$2', $input);
    
        return $output;
    }

    public static function removeLinkAndSubsequentTextFromHTML($html) {
        // Use regular expression to remove <a> tag with href="index.php" and subsequent text
        $html = preg_replace('/<a\b[^>]*href="index\.php"[^>]*>.*?<\/a> &gt;&gt;/s', '', $html);
        
        return $html;
    }

    public static function resolveCircularLinks($menu, $breadcrumb) {
        // converte menu e braedcrumb in minuscolo => case insensitive
        $menuArray = explode(PHP_EOL, $menu);
        $breadcrumbLower = strtolower($breadcrumb);

        foreach ($menuArray as $index => $menuItem) {
            $menuItemLower = strtolower($menuItem);

            // check se menu è contenuto in breadcrumb
            if (strpos($menuItemLower, $breadcrumbLower) !== false) {
                // se trova un match rimuove il link
                $menuArray[$index] = self::removeATags($menuItem);
            }
        }
        return implode(PHP_EOL, $menuArray); // riconverte l'array in stringa
    }

    private static function removeATags($li_not_modified): string {
        // usa un regex per rimuovere i tag <a> e </a>
        $limodified = preg_replace('/<a\b([^>]*)>(.*?)<\/a>/s', '$2', $li_not_modified);
        return $limodified;
    }

    private static function createMenu($breadcrumb): string {
        $menu = file_get_contents(__DIR__ . '/../html/layout/menu.html');
        $menu = self::resolveCircularLinks($menu, $breadcrumb);
        return $menu; 
    }

}
?>