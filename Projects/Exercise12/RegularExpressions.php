<?php

$str = "The cat ate fish";

echo "______preg_split('/[\s,]+/', '$str')_______", PHP_EOL;
$result_preg_s = preg_split("/[\s,]+/", $str);
print_r($result_preg_s);
echo PHP_EOL;

echo "______str_split('$str', 4)_______", PHP_EOL;
$result_str_s = str_split($str, 4);
print_r($result_str_s);
echo PHP_EOL;

echo "______explode(' ', $str)_______", PHP_EOL;
$result_explode = explode(' ', $str);
print_r($result_explode);
echo PHP_EOL;

echo '______preg_match()_______', PHP_EOL;
preg_match('/([A-Z][a-z]*|[a-z]*)/', $str, $matched);
print_r ($matched);
echo PHP_EOL;

echo '______preg_match_all()_______', PHP_EOL;
preg_match_all('/([A-Z][a-z]*|[a-z]*)/', $str, $matchedAll);
print_r ($matchedAll);
echo PHP_EOL;

echo '______preg_replace()_______', PHP_EOL;
$result_preg_rep = preg_replace('/cat/', 'dog', $str);
print_r($result_preg_rep);
echo PHP_EOL, PHP_EOL;

echo '______Finding postcodes_______', PHP_EOL;
$address = 'Sky News Grant Way TW7 5QD Isleworth';
echo 'We can use this to identify a postcode inside an address line:', PHP_EOL;
echo $address, PHP_EOL;
preg_match_all('/[A-Z]{1,2}+\d{1,2}[A-Z]? \d[A-Z]{2}/', $address, $postcode);
print_r($postcode);
echo PHP_EOL;
