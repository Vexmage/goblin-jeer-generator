<?php
class Goblin {
    private $name;
    private $title;
    private $classJeers = [];
    private $cityResponses = [];
    private $image;

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
?>
