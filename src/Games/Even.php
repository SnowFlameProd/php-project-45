<?php

namespace BrainGames\Even;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function run(): void
{
    $gameData = [];
    $minRange = 1;
    $maxRange = 100;
    $i = 0;

    while ($i < ROUND_COUNT) {
        $number = rand($minRange, $maxRange);
        $question = (string) $number;
        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';
        $gameData[] = [$question, $correctAnswer];
        $i++;
    }

    runGame(DESCRIPTION, $gameData);
}
