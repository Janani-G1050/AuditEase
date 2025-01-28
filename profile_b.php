<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #87ceeb;
            color: #333;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #fff;
            padding: 20px;
            border-right: 1px solid #e0e0e0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .sidebar h2 {
            font-size: 24px;
            font-weight: bold;
            color: #1f3b58;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            width: 100%;
        }

        .sidebar ul li {
            width: 100%;
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #e0f7fa;
            color: #00796b;
        }

        /* Profile Form */
        .profile-content {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .profile-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            max-width: 500px;
            width: 100%;
        }

        .profile-form h3 {
            color: #1f3b58;
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }

        .profile-form label {
            font-size: 14px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        .profile-form input[type="text"],
        .profile-form input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .profile-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .profile-form .submit-btn,
        .profile-form .back-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #1e88e5;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .profile-form .submit-btn:hover {
            background-color: #1565c0;
        }

        .profile-form .back-btn {
            background-color: #777;
        }

        .profile-form .back-btn:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>AuditEase</h2>
        <ul>
            <li><a href="#"><span>🏠</span> Dashboard</a></li>
            <li><a href="#"><span>💳</span> Profile</a></li>
            <li><a href="#"><span>📄</span> Manage</a></li>
            <li><a href="#"><span>📄</span> Notifications</a></li>
            <li><a href="#"><span>🔧</span> Settings</a></li>
            <li><a href="#"><span>⚙️</span> Logout</a></li>
        </ul>
    </div>

    <!-- Profile Content -->
    <div class="profile-content">
        <div class="profile-form">
            <!--hello-->

            <form class="form" action="backend/profilebk.php" method="GET" class="profile-form">
                <h3>User Profile</h3>
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" placeholder="Enter first name">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" placeholder="Enter last name">
                <label for="email">Email ID</label>
                <input type="email" id="email" placeholder="Enter email">
                <label for="company">Company Name</label>
                <input type="text" id="company" placeholder="Enter company name">
                <label for="country">Country</label>
                <input type="text" id="country" placeholder="Enter country">
                <label for="employees">Employees Count</label>
                <input type="text" id="employees" placeholder="Enter employees count">
                <label for="phone">Phone No.</label>
                <input type="text" id="phone" placeholder="Enter phone number">
                <button class="submit-btn">Save</button>
                <button class="back-btn">Back</button>
        </div>
    </div>
</body>

</html>