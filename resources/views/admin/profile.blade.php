<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> <!-- Google Font -->
</head>
<body class="admin-profile"> <!-- Scoped styles for admin profile -->
    <header>
        <h1>Admin Profile</h1>
    </header>
    <main>
        <h2>Admin Information</h2>
        <p class="info"><strong>Name:</strong> {{ auth()->user()->name }}</p> <!-- Display user name -->
        <p class="info"><strong>Email:</strong> {{ auth()->user()->email }}</p> <!-- Display user email -->
        <div class="button-container">
            <a href="{{ route('admin.dashboard') }}" class="button">Back to Dashboard</a>
        </div>
    </main>
    
</body>
</html>
