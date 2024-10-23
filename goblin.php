<?php
class Goblin {
    private $name;
    private $title;
    private $classJeers = [];
    private $cityResponses = [];
    private $locationJeers = []; // Ensure this is initialized as an array
    private $image;

    public function __construct($name, $title, $jeers, $cityResponses, $locationJeers, $image) {
        $this->name = $name;
        $this->title = $title;
        $this->classJeers = $jeers;
        $this->cityResponses = $cityResponses;
        $this->locationJeers = $locationJeers; // Set location jeers from the JSON
        $this->image = $image;
    }

    // Method to get the goblin's name
    public function getName() {
        return $this->name;
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

    // Method to deliver location-based jeers
    public function locationJeers($locations) {
        $jeer = "Oh, ye want to know where these places are, eh? Let me tell ye...";
        foreach ($locations as $location) {
            // Check if the location exists in the goblin's locationJeers array
            if (array_key_exists($location, $this->locationJeers)) {
                $jeer .= " " . $this->locationJeers[$location];
            }
        }
        return $jeer;
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
?>
