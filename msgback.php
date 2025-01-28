<?php
include('backend/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Page</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #background-color: #8EC5FC;
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;

        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #444;
        }

        .notification {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            margin-bottom: 15px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;

        }

        .notification:hover {
            background: #eef2ff;
        }

        .notification-details {
            flex: 1;
            margin-right: 10px;
        }

        .notification-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
        }

        .notification-created {
            position: relative;
            top: 70px;
            color: black;
            font-size: 11px;
            right: -5%;
        }

        .notification-message {
            font-size: 14px;
            margin-bottom: 5px;
            color: #666;
        }

        .notification-time {
            font-size: 12px;
            color: #0D92F4;

        }

        .scroll {
            max-height: 356px;
            /* Set maximum height for the table container */
            overflow-y: auto;
            /* Add vertical scrolling */
            display: block;
            /* Ensures proper scrolling behavior */
            width: 100%;
        }

        .delete-btn {
            background: blue;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .delete-btn:hover {
            background: blue;
        }

        .notification-status {
            padding: 5px;
            font-size: 10px;
            text-align: left;

        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Notifications</h1>

        <?php
        $query2 = "SELECT * FROM tax_rem ORDER BY deadline ASC";
        $result2 = $conn->query($query2);

        // Get the current date
        $currentDate = new DateTime();
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $amount = $row['amount'];
                $category = $row['category'];
                $id = $row['id'];
                $deadline = $row['deadline'];
                $created_on = $row['created_on'];
                $status = $row['status'];

                // Calculate the days remaining
                $deadlineDate = new DateTime($deadline);
                $interval = $currentDate->diff($deadlineDate);
                $daysRemaining = $interval->days;

                // Determine if the deadline is in the future or past
                $isPast = $deadlineDate < $currentDate;
                $defstatus = $isPast ? "Past Due" : "$daysRemaining days remaining";

                // $notificationClass = $status == 0 ? "unread" : "read";
                // $readStatus = $status == 0 ? "Unread" : "Read";
        
                echo "
                <div class='notification'>
                    <div class='notification-details'>
                        <div class='notification-title'>
                            <div class='notification-category'>$category</div><br>
                            <div class='notification-created'>Created on: $created_on</div>
                        </div>
                        <div class='notification-message'>Amount: $amount</div>
                        <div class='notification-time'>Your $category bill of ₹$amount is due in $daysRemaining days, Please make the payment to avoid any inconvenence</div>
                        <div class='notification-status'>$defstatus</div>
                    </div>
                
                   
            ";
                if ($status == 'read') {
                    echo "
              <img src='image/tick.png' alt='' style='width:30px; height:30px;'>
              </div>";
                } else {
                    echo "
                <a href='backend/readbk.php?id=$id'><button class='delete-btn'>Read</button></a>
                </div>";
                }
            }



        } else {
            echo '<tr><td colspan="4">No data in the table.</td></tr>';
        }
        $conn->close();
        ?>





    </div>
</body>

</html>



<!-- back up -->
<?php
include('backend/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Page</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #background-color: #8EC5FC;
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;

        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #444;
        }

        .notification {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            margin-bottom: 15px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;

        }

        .notification:hover {
            background: #eef2ff;
        }

        .notification-details {
            flex: 1;
            margin-right: 10px;
        }

        .notification-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
        }

        .notification-created {
            position: relative;
            top: 70px;
            color: black;
            font-size: 11px;
            right: -5%;
        }

        .notification-message {
            font-size: 14px;
            margin-bottom: 5px;
            color: #666;
        }

        .notification-time {
            font-size: 12px;
            color: #0D92F4;

        }

        .scroll {
            max-height: 356px;
            /* Set maximum height for the table container */
            overflow-y: auto;
            /* Add vertical scrolling */
            display: block;
            /* Ensures proper scrolling behavior */
            width: 100%;

        }

        .delete-btn {
            background: blue;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .delete-btn:hover {
            background: blue;
        }

        .notification-status {
            padding: 5px;
            font-size: 10px;
            text-align: left;

        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Notifications</h1>

        <?php
        $query2 = "SELECT * FROM tax_rem ORDER BY deadline ASC";
        $result2 = $conn->query($query2);

        // Get the current date
        $currentDate = new DateTime();
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $amount = $row['amount'];
                $category = $row['category'];
                $id = $row['id'];
                $deadline = $row['deadline'];
                $created_on = $row['created_on'];
                $status = $row['status'];

                // Calculate the days remaining
                $deadlineDate = new DateTime($deadline);
                $interval = $currentDate->diff($deadlineDate);
                $daysRemaining = $interval->days;

                // Determine if the deadline is in the future or past
                $isPast = $deadlineDate < $currentDate;
                $defstatus = $isPast ? "Past Due" : "$daysRemaining days remaining";

                // $notificationClass = $status == 0 ? "unread" : "read";
                // $readStatus = $status == 0 ? "Unread" : "Read";
        
                echo "
                <div class='notification'>
                    <div class='notification-details'>
                        <div class='notification-title'>
                            <div class='notification-category'>$category</div><br>
                            <div class='notification-created'>Created on: $created_on</div>
                        </div>
                        <div class='notification-message'>Amount: $amount</div>
                        <div class='notification-time'>Your $category bill of ₹$amount is due in $daysRemaining days, Please make the payment to avoid any inconvenence</div>
                        <div class='notification-status'>$defstatus</div>
                    </div>
                
                   
            ";
                if ($status == 'read') {
                    echo "
              <img src='image/tick.png' alt='' style='width:30px; height:30px;'>
              </div>";
                } else {
                    echo "
                <a href='backend/readbk.php?id=$id'><button class='delete-btn'>Read</button></a>
                </div>";
                }
            }



        } else {
            echo '<tr><td colspan="4">No data in the table.</td></tr>';
        }
        $conn->close();
        ?>





    </div>
</body>

</html>