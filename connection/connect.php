<?php 
    session_start();
    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/grocery-shop/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'grocery-shop');
    
    // Create connection
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
?> 