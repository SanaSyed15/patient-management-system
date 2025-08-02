<?php
session_start();
include("db_connection.php");

if (!isset($_SESSION['login_id'])) {
    header("location:index.php");
    exit;
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $disease = $_POST['disease'];

    $insert = mysqli_query($conn, "INSERT INTO patients (name, age, gender, disease) VALUES ('$name', '$age', '$gender', '$disease')");
    $msg = $insert ? "✅ Patient Added Successfully!" : "❌ Error Adding Patient!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Patient - Patient Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-card {
            max-width: 600px;
            margin: 80px auto;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

<div class="container form-card">
    <h3 class="form-title">🧾 Add New Patient</h3>

    <?php if (isset($msg)): ?>
        <div class="alert alert-info text-center"><?= $msg ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label>Patient Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter patient name" required>
        </div>

        <div class="form-group">
            <label>Age</label>
            <input type="number" name="age" class="form-control" placeholder="Enter age" required>
        </div>

        <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="form-control" required>
                <option value="">Select gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label>Disease</label>
            <textarea name="disease" class="form-control" placeholder="Describe illness or symptoms" required></textarea>
        </div>

        <button name="add" class="btn btn-primary btn-block">➕ Add Patient</button>
        <a href="dashboard.php" class="btn btn-secondary btn-block mt-2">⬅️ Back to Dashboard</a>
    </form>
</div>

</body>
</html>
