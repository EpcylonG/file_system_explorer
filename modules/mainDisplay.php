<?php

function displayAll($path) {
    $array = scandir($path);

    unset($array[array_search('.', $array, true)]);
    unset($array[array_search('..', $array, true)]);
    unset($array[array_search('.DS_Store', $array, true)]);

    return $array;
}

?>