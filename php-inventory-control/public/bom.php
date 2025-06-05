<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

require_once '../includes/config.php';

// Placeholder for Bill of Material management logic

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Bill of Material - Inventory Control</title>
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <h2>Bill of Material Management</h2>
    <a href="dashboard.php">Dashboard</a> | <a href="logout.php">Logout</a>

    <p>This page will allow managing finished goods and their components (materials and semi-finished goods).</p>

    <!-- TODO: Implement CRUD for Bill of Materials -->

</body>
</html>
