<?php
include("config.php");

$first_name = $_POST['first_name'];

$last_name = $_POST['last_name'];

$email = $_POST['email'];

$phone = $_POST['phone'];

$password = $_POST['password'];

$usertype = $_POST['usertype'];

$company = $_POST['company_name'];

$country = $_POST['country'];

$employees = $_POST['employees'];



$username = $first_name . " " . $last_name;


$show = "UPDATE user_details SET first_name='$first_name',
last_name='$last_name',
email='$email',
phone='$phone' WHERE id=$usertype;

if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">';
    echo 'alert("Signup Successfully");';
    echo 'window.location.href = "../login.html";';
    echo '</script>';
    // header("Location:../login.html");

    exit();

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

/* The `?>` tag in PHP is used to close the PHP code block. It is optional to include it at the end of
a PHP file, especially if the file contains only PHP code. Including `?>` explicitly is not
necessary, but it can be used to explicitly mark the end of the PHP code block. */
?>