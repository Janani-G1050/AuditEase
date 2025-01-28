<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e3f2fd;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            box-shadow: 0px 12px 24px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            width: 100%;
            max-width: 450px;
            text-align: center;
            animation: zoomIn 0.7s ease-in-out;
            overflow: hidden;
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        h2 {
            color: #1e88e5;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        p {
            color: #555;
            font-size: 15px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .email-input {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            border: 1px solid #1e88e5;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        .email-input:focus {
            border-color: #1565c0;
            box-shadow: 0px 0px 5px rgba(30, 136, 229, 0.4);
        }

        .send-btn {
            background-color: #1e88e5;
            color: white;
            padding: 14px 24px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
        }

        .send-btn:hover {
            background-color: #1565c0;
            transform: translateY(-4px);
        }

        .send-btn:active {
            transform: translateY(1px);
        }

        .icon {
            font-size: 60px;
            color: #1e88e5;
            margin-bottom: 30px;
            animation: rotate 1.5s linear infinite;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .container .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }

        .container .footer a {
            color: #1e88e5;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .container .footer a:hover {
            color: #1565c0;
        }

        /* Pop-up message style */
        .popup-message {
            position: fixed;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #4caf50;
            color: white;
            padding: 20px;
            border-radius: 8px;
            font-size: 16px;
            display: none;
            animation: popUp 0.4s ease-in-out;
        }

        @keyframes popUp {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Background overlay for the popup */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background-color: rgba(0, 0, 0, 0.5); */
            display: none;
            z-index: 2;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="icon">
            <i class="fa fa-lock"></i>
        </div>
        <h2>Forgot Your Password?</h2>
        <p>Enter your email address to receive a link to reset your password.</p>
        <form action="backend/forgotpasswordbk.php" method="POST" id="resetForm">

            <input type="email" class="email-input" name="email" placeholder="Enter your email" required>
            <button type="submit" class="send-btn">Send Reset Link</button>
        </form>

        <div class="footer">
            <p>Remembered your password? <a href="loginnew.php">Log in here</a></p>
        </div>
    </div>

    <!-- Pop-up and Overlay -->
    <div class="popup-overlay" id="popupOverlay"></div>
    <div class="popup-message" id="popupMessage">
        <p>Password reset link sent successfully!</p>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
        document.getElementById('resetForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form from submitting normally

            // Change button text and disable it
            const sendButton = document.querySelector('.send-btn');
            sendButton.innerHTML = "Sending...";
            sendButton.disabled = true;

            // Simulate email sending (this could be an actual API call)
            setTimeout(function () {
                // Show pop-up message and overlay
                document.getElementById('popupMessage').style.display = "block";
                document.getElementById('popupOverlay').style.display = "block";

                // Reset the button and form
                sendButton.innerHTML = "Send Reset Link";
                sendButton.disabled = false;
            }, 2000); // 2 seconds delay (simulated email sending time)
        });

        // Close the pop-up message after 3 seconds
        setTimeout(function () {
            document.getElementById('popupMessage').style.display = "none";
            document.getElementById('popupOverlay').style.display = "none";
        }, 3000); // 3 seconds before hiding the pop-up
    </script>

</body>

</html>