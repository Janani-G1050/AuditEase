<?php
session_start();

header('Content-Type: application/json');

// Debugging: Check if session and POST variables are set
$response = [
    'debug' => [
        'submittedOtp' => $_POST['otp'] ?? 'No OTP sent',
        'sessionOtp' => isset($_SESSION['user_data'][$_SESSION['current_email']]['otp']) ? $_SESSION['user_data'][$_SESSION['current_email']]['otp'] : 'No OTP in session',
        'submittedEmail' => $_SESSION['current_email'] ?? 'No email in session',
        'sessionData' => $_SESSION, // Full session data for debugging
    ],
];

// Retrieve submitted OTP
$submittedOtp = $_POST['otp'] ?? '';

// Check if OTP and email exist in session
if (!isset($_SESSION['user_data'][$_SESSION['current_email']]['otp'], $_SESSION['current_email'])) {
    $response['status'] = 'error';
    $response['message'] = 'Session expired. Please restart the process.';
    echo json_encode($response);
    exit();
}

// Debugging: Log OTP and email
$response['debug']['otpGenerated'] = $_SESSION['user_data'][$_SESSION['current_email']]['otp'];
$response['debug']['sessionEmail'] = $_SESSION['current_email'];

// Validate OTP
$generatedOtp = $_SESSION['user_data'][$_SESSION['current_email']]['otp'];
$sessionEmail = $_SESSION['current_email'];

if ($submittedOtp === strval($generatedOtp)) {
    // OTP is valid
    unset($_SESSION['user_data'][$sessionEmail]['otp']); // Remove OTP from session for security

    // Store validated data in session for later database insertion
    $_SESSION['verified'] = true;

    // Retrieve user data from session
    $user_data = $_SESSION['user_data'][$sessionEmail];
    $username = $user_data['first_name'] . ' ' . $user_data['last_name']; // Combine first and last name for username
    $phone = $user_data['phone'];
    $password = $user_data['password']; // No password hashing
    $user_type = $user_data['user_type'];

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

    // Insert data into user_details table
    $INSERT = "INSERT INTO user_details (username, email, phone, password, usertype) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($INSERT);

    // Check if prepare was successful
    if ($stmt === false) {
        $response['status'] = 'error';
        $response['message'] = 'SQL query preparation failed: ' . $conn->error;
        echo json_encode($response);
        exit();
    }

    $stmt->bind_param("sssss", $username, $sessionEmail, $phone, $password, $user_type);

    if ($stmt->execute()) {
        // Data inserted successfully
        $_SESSION['user_data'][$sessionEmail] = null; // Clear session data after successful registration

        // Redirect to login page
        $response['status'] = 'success';
        $response['message'] = 'Registration successful. You can now login.';
        echo json_encode($response);

        // Adjusted location to redirect to loginnew.php outside the folder
        header("Location: ../loginnew.php"); // Adjusted path for redirect
        exit();
    } else {
        // Database insertion failed
        $response['status'] = 'error';
        $response['message'] = 'Error occurred while registering. Please try again.';
        echo json_encode($response);
    }

    // Close database connection
    $stmt->close();
    $conn->close();
} else {
    // OTP is invalid
    $response['status'] = 'error';
    $response['message'] = 'Invalid OTP. Please try again.';
}

echo json_encode($response);
?>