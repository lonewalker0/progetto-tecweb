<?php


function isValidHour($hour) {
    // A simple check for the format HH:MM
    return (bool) preg_match('/^([0-1][0-9]|2[0-3]):([0-5][0-9])$/', $hour);
}

function isValidString($string) {
    // The regex pattern checks for any character that is NOT alphanumeric or whitespace
    return !preg_match('/[^a-zA-Z0-9\s]/', $string);
}

function isValidDate($date) {
    return (bool) preg_match('/^\d{4}-\d{2}-\d{2}$/', $date);
}

?>