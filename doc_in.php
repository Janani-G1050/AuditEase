<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload - Audit Ease</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            background-repeat: no-repeat;
            background-size: right;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 50%);
        }

        .back-button,
        .view-button {
            position: absolute;
            top: 24px;
            font-size: 14px;
            color: #42A5F5;
            background: none;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .back-button {
            left: 280px;
            color: black;
        }

        .view-button {
            right: 20px;
            color: black;
        }

        .container {
            background-color: white;
            width: 600px;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            border-radius: 25px;
            /* border-color: black; */
            height: 62vh;
            margin-left: 40%;
        }

        .container h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #474E93;

        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;

        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background-color: white;
        }

        .upload-section {
            margin-top: 20px;
            padding: 20px;
            border: 2px dashed #42A5F5;
            border-radius: 10px;
            cursor: pointer;
            color: #42A5F5;
            font-size: 16px;
            transition: background-color 0.2s;
            background-color: #D4F6FF;
        }

        .upload-section:hover {
            background-color: #E3F2FD;
        }

        #file-upload {
            display: none;
        }

        .verify-btn {
            background-color: background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);

            color: #074799;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            width: 50%;
            margin-top: 40px;
        }

        .verify-btn:hover {
            background-color: #79D7BE;
        }
    </style>



</head>

<body>
    <?php include('sidebar_2.php') ?>
    <!-- Back button -->
    <button class="back-button" onclick="window.history.back();">&#8592; Back</button>
    <!-- View button -->
    <!-- <button class="view-button">View</button> -->
    <button class="view-button" onclick="location.href='files_in.php';">View</button>

    <div class="container">
        <h2>Upload Documents Here</h2>
        <!--inga -->
        <form action="backend/files_inbk.php" method="POST" id="upload-Form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter your Title" required>
            </div>
            <br>
            <label for="file-upload" class="upload-section">
                <img src="upload_1.avif" alt="Upload Icon" width="40"
                    style="vertical-align: middle; margin-right: 10px;">
                Drag and drop your file here or click to upload
            </label>
            <input type="file" name="doc" id="file-upload">

            <button type="submit" class="verify-btn">Submit</button>
        </form>
    </div>

</body>

</htm