<?php
// Main file for handling the goblin jeer interaction

// Include necessary files
include_once 'header.php';
include_once 'Goblin.php';
include_once 'goblins.php'; // This will load the $goblins array
include_once 'stages.php';
include_once 'user_tracking.php';

// Load goblins data from the JSON file
$goblinsData = json_decode(file_get_contents('jeers.json'), true);
?>

<div class="jeer-container">
    <?php
    // Include stages logic to handle the interaction flow with both $goblins and $goblinsData
    handleStages($goblins, $goblinsData);
    ?>
</div>

<?php
include_once 'footer.php';
?>
