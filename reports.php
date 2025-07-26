<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports & Analytics</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="main-container">
        <div class="page-header">
            <div class="page-title-section">
                <h2>Reports & Analytics</h2>
                <p>Comprehensive insights and analytics dashboard</p>
            </div>
            <div class="page-actions">
                <button class="btn btn-primary" onclick="generateReport()">
                    <i class="fas fa-file-alt"></i> Generate Report
                </button>
            </div>
        </div>
        <div class="analytics-grid">
            <div class="analytics-card">
                <div class="card-header">
                    <h3>Software Performance</h3>
                </div>
                <div class="card-content">
                    <div class="performance-metrics" id="performanceMetrics">
                        <!-- Performance data will be populated by JavaScript -->
                    </div>
                </div>
            </div>
            <div class="analytics-card">
                <div class="card-header">
                    <h3>Zone Distribution</h3>
                </div>
                <div class="card-content">
                    <div class="zone-chart" id="zoneChart">
                        <!-- Zone chart will be rendered here -->
                    </div>
                </div>
            </div>
            <div class="analytics-card full-width">
                <div class="card-header">
                    <h3>Monthly Expiry Trends</h3>
                </div>
                <div class="card-content">
                    <div class="trend-chart" id="trendChart">
                        <!-- Trend chart will be rendered here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
