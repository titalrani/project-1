<?php
session_start();
require_once "config.php";

// Check if user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Not authorized']);
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "DELETE" && isset($_GET["id"])){
    $id = $_GET["id"];
    
    $sql = "DELETE FROM events WHERE id = ?";
    
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if(mysqli_stmt_execute($stmt)){
            header('Content-Type: application/json');
            echo json_encode(['success' => true]);
        } else{
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Error deleting event']);
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);
?> 