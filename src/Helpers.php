<?php

namespace BrainGames\Helpers;

use function BrainGames\Games\BrainEven\isCorrectAnswerEven;
use function BrainGames\Games\BrainCalc\isCorrectAnswerCalc;
use function BrainGames\Games\BrainGCD\isCorrectAnswerGCD;
use function BrainGames\Games\BrainProgression\isCorrectAnswerProgression;
use function BrainGames\Games\BrainPrime\isCorrectAnswerPrime;
use function cli\line;
use function cli\prompt;

function generateQuestion(mixed ...$arr): string
{
    $string = implode(' ', $arr);

    line('Question: %s', $string);
    $answer = prompt('Your answer');

    return $answer;
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

function randomNum(int $stepOne = 0, int $stepTwo = 100): int
{
    return random_int($stepOne, $stepTwo);
}

function defeat(string $correctAnswer, string $answer, string $name): never
{
    line("'%s' is wrong answer ;(. Correct answer was {$correctAnswer}", $answer);
    line("Let's try again, %s!", $name);

    die();
}

function greeting(string $textOfQuestion): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    line('%s', $textOfQuestion);

    return $name;
}
