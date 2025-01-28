<?php
include("backend/config.php");

if (!isset($_SESSION['id'])) {
    echo "
    <script>
        alert('You are not logged in. Redirecting to login page.');
        window.location.href = 'loginnew.php';
    </script>
    ";
    exit;
}


$user_id = $_SESSION['id'];

$sql = "SELECT * FROM user_details WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['username'];
    $email = $row['email'];
    $phone = $row['phone'];
    $usertype = $row['usertype'];
    $companyname = $row['Company_Name'];
    $count = $row['count'];
    $region = $row['Region'];
} else {
    echo ("User not found.");
}
?>


<?php


if (!isset($_SESSION['id'])) {
    echo "
    <script>
        alert('You are not logged in. Redirecting to login page.');
        window.location.href = 'loginnew.php';
    </script>
    ";
    exit;
}

$user_id = $_SESSION['id'];

$sql = "SELECT * FROM user_details WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $first_name = $row['username'];
    $email = $row['email'];
    $phone = $row['phone'];
    $usertype = $row['usertype'];
    $companyname = $row['Company_Name'];
    $count = $row['count'];
    $region = $row['Region'];
} else {
    echo ("User not found.");
}
?>

<!-- profile -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 0;
            background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            filter: brightness(0.8) contrast(1.5);
            overflow: hidden;
        }

        /* Preloader styles */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #8EC5FC;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loader {
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #3498db;
            width: 60px;
            height: 60px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .container {
            margin: 70px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 0px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transform-origin: left;
            transform: scaleX(0);
            transition: transform 1s ease-in-out, opacity 0.5s ease-in-out;
            width: 800px;
            margin-left: 500px;
        }

        .details {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            margin: 10px 0;
            background-color: #f7fbff;
            border: 1px solid #d6e8f7;
            border-radius: 6px;
            align-items: center;
        }

        .btn {
            display: block;
            width: 100%;
            max-width: 250px;
            margin: 20px auto;
            padding: 12px;
            text-align: center;
            font-weight: bold;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <?php include('sidebar_2.php') ?>


    <div id="preloader">
        <div class="loader"></div>
    </div>


    <!-- Main Content -->
    <div class="container" id="profile-container">
        <h2>User Details</h2>

        <div class="details">
            <label>Full Name: </label>
            <span><?php echo $first_name; ?></span>
        </div>

        <div class="details">
            <label>Email: </label>
            <span><?php echo $email; ?></span>
        </div>

        <div class="details">
            <label>Phone Number: </label>
            <span><?php echo $phone; ?></span>
        </div>

        <div class="details">
            <label>User Type: </label>
            <span><?php echo $usertype; ?></span>
        </div>

        <div class="details">
            <label>Company Name: </label>
            <span><?php echo $companyname; ?></span>
        </div>

        <div class="details">
            <label>Count: </label>
            <span><?php echo $count; ?></span>
        </div>

        <div class="details">
            <label>Region: </label>
            <span><?php echo $region; ?></span>
        </div>

        <a href="edituser.php" class="btn" id="open-profile">Edit Details</a>
    </div>

    <script>
        // Preloader fade-out script
        window.addEventListener('load', function () {
            const preloader = document.getElementById('preloader');
            const container = document.querySelector('.container');
            preloader.style.display = 'none';
            container.style.opacity = 1;
            container.style.transform = 'scaleX(1)';
        });

        // Door-opening effect on button click
        document.getElementById('open-profile').addEventListener('click', function (event) {
            event.preventDefault();
            const container = document.getElementById('profile-container');
            container.style.transformOrigin = 'left';
            container.style.transform = 'scaleX(0)';
            setTimeout(() => {
                window.location.href = "edituser_i.php";
            }, 1000); // Redirect after animation completes
        });
    </script>

</body>

</html>