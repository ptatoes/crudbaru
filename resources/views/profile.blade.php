<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Include your assets -->
</head>
<body>
    <header>
        <h1>User Profile</h1>
        <nav>
            <ul>
                <li><a href="{{ route('customers.index') }}">Customers</a></li>
                <li><a href="{{ route('orders.index') }}">Orders</a></li>
                <li><a href="{{ route('services.index') }}">Services</a></li>
                @auth
                    <li>
                        <span>Welcome, {{ auth()->user()->name }}</span>
                        <div class="dropdown">
                            <button class="dropbtn">Profile</button>
                            <div class="dropdown-content">
                                <a href="{{ route('admin.profile') }}">User Profile</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endauth
            </ul>
        </nav>
    </header>

    <main>
        <h2>Profile Information</h2>
        <p>Name: {{ auth()->user()->name }}</p>
        <p>Email: {{ auth()->user()->email }}</p>
        <!-- Add more profile information as needed -->
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Laundry Service. All rights reserved.</p>
    </footer>
</body>
</html>
