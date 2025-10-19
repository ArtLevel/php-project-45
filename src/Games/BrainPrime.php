<?php

namespace BrainGames\Games\BrainPrime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Helpers\question;
use function BrainGames\Helpers\defeat;
use function BrainGames\Helpers\greeting;

function startGame(): void
{
    $name = greeting('Answer "yes" if given number is prime. Otherwise answer "no".');

    $turns = 3; // Сколько всего вопросов

    for ($i = 0; $i < $turns; $i++) {
            question($name, 'prime');
    }

    line('Congratulations, %s!', $name); // Баг ?
}

function isCorrectAnswerPrime(int $randomNum, string $answer, string $name): void
{
    $rightAnswer = 'yes';

    if ($randomNum < 2) {
        $rightAnswer = 'no';
    } elseif ($randomNum === 2) {
        $rightAnswer = 'yes';
    } elseif ($randomNum % 2 === 0) {
        $rightAnswer = 'no';
    }

    for ($i = 3; $i < sqrt($randomNum); $i++) {
        if ($randomNum % $i === 0) {
            $rightAnswer = 'no';
        }
    }

    if ($rightAnswer !== $answer) {
        defeat($rightAnswer, $answer, $name);
    }
}
