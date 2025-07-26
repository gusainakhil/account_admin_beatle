<?php
require_once 'db.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // echo '<pre style="color:black;background:#fff;">';
    // echo 'DEBUG POST DATA:\n';
    // print_r($_POST);
    // echo '</pre>';
    // flush();
    // Remove or comment out the above debug output after testing.

    $stationName = trim($_POST['stationName'] ?? '');
    $stationZone = trim($_POST['stationZone'] ?? '');
    $stationDivision = trim($_POST['stationDivision'] ?? '');
    $stationSoftware = trim($_POST['stationSoftware'] ?? '');
    $orgName = trim($_POST['orgName'] ?? '');
    $stationStart = trim($_POST['stationStart'] ?? '');
    $stationExpiry = trim($_POST['stationExpiry'] ?? '');
    $stationReports = trim($_POST['stationReports'] ?? '');

    // Basic validation
    $missing = [];
    if (!$stationName) $missing[] = 'Station Name';
    if (!$stationZone) $missing[] = 'Zone';
    if (!$stationDivision) $missing[] = 'Division';
    if (!$stationSoftware) $missing[] = 'Software System';
    if (!$orgName) $missing[] = 'Organisation Name';
    if (!$stationStart) $missing[] = 'Subscription Start';
    if (!$stationExpiry) $missing[] = 'Subscription Expiry';
    if (!$stationReports) $missing[] = 'Reports';
    if (!empty($missing)) {
        echo '<!DOCTYPE html><html><head><title>Add Station Error</title></head><body>';
        echo '<h2 style="color:red;">All required fields must be filled.</h2>';
        echo '<p style="color:red;">Missing: ' . implode(', ', $missing) . '</p>';
        echo '<a href="subscriptions.php">Go Back</a>';
        echo '</body></html>';
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO stations (name, organisation, division_id, zone_id, start_date, expiry_date, reports, software_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        error_log('Prepare failed: ' . $conn->error);
        echo '<!DOCTYPE html><html><head><title>Add Station Error</title></head><body>';
        echo '<h2 style="color:red;">DB error: ' . htmlspecialchars($conn->error) . '</h2>';
        echo '<a href="subscriptions.php">Go Back</a>';
        echo '</body></html>';
        exit;
    }
    $stmt->bind_param('ssiisssi', $stationName, $orgName, $stationDivision, $stationZone, $stationStart, $stationExpiry, $stationReports, $stationSoftware);
    if ($stmt->execute()) {
        echo '<!DOCTYPE html><html><head><title>Station Added</title></head><body>';
        echo '<h2 style="color:green;">Station added successfully.</h2>';
        // redirect to subscriptions page
        // echo '<a href="subscriptions.php">Go Back</a>';
        echo '<script>setTimeout(function() { window.location.href = "subscriptions.php"; }, 2000);</script>';
        echo '<p>You will be redirected in 2 seconds...</p>';
        // echo '<a href="subscriptions.php">Go Back</a>';
        echo '</body></html>';
        // echo '<!DOCTYPE html><html><head><title>Station Added</title></head><body>';
        // echo '<h2 style="color:green;">Station added successfully.</h2>';
        // echo '<p>You can now manage this station in the subscriptions page.</p
        echo '<a href="subscriptions.php">Go Back</a>';
        echo '</body></html>';
    } else {
        error_log('Execute failed: ' . $stmt->error);
        echo '<!DOCTYPE html><html><head><title>Add Station Error</title></head><body>';
        echo '<h2 style="color:red;">Failed to add station: ' . htmlspecialchars($stmt->error) . '</h2>';
        echo '<a href="subscriptions.php">Go Back</a>';
        echo '</body></html>';
    }
    $stmt->close();
} else {
    echo '<!DOCTYPE html><html><head><title>Add Station Error</title></head><body>';
    echo '<h2 style="color:red;">Invalid request method.</h2>';
    echo '<a href="subscriptions.php">Go Back</a>';
    echo '</body></html>';
}
