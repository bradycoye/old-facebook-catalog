<?php

echo "<html><head></head><body><pre>hello";

// Array to hold the inventory data

$invdata = [];

// Import the inventory file
$h = fopen("inventory.csv", "r");



// Read the file into an array
// while (($data = fgetcsv($h, 10000, ",")) !== FALSE)
// {
//	$invdata[] = $data;
//	
//}

// Display the code in a readable format

//echo var_dump($invdata);
echo "</pre></body></html>";