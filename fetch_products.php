<?php
// Initialize the database connection
include './includes/database.php';
$conn = db_connect();

// Get the filter parameters from the query string
$minPrice = isset($_GET['min-price']) ? $_GET['min-price'] : 0;
$maxPrice = isset($_GET['max-price']) ? $_GET['max-price'] : PHP_INT_MAX;
$search = isset($_GET['search']) ? $_GET['search'] : '';
$typeFilter = isset($_GET['type']) ? $_GET['type'] : '';
$ratingFilter = isset($_GET['rating']) ? $_GET['rating'] : '';

// Build the SQL query based on the filter parameters
$query = "SELECT products.*, product_category.name as type_name FROM products 
          INNER JOIN product_category ON products.type = product_category.id";

if (!empty($minPrice) || !empty($maxPrice) || !empty($search) || !empty($typeFilter) || !empty($ratingFilter)) {
    $query .= " WHERE";
}

if (!empty($minPrice) && !empty($maxPrice)) {
    $query .= " price BETWEEN $minPrice AND $maxPrice";
}

if (!empty($search)) {
    if (!empty($minPrice) || !empty($maxPrice)) {
        $query .= " AND";
    }
    $query .= " (products.name LIKE '%$search%' OR products.description LIKE '%$search%')";
}

if (!empty($typeFilter)) {
    if (!empty($minPrice) || !empty($maxPrice) || !empty($search)) {
        $query .= " AND";
    }
    $query .= " product_category.name = '$typeFilter'";
}

if (!empty($ratingFilter)) {
    if (!empty($minPrice) || !empty($maxPrice) || !empty($search) || !empty($typeFilter)) {
        $query .= " AND";
    }
    $query .= " products.rating >= $ratingFilter";
}

// Execute the SQL query
$result = mysqli_query($conn, $query);

// Build an array of products
$products = array();
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

// Close the database connection
db_close($conn);

// Return the products data in JSON format
header('Content-Type: application/json');
echo json_encode($products);
?>
