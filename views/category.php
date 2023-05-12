<?php

session_start();

// Include the database connection code
include '../includes/database.php';
$conn = db_connect();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user to the login page
    header('Location: ../views/auth/login.php');
    exit();
}
if (!isset($conn)) {
    // If not, print an error message or redirect to an error page
    die('Error: Connection not established');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body> 
    <?php include('./inc/nav.php'); ?>
    <div class="container mt-5">
        <h1>create category</h1>

        <div class="container mt-5">
            <h2>Create New Category</h2>
            <form method="POST" action="../includes/actions.php">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="add_category">Add </button>
            </form>
        </div>

        
    </div>
   
</body>
</html>