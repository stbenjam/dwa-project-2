<?php
require('scrabbleValues.php');

$showMessage = false;
$showError = false;

$word  = isset($_GET['yourWord']) ? $_GET['yourWord'] : "";
$bingo = isset($_GET['bingoPoints']);
$multiplier = isset($_GET['multiplier']) ? intval($_GET['multiplier']) : 1;

# See if user gave us a word
if (strlen($word) > 0) {
    $score = 0;

    # Split the word into letters, and get value for each letter
    foreach(str_split($_GET['yourWord']) as $letter) {
        if(array_key_exists($letter, $scrabbleValues)) {
            # Add this letter to the score
            $score = $score + $scrabbleValues[$letter];
        } else {
            # If user gave us an invalid letter, then abort
            # and let them know:

            $showError = true;
            $error = "Invalid scrabble tile: $letter";
            break;
        }
    }

    $score = $score * $multiplier;
    $showMessage = true;
    $message = "Your word has a score of $score";
} elseif (array_key_exists('calculate', $_GET)) {
    # User pressed submit button but didn't enter a word
    $showError = true;
    $error = "Please enter your word in the form.";
}

?>
