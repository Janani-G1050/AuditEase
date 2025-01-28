<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Payment Reminders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
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

        .reminder {
            margin-top: 20px;
            padding: 10px;
            background-color: #ffeeba;
            border: 1px solid #ffdf7e;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Bill Payment Reminders</h2>

        <label for="billName">Bill Name:</label>
        <input type="text" id="billName" placeholder="Enter bill name">

        <label for="dueDate">Due Date:</label>
        <input type="date" id="dueDate">

        <label for="amount">Amount Due:</label>
        <input type="number" id="amount" placeholder="Enter amount">

        <button onclick="addBill()">Add Bill</button>

        <h3>Upcoming Bills:</h3>
        <div id="billList"></div>
    </div>

    <script>
        let bills = [];

        // Function to add bill to the list
        function addBill() {
            const billName = document.getElementById('billName').value;
            const dueDate = document.getElementById('dueDate').value;
            const amount = parseFloat(document.getElementById('amount').value);

            if (!billName || !dueDate || isNaN(amount)) {
                alert("Please fill in all fields correctly.");
                return;
            }

            bills.push({ name: billName, dueDate: new Date(dueDate), amount: amount });
            displayBills();
            document.getElementById('billName').value = '';
            document.getElementById('dueDate').value = '';
            document.getElementById('amount').value = '';
        }

        // Function to display bills and notify about upcoming bills
        function displayBills() {
            const billList = document.getElementById('billList');
            billList.innerHTML = '';
            const today = new Date();

            bills.forEach(bill => {
                const dueInDays = Math.ceil((bill.dueDate - today) / (1000 * 60 * 60 * 24));

                let billItem = document.createElement('div');
                billItem.className = 'reminder';

                // Show alert if bill is due within the next 7 days
                if (dueInDays <= 7 && dueInDays >= 0) {
                    billItem.innerHTML = `<strong>${bill.name}</strong> - Due in ${dueInDays} days<br>Amount Due: $${bill.amount.toFixed(2)}`;
                } else {
                    billItem.innerHTML = `<strong>${bill.name}</strong> - Due on ${bill.dueDate.toDateString()}<br>Amount Due: $${bill.amount.toFixed(2)}`;
                }

                billList.appendChild(billItem);
            });
        }
    </script>

</body>

</html>