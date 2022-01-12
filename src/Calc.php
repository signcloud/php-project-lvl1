<?php

namespace Brain\Games\Calc;

use function cli\line;
use function cli\prompt;

function calc($name)
{
    $good = 0;
    $operations = ["-", "+", "*", "/"];
    for ($i = 1; $i <= 3; $i++) {
        line('What is the result of the expression?');
        $randNumber1 = rand(1, 10);
        $randNumber2 = rand(1, 10);
        $result = 0;
        $operation = $operations[rand(0, 3)];
        $answer = prompt("Question: {$randNumber1}{$operation}{$randNumber2}?");
        switch ($operation) {
            case "-":
                $result = $randNumber1 - $randNumber2;
                break;
            case "+":
                $result = $randNumber1 + $randNumber2;
                break;
            case "*":
                $result = $randNumber1 * $randNumber2;
                break;
            case "/":
                $result = $randNumber1 / $randNumber2;
                break;
        }
        if (!is_numeric($answer)) {
            line("Your enter is incorrect!");
            $i--;
            continue;
        }

        if ($answer == $result) {
            line("Correct!");
            $good++;
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was {$result}.");
            line("Let's try again, {$name}");
        }
    }

    if ($good === 3) {
        line("Congratulations, %s!", $name);
    }
}
