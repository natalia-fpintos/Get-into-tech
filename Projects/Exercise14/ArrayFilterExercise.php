<?php

function filterOnAmount($items)
{
if ($items>100){
    return true;
}
return false;
}
echo "Using a callback function\n";
$basket = ["Item1" => 75, "Item2" => 200, "Item3" => 125, "Item4" => 100];
print_r(array_filter($basket,"filterOnAmount"));
echo PHP_EOL;

// Using a closure to close-over (capture) a variable
echo "Using a callback function with a captured variable\n";
function criteria_greater_than($min)
{
    return function($item) use ($min) {
        return $item > $min;
    };
}

$minimum = 95;
// Use array_filter on a input with a selected filter function
$output = array_filter($basket, criteria_greater_than($minimum));

print_r($output); // basket items > 95
echo PHP_EOL;
// dereferencing functions
// functions that return functions can be used as functions directly


// calling the function directly within an if statement
if (criteria_greater_than($minimum)($basket['Item1'])) {
    echo "It's more than $minimum\n";
}
else
{
    echo "It's NOT more than $minimum\n";
}


/*
 * QUESTIONS
 * 
 * What does the array_filter function do?
 * array_filter accepts an array and a callback function as paramenters. Then it
 * applies this callback function to each of the elements of the array in order,
 * is the callback function returns true for the element, then it will be included
 * in the returned array, if doesn't, the element will not be included.
 * 
 * How does the $min captured variable used with the criteria_greater_than 
 * function give you more flexibility than the filterArray callback?
 * This example uses a closure, so it will allow us to dynamically specify the 
 * number against which we can compare the values of our array, just by calling
 * criteria_greater_than with the value of our choice. Therefore if we wish to change
 * this value at any point, we can re-use the same function, with a different parameter,
 * instead of having to create a brand new function or amend the existing one.
 * 
 * What is the purpose of the ($basket['Item1']) code within the if statement 
 * at the bottom of the file?
 * This set of brackets is used to call the function returned by the criteria_greater_than
 * function, and to pass the parameter required to call the returned function.
 * In this case, the returned function will check if the first item in $basket
 * is greater than $minimum, and the result of this comparison will be used in the if
 * statement.
 */