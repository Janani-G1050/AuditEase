<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Screen Chatbot UI</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            background-image: url('bg1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        @keyframes swirl {
            0% {
                transform: rotate(0deg);
                opacity: 0;
            }

            50% {
                transform: rotate(180deg);
                opacity: 1;
            }

            100% {
                transform: rotate(360deg);
                opacity: 1;
            }
        }

        .description h2 {
            font-family: 'Roboto', sans-serif;
            /* Applying the Roboto font */
            display: inline-block;
            font-size: 30px;
            font-weight: bold;
            animation: swirl 4s ease-out forwards;
            /* 'forwards' ensures it stops in the final state */
            color: #fff;
        }


        /* Chatbot Icon */
        .chatbot-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: linear-gradient(135deg, #6a89cc, #82ccdd);
            color: white;
            border-radius: 50%;
            width: 70px;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            cursor: pointer;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            animation: float 2s infinite ease-in-out;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Full-Screen Chat Popup */
        .chat-popup {
            position: fixed;
            top: 10%;
            left: 0;
            width: 100%;
            height: 90%;
            background-color: #ffffff;
            display: none;
            flex-direction: column;
            overflow: hidden;
            box-shadow: none;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: transparent;
            border: none;
            font-size: 20px;
            color: #333;
            cursor: pointer;
            font-weight: bold;
            transition: color 0.3s;
        }

        .close-btn:hover {
            color: red;
        }

        /* Chat Header */
        .chat-header {
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            border-bottom: 2px solid #ddd;
            position: relative;
            /* Needed for absolute positioning of the close button */
        }

        /* Chat Body */
        .chat-body {
            flex: 1;
            padding: 20px;
            background-color: #f9f9f9;
            overflow-y: auto;
            max-height: calc(100% - 120px);
        }

        /* Message Bubbles */
        .message {
            display: flex;
            margin-bottom: 15px;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .message.bot {
            justify-content: flex-start;
        }

        .message.bot .bubble {
            background-color: #e0e0e0;
            color: #333;
            border-radius: 20px 20px 20px 5px;
            padding: 10px 15px;
            font-size: 14px;
            max-width: 70%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 1.1);
        }

        .message.user {
            justify-content: flex-end;
        }

        .message.user .bubble {
            background: linear-gradient(135deg, #6a89cc, #82ccdd);
            color: white;
            border-radius: 20px 20px 5px 20px;
            padding: 10px 15px;
            font-size: 14px;
            max-width: 70%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Chat Input Section */
        .chat-input {
            display: flex;
            padding: 15px;
            border-top: 1px solid #ddd;
            background-color: white;
        }

        .chat-input input {
            flex: 1;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 25px;
            outline: none;
            background-color: #f3f4f6;
            box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .chat-input button {
            margin-left: 10px;
            background: linear-gradient(135deg, #6a89cc, #82ccdd);
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 25px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .chat-input button:hover {
            background: linear-gradient(135deg, #82ccdd, #6a89cc);
        }

        /* Loading Spinner */
        .loading {
            font-size: 14px;
            color: #6a89cc;
        }

        .description {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
            font-size: 16px;
            max-width: 1340px;
            line-height: 1.5;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <div class="description">
        <h2>Welcome to FinBot!</h2>
        <!-- <p>Your trusted assistant for all things finance. Whether you're looking for advice on budgeting, investment
            strategies, loan prepayments, or understanding financial terms, FinBot is here to help. Simply ask your
            finance-related questions, and our bot, powered by advanced AI, will provide you with accurate, insightful,
            and practical answers to guide you in your financial journey. Get started now by clicking the chat icon
            below!</p> -->
    </div>

    <!-- Chatbot Icon -->
    <div class="chatbot-icon" onclick="toggleChatPopup()">💬</div>

    <!-- Full-Screen Chat Popup -->
    <div class="chat-popup" id="chatPopup">
        <div class="chat-header">
            Let's Chat!
            <!-- Close Button -->
            <button class="close-btn" onclick="toggleChatPopup()">X</button>
        </div>

        <div class="chat-body" id="chatBody">
            <!-- Messages will be added dynamically -->
        </div>

        <form id="dataForm">
            <div class="chat-input">
                <input type="hidden" id="name" name="name" value="Janani">
                <input type="text" id="content" name="content" placeholder="Type a message..." />
                <button type="submit">Send</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $("#dataForm").on("submit", function (event) {
                event.preventDefault(); // Prevent the default form submission

                const formData = {
                    name: $("#name").val(),
                    content: $("#content").val()
                };

                const chatBody = $("#chatBody");

                // Display user message in chat
                const userMessage = $('<div class="message user"><div class="bubble"></div></div>');
                userMessage.find(".bubble").text(formData.content);
                chatBody.append(userMessage);

                // Clear input field
                $("#content").val("");

                // Show loading message in chat
                const loadingMessage = $('<div class="message bot"><div class="bubble loading">Loading...</div></div>');
                chatBody.append(loadingMessage);

                // Scroll to the bottom
                chatBody.scrollTop(chatBody[0].scrollHeight);

                // AJAX request to send the data
                $.ajax({
                    url: "send_to_python.php", // PHP file to handle the request
                    method: "POST",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        // Remove the loading message
                        $(".loading").remove();

                        // Add bot response
                        const botMessage = $('<div class="message bot"><div class="bubble"></div></div>');
                        botMessage.find(".bubble").text("FinBot : " + response.reply);
                        chatBody.append(botMessage);

                        // Scroll to the bottom
                        chatBody.scrollTop(chatBody[0].scrollHeight);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error:", error);
                        alert("An error occurred. Please try again.");
                    }
                });
            });
        });

        // Toggle Chat Popup - Ensure popup remains open
        function toggleChatPopup() {
            const chatPopup = document.getElementById('chatPopup');
            chatPopup.style.display = chatPopup.style.display === 'none' || chatPopup.style.display === ''
                ? 'flex'
                : 'none'; // Toggle visibility on click
        }

    </script>
</body>

</html>