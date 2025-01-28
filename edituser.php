<?php
include("backend/config.php");

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    echo "
    <script>
        alert('You are not logged in. Redirecting to login page.');
        window.location.href = 'login.html';
    </script>
    ";
    exit;
}

// Fetch user ID from session
$user_id = $_SESSION['id'];

// Query to get current user details from the database
$sql = "SELECT * FROM user_details WHERE id = '$user_id'";
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
    die("User not found.");
}

// Handle form submission for updating user details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get updated details from the form
    $updated_name = $_POST['username'];
    $updated_email = $_POST['email'];
    $updated_phone = $_POST['phone'];
    $updated_usertype = $_POST['usertype'];
    $updated_companyname = $_POST['companyname'];
    $updated_count = $_POST['count'];
    $updated_region = $_POST['Region'];

    // Update the details in the database
    $update_sql = "UPDATE user_details SET username = ?, email = ?, phone = ?, usertype = ?, Company_Name = ?, count = ?, Region = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssssssi", $updated_name, $updated_email, $updated_phone, $updated_usertype, $updated_companyname, $updated_count, $updated_region, $user_id);

    if ($stmt->execute()) {
        echo "
        <script>
            alert('User details updated successfully.');
            window.location.href = 'profile_page_b.php';  // Redirect to the profile page
        </script>
        ";
    } else {
        echo "Error updating user details: " . $conn->error;
    }
}
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit your Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #background-color: #8EC5FC;
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);

            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 1.3);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .btn:focus {
            outline: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Edit User Details</h2>

        <form method="POST" action="edituser.php">
            <div class="form-group">
                <label for="username">Full Name:</label>
                <input type="text" id="username" name="username" value="<?php echo $first_name; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" required>
            </div>

            <div class="form-group">
                <label for="usertype">User Type:</label>
                <input type="text" id="usertype" name="usertype" value="<?php echo $usertype; ?>" required>
            </div>

            <div class="form-group">
                <label for="companyname">Company Name:</label>
                <input type="text" id="companyname" name="companyname" value="<?php echo $companyname; ?>" required>
            </div>

            <div class="form-group">
                <label for="count">Count:</label>
                <input type="text" id="count" name="count" value="<?php echo $count; ?>" required>
            </div>

            <div class="form-group">
                <label for="region">Region:</label>
                <input type="text" id="Region" name="Region" value="<?php echo $region; ?>" required>
            </div>

            <button type="submit" class="btn">Update Details</button>
        </form>
    </div>

</body>

</html> -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit your Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: linear-gradient(135deg, #074799 0%, #C9E6F0 100%);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f7fbff;
            border-radius: 10px;
            border: #d6e8f7;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 1.3);
        }

        h2 {
            text-align: left;

            color: #333;
            margin-bottom: 30px;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* text-align: left; */
            margin-bottom: 15px;
            gap: 10px;

        }

        .form-group label {
            font-weight: bold;
            color: #555;
            flex: 1;
            padding: 20px;

            text-align: left 10%;
            /* Align labels to the right */
            margin-right: 10px;


        }

        .form-group input {
            flex: 2;
            /* Adjust input width */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
            background-color: #f7fbff;

        }

        .form-group input:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }

        .row {
            display: flex;
            gap: 10px;
            /* Space between two input boxes */
            margin-bottom: 15px;
        }

        .row .form-group {
            flex: 1;

        }

        .btn {
            display: block;
            width: 20%;
            justify-content: center;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            margin-left: 400px;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .btn:focus {
            outline: none;
        }

        .region {
            margin-right: 500px;

        }



        /* hr {
            padding: 10px;
        } */
    </style>
</head>

<body>

    <div class="container">
        <h2>Edit User Details</h2 style="text-decoration:underline;">
        <hr>

        <form method="POST" action="edituser.php">
            <div class="row">
                <div class="form-group">
                    <label for="username">Full Name:</label>
                    <input type="text" id="username" name="username" value="<?php echo $first_name; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" required>
                </div>
                <div class="form-group">
                    <label for="usertype">User Type:</label>
                    <input type="text" id="usertype" name="usertype" value="<?php echo $usertype; ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="companyname">Company Name:</label>
                    <input type="text" id="companyname" name="companyname" value="<?php echo $companyname; ?>" required>
                </div>
                <div class="form-group">
                    <label for="count">Count:</label>
                    <input type="text" id="count" name="count" value="<?php echo $count; ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group region">
                    <label for="Region">Region:</label>
                    <input type="text" id="Region" name="Region" value="<?php echo $region; ?>" required>
                </div>
            </div>

            <button type="submit" class="btn">Update Details</button>
        </form>
    </div>

</body>

</html>