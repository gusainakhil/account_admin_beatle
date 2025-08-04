<?php
session_start();
require_once 'auth.php';
requireLogin(); // Ensure user is logged in to access any page with navbar
require_once 'db.php';
// Fetch dashboard stats
$softwareCount = 0;
$reportsCount = 0;
$expiringCount = 0;
$stationsCount = 0;

// Software count
$sql = "SELECT COUNT(*) as cnt FROM software";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    $softwareCount = $row['cnt'];
}

// Reports count (assuming 'reports' table)
$sql = "SELECT COUNT(*) as cnt FROM reports";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    $reportsCount = $row['cnt'];
}

// Expiring soon (subscriptions expiring in next 30 days)
$sql = "SELECT COUNT(*) as cnt FROM subscriptions WHERE expiry_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    $expiringCount = $row['cnt'];
}

// Stations count
$sql = "SELECT COUNT(*) as cnt FROM stations";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    $stationsCount = $row['cnt'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beatle Analytics - Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <!-- Dashboard Content (copy from index.php dashboard section) -->
    <header class="header">
        <div class="header-content">
            <div class="page-title">
                <h1 id="pageTitle">Dashboard Overview</h1>
                <p id="pageSubtitle">Monitor all software products and subscriptions</p>
            </div>
            <div class="header-stats">
                <div class="stat-card primary">
                    <div class="stat-icon">
                        <i class="fas fa-server"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number" id="totalSoftware"><?php echo $softwareCount; ?></span>
                        <span class="stat-label">Software Products</span>
                    </div>
                </div>
                <div class="stat-card success">
                    <div class="stat-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number" id="totalReports"><?php echo $reportsCount; ?></span>
                        <span class="stat-label">Active Reports</span>
                    </div>
                </div>
                <div class="stat-card warning">
                    <div class="stat-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number" id="expiringReports"><?php echo $expiringCount; ?></span>
                        <span class="stat-label">Expiring Soon</span>
                    </div>
                </div>
                <div class="stat-card info">
                    <div class="stat-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number" id="totalStations"><?php echo $stationsCount; ?></span>
                        <span class="stat-label">Total Stations</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main dashboard content here (copy from index.php) -->
    <div class="main-container">
        <!-- Dashboard Page -->
        <div id="dashboardPage" class="page active">
            <div class="dashboard-grid">
                <!-- Quick Actions -->
                <!-- ...copy relevant dashboard content from index.php... -->
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
