<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Club - Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">College Club</div>
        <div class="menu-toggle">☰</div>
        <ul class="nav-links">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="events.php">Events</a></li>
            <li><a href="members.php">Members</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="logout.php" class="logout-btn">Logout</a></li>
        </ul>
    </nav>

    <main>
        <section class="hero">
            <h1>Welcome to College Club</h1>
            <p>Join us in creating memorable experiences and building lasting friendships</p>
        </section>

        <section class="features">
            <div class="feature-card">
                <h3>Upcoming Events</h3>
                <p>Check out our latest events and activities</p>
                <a href="events.php" class="btn">View Events</a>
            </div>
            <div class="feature-card">
                <h3>Join Us</h3>
                <p>Become a member and be part of our community</p>
                <a href="members.php" class="btn">Learn More</a>
            </div>
            <div class="feature-card">
                <h3>Gallery</h3>
                <p>View photos from our past events</p>
                <a href="gallery.php" class="btn">View Gallery</a>
            </div>
        </section>

        <section class="about">
            <h2>About Our Club</h2>
            <p>We are a vibrant community of students dedicated to creating an engaging and inclusive environment for all members. Our club organizes various events, workshops, and activities throughout the year.</p>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>Contact Us</h4>
                <p>Email: info@collegeclub.com</p>
                <p>Phone: (123) 456-7890</p>
            </div>
            <div class="footer-section">
                <h4>Follow Us</h4>
                <div class="social-links">
                    <a href="#">Facebook</a>
                    <a href="#">Twitter</a>
                    <a href="#">Instagram</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 College Club. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/main.js"></script>
</body>
</html> 