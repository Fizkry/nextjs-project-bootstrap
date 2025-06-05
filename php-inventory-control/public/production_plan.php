<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

require_once '../includes/config.php';

// Placeholder for Production Plan management logic

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Production Plan - Inventory Control</title>
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <h2>Production Plan Management</h2>
    <a href="dashboard.php">Dashboard</a> | <a href="logout.php">Logout</a>

    <p>This page will allow managing hierarchical production plans.</p>

    <!-- TODO: Implement CRUD for Production Plans -->

</body>
</html>
