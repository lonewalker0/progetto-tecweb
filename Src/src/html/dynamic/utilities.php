<?php


$menuItems = array(
    "Home" => array(
        "url" => "index.php",
        "lang" => "en"
    ),
    "Festival" => array(
        "subMenu" => array(
            "Chi siamo" => "chisiamo.php",
            "Location" => "location.php",
            "Storia del Festival" => "storia.php"
        ),
        "lang" => "en"
    ),
    "Shop" => array(
        "subMenu" => array(
            "Merch" => "merch.php",
            "Prevendite" => "biglietti.php"
        ),
        "lang" => "en"
    ),
    "FAQ" => array(
        "url" => "faq.php",
        "lang" => "en"
    ),
    "Account" => array(
        "url" => "account.php",
        "lang" => "en"
    )
);

function replace_in_page(String $html,String $breadcrumbs,String $keyword, String $description, String $main){
    $header = file_get_contents(__DIR__ . '/../layout/header.html');
    $footer = file_get_contents(__DIR__ . '/../layout/footer.html');
    $html = str_replace('{{header}}',$header,$html);
    $html = str_replace('{{keyword}}',$keyword,$html);
    $html = str_replace('{{description}}',$description,$html);
    $menù=generateMenu($menùItems);
    $html=str_replace('{{menù}}',$menù,$html);
    $html = str_replace('{{breadcrumbs}}',$breadcrumbs,$html);
    $html = str_replace('{{main}}',$main,$html);
    $html  = str_replace('{{footer}}',$footer,$html);

    return $html;

}



function generateMenu($items) {
    $menuString = '<ul>';
    foreach ($items as $label => $item) {
        $menuString .= '<li>';
        if (isset($item['subMenu'])) {
            $menuString .= '<span lang="en">' . $label . '</span>';
            $menuString .= generateMenu($item['subMenu']);
        } elseif ($item['url'] == $_SERVER['REQUEST_URI']) {
            $menuString .= '<span' . ((isset($item['lang']) && $item['lang'] == 'en') ? ' lang="en"' : '') . '>' . $label . '</span>';
        } else {
            $menuString .= '<a href="' . $item['url'] . '"' . ((isset($item['lang']) && $item['lang'] == 'en') ? ' lang="en"' : '') . '>' . $label . '</a>';
        }
        $menuString .= '</li>';
    }
    $menuString .= '</ul>';
    return $menuString;
}



 





?>