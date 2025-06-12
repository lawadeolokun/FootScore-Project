<?php
include "User.php";
include "Profile.php";

// Create a new user profile
$userProfile = new Profile('law_adeolokun', 'boy2021', 'law@gmail.com', 'Law', 'Adeolokun');

// Authenticate user
$usernameInput = 'law_adeolokun';
$passwordInput = 'boy2021';
$emailInput = 'law@gmail.com';
if ($userProfile->authenticate($usernameInput, $passwordInput, $emailInput)) {
    // Redirect to index.php
    echo "Authentication successful. <br> Welcome back, " . $userProfile->getFullName() . "! ";

    // Output "Go Back" button
    echo '<br><a href="index.php">Go Back</a>';
} else {
    echo "Authentication failed. Please check your credentials.";
}
?>
