<?php
// Specify the path to your pixel_code.txt file
$pixelCodeFile = '../pixel_code.txt';

// Check if the file exists
if (file_exists($pixelCodeFile)) {
    // Read the content of the file
    $pixelCode = file_get_contents($pixelCodeFile);
    // Output the pixel code
    echo $pixelCode;
} else {
    // Handle case where the file does not exist
    echo "Pixel code file not found.";
}
?>