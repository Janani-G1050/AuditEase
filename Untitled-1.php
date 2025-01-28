<?php
// Include database configuration
include('backend/config.php');


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

$total -= $othersTotal;
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
            font-size: 24px;
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
            left: 30%;

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
            top: -50%;
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
                                    <h3>Total Balance</h3>
                                    <h2>$<?php echo number_format($total); ?></h2>
                                </div>

                                <div class="card">
                                    <h3>Income</h3>
                                    <h2>$<?php echo number_format($incomeTotal, 2); ?></h2>
                                </div>
                                <div class="card">
                                    <h3>Education</h3>
                                    <h2>$<?php echo number_format($educationTotal, 2); ?></h2>
                                </div>
                                <div class="card">
                                    <h3>House Expense</h3>
                                    <h2>$<?php echo number_format($expenseTotal, 2); ?></h2>
                                </div>
                                <div class="card">
                                    <h3>Total Savings</h3>
                                    <h2>$<?php echo number_format($savingsTotal, 2); ?></h2>
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
                                    <option value="income">Income</option>
                                    <option value="house">House</option>
                                    <option value="tax">Tax</option>
                                    <option value="education">Education</option>
                                    <option value="savings">Savings</option>
                                    <option value="others">Others</option>

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