<?php

echo "What is your operation? (one of + - * /)\n";
$operation = stream_get_line(STDIN, 100, "\n");

echo "What is your first number?\n";
$num1 = stream_get_line(STDIN, 100, "\n");

echo "What is your second number?\n";
$num2 = stream_get_line(STDIN, 100, "\n");

switch ($operation) {
    case '+':
        $result = $num1 + $num2;
        break;
    case '-':
        $result = $num1 - $num2;
        break;
    case '*':
        $result = $num1 * $num2;
        break;
    case '/':
        if ($num2 === '0') {
            die('ERROR. Cannot divide by zero.');
        }
        $result = $num1 / $num2;
        break;
    
    default:
        die('Invalid operation, please try again.');
}

echo 'Result: ', $result, PHP_EOL;

