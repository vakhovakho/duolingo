<?php

function printArray($arr) {
    print("<pre>".print_r($arr,true)."</pre>");
}

function sortByTranslationsCount($a,$b)
{   
    $count1 = count($a['translations']);
    $count2 = count($b['translations']);
    if($count1 === $count2) {
        return 0;
    }

    return ($count1 > $count2) ? -1 : 1;
}