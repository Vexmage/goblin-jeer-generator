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
        input[type="text"] {
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

                // Constructor method to set the goblin's name, title, and jeers
                public function __construct($name, $title, $jeers) {
                    $this->name = $name;
                    $this->title = $title;
                    $this->classJeers = $jeers;
                }

                // Method to deliver a jeer based on the class
                public function jeer($userClass) {
                    $userClass = strtolower(trim($userClass)); // Sanitize input
                    if (array_key_exists($userClass, $this->classJeers)) {
                        return $this->classJeers[$userClass];
                    } else {
                        return "Never heard of that class! Ye sure yer not just a chicken in disguise?";
                    }
                }

                // Method to display the goblin's name and title
                public function introduce() {
                    return "{$this->name}, {$this->title}, says:";
                }
            }

            // Jeers for multiple goblins
            $grubbogJeers = [
                "wizard" => "So ye're a wizard? Couldn't tell! Yer spells be weaker than a gnome’s sneeze!",
                "fighter" => "Oh, ye're a fighter? I thought ye were just swingin’ that sword like a toddler!",
                "rogue" => "A rogue, eh? I've seen kobolds sneak better than ye!",
                "bard" => "Bard, eh? Hope yer better at singin' than ye are at fightin'!",
                "cleric" => "Cleric, eh? Ye’ll need more than prayers to save yerself from me!",
                "ranger" => "A ranger, eh? Couldn’t track a snail in a puddle, could ya?",
                "paladin" => "A paladin, huh? Yer about as noble as a rat in a cheese shop!",
                "sorcerer" => "Sorcerer, eh? Is that magic or are ye just wavin’ yer hands about?",
                "druid" => "Druid, eh? Talk to the trees, do ya? Bet they tell ye to quit adventurin'!"
            ];

            $snagglesJeers = [
                "wizard" => "A wizard, eh? I've seen goblin fireworks more powerful than yer spells!",
                "fighter" => "A fighter? More like a flailer! Ye couldn’t swing yer way out of a tavern brawl!",
                "rogue" => "Ye call yerself a rogue? Ye look more like a lost puppy than a shadowy thief!",
                "bard" => "A bard? Sing us a song, then, but not while I’m tryin’ to eat, eh?",
                "cleric" => "Cleric, eh? Pray all ye want, it won’t save ya from me blade!",
                "ranger" => "A ranger! Can ye even hit the broadside of a dragon with that bow?",
                "paladin" => "Paladin? What’s that shiny armor for, eh? To blind yer enemies?",
                "sorcerer" => "Sorcerer? Bah! Yer magic’s weaker than a goblin's stew!",
                "druid" => "Druid? I bet the trees cry whenever they see ya comin’!"
            ];

            $brizzleJeers = [
                "wizard" => "Yer spells couldn't light a candle, let alone a fireball! Weak!",
                "fighter" => "Fighter? Ha! Ye look like ye're fightin' with one arm tied behind yer back!",
                "rogue" => "Sneaky, eh? More like stinky! I could smell ye a mile away!",
                "bard" => "A bard! Hope yer singin’s better than yer fightin’, or we’re all doomed!",
                "cleric" => "Cleric, eh? Try prayin’ fer a better shield next time ye get hit!",
                "ranger" => "A ranger, huh? Bet ye couldn't hit a troll if it were standin’ right in front of ye!",
                "paladin" => "Paladin? With armor that shiny, ye’re just askin' to get hit!",
                "sorcerer" => "A sorcerer, eh? Ye cast spells like a goblin casts rocks... badly.",
                "druid" => "Druid? Let me guess, ye talk to squirrels and call it magic, har har!"
            ];

            $gnashJeers = [
                "wizard" => "A wizard, huh? My granny casts better spells and she's a goblin!",
                "fighter" => "Fighter? I've seen better swings from a goblin throwin' mud!",
                "rogue" => "Ye’re a rogue? More like a rogue that forgot how to sneak!",
                "bard" => "A bard? Please don’t sing... my ears couldn’t handle it!",
                "cleric" => "A cleric? Better heal yerself after that pathetic display!",
                "ranger" => "A ranger? Ye couldn’t track yer own footsteps!",
                "paladin" => "Paladin, huh? Ye’re more about showin’ off than fightin’!",
                "sorcerer" => "Sorcerer, eh? Ye better practice those spells or ye’ll be toast!",
                "druid" => "Druid? Pfft, go hug a tree and leave the fightin’ to the rest of us!"
            ];

            // Create multiple goblin objects
            $goblin1 = new Goblin("Grubbog the Snickerer", "Master of Insults and Sticky Fingers", $grubbogJeers);
            $goblin2 = new Goblin("Snaggles the Cackler", "Chief of Mischief and Mockery", $snagglesJeers);
            $goblin3 = new Goblin("Brizzle the Sharp-Tongued", "Mistress of Scorn and Snark", $brizzleJeers);
            $goblin4 = new Goblin("Gnash the Grumbler", "Lord of Gripes and Grumbles", $gnashJeers);

            // Check if the form has been submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["class"])) {
                $userClass = $_POST["class"];

                // Display each goblin's personalized jeer
                echo "<p><strong>" . $goblin1->introduce() . "</strong></p>";
                echo "<p><em>\"" . $goblin1->jeer($userClass) . "\"</em></p>";

                echo "<p><strong>" . $goblin2->introduce() . "</strong></p>";
                echo "<p><em>\"" . $goblin2->jeer($userClass) . "\"</em></p>";

                echo "<p><strong>" . $goblin3->introduce() . "</strong></p>";
                echo "<p><em>\"" . $goblin3->jeer($userClass) . "\"</em></p>";

                echo "<p><strong>" . $goblin4->introduce() . "</strong></p>";
                echo "<p><em>\"" . $goblin4->jeer($userClass) . "\"</em></p>";
            } else {
                // Display a prompt for the user to enter their class
                echo "<p><strong>" . $goblin1->introduce() . "</strong></p>";
                echo "<p><em>\"Tell me what ye are, and I'll tell ye why ye're terrible at it!\"</em></p>";
                echo "<p><em>\"Tell me what ye are, and I'll tell ye why ye're terrible at it!\"</em></p>";
            }
        ?>
    </div>

    <!-- Input form for the user to enter their class -->
    <form method="post" action="">
        <label for="class">What’s yer class, adventurer?</label><br><br>
        <input type="text" id="class" name="class" placeholder="e.g., wizard, fighter" required><br><br>
        <input type="submit" value="Get Jeered">
    </form>
</body>
</html>
