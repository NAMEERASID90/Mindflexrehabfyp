<!DOCTYPE html>
<html lang="en">

@include('layout.app')

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


  <!-- Topbar Start -->
  @include('topbar')
  <!-- Topbar End -->


  <!-- Navbar Start -->
  @include('nav')
  <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

<!-- login form start -->

<div class="container">
    <form id="loginForm" onsubmit="validateForm(event)">
      <h2><center> Doctor Login</center></h2>
      <div class="input-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <small class="error" id="usernameError"></small>
      </div>
      <div class="input-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <small class="error" id="passwordError"></small>
      </div>
      <button type="submit">Login</button>
      <br>
      <br>
      <!-- <p>Don't have an account? <a href="signupform.php">Create new account</a></p> -->
      <a style="text-align:center" href="index.php"><strong style="color:#000000"> <center>Back To Home Page</center></strong></a></p>
    </form>
  </div>


  <script>function validateForm(event) {
    event.preventDefault();
  
    // Reset previous errors
    document.getElementById('usernameError').textContent = '';
    document.getElementById('passwordError').textContent = '';
  
    // Get form inputs
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
  
    // Validate username
    if (username.trim() === '') {
      document.getElementById('usernameError').textContent = 'Username is required';
      return;
    }
  
    // Validate password
    if (password.trim() === '') {
      document.getElementById('passwordError').textContent = 'Password is required';
      return;
    }
  
    // If both fields are filled, you can proceed with the login process
    // For now, let's just show a success message
    alert('Login successful!');
  }
  </script>
  <!-- form end  -->



<!-- Chatbot button -->
<button class="chatbot-button" id="chatbot-button" onclick="toggleChatbot()">
    <img class="chatbot-icon" src="img/chatbot-.png" alt="Chatbot">
</button>

<!-- Chatbot container -->
<div class="chatbot-container" id="chatbot-container">
    <div class="chatbot-header">
        <span>Chatbot</span>
        <button class="close-button" onclick="closeChatbot()">X</button>
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

    function closeChatbot() {
        var chatbotContainer = document.getElementById('chatbot-container');
        var chatbotButton = document.getElementById('chatbot-button');
        chatbotContainer.style.display = 'none';
        chatbotButton.style.display = 'block';
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




<!-- Back to Top -->
<!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a> -->


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="lib/twentytwenty/jquery.event.move.js"></script>
<script src="lib/twentytwenty/jquery.twentytwenty.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>