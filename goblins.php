<?php
// Load jeers from the JSON file
$jeersData = json_decode(file_get_contents('jeers.json'), true);

// Check if the JSON was loaded properly
if ($jeersData === null) {
    die('Error loading jeers.json. Please check the file.');
}

// Create goblin objects using the data from the JSON file
$goblins = [];

foreach ($jeersData as $goblinName => $data) {
    // Convert the goblin name to lowercase for file matching
    $imageFile = strtolower($goblinName) . ".png"; // e.g., 'grubbog.png'

    // Ensure that locationJeers is set properly
    $locationJeers = isset($data['locationJeers']) ? $data['locationJeers'] : [];

    // Create goblin objects
    $goblins[] = new Goblin(
        $goblinName,
        "{$goblinName} the Goblin", // Use this or any title logic you'd like
        $data['classJeers'],
        $data['cityResponses'],
        $locationJeers, // Pass location jeers to the Goblin object
        "images/{$imageFile}" // Dynamic image path
    );
}
?>
