<?php

namespace BrainGames\BrainCalc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Helpers\question;
use function BrainGames\Helpers\defeat;
use function BrainGames\Helpers\greeting;

function startGame(): void
{
    $name = greeting('What is the result of the expression?');

    $turns = 3; // Сколько всего вопросов

    for ($i = 0; $i < $turns; $i++) {
            question($name, 'calc');
    }

    line('Congratulations, %s!', $name);
}

function isCorrectAnswerCalc(int $randomNum1, string $operator, int $randomNum2, string $answer, string $name): void
{
    $result = 0;

    switch ($operator) {
        case "+":
            $result = $randomNum1 + $randomNum2;
            break;
        case "-":
            $result = $randomNum1 - $randomNum2;
            break;
        case "*":
            $result = $randomNum1 * $randomNum2;
            break;
    }

    if ($result !== intval($answer)) {
        defeat(strval($result), $answer, $name);
    }
}
