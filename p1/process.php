<?php

/*
LETTER SHIFT
This was my failed attempt at the optional string processor

$isShifted = letterShift($inArray);

function letterShift($array){
    $matchArray = [];
    $alph = array(
        'z'=>'y','y'=>'x','x'=>'w','w'=>'v','v'=>'u','u'=>'t','t'=>'s',
        's'=>'r','r'=>'q','q'=> 'p', 'p'=>'o','o'=>'n','n'=>'m','m'=>'l
        ','l'=>'k','k'=>'j','j'=>'i','i'=>'h','h'=>'g','g'=>'f','f'=>'e
        ','e'=>'d','d'=>'c','c'=>'b','b'=>'a','a'=>'z');
    foreach ($inArray as &$value) {
        array_push($matchArray, array_search($value, $inArray));
    }
    return $matchArray;
}

It resulted in an array of integers with the values matching the keys. 
This leads me to think that the returned key for array_search has to be
an integer, and since I was using an associative array it just made up
key numbers? That's my guess, anyway.
*/
session_start();

$input = $_GET['input'];
$tupni = strrev($input);
$inArray = str_split($input);
$isPali = ($input === $tupni) ? " is a palidrome!" : " is not a palidrome";
$vowelCount = theCount($input,$inArray);

function theCount($string,$array){
    $count = 0;
    foreach ($array as &$value) {
        if(in_array($value,['a','e','i','o','u'])){
            $count++;
        }
    }
    return $count;
 }

$_SESSION['results'] = [
    'vowelCount' => $vowelCount,
    'isPali' => $isPali,
    'input' => $input,
    'inArray' => $inArray,
    'matchArray' => $matchArray,
];
header('Location: index.php');