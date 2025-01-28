<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI-Powered Forecasting Tool</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }

        .container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        input,
        button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        button {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>AI-Powered Financial Forecasting</h2>

        <label for="income">Monthly Income:</label>
        <input type="number" id="income" placeholder="Enter your monthly income">

        <label for="expenses">Monthly Expenses:</label>
        <input type="number" id="expenses" placeholder="Enter your monthly expenses">

        <label for="months">Months to Predict:</label>
        <input type="number" id="months" placeholder="Enter number of months">

        <button onclick="predictForecast()">Predict</button>

        <h3>Forecast Results:</h3>
        <p id="result"></p>
    </div>

    <script>
        // Simple prediction function using averages for demo purposes
        function predictForecast() {
            const income = parseFloat(document.getElementById('income').value);
            const expenses = parseFloat(document.getElementById('expenses').value);
            const months = parseInt(document.getElementById('months').value);

            if (isNaN(income) || isNaN(expenses) || isNaN(months)) {
                document.getElementById('result').innerText = "Please enter valid numbers in all fields.";
                return;
            }

            // Simple forecast model: assuming consistent income and expenses
            let forecast = [];
            let savings = income - expenses;
            let seasonalAdjustment = 1.1;  // Assumes a 10% increase during peak seasons

            for (let i = 1; i <= months; i++) {
                // Adjust for seasonal effect every 3rd month
                let adjustedIncome = (i % 3 === 0) ? income * seasonalAdjustment : income;
                let monthSavings = adjustedIncome - expenses;
                forecast.push(`Month ${i}: Income = ${adjustedIncome.toFixed(2)}, Savings = ${monthSavings.toFixed(2)}`);
            }

            document.getElementById('result').innerText = forecast.join('\n');
        }
    </script>

</body>

</html>