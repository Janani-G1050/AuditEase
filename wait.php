<?php
// Include database configuration
include('backend/config.php');

if (!isset($_SESSION["id"])) {
    // Redirect to login page
    header("Location: login.html");
    exit(); // Ensure no further code execution
}
// Initialize income total
$incomeTotal = 0;
$user_id = $_SESSION["id"];

// Query to fetch only the "income" category for the user
$query = "SELECT amount FROM expenditure WHERE user_id = '$user_id' AND category = 'income'";
$result = $conn->query($query);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $incomeTotal += $row['amount']; // Increment the income total
    }
}

$total = $incomeTotal;
$query1 = "SELECT amount FROM expenditure WHERE user_id = '$user_id' AND category = 'income'";
$result1 = $conn->query($query1);

//Check if there are rows and calculate the income total
if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $total += $row['amount']; // Increment the income total
    }
}

$salaryTotal = 0;

$query2 = "SELECT amount FROM expenditure WHERE user_id = '$user_id' AND category = 'salary'";
$result2 = $conn->query($query2);

// Check if there are rows and calculate the income total
if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $salaryTotal += $row['amount']; // Increment the income total
    }
}

$total = $total - $salaryTotal;

$profitTotal = 0;

$query3 = "SELECT amount FROM expenditure WHERE user_id = '$user_id' AND category = 'profits'";
$result3 = $conn->query($query3);

// Check if there are rows and calculate the income total
if ($result3->num_rows > 0) {
    while ($row = $result3->fetch_assoc()) {
        $profitTotal += $row['amount']; // Increment the income total
    }

}
$total = $total - $profitTotal;

$lossTotal = 0;

$query4 = "SELECT amount FROM expenditure WHERE user_id = '$user_id' AND category = 'loss'";
$result4 = $conn->query($query4);

// Check if there are rows and calculate the income total
if ($result4->num_rows > 0) {
    while ($row = $result4->fetch_assoc()) {
        $lossTotal += $row['amount']; // Increment the income total
    }

}
$total = $total - $lossTotal;

$taxTotal = 0;

$query5 = "SELECT amount FROM expenditure WHERE user_id = '$user_id' AND category = 'tax'";
$result5 = $conn->query($query5);

// Check if there are rows and calculate the income total
if ($result5->num_rows > 0) {
    while ($row = $result5->fetch_assoc()) {
        $taxTotal += $row['amount']; // Increment the income total
    }

}
$total = $total - $taxTotal;

$investmentTotal = 0;

$query7 = "SELECT amount FROM expenditure WHERE user_id = '$user_id' AND category = 'investment'";
$result7 = $conn->query($query7);

if ($result7->num_rows > 0) {
    while ($row = $result7->fetch_assoc()) {
        $investmentTotal += $row['amount']; // Increment the income total
    }

}
$total = $total - $investmentTotal;

$othersTotal = 0;

$query6 = "SELECT amount FROM expenditure WHERE user_id = '$user_id' AND category = 'Others'";
$result6 = $conn->query($query6);

// Check if there are rows and calculate the income total
if ($result6->num_rows > 0) {
    while ($row = $result6->fetch_assoc()) {
        $othersTotal = $row['amount']; // Increment the income total
    }

}


?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- bootstrap cssand js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
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
            background-color: #9694FF;
            color: #87ceeb;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #EBEAFF;
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
            color: black;
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

        .sidebar ul li a svg {
            margin-right: 10px;
            color: #00796b;
        }

        /* Main content */
        .main-content {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .top-bar input[type="text"] {
            width: 300px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
        }

        .cards {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .card {
            flex: 1;
            background-color: #FFCCEA;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .card h3 {
            font-size: 14px;
            color: #888;
            margin-bottom: 10px;
        }

        .card h2 {
            font-size: 12px;
            color: #1f3b58;
            margin-bottom: 5px;
        }

        /* Add Expenditures Form */
        .add-expenditures {
            background-color: #e3e3e3;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            max-width: 400px;
            /* margin-left: auto; */
            margin-top: 20px;
            position: relative;
            left: 16%;

        }

        .add-expenditures h3 {
            background-color: #740938;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 4px;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .add-expenditures label {
            font-size: 14px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        .add-expenditures input[type="text"],
        .add-expenditures input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .add-expenditures select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .add-expenditures .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CC9FE;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .add-expenditures .submit-btn:hover {
            background-color: #c62828;
        }

        /* Table */
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
            width: 80%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #FFE6A9;
            font-weight: bold;
        }

        table td {
            background-color: #fff;
        }

        .top-bar {
            display: flex;

        }



        .transactions {
            width: 65%;
            padding: 10px;
            color: black;

        }

        .add-expenditures {
            position: relative;
            left: 66%;
            top: -82%;
        }
    </style>
    <style>
        .scroll {
            max-height: 356px;
            /* Set maximum height for the table container */
            overflow-y: auto;
            /* Add vertical scrolling */
            display: block;
            /* Ensures proper scrolling behavior */
            width: 100%;
            /* Ensure table spans its container width */
        }

        .scroll table {
            width: 100%;
            /* Ensures the table content fits properly */
            border-collapse: collapse;
            /* Optional: for cleaner borders */
        }

        .scroll th,
        .scroll td {
            text-align: center;
            /* Optional: Align text */
            padding: 8px;
            /* Optional: Add padding for readability */
            border-bottom: 1px solid #ddd;
            /* Optional: Add a bottom border for clarity */
        }

        .scroll th {
            position: sticky;
            /* Keeps the header fixed while scrolling */
            top: 0;
            background: #4CC9FE;
            /* Background color for the header */
            z-index: 1;
            /* Ensure header is above table content */
        }
    </style>

    <!--wait-->

    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            min-width: 160px;
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>



</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>AuditEase</h2>
        <ul>
            <li><a href="dash_trial_b.php"><span>🏠</span> Dashboard</a></li>
            <li><a href="#"><span>💳</span> Profile</a></li>
            <li><a href="doc.php"><span>📄</span> Manage</a></li>
            <li><a href="tax_rem.php"><span>📄</span> Remainder</a></li>
            <li><a href="message.php"><span>📄</span> Notifications</a></li>
            <li><a href="set_2.html"><span>🔧</span> Settings</a></li>




            <div class="dropdown">
                <button class="dropbtn">Dropdown</button>
                <div class="dropdown-content">
                    <a href="#">Option 1</a>
                    <a href="#">Option 2</a>
                    <a href="#">Option 3</a>
                </div>


                <li><a href="getstarted.html"><span>⚙️</span> Logout</a></li>
        </ul>

        <!--wait-->



</html>
</div>

<section>
    <div>
        <div class="container">
            <div class="row">
                <div>
                    <div class="main-content">
                        <!-- Top Bar -->
                        <div class="col-lg-12">
                            <div class="top-bar">
                                <input type="text" placeholder="Search for something...">
                                <div class="profile-icon">👤</div>

                            </div>
                        </div>
                    </div>
                    <!-- Main Content -->


                    <!-- Balance and Summary Cards -->
                    <div class="a1">
                        <div class="cards">
                            <div class="card">
                                <h3>Total</h3>
                                <h2>$<?php echo number_format($total, 2); ?></h2>
                            </div>

                            <div class="card">
                                <h3>Income</h3>
                                <h2>$<?php echo number_format($incomeTotal, 2); ?></h2>
                            </div>
                            <div class="card">
                                <h3>Investments</h3>
                                <h2>$<?php echo number_format($investmentTotal, 2); ?></h2>
                            </div>
                            <div class="card">
                                <h3>Salary</h3>
                                <h2>$<?php echo number_format($salaryTotal, 2); ?></h2>
                            </div>
                            <div class="card">
                                <h3>Profit</h3>
                                <h2>$<?php echo number_format($profitTotal, 2); ?></h2>
                            </div>
                            <div class="card">
                                <h3>loss</h3>
                                <h2>$<?php echo number_format($lossTotal, 2); ?></h2>
                            </div>

                            <div class="card">
                                <h3>Tax</h3>
                                <h2>$<?php echo number_format($taxTotal, 2); ?></h2>
                            </div>
                            <div class="card">
                                <h3>Others</h3>
                                <h2>$<?php echo number_format($othersTotal, 2); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <section class="transactions">
                        <h3>Transactions</h3>
                        <div class="scroll">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Purpose</th>
                                        <th>Category</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- PHP Code -->
                                    <?php
                                    $user_id = $_SESSION["id"];
                                    $query2 = "SELECT * FROM expenditure where user_id ='$user_id'";
                                    $result2 = $conn->query($query2);
                                    if ($result2->num_rows > 0) {
                                        while ($row = $result2->fetch_assoc()) {
                                            $amount = $row['amount'];
                                            $category = $row['category'];
                                            $id = $row['id'];
                                            $date = $row['date'];
                                            $purpose = $row['purpose'];
                                            echo "
                    <tr>
                        <td>$purpose</td>
                        <td>$category</td>
                        <td>$amount</td>
                        <td>$date</td>
                    </tr>
                    ";
                                        }
                                    } else {
                                        echo '<tr><td colspan="4">No data in the table.</td></tr>';
                                    }
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </section>
                    </main>
                </div>

                <!-- Add Expenditures Form -->
                <div>
                    <div class="add-expenditures col-lg-6">
                        <h3>Add Expenditures</h3>
                        <form action="backend/expenditurebk.php" method="POST">
                            <label>Purpose</label>
                            <input type="text" name="purpose" placeholder="Enter purpose">
                            <label>Amount</label>
                            <input type="text" name="amount" placeholder="Enter amount">
                            <label>Date</label>
                            <input type="date" name="date">
                            <label>Category</label>
                            <select name="category">
                                <option value="Total">Total</option>
                                <option value="Income">Income</option>
                                <option value="investment">Investments</option>
                                <option value="profits">Profit</option>
                                <option value="loss">loss</option>
                                <option value="salary">Salary</option>
                                <option value="tax">Tax</option>
                                <option value="Others">Others</option>

                            </select>
                            <button class="submit-btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
</section>

</body>

</html>

<!-- reminder -->

<?php
include('backend/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Reminder</title>
    <!-- bootstrap cssand js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            margin: 0;
        }

        .main-container {
            display: flex;
            width: 50%;
            max-width: 1200px;
            left: 20%;
        }

        .sidebar {
            width: 35%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-right: 20px;
        }

        .sidebar h3 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .sidebar table {
            width: 100%;
            border-collapse: collapse;
        }

        .sidebar th,
        .sidebar td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
        }

        .sidebar th {
            background-color: #007bff;
            color: white;
        }

        .sidebar tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .reminder-container {
            background-color: #87ceeb;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 15px 0 5px;
        }

        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .notification {
            margin-top: 20px;
            padding: 10px;
            background-color: #ffcc00;
            color: #333;
            text-align: center;
            border-radius: 4px;
        }
    </style>
</head>

<body>


    <!-- Reminder Form -->
    <div class="reminder-container">
        <h2>Set Tax Reminder</h2>
        <form action="backend/rembk.php" method="POST" id="taxForm">
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" placeholder="Enter Amount" required>

            <label for="category">Category:</label>
            <select name="category" required>
                <option value="bill_payment">Bill</option>
                <option value="loan_bill">Loan</option>
                <option value="tax_bill">Tax</option>
            </select>

            <label for="deadline">Deadline:</label>
            <input type="date" id="deadline" name="deadline" required>

            <button type="submit">Set Reminder</button>
        </form>
        <!-- <div id="notification" class="notification" style="display: none;">
      Your tax deadline is approaching! Please submit your payment soon.
    </div> -->
    </div>
    </div>


</body>

</html>

<!-- message old -->
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
            background-color: #8EC5FC;
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
            max-height: 93vh;
            /* Set a max height for the container */
            overflow-y: auto;
            /* Enable vertical scrolling */
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
            text-align: left;
        }
    </style>
</head>

<body>
    <?php include('sidebar.php') ?>

    <div class="container">

        <h1>Notifications</h1>

        <?php
        include('backend/config.php');

        $query2 = "SELECT * FROM tax_rem ORDER BY deadline ASC";
        $result2 = $conn->query(query: $query2);

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

                echo "
                <div class='notification'>
                    <div class='notification-details'>
                        <div class='notification-title'>
                            <div class='notification-category'>$category</div><br>
                            <div class='notification-created'>Created on: $created_on</div>
                        </div>
                        <div class='notification-message'>Amount: $amount</div>
                        <div class='notification-time'>Your $category bill of ₹$amount is due in $daysRemaining days, Please make the payment to avoid any inconvenience</div>
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
            echo '<div>No notifications available.</div>';
        }
        $conn->close();
        ?>

    </div>
</body>

</html>
<!-- rem-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Reminder</title>
    <!-- Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: white;
            ;
            padding: 20px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* background-image: url('reminder_2.avif'); */
        }

        .main-container {
            max-width: 600px;
            width: 100%;
            background-color: background-color: #8EC5FC;
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
            ;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 1.3);
        }

        h2 {
            color: #EE4E4E;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        label {
            font-weight: 500;
            display: block;
            margin-top: 15px;
        }

        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 14px;
            color: #333;
        }

        input:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .notification {
            margin-top: 20px;
            padding: 12px;
            background-color: #ffeb3b;
            color: #333;
            text-align: center;
            border-radius: 5px;
            display: none;
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <?php include('sidebar.php') ?>
    <div class="main-container">
        <h2>Set Reminder </h2>
        <form action="backend/rembk.php" method="POST" id="taxForm">
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" placeholder="Enter Amount" required>

            <label for="category">Category:</label>
            <select name="category" id="category" required>
                <option value="bill_payment">Bill</option>
                <option value="loan_bill">Loan</option>
                <option value="tax_bill">Tax</option>
            </select>

            <label for="deadline">Deadline:</label>
            <input type="date" id="deadline" name="deadline" required>

            <button type="submit">Set Reminder</button>
        </form>
        <!-- Optional Notification -->
        <div id="notification" class="notification">
            Your tax deadline is approaching! Please submit your payment soon.
        </div>
    </div>
</body>

</html>

<!-- sidebar old -->

<style>
    .sidebar {
        width: 250px;
        background-color: background-color: #8EC5FC;
        background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
        ;
        padding: 20px;
        border-right: 1px solid #e0e0e0;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        height: 100%;

    }

    .sidebar h2 {
        font-size: 24px;
        font-weight: bold;
        color: black;
        margin-bottom: 20px;
        text-align: center;
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
        color: black;
        display: flex;
        align-items: center;
        padding: 10px 15px;
        border-radius: 8px;
        transition: background-color 0.3s;
    }

    .sidebar ul li a:hover {
        background-color: #FBFBFB;
        color: #;
        transform: scale(1.10);
    }

    /* Dropdown-specific styles */
    .dropdown {
        position: relative;
        width: 100%;
    }

    .dropdown-btn {
        text-decoration: none;
        color: black;
        display: flex;
        align-items: center;
        padding: 10px 15px;
        border-radius: 8px;
        transition: background-color 0.3s;
        cursor: pointer;
        background-color: #EBEAFF;
        border: none;
        width: 100%;
        text-align: left;
    }

    .dropdown-btn:hover {
        background-color: #e0f7fa;
        color: #00796b;
    }

    .dropdown-content {
        display: none;
        flex-direction: column;
        width: 100%;
        padding-left: 15px;
    }

    .dropdown-content a {
        text-decoration: none;
        color: black;
        padding: 8px 15px;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .dropdown-content a:hover {
        background-color: #e0f7fa;
        color: #00796b;
    }

    .dropdown.active .dropdown-content {
        display: flex;
    }
</style>

<div class="sidebar">
    <h2>AuditEase</h2>
    <ul>
        <li>
            <a href="dash_trial_b.php">
                <img src="icon7.png" alt="Manage Icon"
                    style="width:16px; height:16px; vertical-align:middle; margin-right:8px;">
                Dashboard
            </a>
        </li>

        <li>
            <a href="doc.php">
                <img src="icon6.png" alt="Manage Icon"
                    style="width:16px; height:16px; vertical-align:middle; margin-right:8px;">
                Manage
            </a>
        </li>
        <li>
            <a href="tax_rem.php">
                <img src="icon2.png" alt="Manage Icon"
                    style="width:16px; height:16px; vertical-align:middle; margin-right:8px;">
                Set Reminder
            </a>
        </li>
        <li>
            <a href="message.php">
                <img src="icon3.png" alt="Manage Icon"
                    style="width:16px; height:16px; vertical-align:middle; margin-right:8px;">
                Notifications
            </a>
        </li>

        <li class="dropdown">
            <button class="dropdown-btn" style="background:background-color: #8EC5FC;
background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
!important; display: flex; align-items: center; border: none;">
                <img src="icon10.png" alt="Settings Icon" style="width: 20px; height: 20px; margin-right: 8px;">
                Settings
            </button>
            <div class="dropdown-content">
                <a href="profile_page_b.php">Profile Settings</a>
                <a href="resetpassword.php">Password</a>
            </div>
        </li>
        <li>
            <a href="getstarted.html">
                <img src="icon4.png" alt="Manage Icon"
                    style="width:16px; height:16px; vertical-align:middle; margin-right:8px;">
                Log Out </a>
        </li>
    </ul>
</div>

<script>
    // JavaScript to handle the dropdown toggle
    document.querySelectorAll('.dropdown-btn').forEach(button => {
        button.addEventListener('click', function () {
            const dropdown = this.parentElement;
            dropdown.classList.toggle('active');
        });
    });
</script>

<!-- message_2 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Page</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: #34495e;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            overflow-y: auto;
        }

        .sidebar h2 {
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .sidebar a {
            text-decoration: none;
            color: #fff;
            margin: 10px 0;
            font-size: 1rem;
            display: block;
        }

        .sidebar a:hover {
            color: #8ec5fc;
        }

        /* Main Content Area */
        .main-content {
            margin-left: 250px;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f7fc;
            padding: 20px;
            overflow: hidden;
        }

        /* Notification Container Styling */
        .notification-container {
            width: 100%;
            max-width: 600px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .header {
            background-color: #4a90e2;
            color: #fff;
            padding: 15px 20px;
            text-align: center;
            font-size: 1.5rem;
        }

        .notifications {
            list-style: none;
            max-height: 400px;
            overflow-y: auto;
        }

        .notification {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            transition: background 0.3s;
        }

        .notification:last-child {
            border-bottom: none;
        }

        .notification:hover {
            background: #f0f4ff;
        }

        .notification-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .notification-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #4a90e2;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .notification-text {
            max-width: 400px;
        }

        .notification-title {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 1rem;
        }

        .notification-time {
            font-size: 0.9rem;
            color: #666;
        }

        .notification-action {
            color: #4a90e2;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: bold;
            transition: color 0.3s;
        }

        .notification-action:hover {
            color: #336bbd;
        }

        /* Scrollbar Styling */
        .notifications::-webkit-scrollbar {
            width: 8px;
        }

        .notifications::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 4px;
        }

        .notifications::-webkit-scrollbar-thumb:hover {
            background: #999;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                padding: 10px;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
        }
    </style>
</head>

<body>
    <?php include('sidebar.php') ?>
    <!-- <div class="sidebar">
        <h2>Sidebar</h2>
        <a href="#">Home</a>
        <a href="#">Notifications</a>
        <a href="#">Settings</a>
    </div> -->

    <div class="main-content">
        <div class="notification-container">
            <div class="header">Notifications</div>
            <ul class="notifications">
                <li class="notification">
                    <div class="notification-content">
                        <div class="notification-icon">🔔</div>
                        <div>
                            <div class="notification-title">New Task Assigned</div>
                            <div class="notification-time">5 minutes ago</div>
                        </div>
                    </div>
                    <a href="#" class="notification-action">View</a>
                </li>
                <li class="notification">
                    <div class="notification-content">
                        <div class="notification-icon">📧</div>
                        <div>
                            <div class="notification-title">Email Verification Needed</div>
                            <div class="notification-time">10 hours ago</div>
                        </div>
                    </div>
                    <a href="#" class="notification-action">Verify</a>
                </li>
                <li class="notification">
                    <div class="notification-content">
                        <div class="notification-icon">✔️</div>
                        <div>
                            <div class="notification-title">Task Completed</div>
                            <div class="notification-time">1 day ago</div>
                        </div>
                    </div>
                    <a href="#" class="notification-action">Details</a>
                </li>
                <!-- Add more notifications as needed -->
            </ul>
        </div>
    </div>
</body>

</html>