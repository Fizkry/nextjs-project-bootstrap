<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

require_once '../includes/config.php';

// Fetch stock data for materials, semi-finished goods, and finished goods
$materials = $pdo->query('SELECT * FROM materials')->fetchAll(PDO::FETCH_ASSOC);
$semi_finished = $pdo->query('SELECT * FROM semi_finished_goods')->fetchAll(PDO::FETCH_ASSOC);
$finished = $pdo->query('SELECT * FROM finished_goods')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard - Inventory Control</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <h2>Dashboard</h2>
    <a href="logout.php">Logout</a>

    <h3>Stock Table</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Type</th>
                <th>Name</th>
                <th>Actual Stock</th>
                <th>Minimum Stock</th>
                <th>Maximum Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($materials as $item): ?>
            <tr>
                <td>Material</td>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td><?php echo $item['stock_actual']; ?></td>
                <td><?php echo $item['stock_min']; ?></td>
                <td><?php echo $item['stock_max']; ?></td>
            </tr>
            <?php endforeach; ?>
            <?php foreach ($semi_finished as $item): ?>
            <tr>
                <td>Semi-Finished Good</td>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td><?php echo $item['stock_actual']; ?></td>
                <td><?php echo $item['stock_min']; ?></td>
                <td><?php echo $item['stock_max']; ?></td>
            </tr>
            <?php endforeach; ?>
            <?php foreach ($finished as $item): ?>
            <tr>
                <td>Finished Good</td>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td><?php echo $item['stock_actual']; ?></td>
                <td><?php echo $item['stock_min']; ?></td>
                <td><?php echo $item['stock_max']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Stock Charts</h3>
    <canvas id="stockChart" width="800" height="400"></canvas>

    <script>
        const ctx = document.getElementById('stockChart').getContext('2d');
        const stockChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    $labels = [];
                    foreach (array_merge($materials, $semi_finished, $finished) as $item) {
                        $labels[] = addslashes($item['name']);
                    }
                    echo "'" . implode("','", $labels) . "'";
                    ?>
                ],
                datasets: [
                    {
                        label: 'Actual Stock',
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        data: [
                            <?php
                            $data = [];
                            foreach (array_merge($materials, $semi_finished, $finished) as $item) {
                                $data[] = (int)$item['stock_actual'];
                            }
                            echo implode(',', $data);
                            ?>
                        ]
                    },
                    {
                        label: 'Minimum Stock',
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        data: [
                            <?php
                            $data = [];
                            foreach (array_merge($materials, $semi_finished, $finished) as $item) {
                                $data[] = (int)$item['stock_min'];
                            }
                            echo implode(',', $data);
                            ?>
                        ]
                    },
                    {
                        label: 'Maximum Stock',
                        backgroundColor: 'rgba(75, 192, 192, 0.7)',
                        data: [
                            <?php
                            $data = [];
                            foreach (array_merge($materials, $semi_finished, $finished) as $item) {
                                $data[] = (int)$item['stock_max'];
                            }
                            echo implode(',', $data);
                            ?>
                        ]
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
