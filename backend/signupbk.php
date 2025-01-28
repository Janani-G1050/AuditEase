<?php
session_start();
require 'vendor/autoload.php'; // Load PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Retrieve form data
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$password = $_POST['password'] ?? '';

// Validate inputs
if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($password)) {
    echo "<script>
            alert('All fields are required.');
            window.location.href = 'signup_b.php';
          </script>";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
            alert('Invalid email address.');
            window.location.href = 'signup_b.php';
          </script>";
    exit();
}

if (!preg_match('/^\d{10}$/', $phone)) {
    echo "<script>
            alert('Phone number must be exactly 10 digits.');
            window.location.href = 'signup_b.php';
          </script>";
    exit();
}

// Database configuration
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project_1";

// Create database connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if email already exists
$SELECT = "SELECT email FROM user_details WHERE email = ? LIMIT 1";
$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "<script>
            alert('This email is already registered.');
            window.location.href = 'signup_b.php';
          </script>";
    $stmt->close();
    $conn->close();
    exit();
}

// Generate OTP
$otp = rand(100000, 999999);

// Send OTP email
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'vijiguna2001@gmail.com'; // Replace with your email
    $mail->Password = 'kkvu pobv xsle hdvn'; // Replace with your app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('your-email@gmail.com', 'Your App Name');
    $mail->addAddress($email, $first_name . " " . $last_name);

    $mail->isHTML(true);
    $mail->Subject = 'Your OTP for Registration';
    $mail->Body = "Hello <b>$first_name $last_name</b>,<br>Your OTP is: <b>$otp</b>.<br>This OTP is valid for 5 minutes.";
    $mail->AltBody = "Hello $first_name $last_name, Your OTP is: $otp.";

    $mail->send();

    // Save OTP and user data in session
    $_SESSION['user_data'][$email] = [
        'otp' => $otp,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'phone' => $phone,
        'password' => $password
    ];

    // Save current email for reference
    $_SESSION['current_email'] = $email;

    echo "<script>
            alert('OTP sent to $email. Please check your inbox.');
            window.location.href = 'enter_otp.php';
          </script>";
} catch (Exception $e) {
    echo "<script>
            alert('Failed to send OTP. Error: {$mail->ErrorInfo}');
            window.location.href = 'signup_b.php';
          </script>";
}

$stmt->close();
$conn->close();
?>