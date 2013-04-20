<?php

/*
  Write a function

  function truncateString($s, $len, $etc = ‘...’, $break_words = false, $middle = false)
  {
     
  }

  which will truncate the string $s to the given length $len.

  Following are the function arguments:
  · string $s — UTF-8 string to process;
  · int $len — the desired length of the string, determines how many characters to truncate to
  · string $etc — text string that replaces the truncated text, its length is included in the $len argument
  · boolean $break_words — whether or not to truncate at a word boundary (false) or at the exact character (true).
  When false and the first word is longer than $len characters, return the first $len-strlen($etc) characters of the first word

  · boolean $middle — whether the truncation happens at the end of the string (false)
  or in the middle of the string (true). When true, word boundaries are ignored.

  $s = ‘Two Sisters Reunite after Eighteen Years at Checkout Counter.’;
  truncateString($s, 30, ‘’) will return Two Sisters Reunite after
  truncateString($s, 30, ‘===’) will return Two Sisters Reunite after===
  truncateString($s, 30) will return Two Sisters Reunite after...
  truncateString($s, 30, ‘’, true) will return Two Sisters Reunite after Eigh
  truncateString($s, 30, ‘...’, true) will return Two Sisters Reunite after E...
  truncateString($s, 30, ‘..’, true, true) will return Two Sisters Re..ckout Counter.

 */

function truncateString($s, $len, $etc = '...', $break_words = false, $middle = false) {

    if ($middle == true) {
        $len = $len-strlen($etc);
        $len = intval($len/2);
        $first_part = mb_substr($s,0,$len);
        $last_part = mb_substr($s,mb_strlen($s)-$len,$len,'UTF-8');
        return $first_part . $etc . $last_part;
    } else if ($break_words == true) {
        $sub_str = mb_substr($s, 0, $len - mb_strlen($etc,'UTF-8'),'UTF-8');
        $return = $sub_str;
    } else {
        $s = mb_substr($s, 0, $len,'UTF-8');
        $return = mb_substr($s, 0, mb_strrpos($s, ' '),'UTF-8');
    }
    return $return . $etc;
}

$s = 'Two Sisters Reunite after Eighteen Years at Checkout Counter.';

print truncateString($s, 30);
print "<br>";
print truncateString($s, 30, "===");
print "<br>";
print truncateString($s, 30, '...', true);
print "<br>";
print truncateString($s, 30, '..', true,true);
?>