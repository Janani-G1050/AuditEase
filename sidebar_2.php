<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
    }

    .sidebar {
        width: 250px;
        background-color: white;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        color: black;
        overflow: hidden;
        /* Prevents overflow */
    }

    .sidebar .logo-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 30px;
    }

    .sidebar .logo-container img {
        width: 70px;
        height: 70px;
        margin-bottom: 10px;
    }

    .sidebar h2 {
        font-size: 20px;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        margin: 0;
        color: black;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
        margin: 20px 0 0 0;
        width: 100%;
    }

    .sidebar ul li {
        margin-bottom: 15px;
        width: 100%;
    }


    .sidebar ul li a,
    .sidebar ul li button {
        text-decoration: none;
        color: black;
        display: flex;
        align-items: center;
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 16px;
        background: none;
        border: none;
        cursor: pointer;
        text-align: left;
        width: calc(100% - 40px);
        /* Constrains hover area */
        box-sizing: border-box;
        transition: all 0.3s ease;
    }

    .sidebar ul li a:hover,
    .sidebar ul li button:hover {
        background-color: #f0f0f0;
        color: #1c75bc;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }


    .sidebar ul li img {
        width: 20px;
        height: 20px;
        margin-right: 15px;
        transition: transform 0.4s ease;
        /* Icon animation */
    }

    .sidebar ul li:hover img {
        transform: rotate(20deg);
        /* Icon rotation effect */
    }

    /* Dropdown styles */
    .dropdown {
        position: relative;
        width: 100%;
    }

    .dropdown-btn {
        background: none;
        border: none;
        padding: 0;
    }

    .dropdown-content {
        display: none;
        flex-direction: column;
        padding-left: 20px;
    }

    .dropdown-content a {
        text-decoration: none;
        color: black;
        /* Black text for dropdown links */
        padding: 10px 15px;
        border-radius: 4px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .dropdown-content a:hover {
        background-color: #f0f0f0;
        color: #1c75bc;
        /* Blue text on hover */
        transform: scale(1.02);
    }

    .dropdown.active .dropdown-content {
        display: flex;
    }

    /* Main content styling */
    .content {
        margin-left: 270px;
        padding: 20px;
        flex-grow: 1;
        background-color: #f7f9fc;
        color: #34495e;
        min-height: 100vh;
    }

    .content h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .content p {
        font-size: 16px;
    }
</style>

<div class="sidebar">
    <!-- Logo container -->
    <div class="logo-container">
        <img src="Auditease.png" alt="AuditEase Logo">
        <h2>AuditEase</h2>
    </div>
    <ul>
        <li>
            <a href="dash_trial.php">
                <img src="icon_23.png" alt="Dashboard Icon">
                Dashboard
            </a>
        </li>
        <li>
            <a href="doc_in.php">
                <img src="icon_20.png" alt="Manage Icon">
                Manage
            </a>
        </li>
        <li>
            <a href="reminder_2.php">
                <img src="icon_21.png" alt="Reminder Icon">
                Set Reminder
            </a>
        </li>
        <li>
            <a href="message_2.php">
                <img src="icon_22.png" alt="Notifications Icon">
                Notifications
            </a>
        </li>
        <li class="dropdown">
            <button class="dropdown-btn">
                <img src="icon_24.png" alt="Settings Icon">
                Settings
            </button>
            <div class="dropdown-content">
                <a href="profile_page_i.php">Profile Settings</a>

                <a href="resetpassword_i.php">Password</a>
            </div>
        </li>
        <li>
            <a href="chat_bot.php">
                <img src="icon_25.png" alt="AI Assistant Icon">
                AI Assistant
            </a>
        </li>
        <li>
            <a href="index.php">
                <img src="icon_26.png" alt="Log Out Icon">
                Log Out
            </a>
        </li>
    </ul>
</div>

<script>

    document.querySelectorAll('.dropdown-btn').forEach(button => {
        button.addEventListener('click', function () {
            const dropdown = this.parentElement;
            dropdown.classList.toggle('active');
        });
    });
</script>