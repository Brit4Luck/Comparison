<?php
require_once('config.php');

// Create a connection to the database
function db_connect() {
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Check if connection was successful
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    return $conn;
}

// Close the database connection
function db_close($conn) {
    mysqli_close($conn);
}

// Perform a database query
function db_query($conn, $query) {
    $result = mysqli_query($conn, $query);

    // Check if query was successful
    if (!$result) {
        die('Query failed: ' . mysqli_error($conn));
    }

    return $result;
}
?>
