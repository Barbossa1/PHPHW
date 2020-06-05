<?php

$a = 2;
$b = 4;
if ($a >= 0 && $b >= 0) {
    echo ($b - $a);
} elseif ($a <= 0 && $b <= 0) {
    echo ($b * $a);
} elseif ($a > 0 && $b < 0 || $a < 0 && $b > 0) {
    echo ($b + $a);
}

?>