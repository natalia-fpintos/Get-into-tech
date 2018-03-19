# Get Into Tech: Day 8 #

## Array functions ##

Arrays are used widely in PHP and there are many functions for them:

- `list()`: this is not really a function but a language construct (such as `array()`). It assigns values to a list of variables in order.

```php
$people = [
  ['Alice'] => ['Leeds', 'London'],
  ['Lucy'] => ['Paris', 'Lyon']
];

foreach ($people as $name => list($town1, $town2)) {
  echo $town1; // Leeds in the 1st iteration, Paris in the 2nd
  echo $town2; // London in the 1st iteration, Lyon in the 2nd
}
```
<br/>

### Array dereferencing ###

We can use the subscript operator `[]` to access the elements of an array. This operator, however, can also be used with expressions that evaluate as arrays or return arrays. This is known as **dereferencing**.

```php
// Accessing the array element
$myString = 'Hello World!';
$myArray = explode(' ', $myString);
echo $myArray[1]; // World!

// Dereferencing
$myString = 'Hello World!';
echo explode(' ', $myString)[1]; // World!
```
<br/>

### Sort arrays ###

There are many functions in PHP to assist in sorting arrays, based on different conditions.

It is important to note that the sort functions in PHP sort the array by reference. This means that the original array is changed, and not that a new sorted array is returned. For this reason we need to pass a variable that contains an array to the sort functions.

In practice, it is more frequent to sort arrays for a web application using SQL or JavaScript.

- `sort()`: sorts the array in ascending order.
- `rsort()`: sorts the array in descending (reverse) order.
- `asort()`: sorts an associative array in ascending order, based on the value.
- `ksort()`: sorts an associative array in ascending order, based on the key.
- `arsort()`: sorts an associative array in descending order, based on the value.
- `krsort()`: sorts an associative array in descending order, based on the key.
- `usort()`: sorts the array based on a supplied callback function.

The `usort()` function behaves differently to the other set provided by PHP, as it requires that you supply a function which helps determine the order in which the elements will be sorted.

In the example below, we cannot sort the array with the usual functions because the values are each inside an associative array contained in an indexed array. However, we can use `usort()` and `strcmp()` to compare the values and determine which one should go first.

```php
$basket = [
  [0] => [
    ['name'] => 'oranges'
  ],
  [1] => [
    ['name'] => 'lemons'
  ],
  [2] => [
    ['name'] => 'apples'
  ]
];

usort($basket, function ($left, $right) {
  return strcmp($left['name'], $right['name']);
});
```
<br/>

### Merge/Reduce arrays ###

Arrays can also be reshaped in many ways: sliced, concatenated, resized and merged.

- `array_merge()`: concatenates two arrays, joins them together. It considers that the first array passed is the "head" and the second is the "tail".

- `array_slice()`: from a sequential input array, it extracts elements based on parameters.

- `array_shift()`: removes an element from the beginning of the array.

- `array_unshift()`: adds an element at the beginning of the array.

- `array_pop()`: removes an element from the end of the array.

- `array_push()`: adds an element at the end of the array.

- `array_unique()`: returns only unique values of an array.

Note that `array_merge()` truly merges both arrays, as opposed to + which takes into account the keys that are in use and ignores them when adding the arrays.

```php
$one = [1, 2, 3];
$two = [4, 5, 6, 7, 3, 2];

print_r(array_merge($one, $two));
/*
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
    [5] => 6
    [6] => 7
    [7] => 3
    [8] => 2
)
*/
print_r($one + $two);
/*
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 7
    [4] => 3
    [5] => 2
)
*/
```
<br/>

### Array keys and values ###

There are also functions in PHP to access parts of associative arrays:

- `array_keys()`: this function takes an associative array and returns a sequential array of its keys.

- `array_values()`: this function takes an associative array and returns a sequential array of its values.

- `array_combine()`: takes two sequential arrays and combines them into an associative array, one of them is used for the keys and the other for the values.

- `range()`: this function produces an array of elements within a range.

- `array_key_exists()`: determines if a key exists in an array. It is similar to using `isset()`.

- `in_array()`: determines if a value exists in an array.

- `array_column()`: this function takes an array whose elements are arrays, and extracts the values at a key.
<br/>

## HTML & HTML forms ##

html5doctor site
html5pattern site


**Do exercise 13 for homework**
**Read 287 to 330**
