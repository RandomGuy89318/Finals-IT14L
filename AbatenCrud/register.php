<?php
    require '_functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>

    <!-- Toastr CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <title>User Registration</title>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        padding-top: 20px;
        align-items: top;
        height: 100vh;
    }
    #label {
        margin-bottom: 10px;
    }
    #card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
    }
    h2 {
        padding: 20dp;
    }
    #registrationForm {
        max-width: 500px;
        margin: 0 auto;
    }
    #button {
        padding-left: 20px;
        padding-right: 20px;
    }
    #register {
        margin-right: 250px;
    }
</style>
<body class="" >
    <div class="container">
        <div class="col-lg-12">
            <div id="card" class="card">
                <div class="row mt-5">
                    <h2>User Registration</h2>
                    <form id="registrationForm" method="POST" action="_user_register.php">
                        <div id="label" class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div id="label" class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="userpassword" name="userpassword" required>
                        </div>
                        <div id="button" class="mb-3">
                            <button type="submit" id="register" name="register" class="btn btn-primary">Register</button>
                            <buttom type="submit" id="login" name="login" class="btn btn-secondary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>