<?php

$existing_path = get_include_path();
$new_path = dirname(__FILE__) . "/library/maths";

set_include_path($existing_path . PATH_SEPARATOR . $new_path);

include 'mathsB.php';

echo '╔═════════════════════╗', PHP_EOL;
echo '║      Calculator     ║', PHP_EOL;
echo '╚═════════════════════╝', PHP_EOL;
echo 'Use the following commands to perform operations:', PHP_EOL;
echo '╔═══════════╤═════════╗', PHP_EOL;
echo '║ Operation │ Command ║', PHP_EOL;
echo '╟ ───────── ┼ ─────── ╢', PHP_EOL;
echo '║ Sum       │    +    ║', PHP_EOL;
echo '║ Substract │    -    ║', PHP_EOL;
echo '║ Multiply  │    *    ║', PHP_EOL;
echo '║ Divide    │    /    ║', PHP_EOL;
echo '║ Exponent  │    **   ║', PHP_EOL;
echo '╚═══════════╧═════════╝', PHP_EOL, PHP_EOL;

$operation = \library\maths\getOperation();
$num1 = \library\maths\getNum('first');
$num2 = \library\maths\getNum('second');

echo PHP_EOL;
echo '╔═════════════════════╗', PHP_EOL;
echo '║       Result        ║', PHP_EOL;
echo '╚═════════════════════╝', PHP_EOL;
echo $num1, ' ', $operation, ' ', $num2, ' = ';
echo \library\maths\doMathsB($num1, $num2, $operation);

