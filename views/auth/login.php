<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" >
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                <?php
                    if (isset($_GET['error'])) {
                        echo '<p class="text-danger">' . $_GET['error'] . '</p>';
                    }
                    ?>
                    <h3 class="text-center">Login</h3>
                </div>
                <div class="card-body">
                    <form action="../../includes/actions.php" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="far fa-eye-slash" id="togglePassword"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                // Show/hide password on click of toggle icon
                $('#togglePassword').click(function() {
                    var passwordInput = $('#password');
                    var toggleIcon = $(this);
        
                    if (passwordInput.attr('type') === 'password') {
                        passwordInput.attr('type', 'text');
                        toggleIcon.removeClass('fa-eye').addClass('fa-eye-slash');
                    } else {
                        passwordInput.attr('type', 'password');
                        toggleIcon.removeClass('fa-eye-slash').addClass('fa-eye');
                    }
                });
            });
        </script>
    </body>
    </html>