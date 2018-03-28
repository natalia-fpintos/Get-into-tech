<?php

// Example 1
// slice the array starting at element 1
$path = array_slice(
	explode('/', 'example.com/blog/post/1'), 1);

// merge with this array
print_r(array_merge( ['yourdomain.tld'], $path ));

// Example 2
$savedBasket = ['bread','milk','eggs'];

$extraBasketItems = ['pasta','eggs','garlic bread','salad', 'olive oil'];

$combinedBaskets = array_merge($savedBasket, $extraBasketItems);

print_r($savedBasket);
print_r($extraBasketItems);
echo "**********Array Merging**********\n";
print_r($combinedBaskets);

echo "**********Array Addition**********\n";
$AddedBasket = $savedBasket + $extraBasketItems;
print_r($AddedBasket);

/*
 * QUESTIONS
 * 
 * What does the explode function do?
 * Explode breaks a string wherever it finds the substring in the first parameter.
 * Then it saves each substring in an element of a new array.
 * 
 * How would you slice the string 'example.com/blog/post/1' to return just 'post/1'?
 * $solution1 = substr('example.com/blog/post/1', -6), PHP_EOL;
 * or
 * $solution2 = array_slice(explode('/', 'example.com/blog/post/1'), 2));
 * 
 * What is the difference between array_merge and array addition?
 * array_merge gets both arrays passed as parameters
 * and puts their elements one after the other in a new array.
 * 
 * array addition instead adds the arrays on both sides of a + sign,
 * first it gets the array on the left handside and puts it in a new array, then,
 * gets the elements from the right hand side array, starting in the index following 
 * the last index from the first array, and adds those elements to the new array.
 */

