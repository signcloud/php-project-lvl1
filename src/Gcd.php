<?php

namespace Brain\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function gmp;

function gcd($name)
{
    $good = 0;
    for ($i = 1; $i <= 3; $i++) {
        line('Find the greatest common divisor of given numbers.');
        $randNumber1 = rand(1, 100);
        $randNumber2 = rand(1, 100);

        $answer = prompt("Question: {$randNumber1} {$randNumber2}?");
        $result = gmp_gcd($randNumber1, $randNumber2);
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
