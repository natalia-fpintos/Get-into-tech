<?php

include 'library/maths/mathsA.php';
include 'library/maths/mathsB.php';

use function library\maths\doMathsB;

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

$operation = getOperation();
$num1 = getNum('first');
$num2 = getNum('second');

echo PHP_EOL;
echo '╔═════════════════════╗', PHP_EOL;
echo '║       Result        ║', PHP_EOL;
echo '╚═════════════════════╝', PHP_EOL;
echo $num1, ' ', $operation, ' ', $num2, ' = ';
//echo doMathsA($num1, $num2, $operation);
echo doMathsB($num1, $num2, $operation);

