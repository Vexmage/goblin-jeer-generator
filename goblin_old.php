<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Goblin Jeer Generator (OOP)</title>
    <style>
        body {
            font-family: "Comic Sans MS", "Chalkboard", sans-serif;
            text-align: center;
            margin-top: 100px;
            background-color: #2e2e2e;
            color: #d4af37;
        }
        .jeer-container {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
            max-width: 600px;
        }
        .goblin-response {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }
        .goblin-image {
            width: 100px;
            height: 100px;
            margin-right: 20px;
            border-radius: 10px;
        }
        h1 {
            color: #f44336;
        }
        button, input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover, input[type="submit"]:hover {
            background-color: #d32f2f;
        }
        input[type="text"], input[type="radio"] {
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>Goblin Jeer Generator</h1>

    <div class="jeer-container">
        <?php
            // Goblin class definition
            class Goblin {
                private $name;
                private $title;
                private $classJeers = [];
                private $cityResponses = [];
                private $image;

                // Constructor method to set the goblin's name, title, jeers, and image
                public function __construct($name, $title, $jeers, $cityResponses, $image) {
                    $this->name = $name;
                    $this->title = $title;
                    $this->classJeers = $jeers;
                    $this->cityResponses = $cityResponses;
                    $this->image = $image;
                }

                // Method to deliver a jeer based on the class and character name
                public function jeer($userClass, $characterName) {
                    $userClass = strtolower(trim($userClass)); // Sanitize input
                    if (array_key_exists($userClass, $this->classJeers)) {
                        return $characterName . ", " . $this->classJeers[$userClass];
                    } else {
                        return $characterName . ", never heard of that class! Ye sure yer not just a chicken in disguise?";
                    }
                }

                // Method to display the goblin's response to being new in the city
                public function cityResponse($isNew) {
                    return $isNew ? $this->cityResponses['new'] : $this->cityResponses['not_new'];
                }

                // Method to display the goblin's name and title
                public function introduce() {
                    return "{$this->name}, {$this->title}, says:";
                }

                // Method to get the goblin's image path
                public function getImage() {
                    return $this->image;
                }
            }

            // Jeers and responses for multiple goblins
            $grubbogJeers = [
                "wizard" => "yer spells be weaker than a gnome’s sneeze!",
                "fighter" => "ye're just swingin’ that sword like a toddler!",
                "rogue" => "I've seen kobolds sneak better than ye!",
                "bard" => "Hope yer better at singin' than ye are at fightin'!",
                "cleric" => "Ye’ll need more than prayers to save yerself from me!",
                "ranger" => "Couldn’t track a snail in a puddle, could ya?",
                "paladin" => "Yer about as noble as a rat in a cheese shop!",
                "sorcerer" => "Is that magic or are ye just wavin’ yer hands about?",
                "druid" => "Talk to the trees, do ya? Bet they tell ye to quit adventurin'!"
            ];

            $snagglesJeers = [
                "wizard" => "I've seen goblin fireworks more powerful than yer spells!",
                "fighter" => "More like a flailer! Ye couldn’t swing yer way out of a tavern brawl!",
                "rogue" => "Ye look more like a lost puppy than a shadowy thief!",
                "bard" => "Sing us a song, then, but not while I’m tryin’ to eat, eh?",
                "cleric" => "Pray all ye want, it won’t save ya from me blade!",
                "ranger" => "Can ye even hit the broadside of a dragon with that bow?",
                "paladin" => "What’s that shiny armor for, eh? To blind yer enemies?",
                "sorcerer" => "Yer magic’s weaker than a goblin's stew!",
                "druid" => "I bet the trees cry whenever they see ya comin’!"
            ];

            $brizzleJeers = [
                "wizard" => "Yer spells couldn't light a candle, let alone a fireball!",
                "fighter" => "Ye look like ye're fightin' with one arm tied behind yer back!",
                "rogue" => "I could smell ye a mile away!",
                "bard" => "Hope yer singin’s better than yer fightin’, or we’re doomed!",
                "cleric" => "Prayin’ fer a better shield next time ye get hit!",
                "ranger" => "Bet ye couldn't hit a troll if it were standin’ right in front of ye!",
                "paladin" => "With armor that shiny, ye’re just askin' to get hit!",
                "sorcerer" => "Ye cast spells like a goblin casts rocks... badly.",
                "druid" => "Let me guess, ye talk to squirrels and call it magic!"
            ];

            $gnashJeers = [
                "wizard" => "My granny casts better spells and she's a goblin!",
                "fighter" => "I've seen better swings from a goblin throwin' mud!",
                "rogue" => "More like a rogue that forgot how to sneak!",
                "bard" => "Please don’t sing... my ears couldn’t handle it!",
                "cleric" => "Better heal yerself after that pathetic display!",
                "ranger" => "Ye couldn’t track yer own footsteps!",
                "paladin" => "Ye’re more about showin’ off than fightin’!",
                "sorcerer" => "Ye better practice those spells or ye’ll be toast!",
                "druid" => "Pfft, go hug a tree and leave the fightin’ to us!"
            ];


            // City response options
            $cityResponsesGrubbog = [
                "new" => "Ah, so ye're fresh to the city, eh? Watch out, the rats here are bigger than you!",
                "not_new" => "Oh, so ye're a regular here? Could’ve fooled me with that face!"
            ];
            
            $cityResponsesSnaggles = [
                "new" => "New to the city? Ye’ll be lucky if ye last a week!",
                "not_new" => "Been here a while, eh? Then why do ye still look so lost?"
            ];
            
            $cityResponsesBrizzle = [
                "new" => "New in town? Ha! Bet ye got lost findin' the entrance!",
                "not_new" => "Not new, huh? Then stop actin' like a tourist!"
            ];
            
            $cityResponsesGnash = [
                "new" => "New, eh? Well, don’t worry, the city’s terrible, ye’ll hate it.",
                "not_new" => "Oh, ye've been here before? That explains the smell."
            ];

            // Create goblin objects with images and responses
            $goblin1 = new Goblin("Grubbog", "Master of Insults", $grubbogJeers, $cityResponsesGrubbog, "images/goblin1.png");
            $goblin2 = new Goblin("Snaggles", "Chief of Mischief", $snagglesJeers, $cityResponsesSnaggles, "images/goblin2.png");
            $goblin3 = new Goblin("Brizzle", "Mistress of Snark", $brizzleJeers, $cityResponsesBrizzle, "images/goblin3.png");
            $goblin4 = new Goblin("Gnash", "Lord of Grumbles", $gnashJeers, $cityResponsesGnash, "images/goblin4.png");

            // Array of goblins
            $goblins = [$goblin1, $goblin2, $goblin3, $goblin4];

            // Handle first part of interaction
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["stage"]) && $_POST["stage"] == "1") {
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

                // Ask if the user is new to the city
                echo "<p>Are ye new to the city?</p>";
                echo "<label><input type='radio' name='is_new' value='yes' required> Yes</label>";
                echo "<label><input type='radio' name='is_new' value='no'> No</label><br><br>";
                echo "<input type='submit' value='Answer'>";
                echo "</form>";
            }
            // Handle second part of interaction
            elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["stage"]) && $_POST["stage"] == "2") {
                $isNew = $_POST["is_new"] === "yes";

                // Randomly select two goblins to respond
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

                // Provide a "Start Over" button
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='stage' value='0'>";
                echo "<input type='submit' value='Start Over'>";
                echo "</form>";

            }
            // Initial form for name and class
            else {
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='stage' value='1'>";
                echo "<label for='character_name'>What’s yer name, adventurer?</label><br><br>";
                echo "<input type='text' id='character_name' name='character_name' placeholder='e.g., Aragon' required><br><br>";
                echo "<label for='class'>What’s yer class?</label><br><br>";
                echo "<input type='text' id='class' name='class' placeholder='e.g., wizard, fighter' required><br><br>";
                echo "<input type='submit' value='Get Jeered'>";
                echo "</form>";
            }
        ?>
    </div>
</body>
</html>
