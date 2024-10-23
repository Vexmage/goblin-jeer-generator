<?php
// Load goblins from JSON file
$goblinsData = json_decode(file_get_contents('jeers.json'), true);

// Get the current date
$currentDate = date("Y-m-d");

// Hash the current date to get a seed for goblin selection
$goblinIndex = crc32($currentDate) % count($goblinsData);

// Get the selected goblin for the day
$goblinNames = array_keys($goblinsData);
$goblinOfTheDay = $goblinNames[$goblinIndex];

// Get the goblin's data
$goblinData = $goblinsData[$goblinOfTheDay];

// Select a random jeer type
$jeerTypes = array_keys($goblinData['classJeers']);
$randomJeerType = $jeerTypes[array_rand($jeerTypes)];
?>
