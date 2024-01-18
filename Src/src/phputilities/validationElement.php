<?php
#funzioni php che ritoranono true se l'imput è valido. per fare il sanitize. 

function isValidHour($hour) {
    // A simple check for the format HH:MM
    return (bool) preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9])$/', $hour);
}

function isValidString($string) {
    

    // Controllo l'assenza di tag HTML o entità HTML
    if (preg_match('/<[^>]*>|&[^;]+;/', $string)) {
        return false;
    }

        return true;
}

function isValidAddressFormat($address) {
    // L'indirizzo deve iniziare con "Via" o "Piazza", seguito da un numero civico e terminare con una città
    return preg_match('/^(Via|Piazza)\s[\pL\s]+\d+[\w\s,.\-]+[A-Za-z\s,.\-]+[A-Za-z]{2,}$/u', $address);
}

function isvalidlength($string,$minlength,$maxlength) : bool{
    $length = strlen($string);

    if ($length < $minlength || $length > $maxlength) {
        return false;
    }
    return true;
}


function isValidDate($date) {
    return (bool) preg_match('/^\d{4}-\d{2}-\d{2}$/', $date);
}

function isAllowedDate($dateString) {
    $allowedDates = ["2024-07-05", "2024-07-06", "2024-07-07"];
    return in_array($dateString, $allowedDates);
}

function isValidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    list($username, $domain) = explode('@', $email);

    if (strlen($username) > 64 || strlen($domain) > 255) {
        return false;
    }

    if (!preg_match('/^(?!-)[A-Za-z0-9-]+(?<!-)(\.[A-Za-z0-9-]+)*$/', $domain)) {
        return false;
    }

    $tld = strtolower(pathinfo($domain, PATHINFO_EXTENSION));
    $validTlds = ['com', 'net', 'org']; // Aggiungi altri TLD validi se necessario
    if (!in_array($tld, $validTlds)) {
        return false;
    }

    if (!checkdnsrr($domain, 'MX')) {
        return false;
    }

    return true;
}

function isValidAge($dateOfBirth) {
    $currentDate = new DateTime();
    $birthdate = new DateTime($dateOfBirth);
    
    $minAge = 16;
    $minBirthdate = $currentDate->modify("-$minAge years");

    return $birthdate <= $minBirthdate;
}

function verificaValore($valore) {
    
        if ($valore >= 1 && $valore <= 5) {
            return true;
        } else {
            return false; 
        }
    
}

?>