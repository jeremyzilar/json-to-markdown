
<?php

  $authors = file_get_contents("https://demo.digital.gov/authors/v1/json/");
  print_r($authors);
  // $tags = json_decode( $tags, true );
  // print_r($tags);
  foreach ($tags as $e => $tag) {
    echo "<br/>";
    // echo file_contents($e, $tag);
    echo "<br/>";
    // create_file($e, file_contents($e, $tag));
  }

  function file_contents($e, $tag){
    $t = $tag['display_name'];
    $s = $tag['summary'];
    $contents = <<<EOF
---
# This topic lives at
# https://digital.gov/topics/$e

# Topic Title
title: "$t"

# description — keep it short and clear
# summary: "$s"


# For more information on managing topics,
# see https://github.com/GSA/digitalgov.gov/wiki/topics
---
EOF;
    return $contents;
  }
  function create_file($e, $txt){
    mkdir('files/' . $e, 0777, true);
    $myfile = fopen("files/". $e ."/_index.md", "a") or die("Unable to open file!");
    fwrite($myfile, "\n". $txt);
    fclose($myfile);
  }

?>
