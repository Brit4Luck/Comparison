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
    <title>Add Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body> 
    <?php
            include('./inc/nav.php')
            ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
           
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Product</div>
                    <div class="card-body">
                        <form method="POST" action="../includes/actions.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">Select a type</option>
                                    <?php
                                        // Query the types table to get the list of types
                                        $query = "SELECT id, name FROM product_category";
                                        
                                        $result = mysqli_query($conn, $query);

                                        // Loop through the result set and output an option for each type
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                         }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <select name="rating" id="rating" class="form-control" required>
                                    <option value="">Select a rating</option>
                                    <option value="1">1 Star</option>
                                    <option value="2">2 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="5">5 Stars</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control-file">
                            </div>
                            <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>
