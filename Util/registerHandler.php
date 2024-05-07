<?php
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

    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $confirm = $_POST['Confirm'];
    $gender = $_POST['dropdown'];

    if (empty($username) || empty($email) || empty($password) || empty($confirm) || empty($gender)) {
        http_response_code(400);
        echo "All fields are required";
        exit;
    }

    if ($password != $confirm) {
        http_response_code(400);
        echo "Passwords do not match";
        exit;
    }

    // Check if the email already exists
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $result_email = $conn->query($check_email_sql);

    if ($result_email->num_rows > 0) {
        http_response_code(400);
        echo "Email already exists";
        exit;
    }

    // Check if the username already exists in users table
    $check_username_sql = "SELECT * FROM users WHERE username = '$username'";
    $result_username = $conn->query($check_username_sql);

    if ($result_username->num_rows > 0) {
        http_response_code(400);
        echo "Username already exists";
        exit;
    }

    // Check if the username already exists in admin table
    $check_admin_sql = "SELECT * FROM admin WHERE username = '$username'";
    $result_admin = $conn->query($check_admin_sql);

    if ($result_admin->num_rows > 0) {
        http_response_code(400);
        echo "Username already taken";
        exit;
    }

    // Check if email ends with "@gmail.com"
    if (!preg_match('/@gmail.com$/', $email)) {
        http_response_code(400);
        echo "Email must be a Gmail address";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password, gender) VALUES ('$username', '$email', '$hashed_password', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        http_response_code(500);
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
