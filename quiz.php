<?php
session_start();

// Check if user has exceeded the attempt limit
function checkAttempts() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!isset($_SESSION['attempts'][$ip])) {
        $_SESSION['attempts'][$ip] = 0;
    }

    return $_SESSION['attempts'][$ip] < 3; // Allow 3 attempts
}

// Increment attempt count
function incrementAttempts() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!isset($_SESSION['attempts'][$ip])) {
        $_SESSION['attempts'][$ip] = 0;
    }

    $_SESSION['attempts'][$ip]++;
}

// Reset attempts (for testing purposes)
function resetAttempts() {
    $_SESSION['attempts'] = [];
}

// Get attempts count
function getAttempts() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!isset($_SESSION['attempts'][$ip])) {
        $_SESSION['attempts'][$ip] = 0;
    }

    return $_SESSION['attempts'][$ip];
}
?>
