<?php

/**
 * 
  TASK #4
  Write a function sanitize that accepts an arbitrary HTML fragment $html and the list of allowed
  tags and attributes $allowed (array('tag1' => array(), 'tag2' => array('attribute1', 'attribute2'))).
  The function should process the HTML fragment and remove all disallowed tags and tag attributes

  function sanitize($html, $allowed)
  {
      // Code goes here
  }

  For example, for HTML code:
  <div><p align='left' onclick='alert(1)'>sample <b><i>text</i></b><script>alert(2);</script></p></div>

  And the list of allowed tags/attributes:

  array('b', 'p' => array('align'))
  Also it is important that the <script> and <style> tags must be removed with all their content. This condition implies irrespective of the above conditions

  The function will return

  <p align='left'>sample <b>text</b></p>
 */
function sanitize($html, $allowed) {

    $allowed_tags = array();
    foreach ($allowed as $tag => $attr) {
        // if no attrib. are specified
        $allowed_tags[] = is_array($attr) ? $tag : $attr;
    }
    $allowed_tags = "<" . implode(">,<", $allowed_tags) . ">";
    $return = strip_tags($html, $allowed_tags);


    $matches = array();
    foreach ($allowed as $tag => $attr) {
        $allowed_attribtues = array();
        if (is_array($attr)) {
            foreach ($attr as $ea) {
                preg_match('/<'.$tag.'\s*(.*?)\s*'.$ea.'=\'(.*?)\'>/i', $return, $matches);
                // get all matched attributes and save in an array
                if ($matches[2]) {
                    $value = substr($matches[2], 0, strpos($matches[2], "'"));
                    $allowed_attribtues[] = " {$ea} = '{$value}' ";
                }
            }
            
            // now, replace all attributes with allowed content
            if (!empty($allowed_attribtues)) {
                $allowed_attribtues = implode(" ", $allowed_attribtues);
                $return = preg_replace('/<'.$tag.'\s*(.*?)\s*>/i', "<{$tag} {$allowed_attribtues}>", $return);
                
            }
        }
    }

    return $return;
}

$html = "<div><p align='left' onclick='alert(1)'>sample <b><i>text</i></b><script>alert(2);</script></p></div>";
$allowed = array('b', 'p' => array('align'));
print sanitize($html, $allowed);
?>