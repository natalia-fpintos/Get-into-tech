<?php

$basket = [
    'item1' => 'White Bread',
    'price1' => 1.05,
    'item2' => 'Brown Bread',
    'price2' => 1.25,
    'item3' => 'Milk',
    'price3' => 1.00,
    'item4' => 'Cheese',
    'price4' => 2.75
];

echo "Your basket:\n";

foreach ($basket as $item) {
    if (gettype($item) === "double") {
        echo '£', number_format($item, 2), "\n";
    } else {
        echo "$item: ";
    }
}
