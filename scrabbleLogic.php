<?php
require('Form.php');
require('ScrabbleWord.php');
require('dictionaryAPI.php');

use DWA\Form;
use DWA\ScrabbleWord;

$form = new Form($_GET);

if ($form->isSubmitted()) {
    $bingo = $form->isChosen('bingoPoints');
    $multiplier = intval($form->get('multiplier', 1));
    $word = strtolower(trim($form->get('yourWord', '')));

    $errors = $form->validate([
        'yourWord'   => 'alpha|required',
        'multiplier' => 'min:0|max:4',
    ]);

    if(!$form->hasErrors) {
        $scrabbleWord = new ScrabbleWord($word);
        $score = $scrabbleWord->score($multiplier, $bingo);
    }
}
?>
