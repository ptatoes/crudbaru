<!DOCTYPE html>
<html lang="en">
<!-- resources/views/partials/navbar.blade.php -->
<nav>
    <div class="navbar-title">
        <h1>Laundry Service</h1>
    </div>
    <ul>
        <li><a href="{{ route('customers.index') }}">Customers</a></li>
        <li><a href="{{ route('orders.index') }}">Orders</a></li>
        <li><a href="{{ route('services.index') }}">Services</a></li>
        @auth
        <li>
            <div class="dropdown">
                <button class="profile-btn">
                    <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="User Profile" class="profile-image">
                </button>
                <div class="dropdown-content">
                    <a href="{{ route('admin.profile') }}">User Profile</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class=sub>Logout</button>
                    </form>
                </div>
            </div>
        </li>
        @endauth
    </ul>
</nav>

<style>
    /* Import Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

    /* Navbar styles */
    nav {
        background: linear-gradient(135deg, #2c3e50, #34495e); /* Gradient for a modern look */
        padding: 1rem 2rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        font-family: 'Roboto', sans-serif;
        display: flex;
        justify-content: space-between; /* Separate title and links */
        align-items: center;
    }

    /* Title styling */
    .navbar-title h1 {
        color: #ffffff; /* Gold color for a striking look */
        font-size: 1.8rem;
        margin: 0;
        padding: 0;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
        letter-spacing: 1px;
    }

    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 2rem;
        align-items: center;
    }

    li {
        position: relative;
    }

    a {
        text-decoration: none;
        color: #FFF;
        font-weight: 700;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    a:hover {
        background-color: #ffffff;
        color: #2c3e50;
    }

    .dropdown {
        display: inline-block;
        position: relative;
    }

    .profile-btn {
        background-color: transparent;
        border: none;
        cursor: pointer;
        padding: 0;
    }

    .profile-image {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        border: 2px solid #FFD700;
        transition: transform 0.3s ease;
    }

    .profile-btn:hover .profile-image {
        transform: scale(1.1);
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #FFF;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        z-index: 1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content a {
        color: #2c3e50;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        transition: background-color 0.3s;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    

    .sub[type="submit"]:hover {
        background-color: #c0392b;
        transform: translateY(-2px);
    }

    /* Add responsiveness */
    @media (max-width: 768px) {
        nav {
            flex-direction: column;
            align-items: flex-start;
        }
        
        ul {
            flex-direction: column;
            gap: 1rem;
            width: 100%;
        }

        .navbar-title {
            margin-bottom: 1rem;
        }
    }
</style>
</html>
