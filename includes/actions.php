<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('database.php');
session_start();

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    // Get username and password from form submission
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = db_connect();

    // Perform a database query to retrieve the user's information
    $query = "SELECT * FROM users WHERE username='$username'";

    $result = db_query($conn, $query);

    // Check if the query returned any rows
    if (mysqli_num_rows($result) == 1) {
        // Get the user's information
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, create a session for the user
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $user['id'];

            // Redirect the user to the home page
            header('Location: ../views/home.php');
            exit();
        } else {
            // Password is incorrect, show an error message
            $error = 'Invalid username or password.';
        }
    } else {
        // Username not found, show an error message
        $error = 'Invalid username or password.';
    }

    // Close the database connection
    db_close($conn);

    // If there is an error, return to the login page with an error message
    if (isset($error)) {
        header("Location: ../views/auth/login.php?error=$error");
        exit();
    }
}

// Process registration form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    // Get username, password, email, and confirm_password from form submission
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $confirm_password = $_POST['confirm_password'];

    // Check if password and confirm_password match
    if ($password != $confirm_password) {
        // Set an error message
        $error = 'Passwords do not match.';
        
        // Redirect the user back to the registration page with the error message
        header('Location: ../views/auth/register.php?error=' . urlencode($error));
        exit();
    } else {
        // Check if username already exists in the database
        $conn = db_connect();
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = db_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            // Set an error message
            $error = 'Username already exists. Please choose a different username.';
            
            // Redirect the user back to the registration page with the error message
            header('Location: ../views/auth/register.php?error=' . urlencode($error));
            exit();
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Perform a database query to insert the new user's information
            $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";
            $result = db_query($conn, $query);

            // Check if the query was successful
            if ($result) {
                // Registration was successful, redirect the user to the login page
                header('Location: ../views/auth/login.php');
                exit();
            } else {
                // Set an error message
                $error = 'Registration failed. Please try again later.';
                
                // Redirect the user back to the registration page with the error message
                header('Location: ../views/auth/register.php?error=' . urlencode($error));
                exit();
            }
        }

        // Close the database connection
        db_close($conn);
    }
}


// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['add_product'])) {
    $conn = db_connect();
    // Get the form data and sanitize it
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);

    // Check if an image was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Get the temporary file name of the image
        $tmp_name = $_FILES['image']['tmp_name'];

        // Read the contents of the image into a variable
        $img_data = file_get_contents($tmp_name);

        // Prepare the image data for storage in the database
        $img_data = mysqli_real_escape_string($conn, $img_data);
    } else {
        // If no image was uploaded, set the image data to NULL
        $img_data = NULL;
    }

    $company = $_SESSION['id'];

    // Prepare the query to insert the product data into the database
    $query = "INSERT INTO products (name, type, price, rating, image, company) VALUES ('$name', '$type', '$price', '$rating', '$img_data', '$company')";

    // Execute the query and check if it was successful\
    if (mysqli_query($conn, $query)) {
        // If the query was successful, redirect the user to the product list page
        header('Location: ../views/home.php');
        exit();
    } else {
        // If the query was not successful, print an error message
        echo 'Error: ' . mysqli_error($conn);
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['add_category'])) {
    $conn = db_connect();
    
    // Get the category name and description from the form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    // Insert the new category into the database
    $query = "INSERT INTO product_category (name, description) VALUES ('$name', '$description')";
   // Execute the query and check if it was successful
   if (mysqli_query($conn, $query)) {
    // If the query was successful, redirect the user to the product list page
    header('Location: ../views/cat.php');
    exit();
} else {
    // If the query was not successful, print an error message
    echo 'Error: ' . mysqli_error($conn);
}

}

?>
