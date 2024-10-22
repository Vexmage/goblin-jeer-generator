<?php
// Define the jeers and city responses for each goblin

// Goblin: Grubbog the Snickerer
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
$cityResponsesGrubbog = [
    "new" => "Ah, so ye're fresh to the city, eh? Watch out, the rats here are bigger than you!",
    "not_new" => "Oh, so ye're a regular here? Could’ve fooled me with that face!"
];

// Goblin: Snaggles the Cackler
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
$cityResponsesSnaggles = [
    "new" => "New to the city? Ye’ll be lucky if ye last a week!",
    "not_new" => "Been here a while, eh? Then why do ye still look so lost?"
];

// Goblin: Brizzle the Sharp-Tongued
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
$cityResponsesBrizzle = [
    "new" => "New in town? Ha! Bet ye got lost findin' the entrance!",
    "not_new" => "Not new, huh? Then stop actin' like a tourist!"
];

// Goblin: Gnash the Grumbler
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
$cityResponsesGnash = [
    "new" => "New, eh? Well, don’t worry, the city’s terrible, ye’ll hate it.",
    "not_new" => "Oh, ye've been here before? That explains the smell."
];

// Array of Goblins
$goblins = [
    new Goblin("Grubbog the Snickerer", "Master of Insults and Sticky Fingers", $grubbogJeers, $cityResponsesGrubbog, "images/goblin1.png"),
    new Goblin("Snaggles the Cackler", "Chief of Mischief and Mockery", $snagglesJeers, $cityResponsesSnaggles, "images/goblin2.png"),
    new Goblin("Brizzle the Sharp-Tongued", "Mistress of Scorn and Snark", $brizzleJeers, $cityResponsesBrizzle, "images/goblin3.png"),
    new Goblin("Gnash the Grumbler", "Lord of Gripes and Grumbles", $gnashJeers, $cityResponsesGnash, "images/goblin4.png")
];
?>
