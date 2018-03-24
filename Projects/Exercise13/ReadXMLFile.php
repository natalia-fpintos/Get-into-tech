<?php

$filename = 'Books.xml';

$xmlFile = simplexml_load_file($filename) or die("Error loading XML file.\n");

foreach ($xmlFile->children() as $book) {

    print_r($book);
    foreach ($book as $key => $value) {
        echo ucwords($key), ": $value", PHP_EOL;
        // echo ucwords($key), ': ', $book->$key, PHP_EOL;
    }
    echo PHP_EOL;
}

