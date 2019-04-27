<?php

  $authors = file_get_contents("authors.json");
  $authors = json_decode( $authors, true );

  foreach ($authors['items'] as $e => $author) {
    foreach ($author as $key => $author_data) {
      echo file_contents($e, $author_data);
      create_file($author_data['uid'], file_contents($e, $author_data));
    }
  }

  function file_contents($e, $author){
    $display_name = $author['display_name'];
    $first_name = $author['first_name'];
    $last_name = $author['last_name'];
    $uid = $author['uid'];
    $bio = $author['bio'];
    $url = $author['url'];
    $email = $author['email'];
    $agency_full_name = $author['agency_full_name'];
    $agency = $author['agency'];
    $location = $author['location'];
    $github = $author['github'];
    $twitter = $author['twitter'];
    $facebook = $author['facebook'];
    $linkedin = $author['linkedin'];
    $youtube = $author['youtube'];
    $profile_source = $author['profile_source'];
    $contents = <<<EOF---

# Your author profile page lives at:
# https://demo.digital.gov/authors/$uid

display_name: $display_name
first_name: $first_name
last_name: $last_name

# Pronoun preference — we strive to be inclusive, and don’t want to make assumptions on a person’s first name (be it a gender-neutral name, or is one more common in languages other than English). Learn more http://www.MyPronouns.org
# List your pronoun(s) if you want them displayed alongside your name. Leave it blank and we'll use just your name.
# See https://uwm.edu/lgbtrc/support/gender-pronouns/ for a list of pronouns
# Examples: they/them, she/her, or he/him
pronoun:

# User ID (not easily changed)
uid: $uid

# if you include an email address, it will be displayed on your profile page
email: $email

# Bio — keep it under 50 words
bio: $bio

# Agency Full Name [e.g. U.S. General Services Administration]
agency_full_name: "$agency_full_name"


# Agency Acronym [e.g., GSA]
agency: "$agency"

# Tell us where you live and work [e.g. 'New York City' or 'Portland, OR']
location: "$location"

# Your GitHub username [e.g. 'jeremyzilar']
# See [URL] Having a GitHub account will allow you to edit pages on DigitalGov. The image used in your GitHub account can also be used to populate your digital.gov profile photo.
github: "$github"

# flag — URL
# cat  — URL
# github-photo — requires a github ID
# See [URL] for a full list of profile photo options
profile_source: ""

# Professional Social Media [e.g., Digital_Gov]
Twitter: "$twitter"
Facebook: "$facebook"
LinkedIn: "$linkedin"
YouTube: "$youtube"

# Where can people learn more about your agency or program? Provide a full URL [e.g. 'https://www.example.gov/']
url: "$url"

# For more information on managing your author page,
# see https://workflow.digital.gov/authors

---

EOF;
return $contents;
}

function create_file($uid, $data){
  mkdir('files/' . $uid, 0777, true);
  $myfile = fopen("files/". $uid ."/_index.md", "a") or die("Unable to open file!");
  fwrite($myfile, "\n". $data);
  fclose($myfile);
}

?>
