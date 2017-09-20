<?php
# This function calls the Word Game Dictionary API to see if a word is valid
# for Scrabble.  Could be a little more robust, add some better error
# checking like HTTP status codes later.

function isValidWord($word) {
    # Read API key from file:
    $API_KEY = trim(file_get_contents("api.key"));

    # API URL:
    $API_URL = "http://www.wordgamedictionary.com/api/v1/references/scrabble/$word?key=$API_KEY";

    # Call API:
    $xmlResult = simplexml_load_string(file_get_contents($API_URL));

    # Get result
    if($xmlResult->scrabble == 1) {
        return true;
    } else {
        return false;
    }
}

?>
