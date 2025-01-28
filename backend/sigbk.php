<?php
include("config.php");

$first_name = $_POST['first_name'];

$last_name = $_POST['last_name'];

$email = $_POST['email'];

$phone = $_POST['phone'];

$password = $_POST['password'];

$usertype = $_POST['usertype'];





$username = $first_name . " " . $last_name;



$sql = "INSERT INTO user_details (username, email, password, phone, usertype) VALUES('$username','$email','$password','$phone', '$usertype')";


if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">';
    echo 'alert("Signup Successfully");';
    echo 'window.location.href = "../loginnew.php";';
    echo '</script>';

    // header("Location:../login.html");

    exit();

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

<!-- signup without pop up -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
            overflow: hidden;
            background-color: #A7E6FF;
        }

        .container {
            display: flex;
            width: 90vw;
            height: 90vh;
            margin: auto;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
            animation: slide-in 1s ease-out;
        }

        .left-section {
            flex: 1;
            background-color: #7bd3ea;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 25px;
            background-image: url('reg_img.avif');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            filter: brightness(0.8) contrast(1.5);
        }

        /* Right Section */
        .right-section {
            flex: 1;
            background: #bcccdc;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .right-section h2 {
            color: black;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .right-section p {
            margin-bottom: 20px;
            color: #6c757d;
        }

        .input-field {
            width: 60%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ced4da;
            border-radius: 20px;
            font-size: 1rem;
        }

        .login-button {
            width: 50%;
            padding: 10px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .login-button:hover {
            background-color: #3b78c0;
        }

        .signup-text {
            margin-top: 20px;
            font-size: 0.9rem;
        }

        .signup-text a {
            color: #007bff;
            text-decoration: none;
        }

        .signup-text a:hover {
            text-decoration: underline;
        }

        @keyframes slide-in {
            from {
                transform: translateY(100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .container {
            margin-top: 25px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left-section"></div>

        <div class="right-section">
            <h2>Create Your Account</h2>
            <p>Fill out the details below to sign up</p>

            <form action="backend/signupbk.php" method="POST">
                <input type="text" name="first_name" placeholder="First Name" class="input-field" required>
                <input type="text" name="last_name" placeholder="Last Name" class="input-field" required>
                <input type="email" name="email" placeholder="Email Address" class="input-field" required>
                <input type="tel" name="phone" placeholder="Phone Number" class="input-field" required>
                <input type="password" name="password" placeholder="Create Password" class="input-field" required>
                <button type="submit" class="login-button">Sign Up</button>
                <p class="signup-text">Already have an account? <a href="loginnew.php">Log In</a></p>
            </form>
        </div>
    </div>
</body>

</html>

<!-- signubk file for otp pandradhukuaaga save pannirken -->
<?php
include("config.php");

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$usertype = $_POST['usertype'];

$username = $first_name . " " . $last_name;

if (!preg_match('/^\d{10}$/', $phone)) {
    echo '<script type="text/javascript">';
    echo 'alert("Phone number must be exactly 10 digits.");';
    echo 'window.location.href = "../signup_b.php";'; // Redirect to signup page
    echo '</script>';
    exit();
}

// Check if the email already exists
$sql_check_email = "SELECT * FROM user_details WHERE email = '$email'";
$result = $conn->query($sql_check_email);

if ($result->num_rows > 0) {
    // Email already exists
    echo '<script type="text/javascript">';
    echo 'alert("Email already exists");';
    echo 'window.location.href = "../signup_b.php";'; // Redirect to signup page
    echo '</script>';
    exit();
} else {
    // Insert new user details
    $sql = "INSERT INTO user_details (username, email, password, phone, usertype) VALUES('$username','$email','$password','$phone', '$usertype')";

    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">';
        echo 'alert("Signup Successfully");';
        echo 'window.location.href = "../loginnew.php";';
        echo '</script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!-- otp with signup -->
<?php
include("config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer

// Collect form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$usertype = $_POST['usertype'];

$username = $first_name . " " . $last_name;

// Validate phone number
if (!preg_match('/^\d{10}$/', $phone)) {
    echo '<script type="text/javascript">';
    echo 'alert("Phone number must be exactly 10 digits.");';
    echo 'window.location.href = "../signup_b.php";'; // Redirect to signup page
    echo '</script>';
    exit();
}

// Check if the email already exists
$sql_check_email = "SELECT * FROM user_details WHERE email = '$email'";
$result = $conn->query($sql_check_email);

if ($result->num_rows > 0) {
    echo '<script type="text/javascript">';
    echo 'alert("Email already exists");';
    echo 'window.location.href = "../signup_b.php";'; // Redirect to signup page
    echo '</script>';
    exit();
} else {
    // Generate OTP
    $otp = rand(100000, 999999);

    // Insert user details and OTP into the database (pending verification)
    $sql = "INSERT INTO user_details (username, email, password, phone, usertype, otp, otp_verified) 
            VALUES('$username', '$email', '$password', '$phone', '$usertype', '$otp', 0)";

    if ($conn->query($sql) === TRUE) {
        // Send OTP via email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'vijiguna2001@gmail.com'; // Your Gmail address
            $mail->Password = 'kkvu pobv xsle hdvn';   // Your Gmail app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('your_email@gmail.com', 'Your Website');
            $mail->addAddress($email); // Recipient's email

            $mail->isHTML(true);
            $mail->Subject = 'Your OTP for Signup';
            $mail->Body = "Hello $username,<br><br>Your OTP for signup is: <strong>$otp</strong>.<br><br>Thank you!";

            $mail->send();

            echo '<script>alert("OTP sent to your email. Please check your inbox."); window.location.href="../enter_otp.php";</script>';
        } catch (Exception $e) {
            echo '<script>alert("Failed to send OTP. Please try again later."); window.location.href="../signup_b.php";</script>';
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!-- Files -->
<?php
include("backend/config.php");
if (!isset($_SESSION["id"])) {
    // Redirect to login page
    header("Location: loginnew.php");
    exit(); // Ensure no further code execution
}

$id = $_SESSION["id"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folder Page</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4faff;
            color: #333;
            padding: 20px;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        header .title {
            font-size: 24px;
            font-weight: bold;
        }

        header .icons {
            display: flex;
            gap: 15px;
        }

        header .icons i {
            font-size: 20px;
            cursor: pointer;
        }


        .search-container {
            display: flex;
            align-items: center;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
            max-width: 600px;
        }

        .search-container input {
            flex: 1;
            border: none;
            outline: none;
            font-size: 16px;
        }

        .search-container button {
            background-color: #1e90ff;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        .search-container button:hover {
            background-color: #155fa0;
        }

        .folder-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .folder-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .folder-item:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .folder-item img {
            width: 50px;
            margin-bottom: 10px;
        }

        .folder-name {
            font-size: 16px;
            font-weight: bold;
            color: black;
        }

        .folder-info {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }


        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: slideIn 1.3s ease-out;
        }

        h1 {
            text-align: center;
            font-size: 2em;
            color: #2c3e50;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in;
        }

        label {
            display: block;
            font-size: 1.2em;
            margin-bottom: 8px;
            color: #2c3e50;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 2px solid #3498db;
            border-radius: 5px;
            outline: none;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #2ecc71;
            box-shadow: 0 0 8px rgba(46, 204, 113, 0.5);
        }

        input::placeholder {
            color: #bdc3c7;
            font-style: italic;
        }

        button {
            margin-top: 20px;
            width: 50%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            color: #42A5F5;
            /* font-size: 1em; */
            cursor: pointer;
            transition: background 0.3s ease;
            top: 24px;
            font-size: 14px;
            background: none;
            font-weight: bold;
            margin-left: 200px;
        }

        .button:focus {
            outline: none;
        }

        .search-container input {
            width: 400px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }


        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .back-button {
            position: absolute;
            top: 0px;
            right: -300px;
            font-size: 14px;
            color: #42A5F5;
            background: none;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .back-button:focus {
            outline: none;
        }

        /* .search-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px auto;
            max-width: 600px;
        }

        .search-container input[type="text"] {
            width: 100%;
            max-width: 500px;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 4px 0 0 4px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .search-container input[type="text"]:focus {
            border-color: #42A5F5;
        }

        .search-container button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #42A5F5;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-container button:hover {
            background-color: #1E88E5;
        } */
    </style>
</head>

<body>
    <!-- Header -->
    <button class="back-button" onclick="window.history.back();">&#8592; Back</button>
    <header>
        <div class="title">Your Documents</div>
        <div class="icons">
            <i class="fa fa-bars"></i>
            <i class="fa fa-th"></i>
            <i class="fa fa-cog"></i>
        </div>
    </header>


    <!-- Search -->
    <div class="search-container">
        <input type="text" id="searchInput" name="search" placeholder="Search for files or folders...">
        <button>Search</button>


    </div>

    <!-- Folder Grid -->
    <div class="folder-grid">
        <!-- Example Folder -->

        <?php
        $query2 = "SELECT * FROM document where user_id=$id";
        $result2 = $conn->query($query2);

        // Get the current date
        $currentDate = new DateTime();
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $files = $row['files'];
                $title = $row['title'];
                $id = $row['id'];
                $created_on = $row['created_on'];




                echo '
                
                <div class="folder-item">
                    <img data-toggle="modal" data-target="#exampleModalCenter" data-id="' . $id . '" data-pdf="' . $files . '" class="folder-image" src="folder.png" alt="Image Icon">
                    <div class="folder-name title">' . $title . '</div>
                    <div class="folder-info">Last opened: Aug 18, 2024</div>
                </div>
                   
            ';

            }

            // href="backend/uploads/' . $files . '"
        
        } else {
            echo '<tr><td colspan="4">No data in the table.</td></tr>';
        }
        $conn->close();
        ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#searchInput').on('keyup', function () {
                var value = $(this).val().toLowerCase(); // Get the search input value
                $('.title').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1); // Show/hide rows
                });
            });
        });
    </script>

    <!-- Modal -->
    <div class=" modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <div class="form-container">
                        <h1>Security</h1>
                        <form action="backend/verifypasskey.php" method="POST">
                            <label for="passkey">Enter Passkey</label>
                            <input type="password" name="passkey" id="passkey" placeholder="Enter your passkey here">
                            <input type="hidden" name="fileid" id="fileid">
                            <input type="hidden" name="filepdf" id="filepdf">
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const folderImages = document.querySelectorAll('.folder-image');

            folderImages.forEach(image => {
                image.addEventListener('click', function () {

                    const fileId = image.getAttribute('data-id');
                    const filePdf = image.getAttribute('data-pdf');

                    document.getElementById('fileid').value = fileId;
                    document.getElementById('filepdf').value = filePdf;
                });
            });
        });
    </script>

</body>

</html>