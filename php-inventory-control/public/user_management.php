<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

require_once '../includes/config.php';

// Placeholder for User Management logic

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>User Management - Inventory Control</title>
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <h2>User Management</h2>
    <a href="dashboard.php">Dashboard</a> | <a href="logout.php">Logout</a>

    <p>This page will allow creating users, assigning roles, and controlling menu access.</p>

    <!-- TODO: Implement CRUD for Users and Access Control -->

</body>
</html>
