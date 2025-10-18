<?php

namespace BrainGames\BrainProgression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Helpers\question;
use function BrainGames\Helpers\defeat;
use function BrainGames\Helpers\greeting;

function startGame(): void
{
    $name = greeting('What number is missing in the progression?');

    $turns = 3; // Сколько всего вопросов

    for ($i = 0; $i < $turns; $i++) {
            question($name, 'progression');
    }

    line('Congratulations, %s!', $name);
}

function isCorrectAnswerProgression(int $rightAnswer, string $answer, string $name): void
{
    if (intval($rightAnswer) !== intval($answer)) {
        defeat(strval($rightAnswer), $answer, $name);
    }
}
