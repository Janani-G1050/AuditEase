<?php
include("config.php");

$amount = $_POST['amount'];

$category = $_POST['category'];

$deadline = $_POST['deadline'];



$sql = "INSERT INTO tax_rem (amount, category, deadline) VALUES('$amount','$category','$deadline')";


if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">';
    echo 'alert("Reminder Set Successfully");';
    echo 'window.location.href = "../tax_rem.php";';
    echo '</script>';

    // header("Location:../login.html");

    exit();

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>