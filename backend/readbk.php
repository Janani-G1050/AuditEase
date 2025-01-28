<?php
include("config.php");

$id = $_GET['id'];


$sql = "UPDATE tax_rem SET status='read' WHERE id=$id";


if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">';
    echo 'alert("Updated");';
    echo 'window.location.href = "../message.php";';
    echo '</script>';

    // header("Location:../login.html");

    exit();

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>