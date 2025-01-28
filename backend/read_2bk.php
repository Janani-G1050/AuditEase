<?php
include("config.php");

$id = $_GET['id'];


$sql = "UPDATE reminder_2 SET status='read' WHERE id=$id";


if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">';
    echo 'alert("Updated");';
    echo 'window.location.href = "../message_2.php";';
    echo '</script>';

    // header("Location:../login.html");

    exit();

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>