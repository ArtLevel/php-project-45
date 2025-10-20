<?php

namespace BrainGames\Games\BrainPrime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Helpers\defeat;
use function BrainGames\Helpers\greeting;
use function BrainGames\Helpers\randomNum;

function startGame(): void
{
    $name = greeting('Answer "yes" if given number is prime. Otherwise answer "no".');

    $turns = 3; // Сколько всего вопросов

    for ($i = 0; $i < $turns; $i++) {
        $randomNum = randomNum(1, 100);

        line('Question: %s', $randomNum);
        $answer = prompt('Your answer');

        isCorrectAnswerPrime($randomNum, $answer, $name);

         line("Correct!");
    }

    line('Congratulations, %s!', $name);
}

function isCorrectAnswerPrime(int $randomNum, string $answer, string $name): void
{
    $rightAnswer = 'yes';

    if ($randomNum <= 1) {
        $rightAnswer = 'no'; // числа меньше или равные 1 не простые
    }
    if ($randomNum <= 3) {
        $rightAnswer = 'yes'; // 2 и 3 простые числа
    }
    if ($randomNum % 2 === 0 || $randomNum % 3 === 0) {
        $rightAnswer = 'no'; // делится на 2 или 3 — не простое
    }

    // Проверяем делители от 5 до sqrt(num), шаг 6 (проверка чисел вида 6k±1)
    for ($i = 5; $i * $i <= $randomNum; $i += 6) {
        if ($randomNum % $i === 0 || $randomNum % ($i + 2) === 0) {
            $rightAnswer = 'no';
        }
    }

    if ($rightAnswer !== $answer) {
        defeat($rightAnswer, $answer, $name);
    }
}
