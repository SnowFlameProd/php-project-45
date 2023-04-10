<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUND_COUNT;

const DESCRIPTION = 'What number is missing in the progression?';

function run(): void
{
    $gameData = [];
    $i = 0;

    while ($i < ROUND_COUNT) {
        $gameData[] = getProgression();
        $i++;
    }

    runGame(DESCRIPTION, $gameData);
}

function getProgression(): array
{
    $result = [];
    $progression = [];
    $minProgressionRange = 6;
    $maxProgressionRange = 11;
    $minRange = 1;
    $maxRange = 10;
    $progressionLength = rand($minProgressionRange, $maxProgressionRange);
    $currentProgressionItem = rand($minRange, $maxRange);
    $progressionStep = rand($minRange, $maxRange);
    $progression[] = $currentProgressionItem;

    for ($i = 1; $i < $progressionLength; $i++) {
        $currentProgressionItem += $progressionStep;
        $progression[] = $currentProgressionItem;
    }

    $progressionRandomIndex = array_rand($progression);
    $answer = $progression[$progressionRandomIndex];
    $progression[$progressionRandomIndex] = '..';
    $finalProgression = implode(' ', $progression);
    array_push($result, $finalProgression, $answer);

    return $result;
}
