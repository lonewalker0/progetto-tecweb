<?php

function replace_in_page(String $html,String $breadcrumbs,String $keyword, String $description, String $main){
    $header = file_get_contents(__DIR__ . '/../layout/header.html');
    $footer = file_get_contents(__DIR__ . '/../layout/footer.html');
    $html = str_replace('{{header}}',$header,$html);
    $html = str_replace('{{keyword}}',$keyword,$html);
    $html = str_replace('{{description}}',$description,$html);
    $html = str_replace('{{breadcrumbs}}',$breadcrumbs,$html);
    $html = str_replace('{{main}}',$main,$html);
    $html  = str_replace('{{footer}}',$footer,$html);

    return $html;

}

function get_menu() {
    $menu = '';

    // Define the base URL for creating links
    $baseUrl = ''; // Add your base URL here if needed
    $links = ["index.php", "chisiamo.php", "location.php", "storia.php", "merch.php", "biglietti.php", "faq.php", "account.php"];

    $names = ["Home", "Chi Siamo", "Location", "Storia", "Merch", "Prevendite", "FAQ", "Account"];
    $langs = ["en", "", "en", "", "en", "", "en", "en"];

    $strToRemove = ROOT_FOLDER;
    $currentPage = str_replace($strToRemove, "", $_SERVER['REQUEST_URI']);

    
    for ($i = 0; $i < count($links); $i++) {
        if ($links[$i] == 'chisiamo.php' || $links[$i] == 'location.php' || $links[$i] == 'storia.php') {
            // Dropdown menu for "Festival"
            if ($i == 1) {
                $menù.='<ul class="sottomenù"> Festival';
                $menu .= '<li lang="en" aria-haspopup="true" aria-expanded="false" tabindex="0">';
                if ($currentPage !== $links[$i]) {
                    $menu .= '<a href="#" lang="en">' . $names[$i] . '</a>
                            <ul>';
                    for ($j = 1; $j <= 3; $j++) {
                        $submenuIndex = $i + $j;
                        $isActive = ($currentPage === $links[$submenuIndex]);
                        $menu .= '<li' . ($isActive ? ' class="active"' : '') . '><a href="' . $links[$submenuIndex] . '" ' . (($langs[$submenuIndex]) ? 'lang="' . $langs[$submenuIndex] . '" ' : '') . ' tabindex="' . ($j + 1) . '">' . $names[$submenuIndex] . '</a></li>';
                    }
                    $menu .= '</ul>';
                } else {
                    $menu .= $names[$i];
                }
                $menu .= '</li>';
                $i += 3; // Skip the next three links in the main loop
            }
        } elseif ($links[$i] == 'merch.php' || $links[$i] == 'biglietti.php') {
            // Dropdown menu for "Shop"
            if ($i == 4) {
                $menu .= '<li lang="en" aria-haspopup="true" aria-expanded="false" tabindex="' . ($i + 1) . '">';
                if ($currentPage !== $links[$i]) {
                    $menu .= '<a href="#" lang="en">' . $names[$i] . '</a>
                            <ul>';
                    for ($j = 1; $j <= 1; $j++) {
                        $submenuIndex = $i + $j;
                        $isActive = ($currentPage === $links[$submenuIndex]);
                        $menu .= '<li' . ($isActive ? ' class="active"' : '') . '><a href="' . $links[$submenuIndex] . '" ' . (($langs[$submenuIndex]) ? 'lang="' . $langs[$submenuIndex] . '" ' : '') . ' tabindex="' . ($j + 5) . '">' . $names[$submenuIndex] . '</a></li>';
                    }
                    $menu .= '</ul>';
                } else {
                    $menu .= $names[$i];
                }
                $menu .= '</li>';
                $i += 1; // Skip the next link in the main loop
            }
        } else {
            // Regular menu item with anchor tag
            $menu .= '<li>';
            if ($currentPage !== $links[$i]) {
                $menu .= '<a href="' . $links[$i] . '" ' . (($langs[$i]) ? 'lang="' . $langs[$i] . '" ' : '') . ' tabindex="' . ($i + 1) . '">' . $names[$i] . '</a>';
            } else {
                $menu .= $names[$i];
            }
            $menu .= '</li>';
        }
    }
    

    return $menu;
}

 





?>