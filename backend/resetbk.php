<?php

include("config.php");

$id = $_SESSION["id"];
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? $_POST['username'] : ''; // Or use $_SESSION['username'] if using sessions

    $old_password = $_POST['password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if ($new_password !== $confirm_password) {
        // die("New password and confirmation do not match.");
        echo "<script type='text/javascript'>alert('New password and confirmation do not match.');window.location.href='../resetpassword.php';</script>";
    }
    $sql = "SELECT * FROM user_details WHERE password = '$old_password' AND id= $id";
    $result = $conn->query($sql);
    // Check if a user with the given credentials exists
    if ($result->num_rows == 1) {
        // User is authenticated, set session variable to indicate login
        $_SESSION["logged_in"] = true;
        $userInfo = $result->fetch_assoc();
        $id = $userInfo["id"];

        $sql = "UPDATE user_details SET password='$new_password' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {

            echo "<script type='text/javascript'>alert('Password Updated Successfully');window.location.href='../resetpassword.php';</script>";

        } else {
            echo 'Error updating user details: ' . $conn->error;
        }
    } else {
        echo "<script type='text/javascript'>alert('Invalid Old Password');window.location.href='../resetpassword.php';</script>";

    }
}
$conn->close();
?>