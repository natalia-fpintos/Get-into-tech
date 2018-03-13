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
```

<br/>

**homework: exercise 11B, 11C and 12A**
**plus review strings + strpos(), stripos() and strripos()**
