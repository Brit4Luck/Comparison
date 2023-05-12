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

// Get all the products from the database
$query = "SELECT * FROM product_category";
$result = mysqli_query($conn, $query);

// Check if there are any products
if (mysqli_num_rows($result) == 0) {
    // If there are no products, display a message
    $message = 'There are no products to display.';
} else {
    // If there are products, create a table to display them
    $message = '';
    $table = '<table class="table">';
    $table .= '<thead>';
    $table .= '<tr>';
    $table .= '<th>Name</th>';
    $table .= '<th>Description</th>';
    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';

    // Loop through the result set and output a row for each product
    while ($row = mysqli_fetch_assoc($result)) {
        $table .= '<tr>';
        $table .= '<td>' . $row['name'] . '</td>';
        $table .= '<td>' . $row['description'] . '</td>';
      
       
        $table .= '</tr>';
    }

    $table .= '</tbody>';
    $table .= '</table>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body> 
    <?php include('./inc/nav.php'); ?>
    <div class="container mt-5">
        <h1>All Categories</h1>
        <?php echo $message; ?>
        <?php echo $table; ?>
    </div>
   
</body>
</html>
