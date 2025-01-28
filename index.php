<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

        :root {
            --mainColor: #001A6E;
            --hoverColor: #C4E1F6;
            --backgroundColor: #f1f8fc;
            --darkOne: #312f3a;
            --darkTwo: #45424b;
            --lightOne: #919191;
            --lightTwo: #aaa;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            background-color: var(--backgroundColor);
            /* background-image: url('img_3.avif'); */
            background-size: cover;
            background-repeat: no-repeat;
            backdrop-filter: saturate(1.5);
            filter: brightness(1.1) contrast(1.1);
            /* background-color: #E7F0DC; */

        }

        .big-wrapper {

            flex-direction: column;
            justify-content: space-between;
            height: 100vh;
            /* overflow-y: scroll; */
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #C5D3E8;

        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 50px;
            margin-right: 10px;
            margin-left: 20px;

        }

        .logo h3 {
            color: var(--darkTwo);
            font-size: 1.5rem;
            font-weight: 700;
        }

        .showcase-area {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .left {
            flex: 1;
            max-width: 500px;
            padding: 1rem;
            /* background-color: #CBDCEB; */
        }

        .big-title h1 {
            font-size: 2.5rem;
            color: var(--darkOne);
            margin-left: 41px;
        }

        .text {
            margin: 1.5rem 0;
            color: var(--lightOne);
            font-size: 1rem;
            line-height: 1.6;
            margin-left: 41px;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background-color: var(--mainColor);
            color: #fff;
            text-transform: capitalize;
            border-radius: 69px;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
            margin-top: 20px;
            margin-left: 41px;
        }

        .btn:hover {
            background-color: var(--hoverColor);
            background-color: #478CCF;
        }

        .right {
            flex: 1;
            /* display: flex; */
            justify-content: center;
            align-items: center;
        }

        .right img {
            max-width: 100%;
            height: 86vh;
            border-radius: -12px;
            width: 200vw;
            margin-bottom: -36px;
            margin-top: -23px;
            background-position: center;
            background: cover;
            background-position: overflow-y;

        }

        @media screen and (max-width: 768px) {
            .showcase-area {
                flex-direction: column;
            }

            .big-title h1 {
                font-size: 2rem;
                text-align: center;
            }

            .text {
                text-align: center;
            }

            .right img {
                width: 80%;
            }
        }

        /* hello */

        nav {
            display: flex;
            align-items: center;
        }

        .nav-btn {
            text-decoration: none;
            color: var(--mainColor);
            font-weight: 500;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border: 2px solid var(--mainColor);
            border-radius: 20px;
            transition: background-color 0.3s, color 0.3s;
            margin-right: 20px;
        }

        .nav-btn:hover {
            background-color: var(--mainColor);
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="big-wrapper">
        <header>
            <div class="logo">
                <img src="Auditease.png" alt="Logo" />
                <h3>Audit Ease</h3>
            </div>
            <nav>
                <a href="about_us.php" class="nav-btn">About Us</a>
            </nav>
        </header>

        <div class="showcase-area">
            <div class="left">
                <div class="big-title">
                    <h1>Tomorrow’s Success</h1>
                    <h1>Begins with Today’s Plan</h1>
                </div>
                <p class="text">
                    Welcome to our AuditEase, Freely manage your finances for both personal and business use
                </p>
                <a href="purpose.html" class="btn">Get started</a>
            </div>

            <div class="right">
                <img src="img_3.avif" alt="Person Image" />
            </div>
        </div>
    </div>
</body>

</html>