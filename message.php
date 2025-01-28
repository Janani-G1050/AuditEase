<?php
include('backend/config.php');
?>
<!DOCTYPE html>
<html lang="en">
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


  .content {
    margin-left: 260px;
    padding: 20px;
    width: calc(100% - 260px);
    background-color: #ebf5ff;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
  }

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
    font-size: 30px;
    color: #1e3a8a;
    /* Dark blue */
    font-weight: bold;
  }

  .notification {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    margin-bottom: 20px;
    background: #f4f9fd;
    border: 1px solid #d1e3f8;
    border-radius: 8px;
    transition: box-shadow 0.3s ease, background 0.3s ease;
  }

  .notification:hover {
    background: #e7f3ff;
    /* Hover blue */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  }

  .notification-details {
    flex: 1;
    margin-right: 15px;
  }

  .notification-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 5px;
    color: #1e3a8a;
    /* Dark blue */
  }

  .notification-created {
    font-size: 12px;
    color: #5a6b8c;
    margin-left: 80%;
  }

  .notification-message {
    font-size: 14px;
    margin-bottom: 10px;
    color: #444;
    /* Neutral gray */
  }

  .notification-time {
    font-size: 13px;
    color: #2563eb;
    font-weight: 500;
  }

  .delete-btn {
    background: #2563eb;
    color: #fff;
    border: none;
    padding: 10px 16px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background 0.3s ease;
  }

  .delete-btn:hover {
    background: #1e3a8a;
  }

  .notification-status {
    padding: 6px 10px;
    font-size: 12px;
    color: #fff;
    border-radius: 4px;
    font-weight: 600;
  }

  .notification-status.past {
    background-color: #F95454;
  }

  .notification-status.upcoming {
    background-color: #2563eb;
  }

  @media (max-width: 768px) {
    .content {
      margin-left: 0;
      width: 100%;
    }

    .container {
      padding: 20px;
    }
  }
</style>
</head>

<body>
  <?php include('sidebar.php'); ?>

  <div class="content">
    <div class="container">
      <h1>Notifications</h1>

      <?php


      $query2 = "SELECT * FROM tax_rem ORDER BY deadline ASC";
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
            echo "<a href='backend/readbk.php?id=$id'><button class='delete-btn'>Mark as Read</button></a></div>";
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