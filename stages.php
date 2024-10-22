<?php
function handleStages($goblins) {
    // Check if a POST request is made and a stage is set
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["stage"])) {
        $stage = $_POST["stage"];

        if ($stage == "1") {
            // Handle first part of the interaction (Name and Class)
            $userClass = $_POST["class"];
            $characterName = $_POST["character_name"];

            // Display class-based jeers and proceed to the city question
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='class' value='" . htmlspecialchars($userClass) . "'>";
            echo "<input type='hidden' name='character_name' value='" . htmlspecialchars($characterName) . "'>";
            echo "<input type='hidden' name='stage' value='2'>";

            // Randomly select two goblins to jeer
            shuffle($goblins);
            $selectedGoblins = array_slice($goblins, 0, 2);
            foreach ($selectedGoblins as $goblin) {
                echo "<div class='goblin-response'>";
                echo "<img src='" . $goblin->getImage() . "' class='goblin-image'>";
                echo "<div>";
                echo "<p><strong>" . $goblin->introduce() . "</strong></p>";
                echo "<p><em>\"" . $goblin->jeer($userClass, $characterName) . "\"</em></p>";
                echo "</div>";
                echo "</div>";
            }

            // Ask the second question (Are you new to the city?)
            echo "<p>Are ye new to the city?</p>";
            echo "<label><input type='radio' name='is_new' value='yes' required> Yes</label>";
            echo "<label><input type='radio' name='is_new' value='no'> No</label><br><br>";
            echo "<input type='submit' value='Answer'>";
            echo "</form>";

        } elseif ($stage == "2") {
            // Handle second part of the interaction (City Question)
            $isNew = $_POST["is_new"] === "yes";

            // Randomly select two goblins to respond to the city question
            shuffle($goblins);
            $selectedGoblins = array_slice($goblins, 0, 2);
            foreach ($selectedGoblins as $goblin) {
                echo "<div class='goblin-response'>";
                echo "<img src='" . $goblin->getImage() . "' class='goblin-image'>";
                echo "<div>";
                echo "<p><strong>" . $goblin->introduce() . "</strong></p>";
                echo "<p><em>\"" . $goblin->cityResponse($isNew) . "\"</em></p>";
                echo "</div>";
                echo "</div>";
            }

            // Provide a "Start Over" button to reset to stage 0
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='stage' value='0'>";
            echo "<input type='submit' value='Start Over'>";
            echo "</form>";

        } else {
            // Reset the interaction by showing the initial form for name and class
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='stage' value='1'>";
            echo "<label for='character_name'>What’s yer name, adventurer?</label><br><br>";
            echo "<input type='text' id='character_name' name='character_name' placeholder='e.g., Aragon' required><br><br>";
            echo "<label for='class'>What’s yer class?</label><br><br>";
            echo "<input type='text' id='class' name='class' placeholder='e.g., wizard, fighter' required><br><br>";
            echo "<input type='submit' value='Get Jeered'>";
            echo "</form>";
        }

    } else {
        // If no stage is set, or stage is 0, show the initial form
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='stage' value='1'>";
        echo "<label for='character_name'>What’s yer name, adventurer?</label><br><br>";
        echo "<input type='text' id='character_name' name='character_name' placeholder='e.g., Aragon' required><br><br>";
        echo "<label for='class'>What’s yer class?</label><br><br>";
        echo "<input type='text' id='class' name='class' placeholder='e.g., wizard, fighter' required><br><br>";
        echo "<input type='submit' value='Get Jeered'>";
        echo "</form>";
    }
}
?>
