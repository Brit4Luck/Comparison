<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include './includes/database.php';
$conn = db_connect();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <script src="views/js/products.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
       body {
        margin: 0;
        padding: 0;
        width: 100%;
        }
        .filter-section {
            position: sticky;
            top: 80px;
        }

       .product-image {
            height: 150px;
         }
         .filter-section{
            background-color: cyan;
         }
         .marq{
            position: fixed;
            top: 5px;
         }

         .star-label {
            font-size: 24px;
            cursor: pointer;
            color: gray;
        }

        .star-label:hover, .star-label:focus {
            color: gold;
        }

        input[type="checkbox"]:checked + .star-label {
            color: gold;
        }
        form{  
  display: block;  
  left: 30%;  
  position: absolute;  
  top: 30%;  
}  
        input[type=search]{  
    border: 5px  black;  
    box-sizing: content-box;  
    font-size:1em;  
    height: 2em;  
    margin-left: 10vw;  
    padding: .5em;  
    transition: all 2s ease-in;  
    width: 30vw;  
    z-index:1;  
    &:focus {  
      border: solid 3px #09f;        
      outline: solid #fc0 2000px;  
    }  
  } 

</style>
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item m-4">
          <a class="nav-link btn btn-success" href="./index.php">Home</a>
        </li>
        <li class="nav-item m-4">
          <a class="nav-link btn btn-danger" href="./about.php">About</a>
        </li>
        <li class="nav-item m-4">
          <a class="nav-link btn btn-warning" href="./views/home.php">Product</a>
        </li>
        <li class="nav-item m-4">
          <a class="nav-link btn btn-primary" href="./views/auth/login.php">login</a>
        </li>
        <li class="nav-item m-4">
          <a class="nav-link btn btn-primary" href="./order.php">order</a>
        </li>
        <li class="nav-item m-4">
        <form>   
<input type="search" placeholder="Search here"/>  
</form> 
        </li>
      
      </ul>

    </div>
  </div>
</nav>

    <div class="container marg">
    <marquee scrollamount="15">
  <h3>Best selling online platform</h3>
</marquee>
        
        
        <div class="row">
            <!-- Filter Section -->
            <div class="col-md-2 filter-section" style="z-index: 999">
                <h5>Filter by Ratings:</h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="5" id="rating-5">
                    <label class="form-check-label star-label" for="rating-5">
                        ★★★★★
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="4" id="rating-4" >
                    <label class="form-check-label star-label" for="rating-4">
                        ★★★★
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="3" id="rating-3">
                    <label class="form-check-label star-label" for="rating-3">
                        ★★★
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="2" id="rating-2">
                    <label class="form-check-label star-label" for="rating-2">
                        ★★
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="rating-1">
                    <label class="form-check-label star-label" for="rating-1">
                        ★
                    </label>
                </div>
                <h5 class="mt-4">Filter by Company:</h5>
                <?php
                        // Query the types table to get the list of types
                        $query = "SELECT id, username FROM users";
                                        
                           $result = mysqli_query($conn, $query);
                           while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="form-check">
                            <input class="form-check-input" type="checkbox" value="' . $row['username'] . '" id="type-phone">
                            <label class="form-check-label" for="type-phone">
                            ' . $row['username'] . '
                            </label>
                        </div>
                            ';
                         }

                           ?>            
                    
            </div>
            
            
            <!-- Product List -->
            <div class="col-md-8 ">

                <!-- Search Bar -->
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search" placeholder="Search all items">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div style="height: 500px;">
                    <div class="row">
                        <?php
                        if(isset($_GET['start_price']) && isset($_GET['end_price'])){
                            
                            $startprice = $_GET['start_price'];
                            $endprice = $_GET['end_price'];

                            $query = "SELECT products.*, product_category.name as type_name FROM products 
                                INNER JOIN product_category ON products.type = product_category.id where price BETWEEN $startprice and $endprice";
                        }else if(isset($_GET['selected_option'])){
                            
                                $selected = $_GET['selected_option'];
                            $query = "SELECT products.*, product_category.name as type_name FROM products 
                                INNER JOIN product_category ON products.type = product_category.id where type = $selected";
                        }else{
                            
                             // Fetch all products from the database with product type name
                        $query = "SELECT products.*, product_category.name as type_name FROM products 
                                INNER JOIN product_category ON products.type = product_category.id";
                        }
                       
                        
                        $result = mysqli_query($conn, $query);

                        if(mysqli_num_rows($result)> 0){

                        // Loop through the result set and output the HTML markup for each product
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Extract product data from the row
                            $product_name = $row['name'];
                            $product_type = $row['type_name'];
                            $product_price = $row['price'];
                            $product_rating = $row['rating'];
                            $product_image = $row['image'];

                            // Convert the image data to base64 format
                            // $imageBase64 = base64_encode($product_image);

                            if (!empty($product_image)) {
                                // Convert image data to base64
                                $imageBase64 = base64_encode($product_image);
                            } else {
                                // Create a new 200x200 grey image and encode it to base64
                                $defaultImage = imagecreatetruecolor(200, 200);
                                $grey = imagecolorallocate($defaultImage, 128, 128, 128);
                                imagefill($defaultImage, 0, 0, $grey);
                                ob_start();
                                imagepng($defaultImage);
                                $imageBase64 = "data:image/png;base64," . base64_encode(ob_get_clean());
                            }
                            
                            // Output the HTML markup for the product
                            echo '
                            <div class="col-lg-3 col-md-4 product-container" id="products">
                                <div class="card" >
                                    <img class="card-img-top product-image" src="data:image/jpeg;base64,' . $imageBase64 . '" alt="' . $product_name . '">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $product_name . '</h5>
                                        <p class="card-text">' . $product_type . '</p>
                                        <p class="card-text">Price: $ ' . $product_price . '</p>
                                        <div>';
                                            // Output stars based on product rating
                                            for ($i = 1; $i <= $product_rating; $i++) {
                                                echo '<i class="fas fa-star"></i>';
                                            }
                                            for ($i = $product_rating+1; $i <= 5; $i++) {
                                                echo '<i class="far fa-star"></i>';
                                            }
                                    echo '</div>
                                    </div>
                                </div>
                            </div>
                            ';
                        }

                    }else{
                        echo "No records found";
                    }
                        ?>
                    </div>
                </div>
                </div>
        </div>

        <div class="col-md-2 filter-section">
                          
                    <h5 class="mt-4">Filter by Amount:</h5>
                    <form action="" method="GET">
                        <div>
                                <div class="form-group">
                                    <label for="min-amount">Min:</label>
                                    <input type="number" name="start_price" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price']; }else{echo "0";}?>" class="form-control" id="min-amount" placeholder="Enter min amount">
                                </div>
                                <div class="form-group">
                                    <label for="max-amount">Max:</label>
                                    <input type="number" name="end_price" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price']; }else{echo "10080";}?>" class="form-control" id="max-amount" placeholder="Enter max amount">
                                </div>
                                <button type="submit" class="btn btn-primary" id="amount-filter">Apply Filter</button>
                        </div>
                    </form>
                    <h5 class="mt-4">Filter by Type:</h5>
                    <form action="" method="GET">
                    <?php
                                        // Query the types table to get the list of types
                        $query = "SELECT id, name FROM product_category";
                                        
                           $result = mysqli_query($conn, $query);
                           while ($row = mysqli_fetch_assoc($result)) {
                            $checked = "";
                            if (isset($_GET['selected_option']) && $_GET['selected_option'] == $row['id']) {
                              $checked = "checked";
                            }
                            echo '<div class="form-check">
                                    <input class="form-check-input type-filter" type="radio" value="' . $row['id'] . '" id="' . $row['id'] . '" name="selected_option" ' . $checked . '>
                                    <label class="form-check-label" for="' . $row['id'] . '">
                                      ' . $row['name'] . '
                                    </label>
                                  </div>';
                          }
                        ?>
                                             
                        <button type="submit" class="btn btn-primary" id="type-filter">Apply Filter</button>
                        </form>
            </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        console.log("ready");

        $('#search').keyup(function(){
            search_product($(this).val());
        });

        $('#type-filter').click(function() {
            sort_products_by_price_asc();
        });

        $('.type-filter').click(function() {
        var typeFilters = [];

        // Get all checked checkboxes
        $('input[type=checkbox]:checked').each(function() {
            typeFilters.push($(this).val());
        });

            console.log(typeFilters);
        });

        function search_product(value){
            $('.product-container').each(function(){
                var found = 'false';

                $(this).find('.card-title').each(function(){
                    if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0)
                    {
                        found = 'true'
                    }
                });
                if(found == 'true'){
                    $(this).show();
                }else{
                    $(this).hide();
                    
                }
            })
        }

        function sort_products_by_price_asc() {
                // Sort the products array by price in ascending order
                var product_containers = $('.product-container');
                 product_containers.sort(function(a, b){
                var price_a = parseFloat($(a).find('.card-price').text().replace('Ksh ', ''));
                var price_b = parseFloat($(b).find('.card-price').text().replace('Ksh ', ''));
                return price_a - price_b;
            });

                // Generate the HTML markup for the sorted products
                var sortedHTML = '';
                for (var i = 0; i < products.length; i++) {
                    sortedHTML += '<div class="product">';
                    sortedHTML += '<h3>' + products[i].name + '</h3>';
                    sortedHTML += '<p>Price: ' + products[i].price + '</p>';
                    sortedHTML += '</div>';
                }

                // Replace the existing HTML with the sorted HTML
                $('#product-container').html(sortedHTML);
            }



    });
</script>

<!-- Bootstrap and Font Awesome Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>