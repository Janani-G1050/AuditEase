<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <!-- Top-left App name -->
    <div class="app-name">AuditEase</div>

    <!-- Centered container for the Change Password form -->
    <div class="container">
        <!-- Blue header box with "Change Password" text -->
        <div class="header">Change Password</div>

        <!-- Change Password Form -->
        <form>
            <!-- New Password input -->
            <div class="form-group">
                <label for="new-password">New Password</label>
                <input type="password" id="new-password" name="new-password" required>
            </div>

            <!-- Repeat Password input -->
            <div class="form-group">
                <label for="repeat-password">Repeat Password</label>
                <input type="password" id="repeat-password" name="repeat-password" required>
            </div>

            <!-- Change button -->
            <button type="submit" class="change-button">Change</button>
        </form>
    </div>
</body>

</html>