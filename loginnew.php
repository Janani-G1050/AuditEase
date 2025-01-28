<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* Importing a Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap');

        /* General Reset */
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        /* Container */
        .container {
            display: flex;
            width: 90vw;
            height: 80vh;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
        }

        /* Left Section */
        .left-section {
            flex: 1;
            /* background: linear-gradient(to bottom right, #4a90e2, #56c8f2); */
            background-color: #7BD3EA;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 25px;
            background-image: url('login_img_1.avif');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            filter: brightness(0.8) contrast(1.5);

        }



        /* 
        .logo-container {
            text-align: center;
        } */

        .logo {
            height: 70px;
            width: auto;
            margin-bottom: 10px;
        }

        .left-section h1 {
            font-size: 2rem;
            margin: 10px 0;
            color: #EEEDEB;
        }

        /* Right Section */
        .right-section {
            flex: 1;
            background: #C4E1F6;
            /* #C4E1F6 */
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
            margin-top: 5px;
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

        h1 {
            font-family: "Poppins", sans-serif;
            color: black;
            font-weight: bold;
        }

        .forgot-password {
            width: 60%;
            text-align: right;
            margin-top: -10px;
            margin-bottom: 10px;
            font-size: 0.9rem;
            margin-left: 20%;
            padding-top: 15px;

        }

        .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Left Section -->
        <div class="left-section">
            <!-- <div class="logo-container">
                <img src="AuditEase.png" alt="Logo" class="logo">
                <h1>AuditEase</h1>
            </div> -->
        </div>

        <!-- Right Section -->
        <div class="right-section">
            <div class="logo-container">
                <img src="AuditEase.png" alt="logo" class="logo">
            </div>

            <h2>Welcome</h2>

            <p>Login to your account to continue</p>
            <!-- Login Form -->
            <form action="backend/loginbk.php" method="POST">
                <input type="text" name="username" placeholder="Username" class="input-field" required>
                <input type="password" name="password" placeholder="Password" class="input-field" required>
                <!-- <div class="forgot-password">
                    <a href="forgotpassword.php">Forgot Password?</a>
                </div> -->
                <button type="submit" class="login-button">LOG IN</button>
                <p class="signup-text">Don’t have an account? <a href="signup_b.php">Sign Up</a></p>

            </form>
        </div>
    </div>
</body>

</html>