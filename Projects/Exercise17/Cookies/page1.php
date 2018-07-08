<?php

setcookie('username', 'yoko');

$oneWeek = time() + (60 * 60 * 24 * 7);
setcookie('salesoffer', '50percent', $oneWeek);
// time() returns the time in seconds since the epoch

$past = time() - 1;
setcookie('salesoffer', '50percent', $past);
// setting the time in the past to expire a cookie
header('Location: page2.php');
print_r($_COOKIE);
