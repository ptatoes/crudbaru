<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Laundry Service</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            background-color: #f5f5dc;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding-bottom: 80px;
        }

        /* Navbar styles */
        nav {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            padding: 1rem 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        /* Title styling */
        .navbar-title h1 {
            color: #ffffff;
            font-size: 1.8rem;
            margin: 0;
            padding: 0;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
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

        /* Dropdown styles */
        .dropdown {
            display: inline-block;
            position: relative;
        }

        .profile-btn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .profile-image {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            border: 2px solid #FFD700;
            transition: transform 0.3s ease;
            margin-right: 10px;
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
            background-color: #7bd0e1;
            transform: translateY(-2px);
        }

        /* Main section styles */
        section {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            background-color: white;
            animation: fadeIn 0.5s ease-in;
            margin-top: 20px; /* Space between sections */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        h1, h2 {
            color: #ffffff;
        }

        .section-title {
            font-size: 2rem;
            color: #3498db;
            text-align: center;
            margin-bottom: 20px;
            animation: bounce 0.5s ease-in-out;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .description {
            text-align: center;
            margin: 20px 0;
            color: #555;
            font-size: 1.2rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            animation: slideIn 0.5s ease-in-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            font-size: 1.5rem;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 1.1rem;
            color: #555;
        }

        /* Sections for showing/hiding */
        .info-section, .why-choose-us, .testimonials-section, .faq-section {
            padding: 20px;
            margin-top: 20px;
            background-color: #f9f9f9;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .why-choose-us {
            padding: 40px 20px;
            background-color: #f9f9f9;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease-in;
        }

        .why-choose-us ul {
            list-style-type: none;
            padding-left: 0;
        }

        .why-choose-us li {
            margin: 15px 0;
            font-size: 1.1rem;
            color: #2c3e50;
            line-height: 1.6;
            transition: transform 0.3s, color 0.3s;
        }

        .why-choose-us li:hover {
            transform: translateY(-2px);
            color: #3498db;
}

        .testimonials-section {
            padding: 40px 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .testimonial-container {
            display: flex;
            flex-direction: column;
            gap: 20px; /* Space between testimonials */
        }

        .testimonial {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .testimonial:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .testimonial-text {
            font-style: italic;
            color: #555;
            margin-bottom: 10px;
        }

        .customer-name {
            color: #2c3e50;
            font-weight: bold;
        }


        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25D366;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .whatsapp-button:hover {
            background-color: #1DA851;
        }

        .whatsapp-icon {
            width: 35px;
            height: 35px;
        }
  /* Chat Bubble */
  .chat-bubble {
            position: fixed;
            bottom: 100px;
            right: 30px;
            background-color: #f5f5dc;
            color: #2c3e50;
            padding: 10px 20px;
            border-radius: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
        }

        .chat-bubble:before {
            content: '';
            position: absolute;
            bottom: -10px;
            right: 20px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 10px solid #f5f5dc;
        }

        .chat-bubble:hover {
            background-color: #e6ddc7;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #2c3e50;
            color: #fff;
            position: relative;
            margin-top: 20px; /* Space before footer */
            border-radius: 15px;
        }
        .header {
                text-align: center;
                padding: 40px 20px;
                background-color: #2c3e50;
                color: white;
                border-radius: 15px;
                margin: 20px 0;
                animation: fadeIn 0.5s ease-in;
            }

        .header h1 {
            font-size: 3rem;
            margin: 0;
            font-weight: 700;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <nav>
        <div class="navbar-title">
            <h1>Laundry Service</h1>
        </div>
        <ul>
            @auth
            <li>
                <div class="dropdown">
                    <button class="profile-btn">                        
                        <span style="color:white; font-weight:700;">{{ Auth::user()->name }}</span> <!-- Display current user name -->
    
                        <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" class="profile-image" alt="Profile Picture">
                    </button>
                    <div class="dropdown-content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="sub">Logout</button>
                        </form>
                    </div>
                </div>
            </li>
            @endauth
        </ul>
    </nav>
    
    <div class="header">
        <h1>Welcome to Our Laundry Service</h1>
    </div>

    <section id="about-us">
        <h2 class="section-title">About Us</h2>
        <p class="description">We offer premium laundry services with a focus on quality and customer satisfaction.</p>
    </section>

    <section id="services">
        <h2 class="section-title">Our Services</h2>
        <div class="grid">
            <div class="card">
                <h3>Wash & Fold 🧺</h3>
                <p>Efficient wash and fold services for your laundry needs.</p>
                <p><strong>Price: Rp 30,000/kg</strong></p>
            </div>
            <div class="card">
                <h3>Dry Cleaning 👗</h3>
                <p>Professional dry cleaning for delicate fabrics.</p>
                <p><strong>Price: Rp 50,000/kg</strong></p>
            </div>
            <div class="card">
                <h3>Ironing 👕</h3>
                <p>Expert ironing services for crisp, clean clothes.</p>
                <p><strong>Price: Rp 10,000/kg</strong></p>
            </div>
            <div class="card">
                <h3>Exprss service 🚚</h3>
                <p>Get your laundry in speed of time.</p>
                <p><strong>Price: Rp 20,000/Kg</strong></p>
            </div>
        </div>
    </section>

    <section id="why-choose-us" class="why-choose-us">
        <h2 class="section-title">Why Choose Us</h2>
        <div class="info-section">
            <ul>
                <li><strong>✨ Quality Service</strong>: We ensure the best care for your clothes with our experienced staff.</li>
                <li><strong>⏱️ Fast Turnaround</strong>: Quick and reliable service to meet your schedule.</li>
                <li><strong>💰 Affordable Prices</strong>: Competitive pricing without compromising quality.</li>
                <li><strong>🌱 Eco-Friendly Products</strong>: We use sustainable and environmentally friendly cleaning products.</li>
            </ul>
        </div>
    </section>

    <section id="testimonials" class="testimonials-section">
        <h2 class="section-title">What Our Customers Say</h2>
        <div class="testimonial-container">
            <div class="testimonial">
                <p class="testimonial-text">"Best laundry service in town! Highly recommended!"</p>
                <strong class="customer-name">- John Doe</strong>
            </div>
            <div class="testimonial">
                <p class="testimonial-text">"Quick and reliable. My clothes have never looked better!"</p>
                <strong class="customer-name">- Jane Smith</strong>
            </div>
        </div>
    </section>
    


    <footer>
        <p>&copy; 2024 Our Laundry Service. All rights reserved.</p>
    </footer>

    </div>
    <!-- WhatsApp Button -->
    <button class="whatsapp-button" onclick="window.open('https://wa.me/6288231252988', '_blank');">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" class="whatsapp-icon">
    </button>

    <!-- Chat Bubble -->
    <div class="chat-bubble" onclick="window.open('https://wa.me/6288231252988', '_blank');">
        Contact Us
    </div>
</body>
</html>





{{-- body {
    background-color: #f5f5dc;
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding-bottom: 80px;
}

/* Navbar styles */
nav {
    background: linear-gradient(135deg, #2c3e50, #34495e);
    padding: 1rem 2rem;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    font-family: 'Roboto', sans-serif;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 1000;
}

/* Title styling */
.navbar-title h1 {
    color: #ffffff;
    font-size: 1.8rem;
    margin: 0;
    padding: 0;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
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

/* Dropdown styles */
.dropdown {
    display: inline-block;
    position: relative;
}

.profile-btn {
    background-color: transparent;
    border: none;
    cursor: pointer;
    padding: 0;
    display: flex;
    align-items: center;
}

.profile-image {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    border: 2px solid #FFD700;
    transition: transform 0.3s ease;
    margin-right: 10px;
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

/* Responsive navbar */
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
} --}}




{{-- <nav>
    <div class="navbar-title">
        <h1>Laundry Service</h1>
    </div>
    <ul>
        @auth
        <li>
            <div class="dropdown">
                <button class="profile-btn">                        
                    <span style="color:white; font-weight:700;">{{ Auth::user()->name }}</span> <!-- Display current user name -->

                    <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" class="profile-image" alt="Profile Picture">
                </button>
                <div class="dropdown-content">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="sub">Logout</button>
                    </form>
                </div>
            </div>
        </li>
        @endauth
    </ul>
</nav> --}}




{{-- header part --}}

{{-- <div class="header">
    <h1>Welcome to Our Laundry Service</h1>
</div> --}}

{{-- css for header --}}

{{-- .header {
    text-align: center;
    padding: 40px 20px;
    background-color: #2c3e50;
    color: white;
    border-radius: 15px;
    margin: 20px 0;
    animation: fadeIn 0.5s ease-in;
}

.header h1 {
    font-size: 3rem;
    margin: 0;
    font-weight: 700;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
} --}}

{{-- </div>
<!-- WhatsApp Button -->
<button class="whatsapp-button" onclick="window.open('https://wa.me/6288231252988', '_blank');">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" class="whatsapp-icon">
</button>

<!-- Chat Bubble -->
<div class="chat-bubble" onclick="window.open('https://wa.me/6288231252988', '_blank');">
    Contact Us
</div> --}}