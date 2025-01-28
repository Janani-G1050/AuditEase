<?php
include("config.php");

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = "Document added successfully";
// Set the directory to save uploaded files
$uploadDirectory = __DIR__ . '/uploads/';

// Check if the directory exists, and create it if it doesn't
if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0755, true);
}

if (!isset($_SESSION["id"])) {
    // Redirect to login page
    header("Location: ../loginnew.php");
    exit(); // Ensure no further code execution
}

$user_id = $_SESSION["id"];
$email = $_SESSION["email"];
$username = $_SESSION["username"];

// File upload handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $title = $_POST['title'];

    $doc = $_FILES['doc']['name'];

    $password = random_int(1000, 9999);

    $sql = "INSERT INTO document (user_id, title, password, files) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $user_id, $title, $password, $doc);

    if ($stmt->execute()) {
        // Move the uploaded file to the specified directory
        $uploadedFilePath = $uploadDirectory . $doc;
        move_uploaded_file($_FILES['doc']['tmp_name'], $uploadedFilePath);


    } else {
        echo "Error: " . $stmt->error;
    }
}

// Mail start
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'vijiguna2001@gmail.com';
    $mail->Password = 'kkvu pobv xsle hdvn';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('vijiguna2001@gmail.com', 'Send Mail');
    $mail->addAddress($email, $username);

    $mail->isHTML(true);
    $mail->Subject = 'Secure Folder Access Key';
    $mail->Body = "Please find your security pass key below to access the folder:
                    <br>
                    Pass Key: $password
                    <br>
                    For your security, do not share this key with anyone. If you encounter any issues, feel free to contact us.";
    $mail->AltBody = 'This is the plain text version of the email content';

    $mail->send();

    // echo json_encode(['status' => 200, 'message' => 'Email sent successfully']);
    echo "<script type='text/javascript'>alert('$message');window.location.href='../files_in.php';</script>";
    header("Location: ../files_in.php");
    exit();
} catch (Exception $e) {
    echo json_encode(['status' => 500, 'message' => "Mailer Error: {$mail->ErrorInfo}"]);
}


$conn->close();
?>