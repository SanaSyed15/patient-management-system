<?php
session_start();
include 'db_connection.php';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM login WHERE username='$username' AND pass='$pass'";
    $result = mysqli_query(mysql:$conn ,query: $query);
    $ret=mysqli_fetch_array(result:$result);
    if ($ret > 0) {
        $_SESSION['login_id'] = $ret['id'];
        header(header:"Location: dashboard.php");
    } else {
        $msg="Invalid details.Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    </head>
 <!DOCTYPE html>
<html>
<head>
    <title>Login - Patient Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #f8f9fa;
        }
        .login-card {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h3 class="text-center mb-4">🔐 Login</h3>

    <form method="post">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter username" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="pass" class="form-control" placeholder="Enter password" required>
        </div>
        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
    </form>

    <p class="text-center mt-3">Don't have an account? <a href="signup.php">Signup</a></p>

    <?php if (isset($msg)): ?>
        <div class="alert alert-danger text-center mt-3">
            <?= $msg ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>


</html>