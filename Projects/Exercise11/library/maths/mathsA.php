<?php

function doMathsA ($first, $second, $operator) {
    switch ($operator) {
        case '+':
            $result = $first + $second;
            break;
        case '-':
            $result = $first - $second;
            break;
        case '*':
            $result = $first * $second;
            break;
        case '/':
            if (!$second) {
                die('ERROR. Unable to divide by zero');
            }
            $result = $first / $second;
            break;
        case '**':
            $result = $first ** $second;
            break;
    }
    
    return $result;
}

function getOperation () {
    $operations = ['+', '-', '*', '/', '**'];
    
    while (true) {
        echo 'Please type your operation command: ';
        $operation = stream_get_line(STDIN, 100, "\n");
        
        if (in_array($operation, $operations)) {
            break;
        }
        echo "That's not a valid operation :(", "\n";
    }
    return $operation;
}

function getNum ($count) {
    while (true) {
        echo 'What is the ', $count, ' number of your operation?: ';
        $num = stream_get_line(STDIN, 100, "\n");

        if (is_numeric($num)) {
            break;
        }
        echo "That's not a valid number :(", "\n";
    }
    return $num;
}