<?php
// Use cURL or an HTTP library to send a GET request to the search page
$searchUrl = 'https://www.retrogames.cc/search?query=retro'; // Example search URL
$response = file_get_contents($searchUrl);

// Parse the response using a HTML parsing library like DOMDocument or SimpleHTMLDom
$doc = new DOMDocument();
@$doc->loadHTML($response);

// Find the elements that contain the embed links
$embedLinks = [];
$iframeElements = $doc->getElementsByTagName('iframe');
foreach ($iframeElements as $iframe) {
    $embedLinks[] = $iframe->getAttribute('src');
}

// Display the embed links
foreach ($embedLinks as $embedLink) {
    echo "Embed link: $embedLink\n";
}
?>
