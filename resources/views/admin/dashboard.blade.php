<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, rgba(240, 248, 255, 0.9), rgba(240, 248, 255, 0.9)), 
                        url('https://laundry8plm.b-cdn.net/wp-content/uploads/2023/02/apa-itu-laundry.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            color: #2c3e50;
        }
        .navbar {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar h1 {
            margin: 0;
            font-size: 2em;
            letter-spacing: 1px;
        }
        .container {
            padding: 30px;
            text-align: center;
            max-width: 900px;
            margin: 40px auto;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .container h2 {
            margin-bottom: 20px;
            font-size: 1.8em;
            color: #34495e;
        }
        .clock {
            font-size: 1.8em;
            font-weight: bold;
            margin: 25px 0;
            color: #2c3e50;
        }
        .links {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }
        a {
            color: #ffffff;
            background-color: #3498db;
            padding: 15px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 1.1em;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #2980b9;
        }
        p {
            font-size: 1.2em;
            color: #7f8c8d;
        }
    </style>
    <script>
        function updateClock() {
            const now = new Date();
            const options = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
            document.getElementById('current-time').innerText = now.toLocaleTimeString('en-US', options);
        }

        setInterval(updateClock, 1000);
    </script>
</head>
<body onload="updateClock()">
    <div class="navbar">
        <h1>Admin Dashboard</h1>
    </div>
    <div class="container">
        <h2>Welcome, Admin</h2>
        <div class="clock" id="current-time">Loading...</div> <!-- Current time displayed here -->
        <p>Your centralized management dashboard for handling customers, orders, and services efficiently.</p>
        
        <div class="links">
            <a href="{{ route('customers.index') }}">Manage Customers</a>
            <a href="{{ route('services.index') }}">Manage Services</a>
            <a href="{{ route('orders.index') }}">Manage Orders</a>
        </div>
    </div>
</body>
</html>
