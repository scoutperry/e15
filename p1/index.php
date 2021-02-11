<?php

/*
1) PALINDROME
input is a str, is there a reverse string function?
if input = reversed string, true = palindrome
2) VOWEL COUNT
input is a string,
convert string to an array,
make a vowel array???
make a (global) variable called "$count"
iterate thru input array, does it match a, e, i, o, u? 
if true count plus one

3) LETTER SHIFT
ok, alphabet shift array and input array and empty result array 

iterate thru arrays,
if match, take key letter, put in result array
$alph = array(
    'a' => 'b',
    'b' => 'c',
    'c' => 'd',
    'd' => 'e',
    'e' => 'f',
    'f' => 'g',
    'g' => 'h',
    'h' => 'i',
    'i' => 'j',
    'j' => 'k',
    'k' => 'l',
    'l' => 'm',
    'm' => 'n',
    'n' => 'o',
    'o' => 'p',
    'p' => 'q',
    'q' => 'r',
    'r' => 's',
    's' => 't',
    't' => 'u',
    'u' => 'v',
    'v' => 'w',
    'w' => 'x',
    'x' => 'y',
    'y' => 'z',
    'z' => 'a')
 associative array!!
*/
$input = 'racecar';
//$inArray = str_split($input);
//$count = 0;
$isPali = palindrome($input);
$vowelCount = theCount($input);


function palindrome($string){
    $tupni = strrev($string);
    //echo($tupni);
    if ($string === $tupni){
        return true;

    }else{
        return false;
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



echo($input);
var_dump($isPali);
echo($vowelCount);


require 'index-view.php';