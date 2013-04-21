<!doctype html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    </head>
    <body>

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
                $len = $len - mb_strlen($etc, 'utf-8');
                $len = intval($len / 2);
                $first_part = mb_substr($s, 0, $len, 'utf-8');
                $last_part = mb_substr($s, mb_strlen($s, 'utf-8') - $len, $len, 'UTF-8');
                return $first_part . $etc . $last_part;
            } else if ($break_words == true) {
                $sub_str = mb_substr($s, 0, $len - mb_strlen($etc, 'utf-8'), 'utf-8');
                $return = $sub_str;
            } else {
                $s = mb_substr($s, 0, $len, 'utf-8');
                if (strrpos($s, ' ')) {
                    $s = mb_substr($s, 0, strrpos($s, ' '), 'utf-8');
                }
                $return = $s;
            }
            return ($return . $etc);
        }

        $s = 'Two Sisters Reunite after Eighteen Years at Checkout Counter.';
        $s = "अधिलोकमधिज्यौतिषमधिविद्यमधिप्रजमध्यात्मम्";

        print truncateString($s, 10, '');
        print "<br>";
        print truncateString($s, 30, "===");
        print "<br>";
        print truncateString($s, 30, '...', true);
        print "<br>";
        print truncateString($s, 30, '..', true, true);
        ?>
    </body>
</html>