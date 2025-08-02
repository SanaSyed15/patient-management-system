<?php
session_start();
include 'db_connection.php';

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $check = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");
    if (mysqli_num_rows($check) == 0) {
        $insert = mysqli_query($conn, "INSERT INTO login (username, pass) VALUES ('$username', '$pass')");
        $msg = $insert ? "Signup successful. <a href='index.php'>Login Now</a>" : "Signup failed.";
    } else {
        $msg = "Username already exists.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup - Patient Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #f8f9fa;
        }
        .signup-card {
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

<div class="signup-card">
    <h3 class="text-center mb-4">📝 Signup</h3>

    <form method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Choose a username" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="pass" class="form-control" placeholder="Create a password" required>
        </div>
        <button name="signup" class="btn btn-success btn-block">Signup</button>
    </form>

    <p class="text-center mt-3">Already have an account? <a href="index.php">Login</a></p>

    <?php if (isset($msg)): ?>
        <div class="alert alert-info text-center mt-3">
            <?= $msg ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
