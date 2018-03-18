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

echo strcasecmp($string1, $string2); // 0 (cats is equal to CATS)
```

- `strncmp()`: this is a case sensitive comparison that takes a parameter to determine how many characters to compare. It returns 0 if the substrings are identical, 1 or more if the first substring is greater than the second, and -1 or less if the first substring is smaller than the second.

```php
$string1 = 'cats';
$string2 = 'CATERPILLAR';

echo strncmp($string1, $string2, 3); // 32 (cat is greater than CAT)
```

- `strncasecmp()`: this is a case insensitive comparison that takes a parameter to determine how many characters to compare. It returns 0 if the substrings are identical, 1 or more if the first substring is greater than the second, and -1 or less if the first substring is smaller than the second.

```php
$string1 = 'cats';
$string2 = 'CATERPILLAR';

echo strcasecmp($string1, $string2, 3); // 0 (cat is equal to CAT)
```

Additionally, PHP7 introduces the "spaceship operator" <=> (combined comparison operator) which has similar semantics to strcmp():

```php
echo 'a' <=> 'a'; // 0
echo 'a' <=> 'b'; // -1
echo 'b' <=> 'a'; // 1
```
<br/>

## Regular Expressions ##

Regular expressions (regexs or REs), enable you to specify a pattern against which a string can be searched for substrings matching the pattern.

PHP uses Perl Compatible Regular Expressions (PCRE).
<br/>
<br/>

### Some functions for Regex ###

- `preg_match()`: this function uses a regular expression to search for a matching pattern in a string. It returns 1 if a match is found, 0 if it couldn't find a match, and false if there was an error. Optionally, a third parameter can be passed with a variable, where the function will save the matched string.

```php
$pattern = '/\w+/';
$myString = 'Yoko is a dog';

echo preg_match($pattern, $myString, $match); // 1
print_r($match);
/*
Array
(
    [0] => Yoko
)
*/
```

- `preg_match_all()`: works in the same way as `preg_match()`, but it performs a global search, so it can find many matches in the same string. It can also return all these matches in the optional third parameter variable.

```php
$pattern = '/\w+/';
$myString = 'Yoko is a dog';

echo preg_match_all($pattern, $myString, $match); // 1
print_r($match);
/*
Array
(
    [0] => Array
        (
            [0] => Yoko
            [1] => is
            [2] => a
            [3] => dog
        )

)
*/
```

- `preg_replace()`: this function uses a regular expression to look for a match, and replaces it with a different string. Then it returns the altered string.

```php
$pattern = '/\w+/';
$myString = 'Yoko is a dog';

echo preg_replace($pattern, 'XXX', $myString); // XXX XXX XXX XXX
```

- `preg_split()`: this function works in a similar way as `explode()` but using a regular expression to split the string and save the results in an array.

```php
$pattern = '/\s/';
$myString = "Yoko is\ta dog";

$result = preg_split($pattern, $myString);
print_r($result);
/*
Array
(
    [0] => Yoko
    [1] => is
    [2] => a
    [3] => dog
)
*/
```
<br/>

### Grouping ###

Regular expressions can use capture groups `()` to group characters and apply quantifiers.

```php
$pattern = '/([A-Z][0-9])+/';
$myString = 'ABA2A345';
preg_match($pattern, $myString, $match);
print_r($match);
/*
Array
(
    [0] => A2A3
    [1] => A3 -> The last match of the capture group
)
*/
```
<br/>

### Back references ###

Back references for regular expressions are based on the content of capture groups. Their syntax is a backslash followed by a number, which represents the number of the capture group (i.e. 1 for the first capture group, 2 for the second, etc).

```php
$pattern = '/([A-Z])([0-9])+\1/';
$myString = 'ABA2A345';
preg_match($pattern, $myString, $match);
print_r($match);
/*
Array
(
    [0] => A2A
    [1] => A
    [2] => 2
)
*/
```
<br/>

## Number formatting ##

The `number_format()` function returns a string that contains a number using the numerical punctuation format specified. It can also specify the number of decimal places.

```php
$salary = 33452.34;

echo number_format($salary, 1, ',', '.'); // 33.452,3
```
<br/>

## Binary Calculator ##

PHP provides the `bcmath` library (Binary Calculator Math) for arbitrary precision mathematics. It supports numbers of any size and precision, represented as strings, to perform calculations that must be accurate to a high number of decimal places.

```php
echo bcadd('2.345', '3.791'); // 6.136
```

## File IO ##

PHP supports file input/output as most programming languages. Simple text files are suitable for relatively small amounts of data, or data held sequentially such as log files. Reading such files is normally sequential, you start at the beginning of the file then read each line until you find what you are looking for.
<br/>
<br/>

### Opening a file ###

In order to work with a file we first need to open it. We do so with the `fopen()` function. This returns a resource that references the file, allowing us to perform different operations with it. We specify the operations we will allow as a parameter in the `fopen()` function:

Parameter | Mode
--------- | -------
r         | Read
w         | Write. If file doesn't exist, create it. If it does exist, overwrite contents.
a         | Append. If file doesn't exist, create it. If it does exist, append contents at the end.
x         | Create and write. If file already exists, we will get an error.
r+        | Read and write
w+        | Read and write. If file doesn't exist, create it. If it does exist, overwrite contents.
a+        | Read and append. If file doesn't exist, create it. If it does exist, append contents at the end.
x+        | Create, read and write. If file already exists, we will get an error.
<br/>

### Reading from a file ###

The simplest way to read a text file is line-by-line in a loop. For this purpose we can use the `fgets()` function that reads line by line the contents of the file (or up to the maximum length specified in an optional parameter).

The `feof()` function is very useful when reading from a file, as it tests if the file pointer has reached the end of file (EOF).

```php
$file = fopen('file.txt', 'r');

while (!feof($row = fgets($file))) {
  echo $row;
}
```

We can also read from a file with other methods:

- `fread()`: this function enables us to read a specified number of bytes, which are passed as a parameter.

- `file_get_contents()`: allows us to read a file in one lump (known as *slurping*). Then it is saved inside a variable as a string, including any `\n` and other characters. It doesn't require to open or close the file.

- `file()`: similar to `file_get_contents()`, it reads the whole file by *slurping* and saves each line in an indexed array. It doesn't require to open or close the file.
<br/>

### Writing to a file ###

We can write to a file with the function `fwrite()` or `fputs()`, both are the same. These functions return the number of bytes that were written. Also, we can specify the maximum number of bytes we want to write.

```php
$file = fopen('file.txt', 'a');
fwrite($file, "A new line!\n");
```

We can also write to a file with other methods:

- `file_put_contents()`: this function is the opposite of slurp. It puts the value of a variable (which can be a scalar variable or an array) into a file. Optionally we can specify flags to control what we write. A common flag used is `FILE_APPEND` (if file $filename already exists, append the data to the file instead of overwriting it). This function doesn't require to open or close the file.
<br/>

### Testing before using a file ###

It is good practice to test for errors when reading or writing to files:

- `is_readable()`: checks if we have read permissions.
- `is_writable()`: checks if we have write permissions.
- `file_exists()`: checks if a file or directory exists.
<br/>

### Other file functions ###

We have other useful file functions:

- `fflush()`: this function forces a write of all buffered output to the resource in the file handle.

- `fileperms()`: gets permissions for the file as a numeric mode value.

- `highlight_file()`: prints or returns the code contained in a file highlighting the syntax.

- `touch()`: if a file doesn't exist, it will be created. If it does exist, it sets the access and modification times of the file.

- `opendir()`, `readdir()`, `closedir()`: allows to iterate through a directory.

- `filesize()`: returns the size of the file in bytes.

- `filetype()`: returns the type of the file.

- `readfile()`: reads a file and writes it to stdout.

- `stream_get_line()`: reads from a file, up to a number of bytes or a delimiter.

- `unlink()`: deletes a file.
<br/>

### Directory functions ###

There a number of functions available to work with the directories:

- `chdir()`: changes the directory.
- `chroot()`: changes the root directory.
- `closedir()`: closes the directory in the handle.
- `dir()`: returns an instance of the Directory class.
- `getcwd()`: returns the current working directory.
- `opendir()`: open directory handle.
- `readdir()`: reads an entry from the directory handle.
- `rewinddir()`: rewinds the directory handle.
- `scandir()`: lists the files and directories inside the specified path.
<br/>

## XML ##

The Extensible Markup Language (XML) is a popular data exchange format, which allows us to structure data for storing and transporting across the web or between organisations. This markup language consists of a hierarchical structure similar to HTML, but the tags are customised to describe the data they contain, as well as the properties of the elements. It was designed to be human and machine readable.

XML documents consist of elements, attributes and text nodes. An XML tree starts at a root element and branches from the root to child elements.

The XML prolog is optional, it must come first in the document:

```xml
<?xml version=‘1.0’ encoding=‘UTF-8’ ?>
```

In XML, it is illegal to omit the closing tag. Also, XML tags are case sensitive. The tag `<Note>` is different from the tag `<note>`. Therefore opening and closing tags must be written with the same case.
<br/>
<br/>

### Reading XML ###

We can read XML from a variable (stored as a string) with the `simplexml_load_string()` function. This returns an object of type SimpleXMLElement.
