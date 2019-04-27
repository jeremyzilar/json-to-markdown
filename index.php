
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

display_name: Bill Smith
first_name: Bill
last_name: Smith

# Pronoun preference — we strive to be inclusive, and don’t want to make assumptions on a person’s first name (be it a gender-neutral name, or is one more common in languages other than English). Learn more http://www.MyPronouns.org
# List your pronoun(s) if you want them displayed alongside your name (including no pronoun; meaning, we would just use your name).
# See https://uwm.edu/lgbtrc/support/gender-pronouns/ for a list of pronouns
pronoun:

# this is your user ID and is not easily changed
uid: bill-smith

# if you include an email address, it will be displayed on your profile page
email: bill-smith@gmail.com

# Bio — keep it under 50 words
bio: “Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed congue aliquet tincidunt. Cras in libero rhoncus, semper metus eu, finibus nunc. Nunc feugiat lorem tellus, et sollicitudin eros feugiat vitae. Aliquam auctor velit nec auctor semper. Donec egestas felis id turpis sollicitudin blandit vitae quis libero.”

# Agency Full Name [e.g. U.S. General Services Administration]
agency_full_name: “”


# Agency Acronym [e.g., GSA]
agency: “”

# Tell us where you live and work [e.g. 'New York City' or 'Portland, OR']
location: “”

# Your GitHub username [e.g. 'jeremyzilar']
# See [URL] Having a GitHub account will allow you to edit pages on DigitalGov. The image used in your GitHub account can also be used to populate your digital.gov profile photo.
github: “”

# flag — URL
# cat  — URL
# github-photo — requires a github ID
# See [URL] for a full list of profile photo options
profile-img: github-photo

# Professional Social Media [e.g., Digital_Gov]
Twitter: “”
Facebook: “”
LinkedIn: “”
YouTube: “”

# Where can people learn more about your agency or program? Provide a full URL [e.g. 'https://www.example.gov/']
url: ''


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
