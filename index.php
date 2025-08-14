<?php
require_once 'db.php';

require_once 'auth.php';
// Ensure user is logged in to access any page with navbar
requireLogin();

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
// Count total reports (comma-separated in stations.reports)
$sql = "SELECT reports FROM stations WHERE reports IS NOT NULL AND TRIM(reports) != ''";
$result = $conn->query($sql);
$reportsCount = 0;
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $reports = array_filter(array_map('trim', explode(',', $row['reports'])));
        $reportsCount += count($reports);
    }
}

// Expiring soon (subscriptions expiring in next 30 days)
$sql = "SELECT 
    COUNT(*) AS total_expiring_soon
FROM 
    stations st
WHERE 
    DATEDIFF(st.expiry_date, CURDATE()) BETWEEN 0 AND 30;
";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    $expiringCount = $row['total_expiring_soon'];
}

// Stations count
$sql = "SELECT COUNT(*) as cnt FROM stations";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    $stationsCount = $row['cnt'];
}
//website expiring count within 30 days
$sql = "SELECT COUNT(*) as cnt FROM website_reports WHERE DATEDIFF(end_date, CURDATE()) BETWEEN 0 AND 120";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    $websiteExpiringCount = $row['cnt'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beatle Analytics - Management Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navigation Bar -->
<?php include 'navbar.php'; ?>

    <!-- Header Stats -->
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
                <div class="stat-card info">
                    <div class="stat-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number" id="totalStations"><?php echo $stationsCount; ?></span>
                        <span class="stat-label">Total Stations</span>
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
                <div class="stat-card warning" style="cursor:pointer;" onclick="window.location.href='website-reports.php'">
                    <div class="stat-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="stat-content"></div>
                        <span class="stat-number" id="expiringReports"><?php echo $websiteExpiringCount; ?></span>
                        <span class="stat-label">Website Expiring</span>
                    </div>
                </div>
                </div>
                    
                
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <div class="main-container">
        <!-- Dashboard Page -->
        <div id="dashboardPage" class="page active">
            <div class="dashboard-grid">
                <!-- Quick Actions -->
                <!-- <div class="dashboard-card">
                    <div class="card-header">
                        <h3><i class="fas fa-bolt"></i> Quick Actions</h3>
                    </div>
                    <div class="card-content">
                        <div class="quick-actions">
                            <a href="software.php" class="action-btn primary">
                                <i class="fas fa-plus"></i>
                                Add New Software
                            </a>
                            <a href="subscriptions.php" class="action-btn success">
                                <i class="fas fa-map-marker-alt"></i>
                                Add Station
                            </a>
                            <button onclick="exportAllData()">
                                <i class="fas fa-download"></i>
                                Export Data
                            </button>
                            <button class="action-btn info" onclick="showPage('reports')">
                                <i class="fas fa-chart-bar"></i>
                                View Analytics
                            </button>
                        </div>
                    </div>
                </div> -->

              
                <!-- <div class="dashboard-card">
                    <div class="card-header">
                        <h3><i class="fas fa-clock"></i> Recent Activity</h3>
                    </div>
                    <div class="card-content">
                        <div class="activity-list" id="activityList">
                           
                        </div>
                    </div>
                </div> -->

               
                <div class="dashboard-card full-width">
                    <div class="card-header">
                        <h3><i class="fas fa-exclamation-triangle"></i> Expiring Subscriptions</h3>
                        <!--<button class="btn-small" onclick="checkAllExpiry()">Refresh</button>-->
                    </div>
                    <div class="card-content">
                        <div class="expiry-table-container">
                            <table class="expiry-table" id="expiryTable">
                                <thead>
                                    <tr>
                                        <th>Software</th>
                                        <th>Zone</th>
                                        <th>Division</th>
                                        <th>Station</th>
                                        <th>Expiry Date</th>
                                        <th>Days Left</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT 
    st.*, 
    z.name AS zone, 
    d.name AS division,
    soft.short_name ,
    DATEDIFF(st.expiry_date, CURDATE()) AS days_left
FROM 
    stations st
LEFT JOIN 
    zones z ON st.zone_id = z.id
LEFT JOIN 
    divisions d ON st.division_id = d.id
LEFT JOIN 
	software soft ON st.software_id =soft.id
WHERE 
    DATEDIFF(st.expiry_date, CURDATE()) BETWEEN 0 AND 120
ORDER BY 
    st.expiry_date ASC;";
                                    $result = $conn->query($sql);
                                    if ($result) {
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $expiry = $row['expiry_date'];
                                                $daysLeft = (int)$row['days_left'];
                                                $status = ($daysLeft < 0) ? 'Expired' : (($daysLeft <= 30) ? 'Expiring Soon' : 'Valid');

                                                // Set status class and color for styling
                                                if ($status === 'Expired') {
                                                    $statusClass = 'status-expired';
                                                    $statusColor = '#e74c3c'; // red
                                                } elseif ($status === 'Expiring Soon') {
                                                    $statusClass = 'status-warning';
                                                    $statusColor = '#f39c12'; // orange
                                                } else {
                                                    $statusClass = 'status-valid';
                                                    $statusColor = '#27ae60'; // green
                                                }

                                                // Color for days left
                                                if ($daysLeft < 0) {
                                                    $daysColor = '#e74c3c'; // red
                                                } elseif ($daysLeft <= 7) {
                                                    $daysColor = '#f39c12'; // orange
                                                } elseif ($daysLeft <= 15) {
                                                    $daysColor = '#f1c40f'; // yellow
                                                } else {
                                                    $daysColor = '#27ae60'; // green
                                                }

                                                echo '<tr>';
                                                echo '<td><span class="badge badge-software"><strong>' . htmlspecialchars($row['short_name']) . '</strong></span></td>';
                                                echo '<td><span class="badge badge-zone">' . htmlspecialchars($row['zone']) . '</span></td>';
                                                echo '<td><span class="badge badge-division">' . htmlspecialchars($row['division']) . '</span></td>';
                                                echo '<td><strong>' . htmlspecialchars($row['name']) . '</strong></td>';
                                                echo '<td><span class="badge badge-date">' . htmlspecialchars($expiry) . '</span></td>';
                                                echo '<td><span class="badge badge-days" style="color:' . $daysColor . ';font-weight:bold;">' . $daysLeft . ' day' . ($daysLeft == 1 ? '' : 's') . '</span></td>';
                                                echo '<td><span class="status-label ' . $statusClass . '" style="color:' . $statusColor . ';">' . $status . '</span></td>';
                                                echo '<td>';
        echo '<a href="edit_subscription.php?id=' . urlencode($row['id']) . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a> ';
                                                echo '<button class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash"></i></button>';
                                                echo '</td>';
                                                echo '</tr>';
                                            }
                                            } else {
                                                echo '<tr><td colspan="8">No stations expiring within the next 30 days.</td></tr>';
                                            }
                                    } else {
                                        echo '<tr><td colspan="8" style="color:red;">Query error: ' . htmlspecialchars($conn->error) . '</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Software Management Page -->
        <div id="softwarePage" class="page">
            <div class="page-header">
                <div class="page-title-section">
                    <h2>Software Management</h2>
                    <p>Manage all software products and their hierarchical structure</p>
                </div>
                <div class="page-actions">
                    <div class="search-container">
                        <input type="text" id="searchInput" placeholder="Search software, zones, divisions...">
                        <i class="fas fa-search"></i>
                    </div>
                    <button class="btn btn-primary" onclick="showAddSoftwareModal()">
                        <i class="fas fa-plus"></i> Add Software
                    </button>
                </div>
            </div>

            <div class="software-grid" id="softwareGrid">
                <!-- Software cards will be populated by JavaScript -->
            </div>
        </div>

        <!-- Subscriptions Page -->
        <div id="subscriptionsPage" class="page">
            <div class="page-header">
                <div class="page-title-section">
                    <h2>Subscription Management</h2>
                    <p>Monitor and manage all subscription expiry dates</p>
                </div>
                <div class="page-actions">
                    <button class="btn btn-primary" onclick="showBulkUpdateModal()">
                        <i class="fas fa-edit"></i> Bulk Update
                    </button>
                    <button class="btn btn-success" onclick="exportSubscriptions()">
                        <i class="fas fa-download"></i> Export
                    </button>
                </div>
            </div>

            <div class="subscription-filters">
                <div class="filter-group">
                    <label>Filter by Software:</label>
                    <select id="softwareFilter" onchange="filterSubscriptions()">
                        <option value="">All Software</option>
                        <?php
                        $sql = "SELECT id, name FROM software ORDER BY name";
                        $result = $conn->query($sql);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Filter by Status:</label>
                    <select id="statusFilter" onchange="filterSubscriptions()">
                        <option value="">All Status</option>
                        <option value="valid">Valid</option>
                        <option value="warning">Expiring Soon</option>
                        <option value="expired">Expired</option>
                    </select>
                </div>
            </div>

            <div class="subscriptions-table-container">
                <table class="data-table" id="subscriptionsTable">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>Software</th>
                            <th>Zone</th>
                            <th>Division</th>
                            <th>Station</th>
                            <th>Reports Count</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="subscriptionsTableBody">
                        <?php
                        $sql = "SELECT 
                            st.id,
                            st.name AS station_name,
                            st.code,
                            st.organisation,
                            st.division_id,
                            st.zone_id,
                            st.start_date,
                            st.expiry_date,
                            st.reports,
                            st.software_id,
                            sw.short_name AS short_name,
                            sw.name AS software_name,
                            z.name AS zone,
                            d.name AS division
                        FROM stations st
                        LEFT JOIN software sw ON st.software_id = sw.id
                        LEFT JOIN zones z ON st.zone_id = z.id
                        LEFT JOIN divisions d ON st.division_id = d.id
                        WHERE 1=1";
                        $result = $conn->query($sql);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Calculate status and days left
                                $expiry = $row['expiry_date'];
                                $today = date('Y-m-d');
                                $daysLeft = (strtotime($expiry) - strtotime($today)) / (60 * 60 * 24);
                                if ($daysLeft < 0) {
                                    $status = 'Expired';
                                } elseif ($daysLeft <= 30) {
                                    $status = 'Expiring Soon';
                                } else {
                                    $status = 'Valid';
                                }
                                echo '<tr>';
                                echo '<td><input type="checkbox" class="selectSubscription"></td>';
                                echo '<td>' . htmlspecialchars($row['software_name']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['zone']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['division']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['station_name']) . ' (' . htmlspecialchars($row['code']) . ')</td>';
                                echo '<td>' . (isset($row['reports']) ? count(array_filter(array_map('trim', explode(',', $row['reports'])))) : 0) . '</td>';
                                echo '<td>' . htmlspecialchars($row['expiry_date']) . '</td>';
                                echo '<td>' . $status . '</td>';
                                echo '<td>';
                                echo '<button class="btn btn-sm btn-primary">Edit</button> ';
                                echo '<button class="btn btn-sm btn-danger">Delete</button>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="9">No subscriptions found.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Reports & Analytics Page -->
        <div id="reportsPage" class="page">
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

        <!-- Settings Page -->
        <div id="settingsPage" class="page">
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
    </div>

    <!-- Modal for Adding/Editing Data -->
    <div id="dataModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Add New Item</h3>
                <span class="close" id="closeModal">&times;</span>
            </div>
            <div class="modal-body">
                <form id="dataForm">
                    <div class="form-group">
                        <label for="itemName">Name:</label>
                        <input type="text" id="itemName" required>
                    </div>
                    <div class="form-group" id="expiryGroup" style="display: none;">
                        <label for="expiryDate">Subscription Expiry Date:</label>
                        <input type="date" id="expiryDate">
                    </div>
                    <div class="form-group" id="parentGroup" style="display: none;">
                        <label for="parentSelect">Parent:</label>
                        <select id="parentSelect"></select>
                    </div>
                    <div class="form-actions">
                        <button type="button" id="cancelBtn" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Notification Toast -->
    <div id="toast" class="toast">
        <span id="toastMessage"></span>
        <span id="toastClose">&times;</span>
    </div>

    <!-- Expiry Alert Modal -->
    <div id="expiryAlert" class="modal">
        <div class="modal-content alert-modal">
            <div class="modal-header alert-header">
                <h3><i class="fas fa-exclamation-triangle"></i> Subscription Expiry Alert</h3>
                <span class="close" id="closeExpiryAlert">&times;</span>
            </div>
            <div class="modal-body">
                <p>The following subscriptions are expiring within 30 days:</p>
                <ul id="expiryList"></ul>
            </div>
        </div>
    </div>

    <!-- Add Software Modal -->


    <!-- Add Station Modal -->
    <div id="addStationModal" class="modal">
        <div class="modal-content large-modal">
            <div class="modal-header">
                <h3><i class="fas fa-map-marker-alt"></i> Add New Station</h3>
                <span class="close" onclick="closeModal('addStationModal')">&times;</span>
            </div>
            <div class="modal-body">
                <form id="addStationForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="stationSoftware">Software System</label>
                            <?php
                            echo '<select id="stationSoftware" required>';
                            echo '<option value="">Select Software</option>';
                            $sql = "SELECT id, name FROM software ORDER BY name";
                            $result = $conn->query($sql);
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</option>';
                                }
                            }
                            echo '</select>';
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="stationZone">Zone</label>
                            <select id="stationZone" required>
                                <option value="">Select Zone</option>
                                <!-- add all zones in indain railway -->
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="stationDivision">Division</label>
                            <select id="stationDivision" required>
                                <option value="">Select Division</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stationCode">Station Code</label>
                            <input type="text" id="stationCode" placeholder="e.g., NDLS" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="stationNameInput">Station Name</label>
                            <input type="text" id="stationNameInput" placeholder="e.g., New Delhi Railway Station"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="stationOrg">Organisation Name</label>
                            <input type="text" id="stationOrg" placeholder="e.g., Indian Railways" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="stationStart">Subscription Start</label>
                            <input type="date" id="stationStart" required>
                        </div>
                        <div class="form-group">
                            <label for="stationExpiry">Subscription Expiry</label>
                            <input type="date" id="stationExpiry" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stationReports">Reports (comma-separated)</label>
                        <textarea id="stationReports" rows="2"
                            placeholder="e.g., Passenger Count, Revenue Report, Safety Audit"></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary"
                            onclick="closeModal('addStationModal')">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Station</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bulk Update Modal -->
    <div id="bulkUpdateModal" class="modal">
        <div class="modal-content large-modal">
            <div class="modal-header">
                <h3><i class="fas fa-edit"></i> Bulk Update Subscriptions</h3>
                <span class="close" onclick="closeModal('bulkUpdateModal')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="bulk-update-tabs">
                    <button class="tab-btn active" onclick="switchBulkTab('select')">Select Stations</button>
                    <button class="tab-btn" onclick="switchBulkTab('update')">Update Details</button>
                    <button class="tab-btn" onclick="switchBulkTab('preview')">Preview Changes</button>
                </div>

                <div id="bulkSelectTab" class="bulk-tab active">
                    <div class="bulk-filters">
                        <div class="filter-row">
                            <div class="form-group">
                                <label>Filter by Software:</label>
                                <select id="softwareFilter" onchange="filterSubscriptions()">
                                    <option value="">All Software</option>
                                    <?php
                                    $sql = "SELECT id, name FROM software ORDER BY name";
                                    $result = $conn->query($sql);
                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Filter by Status:</label>
                                <select id="bulkStatusFilter">
                                    <option value="">All Status</option>
                                    <option value="expired">Expired</option>
                                    <option value="warning">Expiring Soon</option>
                                    <option value="valid">Valid</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="bulk-station-list" id="bulkStationList">
                        <!-- Station list will be populated here -->
                    </div>
                </div>

                <div id="bulkUpdateTab" class="bulk-tab">
                    <div class="form-group">
                        <label for="bulkExpiryDate">New Expiry Date</label>
                        <input type="date" id="bulkExpiryDate">
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" id="extendSubscription">
                            Extend existing subscription by
                        </label>
                        <div class="extend-options">
                            <input type="number" id="extendMonths" value="12" min="1" max="60">
                            <span>months</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bulkNotes">Update Notes</label>
                        <textarea id="bulkNotes" rows="3" placeholder="Reason for bulk update..."></textarea>
                    </div>
                </div>

                <div id="bulkPreviewTab" class="bulk-tab">
                    <div class="preview-summary" id="previewSummary">
                        <!-- Preview will be shown here -->
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-secondary"
                        onclick="closeModal('bulkUpdateModal')">Cancel</button>
                    <button type="button" class="btn btn-primary" id="bulkNextBtn"
                        onclick="nextBulkStep()">Next</button>
                    <button type="button" class="btn btn-success" id="bulkExecuteBtn" onclick="executeBulkUpdate()"
                        style="display: none;">Execute Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Generate Report Modal -->
    <div id="generateReportModal" class="modal">
        <div class="modal-content large-modal">
            <div class="modal-header">
                <h3><i class="fas fa-file-alt"></i> Generate Custom Report</h3>
                <span class="close" onclick="closeModal('generateReportModal')">&times;</span>
            </div>
            <div class="modal-body">
                <form id="generateReportForm">
                    <div class="report-type-selection">
                        <h4>Report Type</h4>
                        <div class="report-types">
                            <label class="report-type-card">
                                <input type="radio" name="reportType" value="subscription" checked>
                                <div class="card-content">
                                    <i class="fas fa-calendar-check"></i>
                                    <h5>Subscription Report</h5>
                                    <p>Detailed subscription status and expiry information</p>
                                </div>
                            </label>
                            <label class="report-type-card">
                                <input type="radio" name="reportType" value="analytics">
                                <div class="card-content">
                                    <i class="fas fa-chart-bar"></i>
                                    <h5>Analytics Report</h5>
                                    <p>Performance metrics and usage statistics</p>
                                </div>
                            </label>
                            <label class="report-type-card">
                                <input type="radio" name="reportType" value="maintenance">
                                <div class="card-content">
                                    <i class="fas fa-tools"></i>
                                    <h5>Maintenance Report</h5>
                                    <p>System health and maintenance schedules</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="reportDateFrom">Date From</label>
                            <input type="date" id="reportDateFrom" required>
                        </div>
                        <div class="form-group">
                            <label for="reportDateTo">Date To</label>
                            <input type="date" id="reportDateTo" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="reportSoftware">Software Filter</label>
                            <select id="reportSoftware" multiple>
                                <option value="all" selected>All Software</option>
                                <?php
                                $sql = "SELECT id, name FROM software ORDER BY name";
                                $result = $conn->query($sql);
                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['name']) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="reportFormat">Export Format</label>
                            <select id="reportFormat">
                                <option value="pdf">PDF Document</option>
                                <option value="excel">Excel Spreadsheet</option>
                                <option value="csv">CSV File</option>
                                <option value="json">JSON Data</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Include Sections</label>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="sections" value="summary" checked> Executive
                                Summary</label>
                            <label><input type="checkbox" name="sections" value="details" checked> Detailed Data</label>
                            <label><input type="checkbox" name="sections" value="charts" checked> Charts &
                                Graphs</label>
                            <label><input type="checkbox" name="sections" value="recommendations">
                                Recommendations</label>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary"
                            onclick="closeModal('generateReportModal')">Cancel</button>
                        <button type="submit" class="btn btn-primary">Generate Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

  
</body>
  <script src="script.js"></script>

</html>