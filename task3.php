<?php

/**

 *  Write a function countones(), which will count the number of  1's in the binary representation of a number, 
 *  supplied as an argument and return the same
 *  For example
 *  countones(12) will return 2
 *  and
 *  countones(8) will return 1
 *
 **/


// using php lib. fuction
function countones($num){
    $decimal = decbin($num);
    return substr_count($decimal,1);
}

print countones(8);


// without php substr function
function countones_custom($num){
    $decimal = decbin($num);
    
    // 1 will be blank
    $array = explode("1",$decimal);
    $count = count($array);
    
    // remove blank entries with array filter
    $array = array_filter($array);
    $count_after_filter = count($array);
    
    // reutrn the substraction
    return $count - $count_after_filter;  
}
print countones_custom(12);

?>