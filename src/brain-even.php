<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\Helpers\question;
use function BrainGames\Helpers\defeat;
use function BrainGames\Helpers\greeting;

function startGame(): void
{
    $name = greeting('Answer "yes" if the number is even, otherwise answer "no".');

    $turns = 3; // Сколько всего вопросов

    for ($i = 0; $i < $turns; $i++) {
            question($name, 'even');
    }

    line('Congratulations, %s!', $name);
}

function isCorrectAnswerEven(string $answer, string $correctAnswer, bool $isEven, string $name): void
{
    // Проверка ответа
    if ($answer === 'yes' && !$isEven) {
        defeat($correctAnswer, $answer, $name);
    }

    if ($answer === 'no' && $isEven) {
        defeat($correctAnswer, $answer, $name);
    }

    if ($answer !== 'no' && $answer !== 'yes') {
        defeat($correctAnswer, $answer, $name);
    }
}
