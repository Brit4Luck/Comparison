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

// Get the ID of the logged-in user
$user_id = $_SESSION['id'];

// Get all the products for the logged-in user from the database
$query = "SELECT p.* FROM products p JOIN users u ON u.id = p.company WHERE u.id = $user_id";
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
    $table .= '<th>Type</th>';
    $table .= '<th>Price</th>';
    $table .= '<th>Rating</th>';
    $table .= '<th>Image</th>';
    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';

    // Loop through the result set and output a row for each product
    while ($row = mysqli_fetch_assoc($result)) {
        $table .= '<tr>';
        $table .= '<td>' . $row['name'] . '</td>';
        
        // Get the product type name from the product_category table
        $type_query = "SELECT name FROM product_category WHERE id=" . $row['type'];
        $type_result = mysqli_query($conn, $type_query);
        $type_row = mysqli_fetch_assoc($type_result);
        $table .= '<td>' . $type_row['name'] . '</td>';

        $table .= '<td>' . $row['price'] . '</td>';
        $table .= '<td>' . $row['rating'] . '</td>';
        
        // Display image from longblob
        $image = base64_encode($row['image']);
        $table .= '<td><img src="data:image/jpeg;base64,' . $image . '" alt="' . $row['name'] . '" style="max-width: 100px;"></td>';
        
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
    <?php if (empty($message)): ?>
        <h1>All Products</h1>
        <?php echo $table; ?>
         <?php else: ?>
        <?php echo $message; ?>
    <?php endif; ?>
    </div>
   
</body>
</html>
