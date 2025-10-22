<?php

namespace BrainGames\Games\BrainCalc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Helpers\defeat;
use function BrainGames\Helpers\greeting;
use function BrainGames\Helpers\randomNum;
use function BrainGames\Helpers\generateQuestion;

function startGame(): void
{
    $name = greeting('What is the result of the expression?');

    $turns = 3; // Сколько всего вопросов

    for ($i = 0; $i < $turns; $i++) {
        $randomNum1 = randomNum(1, 10);
        $randomNum2 = randomNum(1, 10);

        $operator = generateOperator();

        $answer = generateQuestion($randomNum1, $operator, $randomNum2);

        isCorrectAnswerCalc($randomNum1, $operator, $randomNum2, $answer, $name);

        line("Correct!");
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

function generateOperator(): string
{
    $num = randomNum(1, 100);

    if ($num < 30) {
        return "-";
    } elseif ($num < 60) {
        return "+";
    } else {
        return "*";
    }
}
