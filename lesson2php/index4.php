<?php

function mathOperation($a, $b, $operation)
{
    
    if ($operation == "плюс") {
        return ($a + $b);
    } elseif ($operation == "минус") {
        return ($a - $b);
    } elseif ($operation == "умножение") {
        return ($a * $b);
    } elseif ($operation == "деление") {
        return ($a / $b);
    }
}

echo mathOperation(6, 3, "плюс");

?>