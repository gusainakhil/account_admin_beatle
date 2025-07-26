<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="main-container">
        <div class="page-header">
            <div class="page-title-section">
                <h2>Settings</h2>
                <p>Configure dashboard preferences and system settings</p>
            </div>
        </div>
        <div class="settings-grid">
            <div class="settings-card">
                <div class="card-header">
                    <h3><i class="fas fa-bell"></i> Notification Settings</h3>
                </div>
                <div class="card-content">
                    <div class="setting-item">
                        <label class="setting-label">
                            <input type="checkbox" id="emailNotifications" checked>
                            <span class="setting-title">Email Notifications</span>
                            <span class="setting-desc">Receive email alerts for expiring subscriptions</span>
                        </label>
                    </div>
                    <div class="setting-item">
                        <label class="setting-label">
                            <input type="checkbox" id="browserNotifications" checked>
                            <span class="setting-title">Browser Notifications</span>
                            <span class="setting-desc">Show browser popup notifications</span>
                        </label>
                    </div>
                    <div class="setting-item">
                        <label class="setting-label">
                            <span class="setting-title">Alert Days Before Expiry</span>
                            <select id="alertDays">
                                <option value="7">7 days</option>
                                <option value="15">15 days</option>
                                <option value="30" selected>30 days</option>
                                <option value="60">60 days</option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>
            <div class="settings-card">
                <div class="card-header">
                    <h3><i class="fas fa-palette"></i> Display Settings</h3>
                </div>
                <div class="card-content">
                    <div class="setting-item">
                        <label class="setting-label">
                            <span class="setting-title">Theme</span>
                            <select id="themeSelect">
                                <option value="light" selected>Light</option>
                                <option value="dark">Dark</option>
                                <option value="auto">Auto</option>
                            </select>
                        </label>
                    </div>
                    <div class="setting-item">
                        <label class="setting-label">
                            <span class="setting-title">Items per page</span>
                            <select id="itemsPerPage">
                                <option value="10">10</option>
                                <option value="25" selected>25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>
            <div class="settings-card">
                <div class="card-header">
                    <h3><i class="fas fa-database"></i> Data Management</h3>
                </div>
                <div class="card-content">
                    <div class="setting-item">
                        <button class="btn btn-primary" onclick="exportAllData()">
                            <i class="fas fa-download"></i> Export All Data
                        </button>
                        <p class="setting-desc">Download complete dashboard data as JSON</p>
                    </div>
                    <div class="setting-item">
                        <button class="btn btn-warning" onclick="resetDashboard()">
                            <i class="fas fa-undo"></i> Reset to Default
                        </button>
                        <p class="setting-desc">Reset all data to factory defaults</p>
                    </div>
                    <div class="setting-item">
                        <button class="btn btn-danger" onclick="clearAllData()">
                            <i class="fas fa-trash"></i> Clear All Data
                        </button>
                        <p class="setting-desc">Permanently delete all stored data</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
