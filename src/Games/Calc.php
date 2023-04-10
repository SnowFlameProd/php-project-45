<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const DESCRIPTION = 'What is the result of the expression?';

function run(): void
{
    $gameData = [];
    $minRange = 1;
    $maxRange = 25;
    $operations = ['+', '-', '*'];
    $i = 0;

    while ($i < ROUND_COUNT) {
        $correctAnswer = 0;

        $first = rand($minRange, $maxRange);
        $second = rand($minRange, $maxRange);
        $currentOperation = array_rand($operations);
        $question = "{$first} {$operations[$currentOperation]} {$second}";

        switch ($operations[$currentOperation]) {
            case '+':
                $correctAnswer = sum($first, $second);
                break;
            case '-':
                $correctAnswer = sub($first, $second);
                break;
            case '*':
                $correctAnswer = mult($first, $second);
                break;
            default:
                break;
        }

        $gameData[] = [$question, (string) $correctAnswer];
        $i++;
    }

    runGame(DESCRIPTION, $gameData);
}

function sum($first, $second)
{
    return $first + $second;
}

function sub($first, $second)
{
    return $first - $second;
}

function mult($first, $second)
{
    return $first * $second;
}
