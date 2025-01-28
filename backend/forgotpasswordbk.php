<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $sql_check_email = "SELECT * FROM user_details WHERE email = '$email'";
    $result = $conn->query($sql_check_email);

    if ($result->num_rows > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));
        $expires = date("U") + 1800; // Token expires in 30 minutes

        // Save the token in the database
        $sql_insert_token = "INSERT INTO password_resets (email, token, expires) VALUES ('$email', '$token', '$expires')";
        $conn->query($sql_insert_token);

        // Send the reset link via email
        $reset_link = "http://yourwebsite.com/reset_password.php?token=$token";
        $subject = "Password Reset Request";
        $message = "Click on this link to reset your password: $reset_link";
        $headers = "From: noreply@yourwebsite.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "<script>alert('A password reset link has been sent to your email.'); window.location.href = '../loginnew.php';</script>";
        } else {
            echo "<script>alert('Failed to send email. Please try again later.'); window.location.href = '../forgotpassword.php';</script>";
        }
    } else {
        echo "<script>alert('Email not found.'); window.location.href = '../forgot_password.php';</script>";
    }
}
$conn->close();
?>


