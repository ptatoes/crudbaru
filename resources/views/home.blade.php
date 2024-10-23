<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Laundry Service</title>
</head>
<body class="home-page">
    <header>
        <h1>Welcome to Our Laundry Service</h1>
        @include('partials.navbar') <!-- Include the navbar -->
    </header>

    <main>
        <section class="service-solution">
            <h2>Your Laundry Solution</h2>
            <p>We offer a range of laundry services to meet your needs.</p>
            <p>Enjoy clean clothes without the hassle!</p>
        </section>

        <section>
            <h2>Our Services</h2>
            <ul>
                <li>Wash and Fold</li>
                <li>Dry Cleaning</li>
                <li>Ironing</li>
                <li>Express Service</li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Laundry Service. All rights reserved.</p>
    </footer>
</body>
</html>
