<?php

/*
LETTER SHIFT
ok, alphabet shift array and input array and empty result array 

iterate thru arrays,
if match, take key letter, put in result array
$alph = array(
    'a' => 'b','b' => 'c', 'c' => 'd', 'd' => 'e', 'e' => 'f', 'f' => 'g', 'g' => 'h', 'h' => 'i',
     'i' => 'j', 'j' => 'k', 'k' => 'l', 'l' => 'm', 'm' => 'n', 'n' => 'o', 'o' => 'p', 'p' => 'q',
     'q' => 'r', 'r' => 's', 's' => 't', 't' => 'u', 'u' => 'v', 'v' => 'w', 'w' => 'x', 'x' => 'y',
     'y' => 'z', 'z' => 'a')
 associative array!!

*/
session_start();


//var_dump($_GET['input']);

$input = $_GET['input'];

//$inArray = str_split($input);
//$count = 0;
$isPali = palindrome($input);
$vowelCount = theCount($input);


function palindrome($string){
    $tupni = strrev($string);
    //echo($tupni);
    if ($string === $tupni){
        return " is a palidrome!";

    }else{
        return " is not a palidrome";
    }
}
function theCount($string){
    $inArray = str_split($string);
    $count = 0;
    foreach ($inArray as &$value) {
        if($value === 'a' or $value === 'e' or $value === 'i' 
        or $value === 'o' or $value === 'u'){
            $count++;
        }
    }
    return $count;

}

//echo($input);
//var_dump($isPali);
//echo($vowelCount);

$_SESSION['results'] = [
    'vowelCount' => $vowelCount,
    'isPali' => $isPali,
    'input' => $input,
];
//require 'index-view.php';
header('Location: index.php');