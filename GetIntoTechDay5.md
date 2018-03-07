# Get Into Tech: Day 5 #

## Empty() and Isset() ##

The language constructs `empty()` and `isset()` can be used to determine the value of a variable

**empty()** - Determines if a variable is considered to be empty. That is, it returns TRUE it does not exist or if its value equals FALSE. Otherwise it returns FALSE.

The following are considered to be empty:
  - array() (an empty array)
  - '' (an empty string)
  - 0
  - 0.0
  - '0'
  - NULL
  - FALSE
  - $var (an uninitialised variable)

**isset()** — Determines if a variable is set and is not NULL. It returns TRUE if the variable exists and has a value other than NULL. Otherwise, it returns FALSE.

The difference between both is that `empty()` determines if a value is falsey, while `isset()` determines if a value is not null or null-like.
<br/>
<br/>

## Arrays ##

There are 3 types of arrays:
- Indexed Arrays: numeric indexes
- Associative Arrays: named keys and also indexes
- Multidimensional Arrays: contains one or more arrays

The [] used to access the elements of an array is called "subscript".
<br/>
<br/>

### Indexed arrays ###

Indexed arrays are collections of comma separated values, where each value corresponds to an integer key, starting at 0.

We access the elements of the array with bracket notation. We can also add/overwrite elements with the same bracket notation.

```php
$myArray = ['a', 'b', 'c'];
echo $myArray[0]; // 'a'

$myArray[0] = 'j';
echo $myArray[0]; // 'j'

$myArray[3] = 'd';
echo $myArray[3]; // 'd'
```
<br/>

### Associative arrays ###

Associative arrays are collections of comma separated values where each value corresponds to a key that doesn't need to be sequential.

We create these with the fat arrow syntax (=>) and access them with bracket notation. We can also add/overwrite elements with the same bracket notation.

```php
$person = [
  'name' => 'Sherlock',
  'surname' => 'Holmes'
  'age' => 27
];

$dog = [];
$dog['name'] = 'Yoko';
$dog['age'] = 11;

echo $dog['age']; // 11

$dog['age'] = 12;
echo $dog['age']; // 12
```

Associative arrays can have different kinds of data types, and also different data types for the indexes/keys.

Note that the keys don't necessarily need to be strings. For this reason, we'd say that in PHP all arrays are actually associative arrays.

If you do not specify a key for an element, PHP will always assign it the integer that is next in sequence.

```php
$mixedArray = [
  0 => 'a',
  1 => 'b',
  'c',
  'myKey' => 'd',
  'e'
];

print_r($mixedArray);

/*
Array
(
    [0] => a
    [1] => b
    [2] => c
    [myKey] => d
    [3] => e
)
*/
```
<br/>

### Array functions ###

There are a number of functions used for arrays.

`count()` is used to get the length of the array.

`sizeof()` is similar to count() but rarely used.

`print_r()` prints the array values and indexes (but not the data type or length).
<br/>
<br/>


### Array operations ###

In order to **append** to an existing array we use the bracket notation.

```php
$myArray = [];
$myArray[0] = 'hi';
$myArray['bye'] = 'goodbye';

print_r($myArray);
/*
Array
(
    [0] => hi
    [bye] => goodbye
)
*/
```

We can also **add** arrays with the `+` operation. This creates a resulting array that contains only unique keys, if any duplicates are found, only the first one is kept.

```php
$connection = [
  'host' => 'localhost',
  'port' => 8080
];

$connection2 = [
  'port' => 80,
  'database' => 'users'
];

$finalArray = $connection + $connection2;

print_r($finalArray);

/*
Array
(
    [host] => localhost
    [port] => 8080
    [database] => users
)
*/
```
<br/>

### Unpacking arrays ###

**list()** is a language construct that assigns items from an array to variables.

```php
$person = ['Nat', 'London'];
list($name, $location) = $person;

echo $name, ' is in ', $location; // Nat is in London
```

**explode()** is a function that splits a string into a sequential array, based on a parameter (i.e. a space).

```php
$sentence = 'I like dinosaurs';
$array = explode(' ', $sentence);

print_r($array);

/*
Array
(
    [0] => I
    [1] => like
    [2] => dinosaurs
)
*/
```

We can check if a key in an array exists by using `isset()` or `array_key_exists()`.

Using the later is a little more expensive (slower) as it's a function rather than a language construct.

If you need to differentiate between a NULL array key and a non-existent key, then you need to use array_key_exists().
<br/>
<br/>

### Constant arrays ###

We can have constant arrays too. These are specified in uppercase.

```php
const FILES = [
  'home/index.html',
  'images/logo.jpg'
];
```
<br/>

## Loops ##

There are four different types of loops in PHP:
- **For loop:** loops through a block of code for a specified number of times.

```php
for ($i = 0; $i < 10; $i++) {
  echo $i, "\n";
}
// Prints numbers from 0 to 9
```

- **Foreach loop:** loops through a block of code for each element in an array. The => is known as lambda.

```php
// Syntax for indexed arrays
foreach ($aray as $element) {
  echo $element, "\n";
}

// Syntax for associative Arrays
foreach ($aray as $key => $element) {
  echo $key, ': ', $element, "\n";
}
```

- **While loop:** loops through a block of code as long as the specified condition is true.

```php
while ($i < 10) {
  echo $i, "\n";
}
// Prints numbers from 0 to 9
```

- **Do... While loop:** loops through a block of code once, and then repeats the loop as long as the specified condition is true

```php
do {
  echo 'hi';
} while (false);
// This will only print 'hi' once
```

We can break out of all loops with the `break` keyword.

The `continue` keyword skips the loop to the next iteration.
<br/>
<br/>

## Flow control ##

We can control the execution of our script wiith:

**exit():** stops the execution and returns a number. It's used in production code.

**die():** stops the execution and returns a string message as a temporary error handler. Not used in production code.
<br/>
<br/>

## Functions ##

A **function signature** is the name of the function and the parameters it takes.

When we declare a function in PHP, the **parameters/arguments** are specified with the $ symbol.

```php
function say ($word1, $word2) {
  return $word1 . ' ' . $word2;
}

echo say('Hello', 'World');
// Hello World
```
<br/>

### User defined functions ###

We can create user defined functions when there are no built-in functions that do what we need.

Functions are defined using the *function* keyword, and using a name that represents the purpose of the function.

There are a few rules for the function name:
- Can start with a letter
- Can also start with an underscore
- Numbers are not allowed as the first character
- Function names are not case-sensitive
<br/>

### Default parameters ###

We can provide **default values** for our arguments in a function. If we call the function with a specific value, that one will be used. Otherwise, if the function is called without the value for the argument, the default value will be used.

```php
function defaultNum ($num = 10) {
  echo $num;
}

defaultNum(); // 10
defaultNum(30); // 30
```

### Returning values ###

A function can be returned from a function with the `return` keyword.


### Passing parameters by value and reference ###

In PHP we can pass parameters by value or by reference.

**By value:** By default we pass parameters by value. The parameter's value are copied into the function. Even if the function changes the parameter, this will not have an effect in the original variable.

**By reference:** We can also pass a parameter by reference, prepending an ampersand (&) before the argument. This way, we indicate that whichever variable we pass when calling the function will be the actual variable that the function will use and modify.

```php
function byValue ($i) {
  $i++;
}

function byReference (&$i) {
  $i++;
}

$num = 1;
byValue($num);
echo $num; // 1

byReference($num);
echo $num; // 2
```
<br/>

### Native functions and by reference ###

There are many native PHP functions that take parameters by reference (i.e. `sort()`).

Also, if you pass an undefined variable to a function that takes an argument by reference, it will not error (i.e. `preg_match()`).

**sort():** sorts an array passed as a parameter.

**preg_match():** performs a regular expression match, searching for a pattern in a string and returning any matches found. If the variable passed as parameter doesn't exist, PHP will create it and fill it with the matches.
<br/>
<br/>

## Variadic functions ##

Variadic functions use the packing operator (`...$var`) to pass a variable number of arguments. This operator always has to be the last argument in a list of arguments. It's called packing operator because it packs these in an array.

```php
function variadic (...$strings) {
  echo implode($strings);
}

variadic('this ', 'will ', 'be ', 'a ', 'string');
```

Technically all functions in PHP are variadic, we can access the arguments of a function with `func_get_args()` which returns the passed arguments as a sequential array.

```php
function nonVariadic ($args) {
  echo $args, "\n";
  echo implode(' ', func_get_args());
}

nonVariadic(1, 2, 'test');
// 1
// 1 2 test
```
<br/>

## Magic Constants ##

PHP provides a large number of predefined magic constants whose value changes depending on where they are used. These are case-insensitive but are usually written in uppercase. They use double underscores before and after their name.

**__LINE__:** depends on the line where the constant is used in the script. It represents the line number where the constant is used.

**__DIR__:** is the directory of the file where the constant is used.

**__FILE__:** is the full path and filename of the file where the constant is used.

**__FUNCTION__:** if used inside a function, it is the name of the function.

Other examples are **__CLASS__**, **__NAMESPACE__**, **__METHOD__** and **__TRAIT__**.
<br/>
<br/>

## Packing and unpacking with splat() ##

The `splat` operator (`...`) can be used inside a function definition or in a function call, and does two different things in these scenarios:

- **Splat in the function definition:**
is used to pack up arguments into an array.

```php
// Used in the function definition
function add(...$args) {
  $sum = 0;
  foreach ($args as $number) {
    $sum += $number;
  }
  return $sum;
}

echo add(1, 2, 3, 4); // 10
```


- **Splat in the function call:**
is used to unpack (or spread) the arguments from an array.

```php
// Used in the function call
function authenticate($user, $password) {
  if ($user == 'admin' && $password == 'admin') {
    echo 'user is authenticated!';
  }
}

$userDetails = ['admin', 'admin'];

authenticate(...$userDetails);
```
<br/>

## Variable lifetime and scope ##

- Variables declared in the **global scope** of the script live for the duration of the script.

- Variables declared inside a function live in the **scope of the function** for the duration of the function call.

When a function is called, all of its variables are recreated, and when the function ends these disappear.

In order to make these persist, we need to **return** their values and save them in another scope (global for example).

```php
function substract($num1, $num2) {
  return $num1 - $num2; // Local scope
}

$result = substract(5 - 2); // Result saved in the global scope
```

We can access global variables inside a local scope by using the **global keyword**. By declaring a variable or variables as global within the function, all references to these variable will refer to the global version. There is no limit to the number of global variables that can be manipulated by a function.

```php
$var1 = 10;
$var2 = 10;

function useGlobal() {
  global $var1, $var2;
  $var1++
  $var2 += 10;
}

useGlobal();
echo $var1; // 11
echo $var2; // 20
```
<br/>

## Global and Static ##

The `global` keyword can be used to change their standard lifetime characteristics, as they refer to data that lives longer than the function call. They also violate the privacy of the scope, a variable with the same name is the same variable inside and outside the function.

The `static` keyword forces a variable in a function to persist for the life of the script, so it's not deleted when the function call ends. However, it does not violate the privacy of the scope, so a variable with the same name inside the function is different than a variable with the same name outside it.

```php
$counter = 0; // global counter

function counter() {
  static $counter = 0; // local counter
  echo $counter++;
}

echo $counter; // 0 (global)
counter(); // 0 (local)
counter(); // 1 (local)
counter(); // 3 (local)
echo $counter; // 0 (global)
```
<br/>

## Disadvantages of using Static and Global ##

Functions are expected to take an input and produce an output, but the use of global and static make difficult knowing which is the actual state of a variable as they depend on "hidden" states.

Using global also tie external variables to a function and dissolve the privacy of its scope, making it hard to understand. It's easier if the variable is passed as a parameter instead.
