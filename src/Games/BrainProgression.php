<?php

namespace BrainGames\Games\BrainProgression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Helpers\defeat;
use function BrainGames\Helpers\greeting;
use function BrainGames\Helpers\generateQuestion;
use function BrainGames\Helpers\randomNum;

function startGame(): void
{
    $name = greeting('What number is missing in the progression?');

    $turns = 3; // Сколько всего вопросов

    for ($i = 0; $i < $turns; $i++) {
        [$progression, $rightAnswer] = generateProgression();

        $answer = generateQuestion(implode(" ", $progression));

        isCorrectAnswerProgression($rightAnswer, $answer, $name);

        line("Correct!");
    }

    line('Congratulations, %s!', $name);
}

function isCorrectAnswerProgression(int $rightAnswer, string $answer, string $name): void
{
    if (intval($rightAnswer) !== intval($answer)) {
        defeat(strval($rightAnswer), $answer, $name);
    }
}

function generateProgression(): array
{
        $progression = [];
        $idQuestion = randomNum(0, 9);
        $stepProgression = randomNum(1, 10);
        $rightAnswer = 0;

    for ($i = 0; $i < 10; $i++) {
        if (count($progression) !== 0) {
            $progression[] = $progression[count($progression) - 1] + $stepProgression;
        } else {
            $progression[] = $stepProgression;
        }
    }

    foreach ($progression as $index => $num) {
        if ($index === $idQuestion) {
            $rightAnswer = $progression[$index];

            $progression[$index] = '..';
        }
    }

        return [$progression, $rightAnswer];
}
