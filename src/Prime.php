<?php

namespace Brain\Games\Prime;

use function cli\line;
use function cli\prompt;

function prime($name)
{
    $good = 0;
    for ($i = 1; $i <= 3; $i++) {
        line('Answer "yes" if given number is prime. Otherwise answer "no".');
        $randNumber1 = rand(1, 100);

        $answer = prompt("Question: {$randNumber1}?");
        $result = gmp_prob_prime($randNumber1);
        if ($answer !== "no" && $answer !== "yes") {
            line("Your enter is incorrect!");
            $i--;
            continue;
        }

        if (
            ($answer === "yes"  && $result === 1 || $answer === "yes"  &&  $result === 2) ||
            ($answer === "no"  && !$result)
        ) {
            line("Correct!");
            $good++;
        } else {
            line("{$answer} is wrong answer ;(");
            line("Let's try again, {$name}");
        }
    }

    if ($good === 3) {
        line("Congratulations, %s!", $name);
    }
}
