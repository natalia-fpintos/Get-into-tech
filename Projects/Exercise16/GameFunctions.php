<?php

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
            // \u{1F91D} is Unicode for the handshake emoji
            return "It's a draw! \u{1F91D}\n";

        case $user === 'Scissors' && $computer === 'Paper':
        case $user === 'Paper' && $computer === 'Rock':
        case $user === 'Rock' && $computer === 'Scissors':
            // \u{1F604} is Unicode for the happy face emoji
            return "You win! \u{1F604}\n";

        default:
            // \u{1F916} is Unicode for the robot emoji
            return "The computer wins! \u{1F916}\n";
    }
}

$computerMove = getComputerMove();
$userChoice = $_REQUEST['choice'];

echo "Your move: ", $userChoice, "<br/>";
echo "The computer's move: ", $computerMove, "<br/><br/>";
echo compareMoves($userChoice, $computerMove);