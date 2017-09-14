<?php
require('helpers.php');
require('scrabbleValues.php');

$showMessage = false;
$showError = false;

$word  = strtolower(getValueFromGET('yourWord'));

# Double/Triple word scores
$multiplier = intval(getValueFromGET('multiplier'));
$multiplier = ($multiplier == 0 ? 1 : $multiplier);

# +50 for Word > 7 Characters
$bingo = isset($_GET['bingoPoints']);
$bingoPoints = ($bingo && strlen($word) >= 7) ? 50 : 0;

# See if user gave us a word
if (strlen($word) > 0) {
    $score = 0;

    # Split the word into letters, and get value for each letter
    foreach(str_split($_GET['yourWord']) as $letter) {
        if (isset($scrabbleValues[$letter])) {
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

    if(!$showError) {
        $score = $score * $multiplier + $bingoPoints;
        $showMessage = true;
        $message = "Your word has a score of $score";
    }
} elseif (array_key_exists('calculate', $_GET)) {
    # User pressed submit button but didn't enter a word
    $showError = true;
    $error = "Please enter your word in the form.";
}

?>
