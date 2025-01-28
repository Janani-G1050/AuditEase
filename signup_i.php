<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Creation</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', Arial, sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.4),
                    rgba(0, 0, 0, 0.4)),
                url('img_73.avif');
            /* Add your image path */
            background-size: cover;
            background-position: center;
            color: #333;
            padding: 20px;
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 1100px;

            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            flex-direction: column;
            backdrop-filter: blur(-5px);
        }

        @media (min-width: 768px) {
            .container {
                flex-direction: row;
                height: auto;
            }
        }

        .left-section {
            padding: 40px;
            flex: 1;
        }

        .right-section {
            flex: 1;
            background-image: url('img_71.avif');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            filter: brightness(0.8) contrast(1.2);
            background-repeat: no-repeat;
        }

        .right-section-overlay {
            background-color: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            flex-direction: column;
            padding: 20px;
            text-align: center;

        }

        .right-section-overlay h2 {
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .right-section-overlay p {
            font-size: 1rem;
            line-height: 1.6;
            max-width: 80%;
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form {
            display: flex;
            flex-direction: column;
        }

        .form label {
            font-size: 14px;
            color: #fff;
            margin-bottom: 5px;
        }

        .form input[type="text"],
        .form input[type="email"],
        .form input[type="password"],
        .form input[type="tel"] {
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            /* background-color: #f9f9f9; */
            backdrop-filter: blur(-5px);
        }

        .form input:focus {
            outline: none;
            border: 1px solid #5b26cd;
            box-shadow: 0 0 5px rgba(91, 38, 205, 0.3);
        }

        .form button {
            padding: 12px;
            background-color: #0D92F4;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 50%;
            margin-left: 25%;
        }

        .form button:hover {
            background-color: #77CDFF;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(91, 38, 205, 0.3);
        }

        .login-options {
            margin-top: 15px;
            font-size: 14px;
            color: #fff;
            text-align: center;
        }

        .login-options a {
            color: #0D92F4;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .login-options a:hover {
            color: #fff;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .right-section-overlay h2 {
                font-size: 1.8rem;
            }

            .right-section-overlay p {
                font-size: 0.9rem;
            }
        }
    </style>

</head>

<body>
    <div class="container">
        <!-- Left Section: Form -->
        <div class="left-section">
            <div class="form-title">Create Your Account</div>
            <form action="backend/signupbk.php" method="POST" class="form">
                <label for="Firstname">First Name</label>
                <input type="text" id="Firstname" name="first_name" placeholder="Enter your first name" required>
                <label for="Lastname">Last Name</label>
                <input type="text" id="Lastname" name="last_name" placeholder="Enter your last name" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="example@gmail.com" required>
                <label for="phone">Mobile Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your mobile number" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required>
                <input type="hidden" name="usertype" value="individual">
                <button type="submit">Sign Up</button>
            </form>
            <div class="login-options">
                Already have an account? <a href="loginnew.php">Sign In</a>
            </div>
        </div>

        <!-- Right Section: Information -->
        <div class="right-section">
            <!-- <div class="right-section-overlay">
                <h2>Welcome to AuditEase</h2>
                <p>Join us to simplify your financial management and take control of your personal and business needs.
                </p>
            </div> -->
        </div>
    </div>
</body>

</html>