<!DOCTYPE html>
<html lang="en">

<body>

    <div class="container">
        <form action="{{ route('password.reset') }}" method="POST">
            @csrf

            <h2 class="text-center mb-4">Reset Password</h2>

            <!-- Username Field -->
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="user_name"
                    class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" required>
                @error('user_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Password Field -->
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password:</label>
                <input type="password" id="new_password" name="new_password"
                    class="form-control @error('new_password') is-invalid @enderror" required>
                @error('new_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Reset Password Button -->
            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
        </form>
    </div>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7; /* Light gray background */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); /* Black shadow for the form */
            width: 100%;
            max-width: 350px;
        }

        h2 {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center; /* Center the heading */
        }

        .form-label {
            font-weight: 600;
            color: #555;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 14px;
            transition: 0.3s;
            width: 95%; /* Full width input fields */
        }

        .form-control:focus {
            outline: none;
            border-color: #2575fc;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.4);
        }

        .btn-primary {
            background-color: #06A3DA;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            width: 100%; /* Full width button */
            transition: 0.3s;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #F57E57;
            box-shadow: 0 5px 15px rgba(4, 5, 7, 0.3);
        }

        .invalid-feedback {
            color: #F57E57;
            font-size: 13px;
            margin-top: 5px;
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        @media (max-width: 576px) {
            .container {
                padding: 30px;
            }

            h2 {
                font-size: 20px;
            }

            .form-control,
            .btn-primary {
                font-size: 14px;
            }
        }
    </style>

</body>

</html>
