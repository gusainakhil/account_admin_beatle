<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Management</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="main-container">
        <div class="page-header">
            <div class="page-title-section">
                <p>Monitor and manage all subscription expiry dates</p>
            </div>
            <div class="page-actions">
                <!-- <button class="btn btn-primary" onclick="showBulkUpdateModal()">
                    <i class="fas fa-edit"></i> Bulk Update
                </button>
                <button class="btn btn-success" onclick="exportSubscriptions()">
                    <i class="fas fa-download"></i> Export
                </button> -->
                <!-- add Add New Station -->
                <button class="btn btn-success" onclick="showAddStationModal()">
                    <i class="fas fa-plus"></i> Add New Station
                </button>
            </div>
        </div>
        <!-- Subscription filters and table (copy from index.php) -->
        <div class="subscription-filters">
            <div class="filter-group">
                <label>Filter by Software:</label>
                <select id="softwareFilter" name="filterSoftware" onchange="filterSubscriptionsInline()">
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
                <script>
                // Auto-load filter results on page load
                document.addEventListener('DOMContentLoaded', function() {
                    filterSubscriptionsInline();
                });
                </script>
                <script>
                function filterSubscriptionsInline() {
                    var software = document.getElementById('softwareFilter').value;
                    var zone = document.getElementById('zoneFilter').value;
                    var division = document.getElementById('divisionFilter').value;
                    var status = document.getElementById('statusFilter').value;
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'filter_subscriptions.php?software=' + encodeURIComponent(software) +
                        '&zone=' + encodeURIComponent(zone) +
                        '&division=' + encodeURIComponent(division) +
                        '&status=' + encodeURIComponent(status), true);
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            document.getElementById('subscriptionsTableBodys').innerHTML = xhr.responseText;
                        }
                    };
                    xhr.send();
                }
                </script>
            </div>
            <div class="filter-group">
                <label>Filter by Zone:</label>
                <select id="zoneFilter" name="filterZone" onchange="filterSubscriptionsInline(); loadDivisionsForFilterInline(this.value);">
                    <option value="">All Zones</option>
                    <?php
                    $sql = "SELECT id, name FROM zones ORDER BY name";
                    $result = $conn->query($sql);
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . (int)$row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="filter-group">
                <label>Filter by Division:</label>
                <select id="divisionFilter" name="filterDivision" onchange="filterSubscriptionsInline()">
                    <option value="">All Divisions</option>
                    <!-- Divisions will be loaded dynamically based on selected zone -->
                </select>
            </div>
            <script>
                function loadDivisionsForFilterInline(zoneId) {
                    var divisionSelect = document.getElementById('divisionFilter');
                    divisionSelect.innerHTML = '<option value="">Loading...</option>';
                    if (!zoneId) {
                        divisionSelect.innerHTML = '<option value="">All Divisions</option>';
                        return;
                    }
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'get_divisions.php?zone_id=' + encodeURIComponent(zoneId), true);
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            divisionSelect.innerHTML = '<option value="">All Divisions</option>' + xhr.responseText;
                        } else {
                            divisionSelect.innerHTML = '<option value="">All Divisions</option>';
                        }
                    };
                    xhr.send();
                }
            </script>
            <div class="filter-group">
                <label>Filter by Status:</label>
                <select id="statusFilter" name="filterStatus" onchange="filterSubscriptionsInline()">
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
                <tbody id="subscriptionsTableBodys">
                    <?php
                    $sql = "SELECT 
                                sub.*, 
                                sw.name AS software_name, 
                                st.name AS station_name, 
                                st.zone_id, 
                                st.division_id, 
                                st.code, 
                                st.reports, 
                                sub.expiry_date,
                                z.name AS zone,
                                d.name AS division
                            FROM subscriptions sub
                            JOIN software sw ON sub.software_id = sw.id
                            JOIN stations st ON sub.station_id = st.id
                            LEFT JOIN zones z ON st.zone_id = z.id
                            LEFT JOIN divisions d ON st.division_id = d.id";
                    $result = $conn->query($sql);
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $expiry = $row['expiry_date'];
                            $today = date('Y-m-d');
                            $daysLeft = (strtotime($expiry) - strtotime($today)) / (60 * 60 * 24);
                            if ($daysLeft < 0) {
                                $status = 'EXPIRED';
                                $statusClass = 'status-badge status-expired';
                            } elseif ($daysLeft <= 30) {
                                $status = 'EXPIRING SOON';
                                $statusClass = 'status-badge status-warning';
                            } else {
                                $status = 'VALID';
                                $statusClass = 'status-badge status-valid';
                            }
                            // Colored dot for software (color by hash of name for demo)
                            $colorMap = [
                                'RRMS' => '#2563eb',
                                'PA' => '#10b981',
                                'Cleaning' => '#06b6d4',
                                'OBHS' => '#a21caf',
                            ];
                            $swName = $row['software_name'] ?? '';
                            $dotColor = $colorMap[$swName] ?? '#2563eb';
                            $reportsCount = (isset($row['reports']) && trim($row['reports']) !== '') ? count(array_filter(array_map('trim', explode(',', $row['reports'])))) : 0;
                            echo '<tr>';
                            echo '<td><input type="checkbox" class="selectSubscription"></td>';
                            // Software: colored dot + bold
                            echo '<td><span class="sw-dot" style="background:' . $dotColor . '"></span><span class="sw-bold">' . htmlspecialchars($swName) . '</span></td>';
                            echo '<td>' . htmlspecialchars($row['zone'] ?? '') . '</td>';
                            echo '<td>' . htmlspecialchars($row['division'] ?? '') . '</td>';
                            // Station: bold name, code below
                            echo '<td><span class="station-bold">' . htmlspecialchars($row['station_name'] ?? '') . '</span><br><span class="station-code">' . htmlspecialchars($row['code'] ?? '') . '</span></td>';
                            // Reports count: blue badge
                            echo '<td><span class="reports-badge">' . $reportsCount . ' report' . ($reportsCount == 1 ? '' : 's') . '</span></td>';
                            echo '<td>' . htmlspecialchars($row['expiry_date'] ?? '') . '</td>';
                            // Status: yellow badge with brown text, uppercase, stacked
                            echo '<td><span class="' . $statusClass . '">' . $status . '</span></td>';
                            echo '<td>';
                            echo '<button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button> ';
                            echo '<button class="btn btn-sm btn-danger"><i class="fas fa-sync"></i></button>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="9">No subscriptions found.</td></tr>';
                    }
                    ?>
                    <style>
                    .sw-dot {
                        display: inline-block;
                        width: 12px;
                        height: 12px;
                        border-radius: 50%;
                        margin-right: 7px;
                        vertical-align: middle;
                    }
                    .sw-bold {
                        font-weight: 700;
                        color: #222;
                        vertical-align: middle;
                    }
                    .station-bold {
                        font-weight: 700;
                        color: #222;
                        font-size: 1.05em;
                    }
                    .station-code {
                        color: #888;
                        font-size: 0.95em;
                        letter-spacing: 0.03em;
                    }
                    .reports-badge {
                        background: #eef4ff;
                        color: #2563eb;
                        border-radius: 12px;
                        padding: 2px 10px;
                        font-size: 0.97em;
                        font-weight: 500;
                        display: inline-block;
                    }
                    .status-badge {
                        display: inline-block;
                        padding: 2px 10px 4px 10px;
                        border-radius: 8px;
                        font-size: 0.98em;
                        font-weight: 600;
                        letter-spacing: 0.02em;
                        text-transform: uppercase;
                        background: #fff7d6;
                        color: #7c4700;
                        line-height: 1.2;
                        box-shadow: 0 1px 2px rgba(0,0,0,0.02);
                    }
                    .status-valid {
                        background: #e6fbe8;
                        color: #1a7f37;
                    }
                    .status-warning {
                        background: #fff7d6;
                        color: #7c4700;
                    }
                    .status-expired {
                        background: #ffeaea;
                        color: #b42318;
                    }
                    </style>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Add Station Modal -->
    <div id="addStationModal" class="modal">
        <div class="modal-content large-modal">
            <div class="modal-header">
                <h3><i class="fas fa-map-marker-alt"></i> Add New Station</h3>
                <span class="close" onclick="closeModal('addStationModal')">&times;</span>
            </div>
            <div class="modal-body">
<form id="addStationForm" method="post" action="add_station.php">
        <div id="addStationMsg" style="margin-bottom:10px;color:red;display:none;"></div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="stationZone">Zone</label>
                            <select id="stationZone" name="stationZone" required
                                onchange="loadDivisionsByZone(this.value)">
                                <option value="">Select Zone</option>
                                <?php
                                // Fetch all zones from the database
                                $sql = "SELECT id, name FROM zones ORDER BY name";
                                $result = $conn->query($sql);
                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // Output zone id as value, not name or code
                                        echo '<option value="' . (int)$row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="stationDivision">Division</label>
                            <select id="stationDivision" name="stationDivision" required>
                                <option value="">Select Division</option>
                                <!-- Divisions will be loaded here based on selected zone -->
                            <?php
                            // Debug: print the generated HTML for the division dropdown for the first zone (if any)
                            $sql = "SELECT id FROM zones ORDER BY name LIMIT 1";
                            $result = $conn->query($sql);
                            $firstZoneId = ($result && $row = $result->fetch_assoc()) ? (int)$row['id'] : 0;
                            if ($firstZoneId) {
                                $sql = "SELECT id, name FROM divisions WHERE zone_id = $firstZoneId ORDER BY name";
                                $result = $conn->query($sql);
                                ob_start();
                                echo '<select id="_debugDivision" style="display:none">';
                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . (int)$row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
                                    }
                                }
                                echo '</select>';
                                $divDebug = ob_get_clean();
                                echo '<pre style="color:black;background:#eee;">DIVISION DROPDOWN HTML (for first zone):\n' . htmlspecialchars($divDebug) . '</pre>';
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <script>
                        function loadDivisionsByZone(zoneId) {
                            console.log('loadDivisionsByZone called with:', zoneId);
                            var divisionSelect = document.getElementById('stationDivision');
                            divisionSelect.innerHTML = '<option value="">Loading...</option>';
                            if (!zoneId) {
                                divisionSelect.innerHTML = '<option value="">Select Division</option>';
                                return;
                            }
                            var xhr = new XMLHttpRequest();
                            xhr.open('GET', 'get_divisions.php?zone_id=' + encodeURIComponent(zoneId), true);
                            xhr.onload = function () {
                                if (xhr.status === 200) {
                                    // Expecting HTML <option> output
                                    divisionSelect.innerHTML = xhr.responseText;
                                } else {
                                    divisionSelect.innerHTML = '<option value="">Select Division</option>';
                                }
                            };
                            xhr.send();
                        }
                    </script>


                    <!-- <div class="form-group">
                            <label for="stationCode">Station Code</label>
                            <input type="text" id="stationCode" placeholder="e.g., NDLS" required>
                        </div> -->

                    <div class="form-row">
                        <div class="form-group">
                            <label for="stationNameInput">Station Name</label>
                            <input type="text" id="stationNameInput" placeholder="e.g., Dehradun Railway Station"
                                name="stationName" required>
                        </div>
                        <div class="form-group">
                            <label for="stationSoftware">Software System</label>
                            <?php
                            echo '<select id="stationSoftware" name="stationSoftware" required>';
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
                            <label for="orgname">Organisation Name</label>
                            <input type="text" id="orgname" name="orgName" placeholder="e.g., Indian Railways" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="stationStart">Subscription Start</label>
                            <input type="date" id="stationStart" name="stationStart" required>
                        </div>
                        <div class="form-group">
                            <label for="stationExpiry">Subscription Expiry</label>
                            <input type="date" id="stationExpiry" name="stationExpiry" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stationReports">Reports (comma-separated)</label>
                        <textarea id="stationReports" name="stationReports" rows="2"
                            placeholder="e.g., Passenger Count, Revenue Report, Safety Audit"></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary"
                            onclick="closeModal('addStationModal')">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Station</button>
                    </div>
                </form>s
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <!-- JS form handler removed: form will submit normally via PHP POST -->
</body>

</html>