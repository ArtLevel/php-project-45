<?php

namespace BrainGames\BrainGCD;

use function cli\line;
use function cli\prompt;
use function BrainGames\Helpers\question;
use function BrainGames\Helpers\defeat;

function startGame(): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    line('Find the greatest common divisor of given numbers.');

    $turns = 3; // Сколько всего вопросов

    for ($i = 0; $i < $turns; $i++) {
            question($name, 'gcd');
    }

    line('Congratulations, %s!', $name);
}

function isCorrectAnswerGCD(string $randomNum1, string $randomNum2, string $answer, string $name): void
{
    $a = $randomNum1;
    $b = $randomNum2;

    // Ищем НОД
    for ($i = 0; $b !== 0; $i++) {
        if ($b === 0) {
            $gcd = $a;
        } else {
            $temp = $a;
            $a = $b;
            $b = $temp % $b;
        }
    }

    if (intval($answer) !== intval($a)) {
        defeat($a, $answer, $name);
    }
}
