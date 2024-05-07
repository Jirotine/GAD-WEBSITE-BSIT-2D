<?php
include('../Util/dbcon.php');

// Check if the user ID is provided
if(isset($_GET['userId'])) {
    // Sanitize the user ID to prevent SQL injection
    $userId = mysqli_real_escape_string($conn, $_GET['userId']);

    // Delete the user from the database
    $sql = "DELETE FROM users WHERE user_id = '$userId'";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the admin page after successful deletion
        header("Location: adminDashboard.php");
        exit();
    } else {
        // Handle errors
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // Redirect back to the admin page if user ID is not provided
    header("Location: adminDashboard.php");
    exit();
}

// Close the database connection
$conn->close();
?>
