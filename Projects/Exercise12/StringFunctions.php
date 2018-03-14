<?php

$cats = 'I love cats!';
$dogs = 'I also love dogs!';

// nl2br()
echo '______nlbr()_______', PHP_EOL;
$nlString = "I also\nlove dogs!\n";
$brString = nl2br($nlString);

echo $nlString, PHP_EOL;
echo $brString, PHP_EOL;

// printf() vs. sprintf()
echo '_______printf() vs. sprintf()_______', PHP_EOL;
echo 'printf() prints a string with format (no need for echo): ';
printf("$cats %s", $dogs);
echo PHP_EOL;

echo 'sprintf() returns a string with format: ', sprintf("$cats %s", $dogs), PHP_EOL;
echo PHP_EOL;

// str_word_count()
echo '_______str_word_count()_______', PHP_EOL;
echo 'The no. of words in $cats is ', str_word_count($cats), PHP_EOL;
echo PHP_EOL;

// strlen()
echo '_______strlen()_______', PHP_EOL;
echo 'The length of $cats is ', strlen($cats), PHP_EOL;
echo PHP_EOL;

// strpos(), stripos(), strrpos(), strripos()
echo '_______strpos() vs. stripos()_______', PHP_EOL;
echo 'The position of the letter "c" in "I love cats" is: ', strpos($cats, 'c'), PHP_EOL;
echo 'We can do a case-insensitive search too, "C" in "I love cats" is: ', stripos($cats, 'C'), PHP_EOL;
echo PHP_EOL;

echo '_______strrpos() vs. strripos()_______', PHP_EOL;
echo 'The last position of the letter "o" in "I also love dogs" is: ', strrpos($dogs, 'o'), PHP_EOL;
echo 'We can do a case-insensitive search too, the last "O" in "I also love dogs" is: ', strripos($dogs, 'O'), PHP_EOL;
echo PHP_EOL;

// trim(), rtrim(), ltrim()
echo '_______trim() vs. rtrim() vs. ltrim()_______', PHP_EOL;
$spaces = '    hello    ';
echo "Before trim(): $spaces. After trim(): ", trim($spaces), PHP_EOL;

$rl_trim = '%%%%%hello//////';
echo "Before rtrim() of trailing slashes: $rl_trim. After rtrim(): ", rtrim($rl_trim, '/'), PHP_EOL;
echo "Before ltrim() of leading %: $rl_trim. After ltrim(): ", ltrim($rl_trim, '%'), PHP_EOL;
echo PHP_EOL;

echo '"nd Parameter of _______trim() vs. rtrim() vs. ltrim()_______', PHP_EOL;
$str1 = 'you are my sunshine';
echo "Before trim(): $str1", PHP_EOL; 
echo "After trim() with 'you': ", trim($str1, 'you'), PHP_EOL;
echo "After trim() with 'you are m': ", trim($str1, 'you are m'), PHP_EOL;
echo PHP_EOL;
echo "2nd parameter is a collection of char, if very left of very right of the letter matched to one of the letters in 2nd parameter, the letter will get trimmed", PHP_EOL;
echo PHP_EOL;
echo "After rtrim() with 'eunsih': ", rtrim($str1, 'eunsih'), PHP_EOL;

// str_replace()
echo '_______str_replace()_______', PHP_EOL;
echo "Replacing spaces for commas in 'I love cats!': ", str_replace(' ', ',', $cats), PHP_EOL;
echo PHP_EOL;

// str_split() and join()
echo '_______str_split() vs. join()_______', PHP_EOL;
echo "Split array: ", PHP_EOL;
$split_string = str_split($cats);
print_r($split_string);
echo PHP_EOL;

echo "Join array: ", PHP_EOL;
$join_array = join($split_string);
echo $join_array, PHP_EOL;
echo PHP_EOL;

// strtolower(), strtoupper(), ucwords(), ucfirst()
echo '_______strtolower() vs. strtoupper()_______', PHP_EOL;
echo 'Using strtolower(): ', strtolower($cats),  PHP_EOL;
echo 'Using strtoupper(): ', strtoupper($dogs),  PHP_EOL;
echo PHP_EOL;

echo '_______ucwords() vs. ucfirst()_______', PHP_EOL;
echo 'Using ucwords(): ', ucwords($cats),  PHP_EOL;
echo 'Using ucfirst(): ', ucfirst($dogs),  PHP_EOL;
echo PHP_EOL;

// substr()
echo '_______substr()_______', PHP_EOL;
echo 'Using substr() in "I love cats!", starting in position 7: ', substr($cats, 7),  PHP_EOL;
echo PHP_EOL;

// strcmp()
echo '_______strcmp()_______', PHP_EOL;
echo 'Using strcmp() to compare $cats and $dogs: ', strcmp($cats, $dogs),  PHP_EOL;
echo 'strcmp() returns 0 if equal (case-sensitive)', PHP_EOL;
echo 'It returns > 0 if the first string is greater (as in alphabetical order)', PHP_EOL;
echo 'It returns < 0 if the second string is greater (as in alphabetical order)', PHP_EOL;
echo 'a vs b: ', strcmp('a', 'b'),  PHP_EOL;
echo 'cats vs. caterpillars: ', strcmp('cats', 'caterpillars'),  PHP_EOL;
echo PHP_EOL;

// strncmp()
echo '_______strncmp()_______', PHP_EOL;
echo 'Using strncmp() to compare the first 3 characters of "cat" and "caterpillars": ', strncmp('cat', 'caterpillars', 3), PHP_EOL;
echo PHP_EOL;

// strcasecmp()
echo '_______strcasecmp()_______', PHP_EOL;
echo 'Comparing with strcasecmp() is case insensitive. "A" vs "a" is: ', strcasecmp('A', 'a'),  PHP_EOL;
echo PHP_EOL;

// strncmp()
echo '_______strncmp()_______', PHP_EOL;
echo 'Using strncasecmp() to compare (case-insensitive) the first 3 characters of "CAT" and "caterpillars": ', strncasecmp('cat', 'caterpillars', 3), PHP_EOL;
echo PHP_EOL;
