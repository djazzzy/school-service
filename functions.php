<?php

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function snilsFormat($value) {
    return preg_replace("/^(\d{3})(\d{3})(\d{3})(\d{2})$/", "$1-$2-$3 $4", $value);
}
?>