<?php

namespace BrainGames\Games\BrainGCD;

use function cli\line;
use function cli\prompt;
use function BrainGames\Helpers\defeat;
use function BrainGames\Helpers\greeting;
use function BrainGames\Helpers\randomNum;
use function BrainGames\Helpers\generateQuestion;

function startGame(): void
{
    $name = greeting(textOfQuestion: 'Find the greatest common divisor of given numbers.');

    $turns = 3; // Сколько всего вопросов

    for ($i = 0; $i < $turns; $i++) {
        $randomNum1 = randomNum(1, 10);
        $randomNum2 = randomNum(1, 10);

        $answer = generateQuestion($randomNum1, $randomNum2);

        isCorrectAnswerGCD($randomNum1, $randomNum2, $answer, $name);
        line("Correct!");
    }

    line('Congratulations, %s!', $name);
}

function isCorrectAnswerGCD(int $randomNum1, int $randomNum2, string $answer, string $name): void
{
    $a = $randomNum1;
    $b = $randomNum2;

    // Ищем НОД
    for ($i = 0; $b !== 0; $i++) {
            $temp = $a;
            $a = $b;
            $b = $temp % $b;
    }

    if (intval($answer) !== intval($a)) {
        defeat(strval($a), $answer, $name);
    }
}
