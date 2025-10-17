<?php
    namespace BrainGames\BrainEven;

    use function cli\line;
    use function cli\prompt;
    use function cli\exit;

    const answers = ["yes", "no"];

    function startGame()
    {
        line('Welcome to the Brain Game!');
        $name = prompt('May I have your name?');
        line('Hello, %s!', $name);

        line('Answer "yes" if the number is even, otherwise answer "no".');
        
        $turns = 3; // Сколько всего вопросов

        for ($i = 0; $i < $turns; $i++) {
                question($name);
        }

        line('Congratulations, %s!', $name);
    }

    function question($name)
    {
        $randomNum = randomNum();
        line('Question: %s', $randomNum);

        $answer = prompt('Your answer');
        $isEven = $randomNum % 2 === 0;
        $correctAnswer = 'is wrong answer ;(. Correct answer was ' . ($isEven ? 'yes' : 'no');

        // Проверка ответа
        if($answer === 'yes' && $randomNum % 2 !== 0) {
            line("'%s' {$correctAnswer}", $answer);
            line("Let's try again, %s!", $name);

            die();
        }

        if($answer === 'no' && $randomNum % 2 === 0) {
            line("'%s' {$correctAnswer}", $answer);
            line("Let's try again, %s!", $name);

            die();
        }

        line("Correct!");
    }

    

    function randomNum()
    {
        return mt_rand(1, 100);
    }
