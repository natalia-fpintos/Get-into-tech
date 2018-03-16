<?php

function getUserMove () {
    echo str_repeat('_', 22), "\n";
    
    echo "Please type R for Rock, P for Paper or S for Scissors\n";
    echo "What is your move?\n";
    
    return stream_get_line(STDIN, 100, "\n");
}

function convertUserMove ($move) {
    switch ($move) {
        case 'R':
            return 'Rock';
        case 'P':
            return 'Paper';
        case 'S':
            return 'Scissors';

        default:
            return 'Other';
    }
}

function getComputerMove () {
    
    $num = rand(0, 2);
    
    switch ($num) {
        case 0:
            return 'Rock';
        case 1:
            return 'Paper';
        case 2:
            return 'Scissors';
    }
}

function compareMoves ($user, $computer) {

    switch (true) {
        case $user === $computer:
            return "It's a draw!\n";

        case $user === 'Scissors' && $computer === 'Paper':
        case $user === 'Paper' && $computer === 'Rock':
        case $user === 'Rock' && $computer === 'Scissors':
            return "You win!\n";

        default:
            return "The computer wins!\n";
    }
}



/*  Our program starts here!  */

echo "Rock, Paper, Scissors!\n";

while (true) {
    $userInput = getUserMove();
    $userMove = convertUserMove($userInput);
    
    if ($userMove !== 'Other') {
        break;
    } else {
        echo "That is not a valid move :(\n";
    }
}

$computerMove = getComputerMove();

echo PHP_EOL;
echo 'Your move: ', $userMove, PHP_EOL;
echo "The computer's move: ", $computerMove, PHP_EOL;
echo PHP_EOL;
echo compareMoves($userMove, $computerMove), PHP_EOL;