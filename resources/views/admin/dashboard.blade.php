<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        function updateClock() {
            const now = new Date();
            const options = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
            document.getElementById('current-time').innerText = now.toLocaleTimeString('en-US', options);
        }

        setInterval(updateClock, 1000);
    </script>
</head>
<body onload="updateClock()" class="admin-dashboard">
    <div class="navbar">
        <h1>Admin Dashboard</h1>
        <a href="{{ route('logout') }}" class="logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
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
