<?php

/**
  TASK #2
  Write a function named ‘checkdomain()’ that validates a domain name.  To be valid, the domain name must:
  - consist of two or more labels, with a dot '.' inbetween
  - have up to 63 characters in each label
  - have each label begin and end with a digit or letter
  - have digits, letters, or hyphens for all other characters in each label
  - (optional) end with an empty label such as 'domain.com.'
  - contain no more than 253 total characters, or 254 if the domain name ends with an empty label

  If the domain name is valid, the function should return 'MATCH'; if invalid, 'NO MATCH'.

  For example,

  checkdomain('0-0-0-aBc-d.com.') will return MATCH

  and

  checkdomain('-something.com') will return NO MATCH

  IMPORTANT: the function should look like this:

  function checkdomain($s)
  {
  rerturn preg_match('your regexp here', $s) ? 'MATCH' : 'NO MATCH';
  }

  That is, the task is to construct the regular expression that matches all criteria above.


 * */
function checkdomain($s) {
    return preg_match('/[a-z0-9]$/', $s) ? 'MATCH' : 'NO MATCH';
}

print checkdomain("-test.com");
?>