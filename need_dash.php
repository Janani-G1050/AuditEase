$incomeTotal = 0;
$user_id = $_SESSION["id"];

$query = "SELECT amount FROM expin WHERE user_id = '$user_id' AND category = 'income'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$incomeTotal += $row['amount'];
}
}

$total = $incomeTotal;
$query1 = "SELECT amount FROM expin WHERE user_id = '$user_id' AND category = 'income'";
$result1 = $conn->query($query1);

if ($result1->num_rows > 0) {
while ($row = $result1->fetch_assoc()) {
$total += $row['amount'];
}
}

$houseexpTotal = 0;

$query2 = "SELECT amount FROM expin WHERE user_id = '$user_id' AND category = 'houseexp'";
$result2 = $conn->query($query2);

// Check if there are rows and calculate the income total
if ($result2->num_rows > 0) {
while ($row = $result2->fetch_assoc()) {
$houseexpTotal += $row['amount'];
}
}

$total = $total - $houseexpTotal;

$educationTotal = 0;

$query3 = "SELECT amount FROM expin WHERE user_id = '$user_id' AND category = 'education'";
$result3 = $conn->query($query3);


if ($result3->num_rows > 0) {
while ($row = $result3->fetch_assoc()) {
$educationTotal += $row['amount']; // Increment the income total
}

}
$total = $total - $educationTotal;

// $lossTotal = 0;

// $query4 = "SELECT amount FROM expenditure WHERE user_id = '$user_id' AND category = 'loss'";
// $result4 = $conn->query($query4);

// // Check if there are rows and calculate the income total
// if ($result4->num_rows > 0) {
// while ($row = $result4->fetch_assoc()) {
// $lossTotal += $row['amount']; // Increment the income total
// }

// }
// $total = $total - $lossTotal;


$taxTotal = 0;

$query5 = "SELECT amount FROM expin WHERE user_id = '$user_id' AND category = 'tax'";
$result5 = $conn->query($query5);

// Check if there are rows and calculate the income total
if ($result5->num_rows > 0) {
while ($row = $result5->fetch_assoc()) {
$taxTotal += $row['amount']; // Increment the income total
}

}
$total = $total - $taxTotal;

$savingsTotal = 0;

$query7 = "SELECT amount FROM expin WHERE user_id = '$user_id' AND category = 'savings'";
$result7 = $conn->query($query7);

if ($result7->num_rows > 0) {
while ($row = $result7->fetch_assoc()) {
$savingsTotal += $row['amount']; // Increment the income total
}

}
$total = $total - $savingsTotal;

$othersTotal = 0;

$query6 = "SELECT amount FROM expin WHERE user_id = '$user_id' AND category = 'Others'";
$result6 = $conn->query($query6);

// Check if there are rows and calculate the income total
if ($result6->num_rows > 0) {
while ($row = $result6->fetch_assoc()) {
$othersTotal = $row['amount']; // Increment the income total
}

}