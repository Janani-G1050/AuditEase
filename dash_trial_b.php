<?php
include('backend/config.php');

if (!isset($_SESSION["id"])) {
    header("Location: loginnew.php");
    exit();
}

$user_id = $_SESSION["id"];

// Function to calculate totals
function calculateTotals($user_id, $conn)
{
    $totals = [
        'income' => 0,
        'salary' => 0,
        'profits' => 0,
        'loss' => 0,
        'tax' => 0,
        'investment' => 0,
        'others' => 0
    ];
    $total = 0;

    // Fetch all categories and their totals
    $query = "SELECT category, SUM(amount) AS total_amount FROM expenditure WHERE user_id = '$user_id' GROUP BY category";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $category = strtolower($row['category']);
            $amount = $row['total_amount'];

            if (array_key_exists($category, $totals)) {
                $totals[$category] = $amount;
            }
        }
    }

    // Calculate the total (income minus all other categories)
    $total = $totals['income']
        // - $totals['salary']

        - $totals['loss']
        - $totals['tax']
        - $totals['investment']
        - $totals['others'];

    return ['totals' => $totals, 'total' => $total];
}

// Call the function and fetch data
$totalsData = calculateTotals($user_id, $conn);
$totals = $totalsData['totals'];
$total = $totalsData['total'];
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



        .profile-icon img {
            width: 40px;
            height: 40px;
            border-radius: 100%;
            display: block;

        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <?php include('sidebar.php') ?>
    <script>
        document.querySelectorAll('.dropdown-btn').forEach(button => {
            button.addEventListener('click', function () {
                const dropdown = this.parentElement;
                dropdown.classList.toggle('active');
            });
        });
    </script>
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
            /* background-color: rgba(76, 107, 198, 0.5); */
            color: #87ceeb;
            margin-left: 270px;
            background-color: #E5D9F2;
        }


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
            background-color: #8EC5FC;
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
            /* background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%); */

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
            /* margin-left: auto; */
            margin-top: 20px;
            position: sticky;
            left: 16%;
        }

        .add-expenditures h3 {
            background-color: background-color: #8EC5FC;
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
            color: #1230AE;
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
            /* background-color: #0D92F4; */
            background-color: background-color: #8EC5FC;
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .add-expenditures .submit-btn:hover {
            background-color: #77CDFF;
        }

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
        }

        .add-expenditures {
            position: relative;
            left: 66%;
            top: -103%;
        }

        .scroll {
            max-height: 400px;
            overflow-y: auto;
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
            /* Keeps the header fixed while scrolling */
            top: 0;
            background: background-color: #8EC5FC;
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
            z-index: 1;
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
    <!--wait-->

</html>
</div>
<section>
    <div>
        <div class="container">
            <div class="row">
                <div>
                    <div class="main-content">

                        <div class="col-lg-12">
                            <div class="top-bar">
                                <form class="example">
                                    <input type="text" id="searchInput" name="search"
                                        placeholder="Search for something...">
                                </form>
                                <a href="profile_page_b.php">
                                    <div class="profile-icon">
                                        <img src="icon8.png" alt="Profile Icon">
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
                                <h3>Investments</h3>
                                <h2>$<?php echo number_format($totals['investment'], 2); ?></h2>
                            </div>
                            <div class="card">
                                <h3>Salary</h3>
                                <h2>$<?php echo number_format($totals['salary'], 2); ?></h2>
                            </div>
                            <div class="card">
                                <h3>Profits</h3>
                                <h2>$<?php echo number_format($totals['profits'], 2); ?></h2>
                            </div>
                            <div class="card">
                                <h3>Loss</h3>
                                <h2>$<?php echo number_format($totals['loss'], 2); ?></h2>
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
                <div class="row">
                    <div class="col-lg-6" style="width:150%">
                        <section class="transactions">
                            <h3>Transactions</h3>
                            <div class="scroll">
                                <table id="tableBody">
                                    <thead>
                                        <tr>
                                            <th>Purpose</th>
                                            <th>Category</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
                                                    
                                                ";
                                                if ($category == 'Income' || $category == 'profits') {
                                                    echo "
                                                    <div>
                                                        <td><span>+</span>$amount</td>
                                                    </div>";
                                                } else {
                                                    echo "
                                                    <div>
                                                        <td><span>-</span>$amount</td>
                                                    </div>";
                                                }
                                                echo "
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
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                $('#searchInput').on('keyup', function () {
                                    var value = $(this).val().toLowerCase(); // Get the search input value
                                    $('#tableBody tbody tr').filter(function () {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1); // Show/hide rows
                                    });
                                });
                            });
                        </script>
                        </main>
                    </div>
                    <!-- Add Expenditures Form -->
                    <div>
                        <div class="add-expenditures col-lg-6">
                            <h3>Update Here</h3>
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
    </div>
</section>
</body>

</html>
</body>

</html>