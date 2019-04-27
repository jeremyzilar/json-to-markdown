
<?php

  $authors = file_get_contents("authors.json");
  $authors = json_decode( $authors, true );
  // print_r($authors);

  foreach ($authors['items'] as $e => $author) {
    echo "\n\n";
    echo file_contents($e, $author);
    echo "\n\n";
  //   // create_file($e, file_contents($e, $tag));
  }

  function file_contents($e, $author){
    $t = $author['display_name'];
    $s = $author['summary'];
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
