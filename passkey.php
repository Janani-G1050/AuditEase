<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Form</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #3498db, #2ecc71);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

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
            width: 100%;
            padding: 12px;
            background: #2ecc71;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #27ae60;
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
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Security</h1>
        <form>
            <label for="passkey">Enter Passkey</label>
            <input type="password" id="passkey" placeholder="Enter your passkey here">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>