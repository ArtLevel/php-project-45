<?php

namespace BrainGames\Helpers;

use function cli\line;
use function cli\prompt;

function generateQuestion(mixed ...$arr): string
{
    $string = implode(' ', $arr);

    line('Question: %s', $string);
    $answer = prompt('Your answer');

    return $answer;
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
