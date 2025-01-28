<?php
include("config.php");

$purpose = $_POST['purpose'];

$a = $_POST['amount'];

$d = $_POST['date'];

$cat = $_POST['category'];
$user_id = $_SESSION["id"];



$sql = "INSERT into expin(purpose , amount , date , category,user_id) values('$purpose', '$a', '$d', '$cat', '$user_id' )";


if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">';
    echo 'alert("hey, sucessfully updated ");';
    echo 'window.location.href = "../dash_trial.php"';
    echo '</script>';
    exit();

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location:../dash_trial.php");
}

$conn->close();

?>