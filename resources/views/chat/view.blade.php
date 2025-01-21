<!DOCTYPE html>
<html lang="en">
@include('doctor.head')
@include('layout.app')

<!-- Updated CSS for a more appealing chat interface -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f4f8;
        color: #333;
    }

    .chat-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #fff;
        height: 80vh;
        overflow-y: scroll;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border: 1px solid #cfe2f3;
    }

    .header-container {
        display: flex;
        align-items: center; /* Align items vertically */
        margin-bottom: 20px; /* Spacing below the header */
    }

    .profile-picture {
        width: 60px; /* Adjust size as needed */
        height: 60px;
        border-radius: 50%;
        object-fit: cover; /* Ensures the image covers the area */
        margin-right: 10px; /* Spacing between picture and name */
    }

    h1 {
        color: #06A3DA;
        font-size: 1.5em; /* Adjust font size as needed */
        margin: 0; /* Remove default margin */
    }

    h1::after {
        content: '';
        display: block;
        width: 50%;
        height: 2px;
        background-color:  #06A3DA;
        margin-top: 10px; /* Spacing for the line */
    }

    .chat-message {
        margin-bottom: 15px;
        padding: 15px;
        border-radius: 10px;
        max-width: 70%;
        position: relative;
        transition: all 0.3s ease;
    }

    .message-sent {
        background-color: #e0f7fa;
        margin-left: auto;
        border-radius: 10px 10px 0 10px;
    }

    .message-received {
        background-color: #ffffff;
        margin-right: auto;
        border-radius: 10px 10px 10px 0;
    }

    .chat-message:hover {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .chat-message .message-author {
        font-weight: bold;
        color:  #06A3DA;
    }

    .chat-message .message-timestamp {
        font-size: 0.8em;
        color: #888;
        position: absolute;
        bottom: 5px;
        right: 10px;
    }

    .message-input {
        display: flex;
        gap: 10px;
        padding: 10px;
        background-color: #fff;
        box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        flex-wrap: wrap; /* Adjust layout for file input */
    }

    input[type="file"] {
        display: none; /* Hide the default file input */
    }

    .file-label {
        padding: 10px;
        background-color: #06A3DA;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }

    textarea {
        resize: none;
        border-radius: 5px;
        padding: 10px;
        border: 1px solid #ddd;
        transition: border-color 0.3s ease;
    }

    textarea:focus {
        outline: none;
        border-color: #06A3DA;
    }

    button {
        margin-top: 10px;
        padding: 10px;
        background-color: #06A3DA;
        color: #fff;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #F57E57;
    }.chat-container {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background-color: #fff;
    height: 80vh;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border: 1px solid #cfe2f3;
    position: relative; /* Ensure positioned elements stay within the container */
}

#chat-messages {
    flex-grow: 1;
    overflow-y: auto;
    padding-bottom: 10px;
}

.message-input {
    display: flex;
    gap: 10px;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
    width: 100%; /* Make sure the input section takes full width of the container */
}

textarea {
    flex-grow: 1; /* Textarea takes up available space */
    resize: none;
    border-radius: 5px;
    padding: 10px;
    border: 1px solid #ddd;
    transition: border-color 0.3s ease;
}

textarea:focus {
    outline: none;
    border-color: #06A3DA;
}

button {
    padding: 10px;
    background-color: #06A3DA;
    color: #fff;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    min-width: 80px; /* Ensures the button has a consistent width */
}

button:hover {
    background-color: #F57E57;
}

/* Animation for new messages */
@keyframes highlightNewMessage {
    0% {
        background-color: #e0f7fa;
    }
    100% {
        background-color: #ffffff;
    }
}

.new-message {
    animation: highlightNewMessage 1s;
}


</style>




<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    @include('patient.header')
    <!-- /Header -->

    <!-- Breadcrumb -->
		<div class="breadcrumb-bar">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-md-12 col-12">
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Chat</li>
							</ol>
						</nav>
						<h2 class="breadcrumb-title">Chat</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->
 
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">


            <!-- Profile Sidebar -->
            @include('patient.patientprofile')
            <!-- Page Content -->

<div class="container chat-container">
    <div class="header-container">
            <img src="../images/1725975881.png" alt="Profile Picture" class="profile-picture">
        
            
        
        <h1>Chat with {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
    </div>

    <!-- Chat UI -->
    <div id="chat-messages">
        @foreach($messages as $message)
            <div class="chat-message {{ $message->user_id == auth()->id() ? 'message-sent' : 'message-received' }}">
                <p class="message-author">{{ $message->user->first_name }} {{ $message->user->last_name }}</p>
                <p>{{ $message->content }}</p>

                @if ($message->file_url)
                <p><a href="{{ asset('storage/' . $message->file_url) }}" target="_blank">📄 View Attachment</a></p>
            @endif
            

                <p class="message-timestamp">{{ $message->created_at->format('H:i') }}</p>
            </div>
        @endforeach
    </div>

    <form id="message-form" method="POST" enctype="multipart/form-data" class="message-input">
        @csrf
        <input type="hidden" name="chat_session_id" value="{{ $chatSession->id }}">

        <!-- File Input with Label -->
        <label class="file-label" for="file-upload">📎 Attach PDF</label>
        <input id="file-upload" type="file" name="file" accept="application/pdf" hidden>

        <!-- Message Input -->
        <textarea name="message" rows="3" class="form-control" placeholder="Type your message..."></textarea>

        <!-- Send Button -->
        <button type="submit" class="btn btn-primary mt-2">Send</button>
    </form>



<script>
    $(document).ready(function() {
        // Function to scroll to the bottom of the chat messages
        function scrollToBottom() {
            var chatMessages = $('#chat-messages');
            chatMessages.scrollTop(chatMessages[0].scrollHeight);
        }

        scrollToBottom(); // Scroll to the bottom when the page loads

        // Function to send a message
        function sendMessage() {
            var formData = new FormData($('#message-form')[0]); // Collect form data, including file

            $.ajax({
                url: "{{ route('send.message') }}", // Replace with your Laravel route
                method: 'POST',
                data: formData,
                processData: false, // Required for file upload
                contentType: false, // Required for file upload
                success: function(response) {
                    // Add the new message to the chat container
                 

                    if (response.file_url) {
    $('#chat-messages').append(`
        <div class="chat-message message-sent">
            <p class="message-author">${response.user_name}</p>
            <p>${response.message_content}</p>
            <p><a href="${response.file_url}" target="_blank">📄 View Attachment</a></p>
            <p class="message-timestamp">${response.message_timestamp}</p>
        </div>
    `);
}

                    // Clear the form inputs
                    $('textarea[name="message"]').val('');
                    $('#file-upload').val(''); // Reset the file input
                    scrollToBottom(); // Scroll to the bottom of the chat
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                }
            });
        }

        // Handle form submission (Send button click)
        $('#message-form').on('submit', function(event) {
            event.preventDefault(); // Prevent default form behavior
            sendMessage(); // Trigger the sendMessage function
        });

        // Handle "Enter" key to send the message
        $('textarea[name="message"]').on('keypress', function(event) {
            if (event.which === 13 && !event.shiftKey) { // Check if Enter is pressed (without Shift)
                event.preventDefault(); // Prevent adding a new line
                sendMessage(); // Trigger the sendMessage function
            }
        });

        // Handle file input label click
        $('.file-label').on('click', function() {
            $('#file-upload').click(); // Trigger the hidden file input
        });
    });
</script>

</html>
</div>
</div>

</div>
<!-- /Page Content -->

<!-- Footer -->
<footer style="background-color: #06A3DA; color: #ecf0f1; padding: 40px 0;">
<div
    style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between;">

    <!-- About Section -->


    <!-- Contact Information -->
    <div style="flex: 1; margin-bottom: 20px;">
        <h4>Contact Us</h4>
        <p><strong>Phone:</strong> +1 234 567 890</p>
        <p><strong>Email:</strong> info@Mindflex.com</p>
        <p><strong>Address:</strong> 123 Karachi ,Pakistan</p>
    </div>

    <!-- Quick Links -->
    <div style="flex: 1; margin-bottom: 20px;">
        <h4>Quick Links</h4>
        <ul style="list-style-type: none; padding: 0;">
            <li><a href="#" style="color: #ecf0f1; text-decoration: none;">Home</a></li>
            <li><a href="#" style="color: #ecf0f1; text-decoration: none;">About Us</a></li>
            <li><a href="#" style="color: #ecf0f1; text-decoration: none;">Services</a></li>
            <li><a href="#" style="color: #ecf0f1; text-decoration: none;">Contact</a></li>
            <li><a href="#" style="color: #ecf0f1; text-decoration: none;">Privacy Policy</a></li>
        </ul>
    </div>

    <!-- Social Media Links -->
    <div style="flex: 1; margin-bottom: 20px;">
        <h4>Follow Us</h4>
        <a href="#" style="color: #ecf0f1; text-decoration: none; margin-right: 15px;">Facebook</a>
        <a href="#" style="color: #ecf0f1; text-decoration: none; margin-right: 15px;">Twitter</a>
        <a href="#" style="color: #ecf0f1; text-decoration: none; margin-right: 15px;">Instagram</a>
    </div>

</div>
<div style="text-align: center; padding: 20px 0; border-top: 1px solid #34495e;">
    <p style="margin: 0;">&copy; 2024 Rehab Center. All rights reserved.</p>
</div>
</footer>
<!-- /Footer -->

</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Sticky Sidebar JS -->
<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>