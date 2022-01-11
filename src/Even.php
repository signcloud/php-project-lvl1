<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function AskEven($name){
    $good = 0;
    for($i = 1; $i <= 3; $i++){
        line('Answer "yes" if the number is even, otherwise answer "no".');
        $randNumber = rand(1, 100);
        $answer = prompt("Question: {$randNumber}?");

        $isEven = $randNumber % 2 === 0;
        if($answer !== "no" && $answer !== "yes"){
            line("Your enter is incorrect!");
            $i--;
            continue;
        }
        if(($answer === "yes" && $isEven) || ($answer === "no" && !$isEven)) {
            line("Correct!");
            $good++;
        }else{
                line("'Yes' is wrong answer ;(. Correct answer was 'No'");
                line("Let's try again, {$name}");
        }
    }

    if($good === 3)
        line("Congratulations, %s!", $name);
}