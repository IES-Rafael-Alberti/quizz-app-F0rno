<?php
    session_start();
    // If the user is logged in, unset the session
    if (isset($_SESSION['username'])) {
        unset($_SESSION['username']);
    }
    // Redirect to the login page
    header("Location: /");
?>