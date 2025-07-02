<?php
session_start();
require_once "includes/config.php";

// Check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Fetch events from database
$sql = "SELECT * FROM events ORDER BY event_date DESC";
$result = mysqli_query($conn, $sql);
$events = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - College Club</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">College Club</div>
        <div class="menu-toggle">☰</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="events.php" class="active">Events</a></li>
            <li><a href="members.php">Members</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="logout.php" class="logout-btn">Logout</a></li>
        </ul>
    </nav>

    <main>
        <section class="events-header">
            <h1>Upcoming Events</h1>
            <?php if(isset($_SESSION["username"])): ?>
                <button class="btn" onclick="showEventForm()">Create New Event</button>
            <?php endif; ?>
        </section>

        <section class="events-grid">
            <?php foreach($events as $event): ?>
                <div class="event-card">
                    <h3><?php echo htmlspecialchars($event['title']); ?></h3>
                    <p class="event-date" data-date="<?php echo $event['event_date']; ?>">
                        <?php echo date('F j, Y, g:i a', strtotime($event['event_date'])); ?>
                    </p>
                    <p class="event-location">📍 <?php echo htmlspecialchars($event['location']); ?></p>
                    <p class="event-description"><?php echo htmlspecialchars($event['description']); ?></p>
                    <?php if(isset($_SESSION["username"])): ?>
                        <div class="event-actions">
                            <button class="btn btn-small" onclick="editEvent(<?php echo $event['id']; ?>)">Edit</button>
                            <button class="btn btn-small btn-danger" onclick="deleteEvent(<?php echo $event['id']; ?>)">Delete</button>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>

        <!-- Event Form Modal -->
        <div id="eventModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Create New Event</h2>
                <form id="eventForm" action="includes/create_event.php" method="POST">
                    <div class="form-group">
                        <label for="title">Event Title</label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="event_date">Date and Time</label>
                        <input type="datetime-local" id="event_date" name="event_date" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" required>
                    </div>
                    <button type="submit" class="btn">Create Event</button>
                </form>
            </div>
        </div>
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
    <script>
        // Event form modal functionality
        function showEventForm() {
            document.getElementById('eventModal').style.display = 'block';
        }

        // Close modal when clicking the X
        document.querySelector('.close').onclick = function() {
            document.getElementById('eventModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target == document.getElementById('eventModal')) {
                document.getElementById('eventModal').style.display = 'none';
            }
        }

        // Edit event
        function editEvent(eventId) {
            // Fetch event details and populate form
            fetch(`includes/get_event.php?id=${eventId}`)
                .then(response => response.json())
                .then(event => {
                    document.getElementById('title').value = event.title;
                    document.getElementById('description').value = event.description;
                    document.getElementById('event_date').value = event.event_date;
                    document.getElementById('location').value = event.location;
                    document.getElementById('eventForm').action = `includes/update_event.php?id=${eventId}`;
                    showEventForm();
                });
        }

        // Delete event
        function deleteEvent(eventId) {
            if(confirm('Are you sure you want to delete this event?')) {
                fetch(`includes/delete_event.php?id=${eventId}`, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        location.reload();
                    } else {
                        alert('Error deleting event');
                    }
                });
            }
        }
    </script>
</body>
</html> 