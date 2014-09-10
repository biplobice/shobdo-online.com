<?php

$page = file_get_contents('https://github.com/BasheerSience/BRScrollBar/blob/master/README.md');
$doc = new DOMDocument();
$doc->loadHTML($page);
$divs = $doc->getElementsByTagName('div');
foreach($divs as $div) {
    // Loop through the DIVs looking for one withan id of "content"
    // Then echo out its contents (pardon the pun)
    if ($div->getAttribute('id') === 'readme') {
         echo $div->nodeValue;
    }
}

?>