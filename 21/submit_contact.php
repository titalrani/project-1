<?php
$dbname = 'college_club.db';

// Create SQLite connection
$conn = new SQLite3($dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Create table if not exists
    $conn->exec("CREATE TABLE IF NOT EXISTS contacts (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        message TEXT NOT NULL
    )");

    // Insert data into table
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':message', $message, SQLITE3_TEXT);

    if ($stmt->execute()) {
        echo "<p style='color: green;'>Message sent successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $conn->lastErrorMsg() . "</p>";
    }
}

$conn->close();
