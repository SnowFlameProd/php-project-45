<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run(): void
{
    $gameData = [];
    $minRange = 1;
    $maxRange = 100;
    $i = 0;

    while ($i < ROUND_COUNT) {
        $number = rand($minRange, $maxRange);
        $question = (string) $number;
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        $gameData[] = [$question, $correctAnswer];
        $i++;
    }

    runGame(DESCRIPTION, $gameData);
}

function isPrime($number)
{
    for ($i = 2; $i < $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
