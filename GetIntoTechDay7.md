# Get Into Tech: Day 7 #

## Strings ##

In PHP strings are like **arrays** of characters and an be accessed by position like an array.

However, we cannot use array functions on them. In order to use these we need to explicitly convert the string to an array.

```php
$myString = 'hello';

echo sizeof($myString); // Error, it expects an array
echo strlen($myString); // 5
```

The `array_unique()` function removes duplicates from an array. We can use this with strings if we turn the string into an array first by using the `str_split()` function:

```php
$dupes = 'aabbcc';

var_dump(array_unique(str_split($dupes)));
/*
array(3) {
  [0]=>
  string(1) "a"
  [2]=>
  string(1) "b"
  [4]=>
  string(1) "c"
}*/
```
<br/>

## String Interpolation ##

To be more clear about a variable that are including in an interpolation string, we can use curly braces around the variable. There are two different ways of doing this:

```php
$animal = 'dog';
$animals = 'sheep';

// Braces around variables
echo "My favourite animal is the {$animal}";

// Braces around variable names
echo "My favourite animals are ${animals}";
```
<br/>

## String format functions ##

- `nl2br()`: this function searches for new line characters `"\n"` in a string and adds a HTML line break `<br />` before them. Note that the new lines are preserved.

```php
$myString = "First.\nSecond.";

echo $myString;
/*
First.
Second.
*/

echo nl2br($myString);
/*
First.<br />
Second.
*/
```

- `printf()`: this function produces a formatted string as output (like `echo`) and returns either the length of the output string or a
negative value if an output error has occurred. Usually the return value is not used as it's common to have errors while outputting the string. It can be called with many parameters, the first one being the string, and the following ones the substitutions in order.

```php
$myString = 'Hello, world!';
$thisIs = "This is %b";
$true = true;

printf($myString); // Hello, world!
echo printf($myString); // Hello, world!13
printf($true); // ''
printf($thisIs, $true); // This is 1
```

- `sprintf()`: this functions returns a formatted string, which can be used with an `echo` statement if we want to. It can be called with two parameters as well, the first one being the string, and the following ones the substitutions in order.

```php
$myString = 'Hello, %s! My favourite number is %d';
$world = 'world';
$number = 4;

echo sprintf($myString, $world, $number); // Hello, world! My favourite number is 4
```
<br/>

## String format functions ##

- `str_word_count()`:

- `strlen()`: it returns the number of characters in the string, that is: letters, punctuation, numbers, etc. found in the string.

```php
$myString = "I love summer!\tIt's the best!\n";

echo strlen($myString); // 30
```

- `strpos()`: this function finds the position of the first occurrence of a substring in a string. PHP calls the string a "haystack" and the substring a "needle". If it's not found, it returns `FALSE`. It's important to consider this when checking as a position of 0 might be interpreted as a falsey.

```php
$haystack = 'I like avocado';
$needle = 'avocado';

echo strpos($haystack, $needle); // 7
```
<br/>

## String manipulation functions ##

- `trim()`: the trim function strips characters (whitespace, new lines, tabs) from the beginning and end of a string. Optionally we can specify which characters to remove. The `ltrim()` and `rtrim()` functions strip the characters from the start and end of a string.

```php
$userInput = "\t   Hello!  \n";
echo trim($userInput); // "Hello!"
echo rtrim($userInput); // "\t   Hello!"
echo ltrim($userInput); // "Hello!  \n"

$userMessage = "This is a message...";
echo trim($userMessage, '.'); // "This is a message"
```

- `str_replace()`: this function searches a main string (third parameter) for a substring (first parameter) and replaces all occurrences of the substring with another string (second parameter). Then it returns the updated string. It can also take arrays as parameters. If both the search and replace parameters are arrays, the function takes a value from each array and uses the values to
perform search and replace on the main string. Optionally the function can also take a fourth parameter which will be set to the number of replacements that were performed.

```php
$details = 'Today is #date# and my name is #name#';
echo str_replace(['#date#', '#name#'], ['Monday', 'Sherlock'], $details); // Today is Monday and my name is Sherlock

$letters = 'aaaa';
str_replace('a', 'b', $letters, $count);
echo $count; // 4
```

- `str_ireplace()`: this function works in the same way as `str_replace()`, but it is case insensitive.

```php
$details = 'Today is #DATE#';
echo str_ireplace('#date#', 'Monday', $details); // Today is Monday
```

- `substr()`: this function enables you to retrieve a portion of a string, based on its parameters. The first
parameter should be the string, the second should be the start position, and the third parameter (optional) should be the length. To extract a string from the left-hand side, use a positive number. To extract a string from the right-hand side use a negative number. The number 0 is the leftmost position, and -1 is the rightmost position. If the length is not specified, the function creates a substring from the start position to the end of the main string.

```php
$myString = 'Hello, world!';

echo substr($myString, 3); // lo, world!
echo substr($myString, 7, 2); // wo
echo substr($myString, -5, 1); // o
```

- `join()`:

- `str_split()`:

- `strtolower()`: turns the characters of a string to lowercase.

```php
$myString = 'TEST';
echo strtolower($myString); // test
```

- `strtoupper()`: turns the characters of a string to uppercase.

```php
$myString = 'test';
echo strtoupper($myString); // TEST
```

- `ucwords()`: converts the first character of each word to uppercase.

```php
$myString = 'i love ice cream';
echo ucwords($myString); // I Love Ice Cream
```

- `ucfirst()`: turns the first character of a string to uppercase.

```php
$myString = 'i love ice cream';
echo ucfirst($myString); // I love ice cream
```

- `substr()`:
<br/>

## Other ways of comparing strings ##

The most common way of comparing strings is to use double equals as a test for equality. However, this doesn't always work as PHP alters the strings in order to compare them with `==`, as it strips leading zeros.

The identically-equal-to operator `===`, doesn't do these alterations and requires exact equality of value and type.

```php
$pin = '0042';
$number = '42';

echo $pin == $number; // true
echo $pin === $number; // false
```

In order to compare strings, we can use the conventional comparison operators (== or ===), but as these can have unpredictable results, we also have a series of functions that can help, especially when sorting with `usort()`. These also allow us to do case sensitive and case insensitive comparisons, as well as determine how many characters to compare from a string.

- `strcmp()`: this is a case sensitive comparison. It returns 0 if the strings are identical, 1 or more if the first string is greater than the second, and -1 or less if the first string is smaller than the second.

```php
$string1 = 'cats';
$string2 = 'CATS';

echo strcmp($string1, $string2); // 32 (cats is greater than CATS)
```

- `strcasecmp()`: this is a case insensitive comparison. It returns 0 if the strings are identical, 1 or more if the first string is greater than the second, and -1 or less if the first string is smaller than the second.

```php
$string1 = 'cats';
$string2 = 'CATS';

echo strcasecmp($string1, $string2); // 0 (cats is equal than CATS)
```
