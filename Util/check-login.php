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

    $username = trim($_POST['Username']);
    $password = $_POST['Password'];

    if (empty($username) || empty($password)) {
        http_response_code(400);
        echo "All fields are required";
        exit;
    }

    // Check in users table
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            http_response_code(200);
            echo json_encode(["message" => "Login successful!", "redirect" => "home.php"]);
            exit;
        } else {
            // Password mismatch for regular user
            http_response_code(400);
            echo "Invalid password.";
            exit;
        }
    }

    // Check in admin table
    $sql_admin = "SELECT * FROM admin WHERE username = ?";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bind_param("s", $username);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    if ($result_admin->num_rows == 1) {
        $row_admin = $result_admin->fetch_assoc();
        // Assuming password for admin is not hashed
        if ($password === $row_admin["password"]) { // Comparing plain text passwords
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            http_response_code(200);
            echo json_encode(["message" => "Admin login successful!", "redirect" => "../Admin/adminDashboard.php"]);
            exit;
        } else {
            // Password mismatch for admin
            http_response_code(400);
            echo "Invalid password";
            exit;
        }
    }

    // No user found
    http_response_code(400);
    echo "Invalid username";

    $stmt_admin->close();
    $stmt->close();
}
?>
