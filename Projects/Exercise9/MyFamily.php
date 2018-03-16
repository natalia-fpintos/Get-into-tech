<?php

$family = [
    'Mom' => [
        'name' => 'Marge', 
        'age' => 43, 
        'hair' => 'brown'
        ],
    'Dad' => [
        'name' => 'Homer', 
        'age' => 46, 
        'hair' => 'brown'
        ],
    'Sister' => [
        'name' => 'Lisa', 
        'age' => 8, 
        'hair' => 'brown'
        ]
];

foreach ($family as $member => $array) {
    echo "$member:", PHP_EOL;
    
    foreach ($array as $detail => $value) {
        echo "$detail: $value", PHP_EOL;
    }
    echo PHP_EOL;
}
