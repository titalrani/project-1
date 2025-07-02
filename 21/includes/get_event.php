<?php
session_start();
require_once "config.php";

// Check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Not authorized']);
    exit;
}

if(isset($_GET["id"])){
    $id = $_GET["id"];
    
    $sql = "SELECT * FROM events WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            if($event = mysqli_fetch_assoc($result)){
                header('Content-Type: application/json');
                echo json_encode($event);
            } else{
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Event not found']);
            }
        } else{
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Error retrieving event']);
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);
?> 