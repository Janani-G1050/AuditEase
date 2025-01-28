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
      display: flex;
      min-height: 100vh;
      background-position: cover;
      background-repeat: no-repeat;


    }

    /* Sidebar Styling */
    /* .sidebar {
      width: 250px;
      background-color: #34495e;
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
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
    } */

    /* Main Content Styling */
    .main-container {
      margin-left: 250px;
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      min-height: 100vh;
      background: linear-gradient(135deg, #eef2f3, #8e9eab);
      overflow: hidden;
      position: relative;
    }

    .main-container::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle at center, rgba(65, 105, 225, 0.5) 0%, transparent 70%);
      animation: pulse 3s infinite;
      transform: rotate(45deg);
      z-index: 0;
    }

    @keyframes pulse {
      0% {
        transform: scale(1) rotate(45deg);
        opacity: 1;
      }

      50% {
        transform: scale(1.6) rotate(45deg);
        opacity: 0.6;
      }

      100% {
        transform: scale(1) rotate(45deg);
        opacity: 1;
      }
    }

    .main-container-inner {
      position: relative;
      max-width: 600px;
      width: 100%;
      background: linear-gradient(45deg, #e6e9f0, #eef1f5);
      background-size: 300% 300%;
      animation: gradient-bg 8s ease infinite;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      z-index: 2;
    }

    @keyframes gradient-bg {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }

    .container-inner {
      position: relative;
      max-width: 600px;
      width: 100%;
      background: linear-gradient(45deg, #e6e9f0, #eef1f5);
      background-size: 300% 300%;
      animation: gradient-bg 8s ease infinite;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      z-index: 2;
    }

    h2 {
      color: #333;
      text-align: center;
      margin-bottom: 20px;
      font-weight: bold;
      font-size: 2rem;
      text-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
      z-index: 2;
    }

    label {
      font-weight: 600;
      color: #333;
      display: block;
      margin-top: 15px;
      z-index: 2;
    }

    input[type="number"],
    input[type="date"],
    select {
      width: 100%;
      padding: 12px;
      border: 1px solid rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      margin-top: 5px;
      font-size: 14px;
      background: #fff;
      color: #333;
      box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(5px);
      transition: 0.3s;
      z-index: 2;
    }

    input::placeholder {
      color: #000;
    }

    select {
      background: #fff;
      color: #000;
    }

    select option {
      color: #000;
      background: #fff;
    }

    input:focus,
    select:focus {
      border-color: #007bff;
      outline: none;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    button {
      width: 100%;
      padding: 15px;
      background: linear-gradient(45deg, #4a90e2, #007aff);
      color: #fff;
      font-size: 18px;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      margin-top: 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      z-index: 2;
    }

    button:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 123, 255, 0.5);
    }

    button:active {
      transform: translateY(2px);
      box-shadow: 0 3px 10px rgba(0, 123, 255, 0.3);
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
        margin-left: 0;
        padding: 10px;
      }
  </style>
</head>

<body>
  <?php include('sidebar.php') ?>

  <div class="main-container">
    <div class="main-container-inner">
      <h2>Set Reminder</h2>
      <form action="backend/rembk.php" method="POST" id="taxForm">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" placeholder="Enter Amount" required>

        <label for="category">Category:</label>
        <select name="category" id="category" required>
          <option value=""></option>
          <option value="Utility Bill">Utility Bills</option>
          <option value="Credit_payment">Credit Card Payment</option>
          <option value="bill_payment">Bill</option>
          <option value="Office Rental">Office Rental or Leases</option>
          <option value="loan_bill">Loan</option>
          <option value="tax_bill">Tax</option>
          <option value="Electricity_bill">Electricity</option>
          <option value="Business_loans">Business Loans</option>
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
  </div>
</body>

</html>