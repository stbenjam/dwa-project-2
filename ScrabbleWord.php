<?php
namespace DWA;

class ScrabbleWord {
    private $word;

    # Standard Scrabble Values
    private $scrabbleValues = [
        'a' => 1,
        'b' => 3,
        'c' => 3,
        'd' => 2,
        'e' => 1,
        'f' => 4,
        'g' => 2,
        'h' => 4,
        'i' => 1,
        'j' => 8,
        'k' => 5,
        'l' => 1,
        'm' => 3,
        'n' => 1,
        'o' => 1,
        'p' => 3,
        'q' => 10,
        'r' => 1,
        's' => 1,
        't' => 1,
        'u' => 1,
        'v' => 4,
        'w' => 4,
        'x' => 8,
        'y' => 4,
        'z' => 10,
    ];

    public function __construct($word) {
        $this->word = $word;
    }

    public function score($multiplier, $bingo) {
        $score = 0;

        # +50 for Word > 7 Characters
        $bingoPoints = ($bingo && strlen($this->word) >= 7) ? 50 : 0;

        # Split the word into letters, and get value for each letter
        foreach(str_split($this->word) as $letter) {
            $score = $score + $this->scrabbleValues[$letter];
        }

        # Calculate final score:
        $score = $score * $multiplier + $bingoPoints;

        return $score;
    }
}
?>
