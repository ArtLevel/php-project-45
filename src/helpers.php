<?php

namespace BrainGames\Helpers;

use function BrainGames\BrainEven\isCorrectAnswerEven;
use function BrainGames\BrainCalc\isCorrectAnswerCalc;
use function BrainGames\BrainGCD\isCorrectAnswerGCD;
use function BrainGames\BrainProgression\isCorrectAnswerProgression;
use function cli\line;
use function cli\prompt;

function question(string $name, string $module): void
{

    if ($module === "calc") {
        $randomNum1 = randomNum(10);
        $randomNum2 = randomNum(10);

        $operator = generateOperator();

        line('Question: %s %s %s', $randomNum1, $operator, $randomNum2);
        $answer = prompt('Your answer');

        isCorrectAnswerCalc($randomNum1, $operator, $randomNum2, $answer, $name);
    }

    if ($module === "even") {
        $randomNum = randomNum(100);
        line('Question: %s', $randomNum);
        $answer = prompt('Your answer');

        questionEven($name, $answer, $randomNum);
    }

    if ($module === "gcd") {
        $randomNum1 = randomNum(10);
        $randomNum2 = randomNum(10);

        line('Question: %s %s', $randomNum1, $randomNum2);
        $answer = prompt('Your answer');

        isCorrectAnswerGCD($randomNum1, $randomNum2, $answer, $name);
    }

    if ($module === "progression") {
        $progression = [];
        $idQuestion = randomNum(10);
        $stepProgression = randomNum(10);
        $rightAnswer = 0;

        for ($i = 0; $i < 10; $i++) {
            if (!empty($progression)) {
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

        line('Question: %s', implode(" ", $progression));
        $answer = prompt('Your answer');

        isCorrectAnswerProgression($rightAnswer, $answer, $name);
    }

    line("Correct!");
}

function questionEven(string $name, string $answer, $randomNum)
{
    $isEven = $randomNum % 2 === 0;
    $correctAnswer = $isEven ? 'yes' : 'no';

    isCorrectAnswerEven($answer, $correctAnswer, $isEven, $name);
}

function generateOperator(): string
{
    $num = randomNum(100);

    if ($num < 30) {
        return "-";
    } elseif ($num < 60) {
        return "+";
    } else {
        return "*";
    }
}

function randomNum(int $step = 100): int
{
    return random_int(1, $step);
}

function defeat(string $correctAnswer, string $answer, string $name): never
{
    line("'%s' is wrong answer ;(. Correct answer was {$correctAnswer}", $answer);
    line("Let's try again, %s!", $name);

    die();
}
