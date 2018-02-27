<?php

/*
 * Calculator Example
 */

echo "This calculator can + - * /", PHP_EOL;

echo "Please enter the operation:", PHP_EOL;
$operation = stream_get_line(STDIN, 100, "\n");

echo "Please provide the first number:", PHP_EOL;
$numOne = stream_get_line(STDIN, 100, "\n");

if (gettype((int) $numOne) != 'integer') {
    die("Please provide a valid number.\n");
}

echo "Please provide the second number:", PHP_EOL;
$numTwo = stream_get_line(STDIN, 100, "\n");

if (gettype((int) $numTwo) != 'integer') {
    die("Please provide a valid number.\n");
}

if ($operation == '/' && $numTwo == 0) {
    die("Division by zero not allowed.\n");
}

switch ($operation) {
    case '+':
        $result = $numOne + $numTwo;
        break;
    case '-':
        $result = $numOne - $numTwo;
        break;
    case '*':
        $result = $numOne * $numTwo;
        break;
    case '/':
        $result = $numOne / $numTwo;
        break;

    default:
        die("The operation could not be performed");
}

echo $result;
