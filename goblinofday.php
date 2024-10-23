<?php
// Set the correct time zone
date_default_timezone_set('America/Los_Angeles');

// Include the goblin time logic, if you decide to put it in a separate file
include 'goblin_time_logic.php'; 

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

// **Use the current date to seed the random jeer selection**
$jeerSeed = crc32($currentDate . $goblinOfTheDay); // Combine date and goblin name for a consistent seed
$jeerTypes = array_keys($goblinData['classJeers']);
$jeerIndex = $jeerSeed % count($jeerTypes); // Use seed to consistently select a jeer
$jeerOfTheDay = $jeerTypes[$jeerIndex]; // Get the jeer of the day
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goblin of the Day</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your shared stylesheet -->
</head>
<body>
    <div class="jeer-container">
        <h1>Goblin of the Day: <?php echo $goblinOfTheDay; ?></h1>
        <p>Date: <?php echo date("l, F j, Y"); ?></p> <!-- Displays the full date -->
        <p>Time: <?php echo date("g:i A"); ?></p> <!-- Displays the current time in 12-hour format with AM/PM -->
        <img src="images/<?php echo strtolower($goblinOfTheDay); ?>.png" alt="<?php echo $goblinOfTheDay; ?>" class="goblin-image">
        <p><strong>Jeer of the Day:</strong> "<?php echo $goblinData['classJeers'][$jeerOfTheDay]; ?>"</p>

        <!-- Add a "Go Back" button -->
        <form action="index.php" method="post">
            <input type="hidden" name="stage" value="1"> <!-- Go back to stage 1 -->
            <input type="submit" value="Go Back">
        </form>
    </div>
</body>
</html>
