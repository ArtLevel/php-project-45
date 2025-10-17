<?php
    namespace BrainGames\BrainEven;

    use function cli\line;
    use function cli\prompt;

    const answers = ["yes", "no"];

    function startGame()
    {
        line('Welcome to the Brain Game!');
        $name = prompt('May I have your name?');
        line('Hello, %s!', $name);

        line('Answer "yes" if the number is even, otherwise answer "no".');
        
        $check = 0; // Сколько правильных ответов

        question();
    }

    function question()
    {
        $randomNum = randomNum();
        line('Question: %s', $randomNum);

        $answer = prompt('Your answer');
        $result = true;

        // Проверка ответа
        if($answer === 'yes' && $randomNum % 2 !== 0) {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            line("Let's try again, %s!", $name);

            $result = false;
        }

        if($answer === 'no' && $randomNum % 2 === 0) {
            line("'no' is wrong answer ;(. Correct answer was 'yes'.");
            line("Let's try again, %s!", $name);

            $result = false;
        }

        return $result;
    }

    function randomNum()
    {
        return mt_rand(1, 100);
    }