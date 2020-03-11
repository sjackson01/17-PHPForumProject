<?php  # 17.3 - index.php
// This is the main page for the site

// Include the HTML header:
include('inc/header.php');

// THe content on this page is introductary text
// Pull from the databae, based upon the
// selected language:

echo $words['intro'];

// Include the HTML footer file:
include('inc/footer.php');
