<?php
session_start();
include("db_connection.php");

if (!isset($_SESSION['login_id'])) {
    header('location:index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Patient Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container {
            max-width: 700px;
            margin: 80px auto;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .dashboard-title {
            text-align: center;
            margin-bottom: 30px;
        }
        .dashboard-btn {
            font-size: 1.1rem;
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="container dashboard-container">
        <h2 class="dashboard-title">🩺 Welcome to the Medical Dashboard</h2>

        <div class="row">
            <div class="col-md-12 mb-3">
                <a href="add_patient.php" class="btn btn-outline-success btn-block dashboard-btn">
                    ➕ Add New Patient
                </a>
            </div>
            <div class="col-md-12 mb-3">
                <a href="view_patients.php" class="btn btn-outline-info btn-block dashboard-btn">
                    📋 View Patient Records
                </a>
            </div>
            <div class="col-md-12">
                <a href="logout.php" class="btn btn-outline-danger btn-block dashboard-btn">
                    🔒 Logout
                </a>
            </div>
        </div>
    </div>
</body>
</html>
