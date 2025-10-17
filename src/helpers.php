<?php
namespace BrainGames\Helpers;
use function BrainGames\BrainEven\isCorrectAnswer;

use function cli\line;
use function cli\prompt;

function question(string $name, string $module): void
{
    $randomNum = randomNum();
    line('Question: %s', $randomNum);

    $answer = prompt('Your answer');

    if($module === 'even') {
        $isEven = $randomNum % 2 === 0;
        $correctAnswer = 'is wrong answer ;(. Correct answer was ' . ($isEven ? 'yes' : 'no');

        \BrainGames\BrainEven\isCorrectAnswer($answer, $correctAnswer, $isEven, $name);
    }
    
    line("Correct!");
}

function randomNum(): int
{
    return random_int(1, 100);
}
