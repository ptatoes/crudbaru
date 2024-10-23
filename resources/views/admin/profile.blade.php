<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> <!-- Google Font -->
    <style>
        body {
            font-family: 'Roboto', sans-serif; /* Modern font */
            background-color: #f5f5dc; /* Light beige */
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #8B4513; /* SaddleBrown */
            color: white;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        main {
            padding: 30px;
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff; /* White background for content */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Enhanced shadow */
            border: 1px solid #d2b48c; /* Light tan border */
        }

        h2 {
            margin: 0;
            font-size: 28px; /* Larger font size */
            color: #8B4513; /* SaddleBrown */
            border-bottom: 2px solid #d2b48c; /* Underline effect */
            padding-bottom: 10px; /* Space below heading */
        }

        p {
            font-size: 18px;
            margin: 10px 0;
            line-height: 1.6; /* Increased line height */
        }

        .button-container {
            margin-top: 30px;
            text-align: center;
        }

        .button {
            background-color: #8B4513; /* SaddleBrown */
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Button shadow */
        }

        .button:hover {
            background-color: #704214; /* Darker brown */
            transform: translateY(-2px); /* Lift effect */
        }

        footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px 0;
            color: #8B4513;
            font-size: 14px; /* Smaller font size */
        }

        @media (max-width: 600px) {
            main {
                padding: 20px; /* Less padding on small screens */
            }

            .button {
                padding: 10px 20px; /* Less padding for buttons */
                font-size: 16px; /* Smaller font size */
            }

            h2 {
                font-size: 24px; /* Smaller heading on mobile */
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>User Profile</h1>
    </header>
    <main>
        <h2>Welcome, {{ auth()->user()->name }}</h2>
        <p>Email: {{ auth()->user()->email }}</p>
        <div class="button-container">
            <a href="{{ route('admin.dashboard') }}" class="button">Back to Dashboard</a>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>
</body>
</html>
