<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

require_once '../includes/config.php';

// Placeholder for Settings management logic

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Settings - Inventory Control</title>
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <h2>Settings</h2>
    <a href="dashboard.php">Dashboard</a> | <a href="logout.php">Logout</a>

    <p>This page will allow changing language, system title, and system logo.</p>

    <!-- TODO: Implement Settings form -->

</body>
</html>
