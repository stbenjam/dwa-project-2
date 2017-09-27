<?php
# This class uses the Word Game Dictionary API to see if a word is valid for
# Scrabble.

namespace DWA;

class DictionaryAPI {
    private $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function isValidWord($word) {
        # API URL:
        $API_URL = "http://www.wordgamedictionary.com/api/v1/references/scrabble/$word?key=$this->apiKey";

        # Call API:
        $xmlResult = simplexml_load_string(file_get_contents($API_URL));

        # Get result
        if($xmlResult->scrabble == 1) {
            return true;
        } else {
            return false;
        }
    }
}

?>
