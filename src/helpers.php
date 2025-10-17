<?php
namespace BrainGames\Helpers;
use function BrainGames\BrainEven\isCorrectAnswer;

use function cli\line;
use function cli\prompt;

function question(string $name, string $module): void
{

    if($module === "calc") {
        $randomNum1 = randomNum();
        $randomNum2 = randomNum();

        $operator = generateOperator();

        line('Question: asdfasdfasdf', $randomNum1, $operator, $randomNum2);
    }

    if($module === "even") {
        $randomNum = randomNum();
        line('Question: %s', $randomNum);
        $answer = prompt('Your answer');

        questionEven($name, $answer, $randomNum);
    }

    line("Correct!");
}

function questionEven(string $name, string $answer, $randomNum)
{
    $isEven = $randomNum % 2 === 0;
    $correctAnswer = 'is wrong answer ;(. Correct answer was ' . ($isEven ? 'yes' : 'no');

    \BrainGames\BrainEven\isCorrectAnswer($answer, $correctAnswer, $isEven, $name);
}

function generateOperator(): string
{
    $num = randomNum();

    if($num < 30) {
        return "-";
    } elseif($num < 60) {
        return "+";
    } else {
        return "*";
    }
}

function randomNum(): int
{
    return random_int(1, 100);
}
