<?php

require_once 'db.php';
$software = isset($_GET['software']) ? trim($_GET['software']) : '';
$zone = isset($_GET['zone']) ? trim($_GET['zone']) : '';
$division = isset($_GET['division']) ? trim($_GET['division']) : '';
$status = isset($_GET['status']) ? trim($_GET['status']) : '';
// Debug output for troubleshooting
echo '<!-- DEBUG FILTER PARAMS: software=' . htmlspecialchars($software) . ', zone=' . htmlspecialchars($zone) . ', division=' . htmlspecialchars($division) . ', status=' . htmlspecialchars($status) . ' -->';

$software = isset($_GET['software']) ? trim($_GET['software']) : '';
$zone = isset($_GET['zone']) ? trim($_GET['zone']) : '';
$division = isset($_GET['division']) ? trim($_GET['division']) : '';
$status = isset($_GET['status']) ? trim($_GET['status']) : '';

// Build base query
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
WHERE 1=1 
"; // End SQL string here

$params = [];
$types = '';

if ($software !== '') {
    if ($software !== '') {
        $sql .= " AND st.software_id = ?";
        $params[] = $software;
        $types .= 'i';
    }
}
if ($zone !== '') {
    $sql .= " AND st.zone_id = ?";
    $params[] = $zone;
    $types .= 'i';
}
if ($division !== '') {
    $sql .= " AND st.division_id = ?";
    $params[] = $division;
    $types .= 'i';
}

// We'll filter status in PHP after fetching
$stmt = $conn->prepare($sql . " ORDER BY st.name");
// Debug output for SQL
echo '<!-- DEBUG SQL: ' . htmlspecialchars($sql) . ' -->';
if ($params) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

$today = date('Y-m-d');
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $expiry = $row['expiry_date'];
        $daysLeft = (strtotime($expiry) - strtotime($today)) / (60 * 60 * 24);
        if ($daysLeft < 0) {
            $rowStatus = 'EXPIRED';
            $statusClass = 'status-badge status-expired';
        } elseif ($daysLeft <= 30) {
            $rowStatus = 'EXPIRING SOON';
            $statusClass = 'status-badge status-warning';
        } else {
            $rowStatus = 'VALID';
            $statusClass = 'status-badge status-valid';
        }
        if ($status && strtolower($rowStatus) !== strtolower($status))
            continue;
        // Colored dot for software (color by hash of name for demo)
        $colorMap = [
            'RRMS' => '#2563eb',
            'PA' => '#10b981',
            'Cleaning' => '#06b6d4',
            'OBHS' => '#a21caf',
        ];
        $swShort = $row['short_name'] ?? '';
        $dotColor = $colorMap[$swShort] ?? '#2563eb';
        $reportsCount = (isset($row['reports']) && trim($row['reports']) !== '') ? count(array_filter(array_map('trim', explode(',', $row['reports'])))) : 0;
        echo '<tr>';
        echo '<td><input type="checkbox" class="selectSubscription"></td>';
        // Software: colored dot + bold
        echo '<td><span class="sw-dot" style="background:' . $dotColor . '"></span><span class="sw-bold">' . htmlspecialchars($swShort) . '</span></td>';
        echo '<td>' . htmlspecialchars($row['zone'] ?? '') . '</td>';
        echo '<td>' . htmlspecialchars($row['division'] ?? '') . '</td>';
        // Station: bold name, code below
        echo '<td><span class="station-bold">' . htmlspecialchars($row['station_name'] ?? '') . '</span><br><span class="station-code">' . htmlspecialchars($row['code'] ?? '') . '</span></td>';
        // Reports count: blue badge
        echo '<td><span class="reports-badge">' . $reportsCount . ' report' . ($reportsCount == 1 ? '' : 's') . '</span></td>';
        echo '<td>' . htmlspecialchars($row['expiry_date'] ?? '') . '</td>';
        // Status: yellow badge with brown text, uppercase, stacked
        echo '<td><span class="' . $statusClass . '">' . $rowStatus . '</span></td>';
        echo '<td>';
        echo '<a href="edit_subscription.php?id=' . urlencode($row['id']) . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a> ';
        echo '<button class="btn btn-sm btn-danger"><i class="fas fa-sync"></i></button>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="9">No subscriptions found.</td></tr>';
}
// Inline style for AJAX table
echo '<style>
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
</style>';
$stmt->close();
