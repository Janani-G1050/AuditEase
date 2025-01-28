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
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f3f5f8;
            color: #333;
            padding: 20px;
            background-color: #87ceeb;
            background-image: url('business.avif');
        }

        .container {
            display: flex;
            width: 90%;
            max-width: 900px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            flex-direction: column;
            /* Stack sections vertically on small screens */
            max-height: 100vh;
        }

        @media(min-width: 768px) {
            .container {
                flex-direction: row;
                /* Side by side sections on larger screens */
                height: auto;
            }
        }

        .left-section,
        .right-section {
            padding: 40px;
            flex: 1;
        }

        .left-section {
            background-color: #ffffff;

        }

        .right-section {
            background-image: url('signup_pro1.avif');
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;

        }

        .form-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
        }

        .form {
            display: flex;
            flex-direction: column;
        }

        .form label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .form input[type="text"],
        .form input[type="text"],
        .form input[type="email"],
        .form input[type="password"],
        .form input[type="tel"] {
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form button {
            padding: 12px;
            background-color: #5b26cd;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .form button:hover {
            background-color: #5816e7;
        }

        .login-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Left Section: Form -->
        <div class="left-section">
            <div class="form-title">Create your account</div>
            <form class="form" action="backend/signupbk.php" method="POST" class="signup-form">
                <label for="Firstname">First Name</label>
                <input type="text" id="Firstname" name="first_name" placeholder="Enter your First name" required />
                <label for="Lastname">Last Name</label>
                <input type="text" id="Lastname" name="last_name" placeholder="Enter your Last name" required />
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="example@gmail.com" required />
                <label for="phone">Mobile Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your mobile number" required />
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a Password" required />
                <input type="hidden" name="usertype" value="business">
                <button type="submit">Sign Up</button>
            </form>

            <div class="login-options">
                Already have an account? <a href="loginnew.php" style="color: #5441e0; text-decoration: none;">Login</a>
            </div>
        </div>

        <!-- Right Section: Information -->
        <div class="right-section">
            <!-- Background image and any additional content for the right section -->
        </div>
    </div>
</body>

</html>


<!-- login old -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f3f5f8;
            color: #333;
            background-color: #87ceeb;
            background-image: url('fin.avif');
            background-size: contain;

        }

        .container {
            display: flex;
            width: 80%;
            height: 70vh;
            max-width: 900px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .left-section,
        .right-section {
            padding: 40px;
        }

        .left-section {
            width: 50%;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right-section {
            width: 50%;
            background-image: url('login_3.avif');
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .form {
            display: flex;
            flex-direction: column;
        }

        .form label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .form input[type="text"],
        .form input[type="password"] {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form button {
            padding: 12px;
            background-color: #5b26cd;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .form button:hover {
            background-color: #5816e7;
        }

        .login-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #666;
            margin-top: 20px;
        }

        .login-options a {
            color: #5441e0;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Left Section: Login Form -->
        <div class="left-section">
            <div class="form-title">Welcome You Back</div>
            <form action="backend/loginbk.php" method="POST" class="form">


                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required />

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required />


                <button type="submit">Login</button>
            </form>
            <div class="login-options">
                Don't have an account? <a href="signup_b.php">Create an account</a>
            </div>
        </div>

        <!-- Right Section: Image -->
        <div class="right-section">
            <!-- Right section for the background image -->

        </div>
    </div>
</body>

</html>
<!-- new code login -->
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
            background: linear-gradient(to bottom right, #4a90e2, #56c8f2);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .logo-container {
            text-align: center;
        }

        .logo {
            height: 80px;
            width: auto;
            margin-bottom: 10px;
        }

        .left-section h1 {
            font-size: 2rem;
            margin: 10px 0;
        }

        .description {
            font-size: 0.9rem;
            text-align: center;
            margin-top: 20px;
            opacity: 0.8;
        }

        /* Right Section */
        .right-section {
            flex: 1;
            background: #C4E1F6;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .right-section h2 {
            color: black;
            /*#4a90e2*/
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

        h1 {
            font-family: 'Roboto Slab', serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Left Section -->
        <div class="left-section">
            <div class="logo-container">
                <img src="AuditEase.png" alt="Logo" class="logo">
                <h1>AuditEase</h1>
            </div>
            <!-- <p class="description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non nunc sed sem maximus vehicula.
            </p> -->
        </div>

        <!-- Right Section -->
        <div class="right-section">
            <h2>Welcome</h2>
            <p>Login to your account to continue</p>
            <form>
                <input type="text" placeholder="Username" class="input-field" required>
                <input type="password" placeholder="Password" class="input-field" required>

                <button type="submit" class="login-button">LOG IN</button>
                <p class="signup-text">Don’t have an account? <a href="signup_b.php">Sign Up</a></p>
            </form>
        </div>
    </div>
</body>

</html>

<!-- message css -->
* {
margin: 0;
padding: 0;
box-sizing: border-box;
}

body {
font-family: Arial, sans-serif;
color: #333;
display: flex;
min-height: 100vh;
flex-direction: column;

}

/* .sidebar {
width: 250px;
background: #34495e;
color: #fff;
position: fixed;
top: 0;
left: 0;
bottom: 0;
padding: 20px;
display: flex;
flex-direction: column;
align-items: center;
box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar h2 {
margin-bottom: 30px;
font-size: 22px;
font-weight: bold;
}

.sidebar a {
text-decoration: none;
color: #fff;
margin: 15px 0;
font-size: 16px;
padding: 8px;
border-radius: 5px;
transition: background 0.3s ease;
}

.sidebar a:hover {
background: #1abc9c;
} */

.content {
margin-left: 260px;
padding: 20px;
width: calc(100% - 260px);
background-color: #80C4E9;
display: flex;
flex-direction: column;
align-items: center;
min-height: 100vh;
}

.container {
max-width: 1234px;
width: 100%;
margin: 20px 0;
padding: 30px;
background: #fff;
box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
border-radius: 0px;
overflow-y: auto;
}

h1 {
text-align: center;
margin-bottom: 20px;
font-size: 28px;
color: #4335A7;
font-weight: bold;
}

.notification {
display: flex;
align-items: center;
justify-content: space-between;
padding: 15px;
margin-bottom: 20px;
background: #f9f9f9;
border: 1px solid #ddd;
border-radius: 8px;
transition: background 0.3s ease;
}

.notification:hover {
background: #eef2ff;
}

.notification-details {
flex: 1;
margin-right: 15px;
}

.notification-title {
font-size: 18px;
font-weight: bold;
margin-bottom: 5px;
display: flex;
justify-content: space-between;
}

.notification-created {
font-size: 12px;
color: #888;
}

.notification-message {
font-size: 14px;
margin-bottom: 10px;
color: #666;
}

.notification-time {
font-size: 13px;
color: #0D92F4;
}

.delete-btn {
background: #1abc9c;
color: #fff;
border: none;
padding: 8px 14px;
border-radius: 5px;
cursor: pointer;
font-size: 14px;
transition: background 0.3s ease;
}

.delete-btn:hover {
background: #16a085;
}

.notification-status {
padding: 5px;
font-size: 10px;
color: #fff;
background-color: #e74c3c;
border-radius: 5px;
}

.notification-status.past {
background-color: #e74c3c;
}

.notification-status.upcoming {
background-color: #f39c12;
}

@media (max-width: 768px) {
.sidebar {
position: relative;
width: 100%;
height: auto;
}

.content {
margin-left: 0;
width: 100%;
}

.container {
padding: 15px;
}
}
</style>