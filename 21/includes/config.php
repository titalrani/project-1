<?php
define('DB_SERVER', 'sql101.infinityfree.com');
define('DB_USERNAME', 'if0_39065432');
define('DB_PASSWORD', 'k9P2tx9Hiv77oa');
define('DB_NAME', 'if0_39065432_college_club');

// Attempt to connect to MySQL database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?> http://localhost:8000/register.php