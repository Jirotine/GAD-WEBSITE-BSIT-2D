<?php
session_start();

// Include database connection
include('dbcon.php');

// Check if user is logged in
if (isset($_SESSION['username'])) {
    // Get username from session
    $username = $_SESSION['username'];

    // Query to delete user account
    $query = "DELETE FROM users WHERE username = '$username'";

    // Execute query
    if (mysqli_query($conn, $query)) {
        // Account deleted successfully

        // End the session
        session_unset();
        session_destroy();

        // Send response indicating success
        http_response_code(200);
        exit;
    } else {
        // Error occurred while deleting account
        // Send response indicating failure
        http_response_code(500);
        exit;
    }
} else {
    // If user is not logged in, send unauthorized response
    http_response_code(401);
    exit;
}
?>
