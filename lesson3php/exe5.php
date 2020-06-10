<?php

function nospace($text)
{
    $colob = [
        " " => "_",    
    ];

    $comp = strtr($text, $colob);
    echo "$comp";
}

nospace("привет как дела");

?>