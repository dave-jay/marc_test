<?php

/**
 *   Write a function named mysort(), which:
 *   accepts N string arguments
 *   perform a sort operation on those arguments
 *   returns as a string, in decreasing order, the sorted values separated by a comma ','
 *   You must implement a sorting algorithm from scratch, without using any built-in sorting libraries or functions. 
 *   You may use the algorithm of your choice (eg. bubble sort, merge sort etc).
 * 
 * 
 */
function jSort() {
    $args = func_get_args();

    if (empty($args)) {
        return '';
    }

    $length = count($args);
    
     $i = $length;
    while ($i > 0) {
        $i--;
        for($j=0;$j<$i;$j++){
            $next_index = $j+1;
            if($args[$j]>$args[$next_index]){
                $temp = $args[$j];
                $args[$j] = $args[$next_index];
                $args[$next_index] = $temp;
            }
        }
    }
    return implode(",",$args);
}

print jSort("z","b", "c", "a","d","e");
?>