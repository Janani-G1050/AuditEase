<?php include('backend/config.php');
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
            font-family: 'Roboto', Arial, sans-serif;
            color: #333;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background-color: #f4f9fd;
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
        }

        .sidebar h2 {
            margin-bottom: 20px;
        }

        .sidebar a {
            text-decoration: none;
            color: #fff;
            margin: 10px 0;
            font-size: 16px;
        }

        .sidebar a:hover {
            color: #8EC5FC;
        } */

        /* .content {
            margin-left: 260px;
            padding: 20px;
            width: calc(100% - 260px);
        } */

        .content {
            margin-left: 260px;
            padding: 20px;
            width: calc(100% - 260px);
            background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            /* background-color: #ebf5ff; */
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        /* .container {

            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-height: 93vh;
            overflow-y: auto;
            width: 100%;
        } */

        .container {
            max-width: 1200px;
            width: 100%;
            margin: 20px 0;
            padding: 30px;
            background: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #074799;
        }

        /* .notification {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            margin-bottom: 15px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
        } */
        .notification {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #d1e3f8;
            border-radius: 8px;
            transition: transform 0.3s ease, background 0.3s ease, box-shadow 0.3s ease;
        }

        .notification:hover {
            background: #eef2ff;
            transform: scale(1.05);
            /* Adds the zoom-in effect */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            /* Optional: Adds a subtle shadow on hover */
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
            font-size: 11px;
            color: #5a6b8c;
            margin-left: 70%;
        }

        .notification-message {
            font-size: 14px;
            margin-bottom: 10px;
            color: #444;
        }

        .notification-time {
            font-size: 13px;
            color: #2563eb;
            /* Primary blue */
            font-weight: 500;
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
            background: darkblue;
        }

        .notification-status {
            padding: 5px;
            font-size: 10px;
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
            background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);

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
            background-color: #2563eb;
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
        }
    </style>
</head>

<body>
    <?php include('sidebar_2.php') ?>
    <div class="content">

        <div class="container">
            <h1>Notifications</h1>

            <?php
            $query2 = "SELECT * FROM reminder_2 ORDER BY deadline ASC";
            $result2 = $conn->query($query2);
            $currentDate = new DateTime();
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    $amount = $row['amount'];
                    $category = $row['category'];
                    $id = $row['id'];
                    $deadline = $row['deadline'];
                    $created_on = $row['created_on'];
                    $status = $row['status'];

                    $deadlineDate = new DateTime($deadline);
                    $interval = $currentDate->diff($deadlineDate);
                    $daysRemaining = $interval->days;

                    $isPast = $deadlineDate < $currentDate;
                    $defstatus = $isPast ? "Past Due" : "$daysRemaining days remaining";
                    $statusClass = $isPast ? "past" : "upcoming";

                    echo "
            <div class='notification'>
              <div class='notification-details'>
                <div class='notification-title'>
                  <div>$category</div>
                  <div class='notification-created'>Created on: $created_on</div>
                </div>
                <div class='notification-message'>Amount: ₹$amount</div>
                <div class='notification-time'>Your $category bill of ₹$amount is due in $daysRemaining days. Please make the payment to avoid any inconvenience.</div>
                <div class='notification-status $statusClass'>$defstatus</div>
              </div>";
                    if ($status == 'read') {
                        echo "<img src='image/tick.png' alt='Read' style='width:30px; height:30px;'></div>";
                    } else {
                        echo "<a href='backend/read_2bk.php?id=$id'><button class='delete-btn'>Mark as Read</button></a></div>";
                    }
                }
            } else {
                echo '<div>No notifications available.</div>';
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>