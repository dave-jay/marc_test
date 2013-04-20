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

    // if empty return blank :)
    if (empty($args)) {
        return '';
    }

    // get the iteration count
    $length = count($args);


    // so its length * length - 1
    // i.e for 9 strings, we have to compare, 8 times 9
    $i = $length;
    while ($i > 0) {
        $i--;

        // compare adjustance.
        for ($j = 0; $j < $i; $j++) {
            $next_index = $j + 1;
            if ($args[$j] > $args[$next_index]) {
                $temp = $args[$j];
                $args[$j] = $args[$next_index];
                $args[$next_index] = $temp;
            }
        }
    }
    return implode(",", $args);
}
print jSort("z", "b", "c", "a", "d", "e");
?>