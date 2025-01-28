<?php
include('backend/config.php');

if (!isset($_SESSION["id"])) {
    header("Location: loginnew.php");
    exit();
}

$user_id = $_SESSION["id"];

function calculateTotals($user_id, $conn)
{
    $totals = [
        'total' => 0,
        'income' => 0,
        'savings' => 0,
        'education' => 0,
        'tax' => 0,
        'houseexp' => 0,
        'others' => 0
    ];

    // Fetch all categories and their totals
    $query = "SELECT LOWER(category) AS category, SUM(amount) AS total_amount 
              FROM expin 
              WHERE user_id = '$user_id' 
              GROUP BY LOWER(category)";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // print_r($row);Debugging: Output each row
            $category = $row['category'];
            $amount = $row['total_amount'];

            // Check if category exists in totals array
            if (array_key_exists($category, $totals)) {
                $totals[$category] = $amount;
            }
        }
    }

    // Calculate the total (income minus all other categories)
    $total = $totals['income']
        - $totals['education']
        - $totals['tax']
        - $totals['houseexp']
        - $totals['others'];

    return ['totals' => $totals, 'total' => $total];
}

// Call the function and fetch data
$totalsData = calculateTotals($user_id, $conn);
$totals = $totalsData['totals'];
$total = $totalsData['total'];

// print_r($totals);
// echo "Net Total: " . $total;
?>

<!--html-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Dropdown</title>
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

        .profile-icon img {
            width: 40px;
            height: 40px;
            border-radius: 100%;

            display: block;

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
            align-items: left;
            padding: 10px 15px;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #e0f7fa;
            color: #00796b;
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
            align-items: left;
            padding: 10px 15px;
            border-radius: 8px;

            cursor: pointer;

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
</head>

<body>

    <?php include('sidebar_2.php') ?>

    <script>
        // JavaScript to handle the dropdown toggle
        document.querySelectorAll('.dropdown-btn').forEach(button => {
            button.addEventListener('click', function () {
                const dropdown = this.parentElement;
                dropdown.classList.toggle('active');
            });
        });
    </script>


    <!--ippo -->


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
            background-color: white;
            color: #87ceeb;
            margin-left: 270px;

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
            background-color: #F8F1F1;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            text-align: center;
            background-color: background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            ;
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

        .add-expenditures {
            background-color: #e3e3e3;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            max-width: 400px;
            margin-top: 20px;
            position: relative;
            left: 16%;

        }

        .add-expenditures h3 {
            background-color: background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            ;

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
            background-color: background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            ;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .add-expenditures .submit-btn:hover {
            background-color: #E2E2B6;
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
            padding: 20px;
            color: black;
            max-height: 400px;
            /* Ensure content stays constrained */
            /* overflow-y: auto;
            overflow-x: hidden; */
        }

        .add-expenditures {
            position: relative;
            left: 66%;
            top: -81%;
        }

        .scroll {
            max-height: 600px;

            overflow-y: 600px;

            display: block;

            width: 100%;

        }

        .scroll table {
            width: 100%;
            border-collapse: collapse;
        }

        .scroll th,
        .scroll td {
            text-align: center;

            padding: 8px;

            border-bottom: 1px solid #ddd;
        }

        .scroll th {
            position: sticky;
            top: 0;
            background-color: background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            ;
            z-index: 1;
        }

        .scroll {
            max-height: 400px;
            /* Match the max height of the parent container */
            overflow-y: auto;
            /* Fix invalid property */
            display: block;
            width: 100%;
        }

        .scroll table {
            width: 100%;
            border-collapse: collapse;
        }

        .scroll th,
        .scroll td {
            text-align: center;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .scroll th {
            position: sticky;
            top: 0;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            z-index: 1;
            /* Ensure sticky header stays on top */
        }

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
    </style>

    </head>

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
                                <!-- <a href="profile_page_b.php">
                                    <div class="profile-icon">👤</div>
                                </a> -->

                                <a href="profile_page_i.php">
                                    <div class="profile-icon">
                                        <img src="icon11.png" alt="Profile Icon">
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="a1">
                        <div class="cards">
                            <div class="card">

                                <h3>Total</h3>
                                <h2>$<?php echo number_format($total, 2); ?></h2>
                            </div>
                            <div class="card">
                                <h3>Income</h3>
                                <h2>$<?php echo number_format($totals['income'], 2); ?></h2>
                            </div>
                            <div class="card">
                                <h3>Savings</h3>
                                <h2>$<?php echo number_format($totals['savings'], 2); ?></h2>
                            </div>
                            <div class="card">
                                <h3>House Expenses</h3>
                                <h2>$<?php echo number_format($totals['houseexp'], 2); ?></h2>
                            </div>
                            <div class="card">
                                <h3>Education</h3>
                                <h2>$<?php echo number_format($totals['education'], 2); ?></h2>
                            </div>

                            <div class="card">
                                <h3>Tax</h3>
                                <h2>$<?php echo number_format($totals['tax'], 2); ?></h2>
                            </div>
                            <div class="card">
                                <h3>Others</h3>
                                <h2>$<?php echo number_format($totals['others'], 2); ?></h2>
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
                                    $query2 = "SELECT * FROM expin WHERE user_id ='$user_id'";
                                    $result2 = $conn->query($query2);
                                    if ($result2->num_rows > 0) {
                                        while ($row = $result2->fetch_assoc()) {
                                            $amount = $row['amount'];
                                            $category = $row['category'];
                                            $id = $row['id'];
                                            $date = $row['date'];
                                            $purpose = $row['purpose'];

                                            // Handle special case for "houseexp" and general case for capitalization
                                            if (strtolower($category) === 'houseexp') {
                                                $formattedCategory = "House Expenses";
                                            } else {
                                                $formattedCategory = ucfirst($category); // Capitalize the first letter
                                            }

                                            // Determine the sign based on category
                                            $sign = ($category == 'Income' || $category == 'savings') ? '+' : '-';

                                            echo "
                        <tr>
                            <td>$purpose</td>
                            <td>$formattedCategory</td>
                            <td>$sign$amount</td>
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
                        <form action="backend/expinbk.php" method="POST">
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
                                <option value="savings">Savings</option>
                                <option value="education">Education</option>

                                <option value="houseexp">House Expenses</option>
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
</body>

</html>