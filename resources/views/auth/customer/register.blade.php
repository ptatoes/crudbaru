<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #dce7f5, #729cbd); /* Light blue gradient background */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            margin-bottom: 1.5rem;
            font-size: 26px;
            color: #134d8b; /* Premium blue for title */
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border: 1px solid #8ca5d2; /* Light blue border */
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #132d8b; /* Darker blue on focus */
            outline: none;
        }

        button {
            background-color: #13218b; /* Premium blue for button */
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #141d70; /* Darker blue on hover */
            transform: translateY(-2px); /* Slight lift effect */
        }

        a {
            color: #17138b; /* Premium blue for links */
            text-decoration: none;
            margin-top: 1rem;
            display: block;
            font-size: 14px;
            transition: color 0.3s;
        }

        a:hover {
            color: #1c1470; /* Darker blue on hover */
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .container {
                padding: 1.5rem; /* Less padding on small screens */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Customer Registration</h1>
        <form action="{{ route('customer.register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
        <a href="{{ route('customer.login') }}">Already have an account? Login</a>
    </div>
</body>
</html>
