<?php

// Sorting Arrays Exercise
// TODO: 1
// Attempt to directly sort an array with the values of [8,3,6,5,4]
$array1 = [8, 3, 6, 5, 4];
sort($array1);
echo "Sorting the array using sort():", PHP_EOL;
print_r($array1);
echo PHP_EOL;
// TODO: 2 
// Run the file. Add a comment to describe the outcome 
// YOUR COMMENT HERE: The original array was sorted and re-arranged in ascending order

// TODO: 3 
// Use the following array and sort as specified
$numbers = [8, 6, 3, 0, 2, -4, 9];
echo "Original array values:\n";
print_r($numbers);
echo PHP_EOL;

echo "Sorting in ascending order\n";
// YOUR CODE HERE
sort($numbers);
print_r($numbers);
echo PHP_EOL;

echo "Sorting in descending order\n";
// YOUR CODE HERE
rsort($numbers);
print_r($numbers);
echo PHP_EOL;

// TODO: 4 
// Use the following array and sort as specified

$ages = ['Mr. S. Holmes' => 27, 
         'Mr. M. Holmes' => 34, 
	   'Ms. Hudson' => 70];

// Sort an associative array by its values in descending order
echo "Sorted by values, descending\n";
// YOUR CODE HERE
arsort($ages);
print_r($ages); 
echo PHP_EOL;

// TODO: 5 
// Sort an associative array by its keys
echo "Sorted by keys, ascending\n";
// YOUR CODE HERE
ksort($ages);
print_r($ages);
