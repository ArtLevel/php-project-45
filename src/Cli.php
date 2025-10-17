<?php
namespace BrainGames\Cli;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

function startGame() {
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
}
