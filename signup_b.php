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
            /* background-color: #A7E6FF; */
            background-color: white;
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
            background-image: url('img_81.avif');
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
                <!-- <label for="usertype" style="display: none;">Select User Type:</label> -->
                <!-- <select name="usertype" id="usertype" class="input-field" style="display: none;" required>
                    <option value="business">Business</option>
                    <option value="individual">Individual</option>
                </select> -->
                <button type="submit" class="login-button">Sign Up</button>
                <p class="signup-text">Already have an account? <a href="loginnew.php">Log In</a></p>
            </form>
        </div>
    </div>

</body>

</html>