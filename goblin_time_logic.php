<?php
// Set the correct time zone
date_default_timezone_set('America/Los_Angeles');

// Load goblins from JSON file
$goblinsData = json_decode(file_get_contents('jeers.json'), true);

// Get the current date
$currentDate = date("Y-m-d");

// Hash the current date to get a seed for both goblin and jeer selection
$goblinIndex = crc32($currentDate) % count($goblinsData);

// Get the selected goblin for the day
$goblinNames = array_keys($goblinsData);
$goblinOfTheDay = $goblinNames[$goblinIndex];

// Get the goblin's data
$goblinData = $goblinsData[$goblinOfTheDay];

// Use the current date to seed the random jeer selection
$jeerSeed = crc32($currentDate . $goblinOfTheDay); // Combine date and goblin name for a consistent seed
$jeerTypes = array_keys($goblinData['classJeers']);
$jeerIndex = $jeerSeed % count($jeerTypes); // Use seed to consistently select a jeer
$jeerOfTheDay = $jeerTypes[$jeerIndex]; // Get the jeer of the day

// Store the current date and time formatted
$currentFullDate = date("l, F j, Y");
$currentTime = date("g:i A");
?>
