<?php
// Load jeers from the JSON file
$jeersData = json_decode(file_get_contents('jeers.json'), true);

// Create goblin objects using the data from the JSON file
$goblins = [];

foreach ($jeersData as $goblinName => $data) {
    // Convert the goblin name to lowercase for file matching
    $imageFile = strtolower($goblinName) . ".png"; // e.g., 'grubbog.png'

    $goblins[] = new Goblin(
        $goblinName,
        "{$goblinName} the Goblin", // or any title logic you'd like
        $data['classJeers'],
        $data['cityResponses'],
        "images/{$imageFile}" // Dynamic image path
    );
}
?>
