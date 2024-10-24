<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #a0b3c1, #4e7499); /* Light beige to tan gradient */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            margin: 0;
        }

        .registration-container {
            background-color: #fff; /* White background for form */
            padding: 2.5rem; /* Increased padding */
            border-radius: 10px; /* More pronounced rounded corners */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); /* Soft shadow */
            width: 100%;
            max-width: 400px; /* Fixed width with a max size */
            text-align: center; /* Centered text */
        }

        h1 {
            margin-bottom: 1.5rem; /* Space below the heading */
            font-size: 26px; /* Slightly larger heading */
            color: #25138b; /* SaddleBrown for heading */
        }

        input {
            width: 100%; /* Full width */
            padding: 1rem; /* Increased padding */
            margin-bottom: 1.5rem; /* Space below input fields */
            border: 1px solid #8c9fd2; /* Tan border */
            border-radius: 5px; /* Rounded corners */
            font-size: 16px; /* Font size */
            transition: border-color 0.3s; /* Smooth transition */
        }

        input:focus {
            border-color: #21138b; /* SaddleBrown on focus */
            outline: none; /* Remove outline */
        }

        button {
            background-color: #2b138b; /* SaddleBrown for button */
            color: white; /* White text */
            border: none; /* Remove border */
            padding: 1rem; /* Increased padding */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor */
            width: 100%; /* Full width */
            font-size: 16px; /* Font size */
            transition: background-color 0.3s, transform 0.2s; /* Smooth transition */
        }

        button:hover {
            background-color: #251470; /* Darker brown on hover */
            transform: translateY(-2px); /* Slight lift effect */
        }

        a {
            color: #19138b; /* SaddleBrown for links */
            text-decoration: none; /* Remove underline */
            margin-top: 1rem; /* Space above links */
            display: block; /* Make links block elements */
            font-size: 14px; /* Smaller font size */
            transition: color 0.3s; /* Smooth transition */
        }

        a:hover {
            color: #221470; /* Darker brown on hover */
            text-decoration: underline; /* Underline on hover */
        }

        .alternate-login {
            margin-top: 1rem; /* Space above alternate login link */
        }

        .error-message {
            color: red; /* Red color for error messages */
            margin-bottom: 1rem; /* Space below error messages */
            font-size: 14px; /* Font size for error messages */
        }

        @media (max-width: 480px) {
            .registration-container {
                padding: 1.5rem; /* Less padding on small screens */
            }
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h1>Admin Registration</h1>

        <!-- Display validation errors if any -->
        @if($errors->any())
            <div class="error-message">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>

        <!-- Display success message if exists -->
        @if(session('success'))
            <div class="error-message">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.login') }}">Already have an account? Login</a>
        <div class="alternate-login">
            <a href="{{ route('customer.login') }}">Not an admin? Login as a customer</a>
        </div>
    </div>
</body>
</html>
