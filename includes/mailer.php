<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // CSRF check
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        http_response_code(403);
        echo json_encode(['message' => 'Invalid request']);
        exit;
    }

    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);
    $human = trim($_POST['human']); // Honeypot field

    if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL) || !empty($human)) {
        http_response_code(400);
        echo json_encode(['message' => 'Invalid form submission']);
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = $config['smtp_host'];
        $mail->SMTPAuth = true;
        $mail->Username = $config['smtp_user'];
        $mail->Password = $config['smtp_pass'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = $config['smtp_port'];

        $mail->setFrom($config['from_email'], $config['from_name']);
        $mail->addAddress($config['to_email']);

        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "<strong>Name:</strong> $name<br><strong>Email:</strong> $email<br><strong>Message:</strong><br>$message";

        $mail->send();
        echo json_encode(['message' => 'Message has been sent']);

        // Log successful submission
        error_log("Email sent successfully from $email");
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['message' => 'An error occurred while sending the message']);

        // Log the error (but don't expose it to the client)
        error_log("Mailer Error: " . $mail->ErrorInfo);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
}