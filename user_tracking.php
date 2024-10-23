<?php
session_start(); // Start the session if not started

// Initialize user progress tracking (if needed)
function initializeUserTracking() {
    if (!isset($_SESSION['jeer_count'])) {
        $_SESSION['jeer_count'] = 0;
    }

    if (!isset($_SESSION['goblins_met'])) {
        $_SESSION['goblins_met'] = [];
    }
}

// Track goblin interactions
function trackGoblinInteraction($goblinName) {
    initializeUserTracking();

    // Increment jeer count
    $_SESSION['jeer_count']++;

    // Add goblin to the met list if not already there
    if (!in_array($goblinName, $_SESSION['goblins_met'])) {
        $_SESSION['goblins_met'][] = $goblinName;
    }
}

// Check for unlocked achievements
function checkAchievements($goblinsData) {
    $achievements = [];

    // Achievement: Met all goblins
    if (count($_SESSION['goblins_met']) === count($goblinsData)) {
        $achievements[] = "Met All Goblins";
    }

    // Achievement: Got Roasted 5 Times
    if ($_SESSION['jeer_count'] >= 5) {
        $achievements[] = "Got Roasted 5 Times";
    }

    return $achievements;
}

// Optionally, reset progress
function resetProgress() {
    $_SESSION['jeer_count'] = 0;
    $_SESSION['goblins_met'] = [];
}
?>
