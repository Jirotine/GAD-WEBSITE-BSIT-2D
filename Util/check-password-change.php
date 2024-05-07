<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gad";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        http_response_code(500);
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the current username from the session
    $currentUsername = $_SESSION['username'];

    // New password from the form
    $newPassword = trim($_POST['newUsername']);
    // Old password from the form
    $oldPassword = trim($_POST['oldUsername']);

    // Check if all fields are filled
    if (empty($newPassword) || empty($oldPassword)) {
        http_response_code(400);
        echo "All fields are required.";
        exit;
    }

    // Check if old password and new password are the same
    if ($newPassword === $oldPassword) {
        http_response_code(400);
        echo "The old and new password are the same.";
        exit;
    }

    // Retrieve the hashed password from the database
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $currentUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentPasswordHash = $row["password"];

        // Check if the old password matches the current hashed password
        if (password_verify($oldPassword, $currentPasswordHash)) {
            // Hash the new password
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            // Update the password in the database
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
            $stmt->bind_param("ss", $hashedNewPassword, $currentUsername);
            if ($stmt->execute()) {
                http_response_code(200);
                echo "Password changed successfully.";
            } else {
                http_response_code(500);
                echo "Error updating password: " . $conn->error;
            }
        } else {
            http_response_code(400);
            echo "Invalid old password.";
        }
    } else {
        http_response_code(400);
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
}
?>
