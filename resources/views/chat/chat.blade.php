
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Chatbot button style */
        .chatbot-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            border: none;
            background-color: transparent;
            cursor: pointer;
            z-index: 9999;
        }

        .chatbot-button:hover {
            color:#06A3DA;
        }

        /* Chatbot icon style */
        .chatbot-icon {
            width: 100%;
            height: 100%;
            fill: #333;
            transition: fill 0.3s ease;
        }

        /* Chatbot container style */
        .chatbot-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 9998;
        }

        /* Chatbot header style */
        .chatbot-header {
            background-color: #06A3DA;
            color: #fff;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        /* Chatbot body style */
        .chatbot-body {
            padding: 20px;
            max-height: 300px;
            overflow-y: auto;
        }

        /* Chatbot input style */
        .chatbot-input {
            display: flex;
            padding: 10px;
        }

        .chatbot-input input[type="text"] {
            flex: 1;
            padding: 8px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .chatbot-input button {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            background-color:#06A3DA;
            color: #fff;
            cursor: pointer;
        }

        /* Chatbot message style */
        .message {
            margin-bottom: 10px;
        }

        .message.self {
            text-align: right;
        }

        .message.other {
            text-align: left;
        }

        .message-content {
            padding: 10px;
            border-radius: 5px;
            background-color: #e5e5ea;
            display: inline-block;
            max-width: 70%;
        }

        .message.self .message-content {
            background-color:#06A3DA;
            color: #fff;
        }

        .message.other .message-content {
            background-color: #fff;
            color: #333;
        }
    </style>
</head>
<body>
    <!-- Chatbot button -->
    <button class="chatbot-button" id="chatbot-button" onclick="toggleChatbot()">
        <svg class="chatbot-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-3-7h2v2H9v-2zm4 0h2v2h-2v-2zm-4-4h8v2H9V9z"/>
        </svg>
    </button>

    <!-- Chatbot container -->
    <div class="chatbot-container" id="chatbot-container">
        <div class="chatbot-header">
            Chatbot
        </div>
        <div class="chatbot-body" id="chatbot-body">
            <div class="message other">
                <div class="message-content">
                    Hello! How can I assist you?
                </div>
            </div>
        </div>
        <div class="chatbot-input">
            <input type="text" id="chatbot-input" placeholder="Type your message...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>

    <script>
        function toggleChatbot() {
            var chatbotContainer = document.getElementById('chatbot-container');
            var chatbotButton = document.getElementById('chatbot-button');
            if (chatbotContainer.style.display === 'none' || chatbotContainer.style.display === '') {
                chatbotContainer.style.display = 'block';
                chatbotButton.style.display = 'none';
            } else {
                chatbotContainer.style.display = 'none';
                chatbotButton.style.display = 'block';
            }
        }

        function sendMessage() {
            var messageInput = document.getElementById('chatbot-input').value.trim();
            if (messageInput !== '') {
                appendMessage('self', messageInput);
                document.getElementById('chatbot-input').value = '';
                // Here you would typically send the message to your backend or process it
                // with your chatbot and receive a response.
                // For demonstration purposes, I'll simulate a response after a delay.
                setTimeout(function() {
                    var response = "This is a placeholder response from the bot.";
                    appendMessage('other', response);
                }, 1000);
            }
        }

        function appendMessage(sender, message) {
            var chatBody = document.getElementById('chatbot-body');
            var messageClass = sender === 'self' ? 'self' : 'other';
            var messageDiv = document.createElement('div');
            messageDiv.classList.add('message', messageClass);
            var messageContent = document.createElement('div');
            messageContent.classList.add('message-content');
            messageContent.textContent = message;
            messageDiv.appendChild(messageContent);
            chatBody.appendChild(messageDiv);
            chatBody.scrollTop = chatBody.scrollHeight; // Scroll to bottom
        }
    </script>

    <!-- Botpress Webchat Embed Code -->
    <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
    <script src="https://mediafiles.botpress.cloud/073ae091-2b73-4d40-92d3-01b67eab1e30/webchat/config.js" defer></script>
    <script>
        window.botpressWebChat.init({
            "composerPlaceholder": "Chat with bot",
            "botConversationDescription": "This chatbot was built surprisingly fast with Botpress",
            "botId": "073ae091-2b73-4d40-92d3-01b67eab1e30",
            "hostUrl": "https://cdn.botpress.cloud/webchat/v1",
            "messagingUrl": "https://messaging.botpress.cloud",
            "clientId": "073ae091-2b73-4d40-92d3-01b67eab1e30",
            "webhookId": "7741d6aa-3ad7-49ba-bf6b-9a7ffa8f89bb",
            "lazySocket": true,
            "themeName": "prism",
            "frontendVersion": "v1",
            "showPoweredBy": true,
            "theme": "prism",
            "themeColor": "#2563eb",
            "allowedOrigins": []
        });
    </script>
</body>
</html>



