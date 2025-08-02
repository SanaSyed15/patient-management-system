<?php
session_start();
include("db_connection.php");

if (!isset($_SESSION['login_id'])) {
    header("location:index.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM patients ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Patients - Patient Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
        }
        .table-container {
            max-width: 900px;
            margin: 60px auto;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }
        .table-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .table-responsive {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>

<body>

<div class="container table-container">
    <h3 class="table-title">🧑‍⚕️ Patient Records</h3>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Disease</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$count}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['disease']}</td>
                    </tr>";
                    $count++;
                }

                if ($count === 1) {
                    echo "<tr><td colspan='5' class='text-center'>No patients found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <a href="dashboard.php" class="btn btn-secondary btn-block mt-3">⬅️ Back to Dashboard</a>
</div>

</body>
</html>
