<?php

$x = 0;
echo $x . " - ноль.</br>";
do {
    if ($x++ % 2)
    {
        echo $x . " - четное число.</br>";
    } else {
        echo $x . " - нечетное число.</br>";
    }
} while ($x <= 9);

?>