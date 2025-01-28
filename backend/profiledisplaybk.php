<?php
include("config.php");

// Ensure the user is logged in
if (!isset($_SESSION['id'])) {
    echo "<script>alert('Please log in to view your profile.'); window.location.href='login.html';</script>";
    exit;
}


// Get the logged-in user ID from the session
$id = $_SESSION['id'];


// Fetch user details from the database
$sql = "SELECT * FROM user_details WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();



if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "No user details found.";
    exit;
}
?>