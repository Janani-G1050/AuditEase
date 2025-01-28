<?php
$filepdf = isset($_GET['file']) ? $_GET['file'] : '';

if (!empty($filepdf)) {
    $filePath = "uploads/$filepdf";

    if (file_exists($filePath)) {
        // Render the PDF file in the browser
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . basename($filePath) . '"');
        readfile($filePath);
        exit();
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid file request.";
}
?>