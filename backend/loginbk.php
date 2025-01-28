<?php
include("config.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM user_details WHERE username = '$username' AND password = '$password'";

    // Execute the query
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {

        $_SESSION["logged_in"] = true;
        $userInfo = $result->fetch_assoc();

        $_SESSION["id"] = $userInfo["id"];
        $_SESSION["username"] = $userInfo["username"];
        $_SESSION["email"] = $userInfo["email"];
        $usertype = $userInfo["usertype"];


        if ($usertype == "business") {
            header("Location: ../dash_trial_b.php");
            exit();
        } elseif ($usertype == "individual") {
            header("Location: ../dash_trial.php");
            exit();
        } else {
            echo "Unknown role: $usertype";
        }
    } else {

        echo "<script type='text/javascript'>alert('Invalid Username and Password');window.location.href='../loginnew.php';</script>";
    }


    $conn->close();
}
?>