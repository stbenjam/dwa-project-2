<?php
require('Form.php');
require('ScrabbleWord.php');
require('DictionaryAPI.php');

use DWA\Form;
use DWA\ScrabbleWord;
use DWA\DictionaryAPI;

# Path to API key
$API_KEYFILE = "../api.key";

$form = new Form($_GET);

if ($form->isSubmitted()) {
    # Get form fields:
    $bingo = $form->isChosen('bingoPoints');
    $multiplier = intval($form->get('multiplier', 1));
    $word = $form->sanitize(strtolower(trim($form->get('yourWord', ''))));
    $dictVerify = $form->isChosen('dictVerify');

    # Get the API key, if the file exists
    if(file_exists($API_KEYFILE))
        $apiKey = trim(file_get_contents("../api.key"));
    else
        $apiKey = null;

    # Validate errors on the form
    $errors = $form->validate([
        'yourWord'   => 'alpha|required',
        'multiplier' => 'min:0|max:4',
    ]);

    # Validate in the dictionary, if the user asked us to:
    if($dictVerify) {
        $api = new DictionaryAPI($apiKey);
        if(!$api->isValidWord($word)) {
            array_push($errors, "$word is not a valid dictionary word");
        }
     }

    # If no errors, let's calculate the score:
    if(!$form->hasErrors) {
        $scrabbleWord = new ScrabbleWord($word);
        $score = $scrabbleWord->score($multiplier, $bingo);
    }
}
?>
