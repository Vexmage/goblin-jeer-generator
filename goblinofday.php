<?php
// Include the goblin time logic
include 'goblin_time_logic.php'; 
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
        <p>Date: <?php echo $currentFullDate; ?></p> <!-- Displays the full date -->
        <p>Time: <?php echo $currentTime; ?></p> <!-- Displays the current time in 12-hour format with AM/PM -->
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
