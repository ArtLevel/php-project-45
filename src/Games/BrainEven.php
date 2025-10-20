<?php

namespace BrainGames\Games\BrainEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\Helpers\defeat;
use function BrainGames\Helpers\greeting;
use function BrainGames\Helpers\randomNum;
use function BrainGames\Helpers\generateQuestion;

function startGame(): void
{
    $name = greeting(textOfQuestion: 'Answer "yes" if the number is even, otherwise answer "no".');

    $turns = 3; // Сколько всего вопросов

    for ($i = 0; $i < $turns; $i++) {
        $randomNum = randomNum(1, 100);

        $answer = generateQuestion($randomNum);

        isCorrectAnswerEven($randomNum, $answer, $name);

        line("Correct!");
    }

    line('Congratulations, %s!', $name);
}

function isCorrectAnswerEven(int $randomNum, string $answer, string $name): void
{
    $isEven = $randomNum % 2 === 0;
    $correctAnswer = $isEven ? 'yes' : 'no';

    // Проверка ответа
    if ($answer === 'yes' && !$isEven) {
        defeat($correctAnswer, $answer, $name);
    }

    if ($answer === 'no' && $isEven) {
        defeat($correctAnswer, $answer, $name);
    }

    if ($answer !== 'no' && $answer !== 'yes') {
        defeat($correctAnswer, $answer, $name);
    }
}
