<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;

function progression($name)
{
    $good = 0;

    for ($i = 1; $i <= 3; $i++) {
        $add = rand(1, 10);
        $start = rand(1, 10);
        $unknown = rand(0, 9);
        $progression = [];
        for ($j = 0; $j <= 9; $j++) {
            $progression[$j] = $start + $add * $j;
        }
        $result = $progression[$unknown];
        $progression[$unknown] = "..";
        $progressionLine = implode(" ", $progression);

        line('What number is missing in the progression?');
        $answer = prompt("Question: {$progressionLine}?");
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
