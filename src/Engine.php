<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;

/**
 * Функция, которая запускает игру
 * @param string $description - условия игры
 * @param array $gameData - массив с вопросом и правильным ответом
 * @return void
 */
function runGame(string $description, array $gameData): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($description);

    foreach ($gameData as [$question, $correctAnswer]) {
        line("Question: " . $question);
        $answer = prompt("Your answer");

        if ($answer === (string) $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
}
