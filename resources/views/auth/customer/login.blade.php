<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #dce7f5, #729cbd); /* Light beige to tan gradient */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            margin: 0;
        }

        .login-container {
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
            color: #134d8b; /* SaddleBrown for heading */
        }

        input[type="email"],
        input[type="password"] {
            width: 100%; /* Full width */
            padding: 1rem; /* Increased padding */
            margin-bottom: 1.5rem; /* Space below input fields */
            border: 1px solid #8ca5d2; /* Tan border */
            border-radius: 5px; /* Rounded corners */
            font-size: 16px; /* Font size */
            transition: border-color 0.3s; /* Smooth transition */
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #132d8b; /* SaddleBrown on focus */
            outline: none; /* Remove outline */
        }

        button {
            background-color: #13218b; /* SaddleBrown for button */
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
            background-color: #141d70; /* Darker brown on hover */
            transform: translateY(-2px); /* Slight lift effect */
        }

        a {
            color: #17138b; /* SaddleBrown for links */
            text-decoration: none; /* Remove underline */
            margin-top: 1rem; /* Space above links */
            display: block; /* Make links block elements */
            font-size: 14px; /* Smaller font size */
            transition: color 0.3s; /* Smooth transition */
        }

        a:hover {
            color: #1c1470; /* Darker brown on hover */
            text-decoration: underline; /* Underline on hover */
        }

        .admin-link {
            margin-top: 1.5rem; /* Space above admin link */
        }

        .error-message {
            color: red;
            margin-bottom: 1rem;
            font-size: 14px;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 1.5rem; /* Less padding on small screens */
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Customer Login</h1>

        <!-- Display server-side validation errors -->
        @if($errors->any())
            <div class="error-message">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customer.login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="{{ route('customer.register') }}">Don't have an account? Register</a>
        <a href="{{ route('admin.login') }}" class="admin-link">Admin Login</a>
    </div>
</body>
</html>
