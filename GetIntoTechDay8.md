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

### Array iteration ###

We have a handful of functions that allow us to iterate through the contents of an array:

- `array_map()`: this function applies a callback function to each element of an array and returns an array with the result of each of the function return values.

- `array_filter()`: applies a callback function (a predicate function) that returns true or false. If the function returns true for the element, it will keep the value in the returned array. If it returns false, it will remove the value.

- `array_walk()`: this function applies a callback function to each element of an array, but it discards the return values.

- `array_walk_recursive()`: this function applies a callback function to each element of an array, but it discards the return values. It is used for nested arrays.
<br/>

### Transforming arrays ###

Transforming the data in one array and returning it in a return array is known as **functional programming**.

```php
$input = range(0, 8, 2); // produces [0, 2, 4, 6, 8]
$transformer = function ($element) {
  return $element ** 2;
};

$output = array_map($transformer, $input);
```
<br/>

### Closures & Function dereferencing ###

A closure is a function that has its own environment. Inside this environment, at least there should be one bound variable.

For example, this would happen when we create a function that takes a parameter, which is then used in an inner function that is returned. When we call the outer function, our parameter is bound to the inner function, so when we call the inner function it will always have the same bound parameter.

This way, functions can return functions that can be used directly, using the function as a value.

```php
// This is a closure
function messageType($type) {
  return function ($message) use($type) {
    return $type . $message;
  }
}

$sayName = messageType("My name is ");

// This is dereferencing a function
echo $sayName("Yoko"); // My name is Yoko
```
<br/>

### Calling functions ###

It is possible to assign a variable to a function and then call it as if it was the function:

```php
$upperCase = 'ucwords';

echo $upperCase("hello, world!"); // Hello, World!
```

We can also do this in a similar way with these functions:

- `call_user_func()`: it gets a function name and its parameter as strings.

- `call_user_func_array()`: this function treats a single array passed as a parameter as sequential arguments passed to the function called. It is equivalent to using the unpacking operator `...$array`.

- `function_exists()`: takes a function name and returns true if the function exists.

- `get_defined_functions()`: returns an array with the names of all the functions defined.
<br/>

### Dynamic dispatch ###

Calling a function using a string version of its name is known as **dynamic dispatch**. This is dynamic because the function that gets called depends on a variable which might change at runtime.

```php
function websiteA ($domain, $page) {
  echo 'A';
}

function websiteB ($domain, $page) {
  echo 'B';
}

$url = 'www.example.com/A';
$urlParts = explode("/", $url);

call_user_func_array('website' . $urlParts[1], $urlParts); // This calls websiteA() with the parameters inside $urlParts

$function = "website{$urlParts[1]}";
```

## HTML & HTML forms ##

html5doctor site
html5pattern site


**Do exercise 13 for homework**
**Read 287 to 330**
