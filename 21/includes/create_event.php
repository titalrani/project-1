<?php
session_start();
require_once "config.php";

// Check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = trim($_POST["title"]);
    $description = trim($_POST["description"]);
    $event_date = trim($_POST["event_date"]);
    $location = trim($_POST["location"]);
    
    $sql = "INSERT INTO events (title, description, event_date, location) VALUES (?, ?, ?, ?)";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "ssss", $title, $description, $event_date, $location);
        
        if(mysqli_stmt_execute($stmt)){
            header("location: ../events.php");
            exit();
        } else{
            echo "Something went wrong. Please try again later.";
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);
?> 