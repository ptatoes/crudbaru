<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/1zZ9oPj7jB4qEbs3Z7MTIkfZ8C4d1f8ztpuRjM" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5dc; /* Light brown background */
            font-family: 'Poppins', sans-serif; /* Use Poppins font */
            margin: 0; /* Remove default margin */
            padding-bottom: 80px; /* Space for the WhatsApp button */
        }

        header {
            background-color: #5B3A29; /* Darker brown for the navbar */
            color: white;
            padding: 10px 30px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3); /* Shadow effect */
            position: sticky; /* Keep the navbar at the top */
            top: 0; /* Stick to the top */
            z-index: 1000; /* Ensure it stays above other content */
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Space between logo and user section */
        }

        .dropdown {
            position: relative; /* For dropdown positioning */
            cursor: pointer; /* Pointer cursor for dropdown */
        }

        .dropdown-content {
            display: none; /* Hidden by default */
            position: absolute; /* Position it below the dropdown */
            background-color: #f9f9f9; /* Light background for dropdown */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3); /* Shadow effect */
            z-index: 1; /* Ensure it appears above other content */
            right: 0; /* Align right */
            padding: 10px 0; /* Padding around dropdown */
        }

        .dropdown:hover .dropdown-content {
            display: block; /* Show dropdown on hover */
        }

        h1 {
            color: #f5f5dc; /* Light color for the title */
            margin: 0; /* Remove default margin */
            font-size: 2rem; /* Increase font size */
        }

        .container {
            text-align: center;
            background-color: #fff; /* White background for the container */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin: 20px auto; /* Center the container with margin */
            max-width: 900px; /* Maximum width for container */
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Responsive grid */
            gap: 20px; /* Space between cards */
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s; /* Transition for transform and shadow */
        }

        .card:hover {
            transform: translateY(-5px); /* Slight lift effect on hover */
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2); /* Deeper shadow on hover */
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 1.5rem;
            color: #5B3A29; /* Darker brown text */
        }

        .card p {
            font-size: 1.2rem;
            color: #555;
        }

        /* WhatsApp Button Style */
        .whatsapp-button {
            position: fixed; /* Fixes the position to the viewport */
            bottom: 20px; /* Distance from the bottom */
            right: 20px; /* Distance from the right */
            background-color: #25D366; /* WhatsApp green */
            border: none; /* No border */
            border-radius: 50%; /* Circle shape */
            width: 60px; /* Button width */
            height: 60px; /* Button height */
            display: flex; /* Flexbox for centering */
            justify-content: center; /* Center icon horizontally */
            align-items: center; /* Center icon vertically */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
            cursor: pointer; /* Pointer cursor */
            transition: background-color 0.3s; /* Smooth transition */
        }

        .whatsapp-button:hover {
            background-color: #1DA851; /* Darker green on hover */
        }

        .whatsapp-icon {
            width: 35px; /* Width of the WhatsApp icon */
            height: 35px; /* Height of the WhatsApp icon */
        }

        .info-section {
            margin-top: 40px; /* Space above the information section */
            padding: 20px;
            background-color: #fff; /* White background for information */
            border-radius: 15px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
        }

        .info-section h2 {
            color: #5B3A29; /* Dark brown for section title */
            margin-bottom: 15px; /* Space below the title */
            font-size: 1.8rem; /* Increase font size */
        }

        .info-section p {
            color: #333; /* Dark gray for text */
            line-height: 1.6; /* Line height for readability */
            margin: 10px 0; /* Space above and below each paragraph */
        }

        .description {
            margin: 20px 0; /* Space above and below description */
            font-size: 1.2rem; /* Font size for description */
            color: #555; /* Dark gray for text */
            line-height: 1.6; /* Line height for readability */
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <h1>Welcome to Our Laundry Service</h1>
            <div class="dropdown">
                <span>Welcome, {{ $user->name }}</span>
                <div class="dropdown-content">
                    <form action="{{ route('customer.logout') }}" method="POST">
                        @csrf
                        <button type="submit" style="background:none; border:none; color:#8B4513; padding:10px; cursor:pointer;">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    
    <div class="container">
        <h2>Your Services</h2>
        <p class="description">At our laundry service, we pride ourselves on providing quality cleaning that meets your needs. Whether it's dry cleaning, wet cleaning, or express laundry, we ensure your clothes are handled with care and returned to you fresh and clean!</p>

        <!-- Services Grid -->
        <div class="grid">
            <div class="card">
                <h3>Dry Cleaning</h3>
                <p>Rp 15,000/kg</p>
            </div>
            <div class="card">
                <h3>Wet Cleaning</h3>
                <p>Rp 10,000/kg</p>
            </div>
            <div class="card">
                <h3>Ironing</h3>
                <p>Rp 12,000</p>
            </div>
            <div class="card">
                <h3>Express Laundry</h3>
                <p>Rp 25,000/kg</p>
            </div>
        </div>

        <!-- Additional Information Section -->
        <div class="info-section">
            <h2>Our Location</h2>
            <p>123 Laundry St, Kedah, Malaysia</p>

            <h2>Contact Us</h2>
            <p>If you have any questions, feel free to reach out!</p>
        </div>
    </div>

    <!-- WhatsApp Button -->
    <button class="whatsapp-button" onclick="window.open('https://wa.me/your_number', '_blank');">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" class="whatsapp-icon">
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-JyZc1JHjI6OrxEcz7hM7Xzoyf6B+NqE0C5i1pSxG8YX76aH2QJpE6p0H/PqY1FJo" crossorigin="anonymous"></script>
</body>
</html>