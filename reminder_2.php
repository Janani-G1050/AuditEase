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
            margin: 0;
            /* display: flex; */
            /* background-color: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%); */
        }


        .main-container {
            margin-left: 250px;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            padding: 20px;
            margin-top: 80px;
        }

        .main-container-inner {
            max-width: 600px;
            width: 100%;
            /* background-image: linear-gradient(62deg, #8ec5fc 0%, #e0c3fc 100%);  */
            /* background-image: background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%); */

            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        h2 {
            color: #074799;
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
            background-color: #background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            ;
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

        /* @media (max-width: 768px) {
            .main-container {
                margin-left: 0;
                padding: 10px;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
        } */
    </style>
</head>

<body>
    <?php include('sidebar_2.php') ?>

    <div class="main-container">
        <div class="main-container-inner">
            <h2>Set Reminder here</h2>
            <form action="backend/rem_2bk.php" method="POST" id="taxForm">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" placeholder="Enter Amount" required>

                <label for="category">Category:</label>
                <select name="category" id="category" required>

                    <option value="Electricity Bill">Electricity Bill</option>
                    <option value="Water Bills">Water Bill</option>
                    <option value="Credit Payment">Credit Payment Due</option>
                    <option value="Personal Subscription">Personal Subscription</option>
                    <option value="Family Obligations">Family Obligations</option>
                    <option value="loan_bill">Loan Payments</option>
                    <option value="Insurance">Insurance</option>
                    <option value="bill_payment">Bill</option>
                    <option value="tax_bill">Tax Payment</option>

                </select>

                <label for="deadline">Deadline:</label>
                <input type="date" id="deadline" name="deadline" required>

                <button type="submit">Set Reminder</button>
            </form>

            <div id="notification" class="notification">
                Your tax deadline is approaching! Please submit your payment soon.
            </div>
        </div>
    </div>
</body>

</html>