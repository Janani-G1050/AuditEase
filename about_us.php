<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        /* Base Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            line-height: 1.6;
            background-color: rgb(156, 197, 221);
            color: #333;
        }

        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #D9EAFD;
            color: rgb(15, 25, 72);
            padding: 19px 20px;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 50px;
            margin-right: 10px;
        }

        .logo h3 {
            font-size: 1.5rem;
            font-weight: 700;
        }

        nav {
            display: flex;
            gap: 20px;
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-size: 1rem;
            transition: color 0.3s;
        }

        nav a:hover {
            color: rgb(90, 88, 178);
        }

        /* Main Section */
        .about-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 50px 20px;
        }

        .about-section h1 {
            font-size: 2.5rem;
            color: #001A6E;
            margin-bottom: 20px;
            transition: color 0.4s ease, transform 0.4s ease, text-shadow 0.4s ease;
        }



        .about-section p {
            max-width: 800px;
            font-size: 1.1rem;
            color: #555;
            margin: 0 auto 30px;
            line-height: 1.8;
            text-align: center;
            transition: color 0.4s ease, transform 0.4s ease, background-color 0.4s ease;
            background-color: transparent;
            padding: 10px;
            border-radius: 5px;
        }

        .about-section p:hover {
            color: #333;
            /* Darker text color */
            background-color: #E6F7FF;
            /* Light background highlight */
            transform: translateY(-10px) scale(1.02);
            /* Elevated and slightly larger */
        }

        .about-image {
            width: 100%;
            max-width: 600px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
            transition: transform 0.6s cubic-bezier(0.42, 0, 0.58, 1), box-shadow 0.4s ease;
        }

        .about-image:hover {
            transform: scale(1.1) rotate(-2deg);
            /* Zoom with slight tilt */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4), 0 0 20px rgba(0, 75, 159, 0.5);
            /* Enhanced shadow and glow */
            border: 3px solidrgb(153, 176, 203);
            /* Glowing border effect */
            border-radius: 20px;
            /* Rounded corners animate */
        }




        /* Team Section */
        .team-section {
            background-color: #001A6E;
            color: #fff;
            padding: 50px 20px;
            text-align: center;
        }

        .team-section h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .team-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .team-member {
            background-color: #fff;
            color: #001A6E;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }

        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .team-member h3 {
            margin: 10px 0 5px;
        }

        .team-member p {
            font-size: 0.9rem;
        }

        /* Footer */
        footer {
            background-color: #001A6E;
            color: #fff;
            text-align: center;
            padding: 10px 20px;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .about-section h1 {
                font-size: 2rem;
            }

            .about-section p {
                font-size: 1rem;
            }

            .team-member {
                width: 90%;
            }
        }

        /* Why Choose Section */
        .why-choose-section {
            background-color: #f1f8fc;
            padding: 50px 20px;
            text-align: center;
        }

        .why-choose-section .container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .why-choose-section h1 {
            font-size: 2.5rem;
            color: #001A6E;
            margin-bottom: 20px;
            transition: transform 0.4s ease, color 0.4s ease;
        }

        .why-choose-section h1:hover {
            transform: scale(1.05);
            /* Slight zoom effect */
            color: #004B9F;
            /* Color transition */
        }

        .why-choose-section p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.8;
        }

        /* Mission and Vision Boxes */
        .mission-vision-container {
            display: flex;
            justify-content: center;
            align-items: stretch;
            gap: 20px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .box {
            background-color: #fff;
            color: #001A6E;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 35%;
            text-align: center;
            flex: 0 1 35%;
            transition: transform 0.5s ease, box-shadow 0.5s ease, background-color 0.5s ease;
            margin: 20px;
            /* Add margin to create space between boxes */
            transform-origin: center center;
            /* Ensure scaling originates from the center */
        }

        .box h2 {
            margin-bottom: 10px;
            font-size: 1.5rem;
        }

        .box p {
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Hover Effect: Zoom In */
        .box:hover {
            transform: scale(1.1);
            /* Zoom-in effect */
            background-color: #F0F8FF;
            /* Slightly highlighted background */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            /* Enhanced shadow */
            border: 2px solid #004B9F;
            /* Optional border effect */
        }


        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .box {
                width: 100%;
            }
        }

        .about-box {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
            /* max-width: 900px; */
            margin: 0 auto;
            text-align: center;
            width: 70%;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="Auditease.png" alt="Logo">
            <h3>Audit Ease</h3>
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="about_us.php">About Us</a>
        </nav>
    </header>

    <!-- About Section -->
    <!-- About Section -->
    <section class="about-section">
        <div class="about-box">
            <h1>About Us</h1>
            <p>
                Welcome to AuditEase, your trusted platform for effortless financial management. The
                ultimate financial companion designed for individuals and small business owners.

                We understand the challenges of managing finances, whether you're navigating personal budgets or
                handling
                business accounts. That’s why we’ve created AuditEase — a simple, intuitive, and powerful platform that
                makes financial management accessible to everyone, regardless of expertise.
            </p>
            <img src="about_us_img.avif" alt="Team Working" class="about-image">
        </div>
    </section>



    <!-- Footer -->
    <section class="why-choose-section">
        <div class="container">
            <h1>Why Choose AuditEase?</h1>
            <p>
                AuditEase offers a simple, secure, and intelligent way to manage finances. It saves time, reduces
                stress, and
                ensures users stay on top of their financial responsibilities. By integrating secure document storage
                and
                AI-based financial assistance, it goes beyond traditional finance apps to provide a complete solution.
            </p>
        </div>
    </section>
    <div class="mission-vision-container">
        <div class="box mission-box">
            <h2>Our Mission</h2>
            <p>
                To simplify and secure financial management for individuals and businesses by providing innovative tools
                that enhance financial clarity, organization, and decision-making.
            </p>
        </div>
        <div class="box vision-box">
            <h2>Our Vision</h2>
            <p>
                To empower users to take control of their finances with confidence, fostering a stress-free and
                well-organized financial future.
            </p>
        </div>
    </div>
    </section>

    <footer>
        &copy; 2025 AuditEase. All Rights Reserved.
    </footer>
</body>

</html>