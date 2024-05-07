<?php
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Invalid email address']);
        exit;
    }

    // Check if email exists in the database
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email exists in the database, proceed to generate and send code
        $user = $result->fetch_assoc();

        // Generate random 4-digit code
        $code = sprintf('%04d', rand(0, 9999));

        // Insert code into user's row
        $update_sql = "UPDATE users SET code=? WHERE email=?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("ss", $code, $email);
        $stmt->execute();

        // Send email using PHPMailer
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'jiroluismanalo24@gmail.com';                // SMTP username
            $mail->Password   = 'nnwz mggc xhih osav';                  // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
            $mail->Port       = 587;                                    // TCP port to connect to

            // Sender and reply-to address
            $mail->setFrom('jiroluismanalo24@gmail.com', 'Gender and Development');
            $mail->addReplyTo('jiroluismanalo24@gmail.com', 'Gender and Development');

            // Add recipient
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'Password Reset Code';
            $mail->Body    = "Your password reset code is: $code";

            $mail->send();
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success']);
            exit;

        } catch (Exception $e) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo]);
            exit;
        }
    } else {
        // Email doesn't exist in the database
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Email not found in our records.']);
        exit;
    }
}

$conn->close();
?>