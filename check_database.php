<?php

// Database connection database
$host = "localhost:8889";
$db_name = "mvc";
$user = "admin";
$password = "admin";

// Create a connection
$conn = new mysqli($host, $user, $password, $db_name);

// Check the connection
if ($conn->connect_error) {
    echo "connection failed: " . $conn->connect_error;
} else {
    echo "Connected successfully, connection data are OK.";
}