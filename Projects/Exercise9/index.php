<?php

echo 'What is your favourite colour?', PHP_EOL;
$favourites = [];
$favourites[] = stream_get_line(STDIN, 100, "\n");

echo 'What is your favourite food?', PHP_EOL;
$favourites[] = stream_get_line(STDIN, 100, "\n");

echo 'What is your favourite place?', PHP_EOL;
$favourites[] = stream_get_line(STDIN, 100, "\n");

echo PHP_EOL;
echo 'We are going to print your favourite things with a for loop:', PHP_EOL;
for ($i = 0; $i < count($favourites); $i++) {
    echo "$favourites[$i]\n";
}

echo PHP_EOL;
echo 'We are going to print your favourite things with a foreach loop:', PHP_EOL;
foreach ($favourites as $favourite) {
    echo $favourite, PHP_EOL;
}