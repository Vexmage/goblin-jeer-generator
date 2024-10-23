<?php

include 'user_tracking.php'; // Include the user tracking logic

function handleStages($goblins, $goblinsData) {
    // Ensure the current stage is initialized properly
    $stage = isset($_POST["stage"]) ? $_POST["stage"] : "1";

    // Stage 1: Ask for Name and Class
    if ($stage == "1") {
        echo "<h1>Welcome to the Goblin Jeer Generator!</h1>";
        echo "<p>What’s yer name, adventurer?</p>";

        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='stage' value='2'>"; // Proceed to stage 2
        echo "<label for='character_name'>Name: </label>";
        echo "<input type='text' id='character_name' name='character_name' placeholder='e.g., Aragon' required><br><br>";
        echo "<label for='class'>Class: </label>";
        echo "<input type='text' id='class' name='class' placeholder='e.g., wizard, fighter' required><br><br>";
        echo "<input type='submit' value='Get Jeered'>";
        echo "<a href='goblinofday.php' class='button'>Goblin of the Day</a>";
        echo "</form>";

    // Stage 2: Display class-based jeers and ask if the player is new to the city
    } elseif ($stage == "2") {
        $characterName = htmlspecialchars($_POST["character_name"]);
        $userClass = htmlspecialchars($_POST["class"]);

        // Randomly select two goblins to jeer
        shuffle($goblins);
        $selectedGoblins = array_slice($goblins, 0, 2);

        echo "<p>Ah, so ye’re $characterName the $userClass, eh? Let’s see what the goblins think of that!</p>";

        foreach ($selectedGoblins as $goblin) {
            echo "<div class='goblin-response'>";
            echo "<img src='" . $goblin->getImage() . "' class='goblin-image'>";
            echo "<div>";
            echo "<p><strong>" . $goblin->introduce() . "</strong></p>";
            echo "<p><em>\"" . $goblin->jeer($userClass, $characterName) . "\"</em></p>";
            echo "</div>";
            echo "</div>";

            // Track goblin interaction
            trackGoblinInteraction($goblin->getName());
        }

        // Proceed to the city question
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='character_name' value='" . $characterName . "'>";
        echo "<input type='hidden' name='class' value='" . $userClass . "'>";
        echo "<input type='hidden' name='stage' value='3'>"; // Proceed to stage 3
        echo "<p>Are ye new to the city?</p>";
        echo "<label><input type='radio' name='is_new' value='yes' required> Yes</label>";
        echo "<label><input type='radio' name='is_new' value='no'> No</label><br><br>";
        echo "<input type='submit' value='Answer'>";
        echo "</form>";

    // Stage 3: Ask if the player is new to the city and show city responses
    } elseif ($stage == "3") {
        $isNew = $_POST["is_new"];
        $characterName = htmlspecialchars($_POST["character_name"]);
        $userClass = htmlspecialchars($_POST["class"]);

        echo "<p>Ah, $characterName, you’re a $userClass and you’re " . ($isNew == 'yes' ? 'new' : 'not new') . " to the city!</p>";

        // Randomly select two goblins to respond about the city
        shuffle($goblins);
        $selectedGoblins = array_slice($goblins, 0, 2);

        foreach ($selectedGoblins as $goblin) {
            echo "<div class='goblin-response'>";
            echo "<img src='" . $goblin->getImage() . "' class='goblin-image'>";
            echo "<div>";
            echo "<p><strong>" . $goblin->introduce() . "</strong></p>";
            echo "<p><em>\"" . $goblin->cityResponse($isNew === 'yes') . "\"</em></p>";
            echo "</div>";
            echo "</div>";

            // Track goblin interaction
            trackGoblinInteraction($goblin->getName());
        }

        // Proceed to location-based questions
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='character_name' value='" . $characterName . "'>";
        echo "<input type='hidden' name='class' value='" . $userClass . "'>";
        echo "<input type='hidden' name='stage' value='4'>"; // Proceed to stage 4
        echo "<p>Want to know where to find important places?</p>";
        echo "<label><input type='checkbox' name='locations[]' value='weapon_shop'> Weapon Shop</label><br>";
        echo "<label><input type='checkbox' name='locations[]' value='magic_shop'> Magic Shop</label><br>";
        echo "<label><input type='checkbox' name='locations[]' value='courthouse'> Courthouse</label><br>";
        echo "<label><input type='checkbox' name='locations[]' value='temple'> Temple</label><br>";
        echo "<label><input type='checkbox' name='locations[]' value='inn'> Inn</label><br>";
        echo "<label><input type='checkbox' name='locations[]' value='tavern'> Tavern</label><br><br>";
        echo "<input type='submit' value='Tell me where!'>";
        echo "</form>";

    // Stage 4: Display location-based jeers
    } elseif ($stage == "4") {
        $locations = isset($_POST['locations']) ? $_POST['locations'] : [];
        $characterName = htmlspecialchars($_POST["character_name"]);
        $userClass = htmlspecialchars($_POST["class"]);

        echo "<p>Ah, $characterName the $userClass! Let’s see what the goblins have to say about these places...</p>";

        // Randomly select two goblins to jeer about the locations
        shuffle($goblins);
        $selectedGoblins = array_slice($goblins, 0, 2);

        foreach ($selectedGoblins as $goblin) {
            echo "<div class='goblin-response'>";
            echo "<img src='" . $goblin->getImage() . "' class='goblin-image'>";
            echo "<div>";
            echo "<p><strong>" . $goblin->introduce() . "</strong></p>";
            echo "<p><em>\"" . $goblin->locationJeers($locations) . "\"</em></p>";
            echo "</div>";
            echo "</div>";

            // Track goblin interaction
            trackGoblinInteraction($goblin->getName());
        }

        // Provide a "Start Over" button
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='stage' value='1'>"; // Restart from stage 1
        echo "<input type='submit' value='Start Over'>";
        echo "</form>";

        // Check for unlocked achievements
        $unlockedAchievements = checkAchievements($goblinsData);

        // Display achievements if any
        if (!empty($unlockedAchievements)) {
            echo "<h2>Achievements Unlocked:</h2>";
            foreach ($unlockedAchievements as $achievement) {
                echo "<p><strong>$achievement</strong></p>";
            }
        }
    }
}
?>
