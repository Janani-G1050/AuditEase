<?php
include("config.php");

$fileid = $_POST['fileid'];
$passkey = $_POST['passkey'];
$filepdf = $_POST['filepdf'];

$sql = "SELECT * FROM document WHERE password = '$passkey' AND id = '$fileid'";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows == 1) {

    $_SESSION["logged_in"] = true;
    $userInfo = $result->fetch_assoc();


    $filePath = "uploads/$filepdf";


    if (file_exists($filePath)) {
        // Open the file in the browser
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . basename($filePath) . '"');
        readfile($filePath);
        exit();
    } else {
        echo "<script type='text/javascript'>alert('File not found.'); window.location.href='../files.php';</script>";
    }

} else {
    echo "<script type='text/javascript'>alert('Incorrect passkey.'); window.location.href='../files.php';</script>";
}

$conn->close();
?>