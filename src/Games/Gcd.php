<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run(): void
{
    $gameData = [];
    $minRange = 1;
    $maxRange = 100;
    $i = 0;

    while ($i < ROUND_COUNT) {
        $first = rand($minRange, $maxRange);
        $second = rand($minRange, $maxRange);
        $question = "{$first} {$second}";
        $correctAnswer = findGcd($first, $second);
        $gameData[] = [$question, $correctAnswer];
        $i++;
    }

    runGame(DESCRIPTION, $gameData);
}

function findGcd($first, $second)
{
    $result = 0;
    $maxDivisor = min($first, $second);

    for ($j = 1; $j < $maxDivisor; $j++) {
        if ($first % $j === 0 && $second % $j === 0) {
            $result = $j;
        }
    }

    return $result;
}
