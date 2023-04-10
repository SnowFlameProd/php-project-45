<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function isEven(): void
{
    line("Welcome to the Brain Games!");
    $name = prompt("May I have your name?");
    line("Hello, %s", $name);

    $rounds = 3;
    line('Answer "yes" if the number is even, otherwise answer "no".');

    run($name, $rounds);
}

function run(string $name = '', int $rounds = 0): void
{
    $minRange = 1;
    $maxRange = 100;
    $number = rand($minRange, $maxRange);

    line("Question: %s", $number);
    $answer = prompt("You answer:");
    $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';

    if ($answer === $correctAnswer) {
        line('Correct!');

        if ($rounds > 1) {
            run($name, $rounds - 1);
        } else {
            line("Congratulations, %s!", $name);
        }
    } else {
        line("%s is wrong answer ;(. Correct answer was %s.", $answer, $correctAnswer);
        line("Let's try again, %s!", $name);
    }
}
