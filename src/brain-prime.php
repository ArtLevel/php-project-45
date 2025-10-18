<?php

namespace BrainGames\BrainPrime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Helpers\question;
use function BrainGames\Helpers\defeat;

function startGame(): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    $turns = 3; // Сколько всего вопросов

    for ($i = 0; $i < $turns; $i++) {
            question($name, 'prime');
    }

    line('Congratulations, %s!', $name);
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
