<?php

namespace BrainGames\Helpers;

use function BrainGames\BrainEven\isCorrectAnswerEven;
use function BrainGames\BrainCalc\isCorrectAnswerCalc;
use function BrainGames\BrainGCD\isCorrectAnswerGCD;
use function BrainGames\BrainProgression\isCorrectAnswerProgression;
use function BrainGames\BrainPrime\isCorrectAnswerPrime;
use function cli\line;
use function cli\prompt;

function question(string $name, string $module): void
{

    if ($module === "calc") {
        $randomNum1 = randomNum(1, 10);
        $randomNum2 = randomNum(1, 10);

        $operator = generateOperator();

        line('Question: %s %s %s', $randomNum1, $operator, $randomNum2);
        $answer = prompt('Your answer');

        isCorrectAnswerCalc($randomNum1, $operator, $randomNum2, $answer, $name);
    }

    if ($module === "even") {
        $randomNum = randomNum(1, 100);

        line('Question: %s', [$randomNum, $randomNum, $randomNum]);
        $answer = prompt('Your answer');

        isCorrectAnswerEven($randomNum, $answer, $name);
    }

    if ($module === "gcd") {
        $randomNum1 = randomNum(1, 10);
        $randomNum2 = randomNum(1, 10);

        line('Question: %s %s', $randomNum1, $randomNum2);
        $answer = prompt('Your answer');

        isCorrectAnswerGCD($randomNum1, $randomNum2, $answer, $name);
    }

    if ($module === "progression") {
        [$progression, $rightAnswer] = generateProgression();

        line('Question: %s', implode(" ", $progression));
        $answer = prompt('Your answer');

        isCorrectAnswerProgression($rightAnswer, $answer, $name);
    }

    if ($module === "prime") {
        $randomNum = randomNum(1, 100);
        line('Question: %s', $randomNum);
        $answer = prompt('Your answer');

        isCorrectAnswerPrime($randomNum, $answer, $name);
    }

    line("Correct!");
}

function generateProgression(): array
{
        $progression = [];
        $idQuestion = randomNum(0, 9);
        $stepProgression = randomNum(1, 10);
        $rightAnswer = 0;

    for ($i = 0; $i < 10; $i++) {
        if (count($progression) !== 0) {
            $progression[] = $progression[count($progression) - 1] + $stepProgression;
        } else {
            $progression[] = $stepProgression;
        }
    }

    foreach ($progression as $index => $num) {
        if ($index === $idQuestion) {
            $rightAnswer = $progression[$index];

            $progression[$index] = '..';
        }
    }

        return [$progression, $rightAnswer];
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
