<?php

namespace BrainGames\Games\BrainProgression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Helpers\defeat;
use function BrainGames\Helpers\greeting;
use function BrainGames\Helpers\generateProgression;
use function BrainGames\Helpers\generateQuestion;

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
