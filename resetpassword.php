<?php

include("backend/config.php");
$id = $_SESSION["id"];


$sql = "SELECT * FROM user_details WHERE id= $id";

// Execute the query
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    // User is authenticated, set session variable to indicate login
    $_SESSION["logged_in"] = true;
    $userInfo = $result->fetch_assoc();

    $_SESSION["username"] = $userInfo["username"];

    $users = $userInfo["username"];
    $passkey = $userInfo["password"];


}
// Close the database connection
$conn->close();
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
            background-color: #8BC6EC;
            background-image: linear-gradient(135deg, #074799 0%, #C9E6F0 100%);
        }

        /* .sidebar {
            width: 150px;
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);

        } */

        .sidebar ul li a:hover,
        .sidebar ul li button:hover {
            width: 200px;
            padding: 10px;
            background-color: #f0f0f0;
            transform: scale(1.05);
            color: #1c75bc;
        }

        .main-content {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: #fff;
            border-radius: 0px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 600px;
            height: 70vh;
            margin-left: 20%;

        }

        .form-container h2 {
            text-align: center;
            color: #074799;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            font-size: 14px;
            /* font-weight: bold; */
            color: #666;
            display: block;
            margin-bottom: 10px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #6c63ff;
        }

        .form-group .error {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #0D92F4;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: center;



        }

        button:hover {
            background-color: #B7E0FF;
        }
    </style>
</head>

<body>
    <?php include('sidebar.php'); ?>

    <div class="main-content">
        <div class="form-container">
            <h2>Change Password</h2>
            <form action="backend/resetbk.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $users; ?>" required>
                </div>
                <div class="form-group">
                    <label for="old-password">Old Password</label>
                    <input type="password" name="password" id="old-password" required>
                </div>
                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" name="new_password" id="new-password" required>
                    <span class="error">Your password must include an uppercase letter, a number, and a special
                        character.</span>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm-password" required>
                </div>
                <button type="submit">Change Password</button>
            </form>
        </div>
    </div>
</body>

</html>