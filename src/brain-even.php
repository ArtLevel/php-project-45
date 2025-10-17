<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\Helpers\question;
use function BrainGames\Helpers\defeat;

function startGame(): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    line('Answer "yes" if the number is even, otherwise answer "no".');

    $turns = 3; // Сколько всего вопросов

    for ($i = 0; $i < $turns; $i++) {
            question($name, 'even');
    }

    line('Congratulations, %s!', $name);
}

function isCorrectAnswerEven(string $answer, string $correctAnswer, string $isEven, string $name)
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
