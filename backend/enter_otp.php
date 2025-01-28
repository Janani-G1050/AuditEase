<?php
session_start();
$sessionEmail = $_SESSION['current_email'] ?? 'No email in session';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter OTP</title>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 rgba(0, 191, 255, 0.7);
            }

            50% {
                box-shadow: 0 0 20px rgba(0, 191, 255, 0.7);
            }

            100% {
                box-shadow: 0 0 0 rgba(0, 191, 255, 0.7);
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(100%);
            }

            to {
                transform: translateY(0);
            }
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #D9EAFD;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        form {
            background: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
            animation: fadeIn 0.8s ease-in-out;
            box-shadow: bold black;
        }

        h2 {
            font-size: 1.8rem;
            color: #000957;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .email-display {
            font-size: 1rem;
            color: #555;
            margin-bottom: 20px;
            background-color: #FFFDF0;
            padding: 10px;
            border-radius: 8px;
            word-wrap: break-word;
            animation: slideIn 1s ease-in-out;
        }

        .otp-input {
            width: 100%;
            height: 40px;
            text-align: center;
            font-size: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
            margin-bottom: 20px;
            animation: pulse 2s infinite ease-in-out;
            margin-top: 20px;
        }

        .otp-input:focus {
            border-color: #00BFFF;
            box-shadow: 0 0 10px rgba(0, 191, 255, 0.5);
        }

        button {
            width: 50%;
            background-color: #344CB7;
            color: #fff;
            border: none;
            padding: 12px;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
            animation: fadeIn 1.2s ease-in-out;
            margin-top: 20px;
        }

        button:hover {
            background-color: #007ACC;
            box-shadow: 0 4px 8px rgba(0, 122, 204, 0.3);
        }

        @media (max-width: 500px) {
            form {
                width: 90%;
                padding: 20px;
            }

            .otp-input {
                height: 50px;
                font-size: 1.2rem;
            }
        }
    </style>
    <!-- <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #D9EAFD;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background: #fff;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }

        h2 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .email-display {
            font-size: 1rem;
            color: #555;
            margin-bottom: 20px;
            background-color: #f7f7f7;
            padding: 10px;
            border-radius: 8px;
            word-wrap: break-word;
        }

        .otp-input {
            width: 100%;
            height: 60px;
            text-align: center;
            font-size: 1.5rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
            margin-bottom: 20px;
        }

        .otp-input:focus {
            border-color: #00BFFF;
            box-shadow: 0 0 10px rgba(0, 191, 255, 0.5);
        }

        button {
            width: 100%;
            background-color: #00BFFF;
            color: #fff;
            border: none;
            padding: 12px;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        button:hover {
            background-color: #007ACC;
            box-shadow: 0 4px 8px rgba(0, 122, 204, 0.3);
        }

        @media (max-width: 500px) {
            form {
                width: 90%;
                padding: 20px;
            }

            .otp-input {
                height: 50px;
                font-size: 1.2rem;
            }
        }
    </style> -->
</head>

<body>
    <form action="verify_otpbk.php" method="POST">
        <h2>Enter OTP</h2>
        <div class="email-display">Email: <?php echo htmlspecialchars($sessionEmail); ?></div>
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($sessionEmail); ?>">
        <input type="text" name="otp" class="otp-input" maxlength="6" required placeholder="Enter your 6-digit OTP">
        <button type="submit">Verify OTP</button>
    </form>
</body>


</html>