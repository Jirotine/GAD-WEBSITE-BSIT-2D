<?php
session_start();

include('dbcon.php');

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo "Error: User not logged in.";
    exit;
}

$username = $_SESSION['username'];

// Check if user has already submitted the survey
$query = "SELECT * FROM antiharassment WHERE user_id = (SELECT user_id FROM users WHERE username = '$username')";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    echo "You have already submitted a response";
    exit;
}

// Check if all fields are filled
if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST['question1']) && isset($_POST['question2']) &&
    isset($_POST['question3']) && isset($_POST['question4']) &&
    isset($_POST['question5'])) {

    $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];
    $question4 = $_POST['question4'];
    $question5 = $_POST['question5'];

    // Insert survey data into the database
    $sql = "INSERT INTO antiharassment (user_id, question1, question2, question3, question4, question5) 
            SELECT user_id, '$question1', '$question2', '$question3', '$question4', '$question5'
            FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Survey submitted successfully";
    } else {
        echo "Unable to submit the survey.";
    }
} else {
    echo "All fields are required.";
}

mysqli_close($conn);
?>
