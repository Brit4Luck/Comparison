<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" >
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

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
                    <h3 class="text-center">Register</h3>
                </div>
                <div class="card-body">
                    <form action="../../includes/actions.php" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
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
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="far fa-eye-slash" id="toggleConfirmPassword"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
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
                toggleIcon.removeClass('fa-eye-slash');
                toggleIcon.addClass('fa-eye');
            } else {
                passwordInput.attr('type', 'password');
                toggleIcon.removeClass('fa-eye');
                toggleIcon.addClass('fa-eye-slash');
            }
        });

        // Show/hide confirm password on click of toggle icon
        $('#toggleConfirmPassword').click(function() {
            var confirmPasswordInput = $('#confirm_password');
            var toggleIcon = $(this);

            if (confirmPasswordInput.attr('type') === 'password') {
                confirmPasswordInput.attr('type', 'text');
                toggleIcon.removeClass('fa-eye-slash');
                toggleIcon.addClass('fa-eye');
            } else {
                confirmPasswordInput.attr('type', 'password');
                toggleIcon.removeClass('fa-eye');
                toggleIcon.addClass('fa-eye-slash');
            }
        });
    });
</script>

</body>
</html>