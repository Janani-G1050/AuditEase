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
            margin: 0px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            filter: brightness(0.8) contrast(1.5);
            background: linear-gradient(135deg, #eef2f3, #8e9eab);
            overflow: hidden;
        }

        .back-button,
        .view-button {
            position: absolute;
            top: 24px;
            font-size: 14px;
            color: #F72C5B;
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
        }

        .container {
            background-color: white;
            width: 600px;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.0);
            text-align: center;
            border-radius: bold;
            height: 60vh;
            overflow: hidden;
            margin-left: 40%;
        }

        .container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at center, rgba(65, 105, 225, 0.5) 0%, transparent 55%);
            animation: pulse 3s infinite;
            transform: rotate(45deg);
            z-index: -1;
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

        .container h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;

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
            background-color: #0D92F4;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            width: 50%;
        }

        .verify-btn:hover {
            background-color: #C6E7FF;
        }
    </style>



</head>

<body>
    <?php include('sidebar.php') ?>
    <button class="back-button" onclick="window.history.back();">&#8592; Back</button>
    <button class="view-button" onclick="location.href='files.php';">View</button>


    <div class="container">
        <h2>Upload your document</h2>
        <!--inga -->
        <form action="backend/filesbk.php" method="POST" id="upload-Form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter your Title" required>
            </div>
            <br>
            <label for="file-upload" class="upload-section">
                <img src="doc_upload_1.png" alt="Upload Icon" width="40"
                    style="vertical-align: middle; margin-right: 10px;">
                Drag and drop your file here or click to upload
            </label>
            <input type="file" name="doc" id="file-upload">

            <button type="submit" class="verify-btn">Upload</button>
        </form>
    </div>

</body>

</html>