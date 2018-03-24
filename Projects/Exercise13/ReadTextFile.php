<?php

$filename = 'people.txt';

echo 'Reading from the file with fgets():', PHP_EOL, PHP_EOL;
$file = fopen($filename, 'r');

while (!feof($file) && $row = fgets($file)) {
    if (!preg_match('/\w/', $row)) {
        break;
    }

    $details = explode("\t", $row);
    foreach ($details as $data) {
        echo $data, PHP_EOL;
    }
}
fclose($file);
echo str_repeat('-', 50), PHP_EOL;


echo 'Reading from the file with file_get_contents():', PHP_EOL, PHP_EOL;
$file_contents = trim(file_get_contents($filename));

$rows = explode("\n", $file_contents);

foreach ($rows as $row) {
    $details = explode("\t", $row);
    foreach ($details as $data) {
        echo $data, PHP_EOL;
    }
    echo PHP_EOL;
}
echo str_repeat('-', 50), PHP_EOL;

echo 'Reading from the file with file():', PHP_EOL, PHP_EOL;
$file_array = file($filename);

foreach ($file_array as $element) {
    $details = explode("\t", $element);
    foreach ($details as $data) {
        if (!preg_match('/\w/', $data)) {
            break;
        }
        
        echo $data, PHP_EOL;
    }
}