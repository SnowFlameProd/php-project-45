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
        $first = rand($minRange, $maxRange);
        $second = rand($minRange, $maxRange);
        $currentOperation = $operations[array_rand($operations)];
        $question = "{$first} {$currentOperation} {$second}";
        $correctAnswer = getCorrectAnswer($currentOperation, $first, $second);
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

function getCorrectAnswer($operation, $first, $second) {
    $correctAnswer = 0;

    switch ($operation) {
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

    return $correctAnswer;
}
