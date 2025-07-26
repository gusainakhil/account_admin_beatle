<?php
require_once 'db.php';

// Get subscription ID from query string
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if (!$id) {
    echo '<p>Invalid subscription ID.</p>';
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_expiry = trim($_POST['expiry_date'] ?? '');
    if ($new_expiry) {
        $stmt = $conn->prepare('UPDATE stations SET expiry_date = ? WHERE id = ?');
        $stmt->bind_param('si', $new_expiry, $id);
        if ($stmt->execute()) {
            $success = 'Expiry date updated successfully!';
        } else {
            $error = 'Failed to update expiry date.';
        }
        $stmt->close();
    } else {
        $error = 'Please provide a valid expiry date.';
    }
}

// Fetch current details
$stmt = $conn->prepare('SELECT st.*, sw.name AS software_name, sw.short_name, z.name AS zone, d.name AS division FROM stations st LEFT JOIN software sw ON st.software_id = sw.id LEFT JOIN zones z ON st.zone_id = z.id LEFT JOIN divisions d ON st.division_id = d.id WHERE st.id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$station = $result->fetch_assoc();
$stmt->close();

if (!$station) {
    echo '<p>Subscription not found.</p>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Subscription Expiry</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="main-container" style="max-width:520px;margin:40px auto;">
        <div class="card" style="box-shadow:0 2px 12px rgba(0,0,0,0.07);border-radius:18px;padding:32px 32px 24px 32px;background:#fff;">
            <h2 style="margin-top:0;font-size:1.5em;font-weight:700;color:#2563eb;letter-spacing:0.01em;">Edit Subscription Expiry</h2>
            <?php if (!empty($success)) echo '<div class="alert alert-success" style="margin-bottom:18px;">' . htmlspecialchars($success) . '</div>'; ?>
            <?php if (!empty($error)) echo '<div class="alert alert-danger" style="margin-bottom:18px;">' . htmlspecialchars($error) . '</div>'; ?>
            <table class="data-table" style="margin-bottom:28px;width:100%;background:#f8fafc;border-radius:10px;overflow:hidden;">
                <tr><th style="width:38%;text-align:left;color:#888;font-weight:500;">Station</th><td><span style="font-weight:700;color:#222;"><?= htmlspecialchars($station['name'] ?? '') ?></span> <span style="color:#888;">(<?= htmlspecialchars($station['code'] ?? '') ?>)</span></td></tr>
                <tr><th style="text-align:left;color:#888;font-weight:500;">Organisation</th><td><?= htmlspecialchars($station['organisation'] ?? '') ?></td></tr>
                <tr><th style="text-align:left;color:#888;font-weight:500;">Zone</th><td><?= htmlspecialchars($station['zone'] ?? '') ?></td></tr>
                <tr><th style="text-align:left;color:#888;font-weight:500;">Division</th><td><?= htmlspecialchars($station['division'] ?? '') ?></td></tr>
                <tr><th style="text-align:left;color:#888;font-weight:500;">Software</th><td><?= htmlspecialchars($station['software_name'] ?? '') ?></td></tr>
                <tr><th style="text-align:left;color:#888;font-weight:500;">Start Date</th><td><?= htmlspecialchars($station['start_date'] ?? '') ?></td></tr>
                <tr><th style="text-align:left;color:#888;font-weight:500;">Current Expiry</th><td><?= htmlspecialchars($station['expiry_date'] ?? '') ?></td></tr>
                <tr><th style="text-align:left;color:#888;font-weight:500;">Reports</th><td><?= htmlspecialchars($station['reports'] ?? '') ?></td></tr>
            </table>
            <form method="post" style="margin-bottom:0;">
                <div style="margin-bottom:18px;">
                    <label for="expiry_date" style="font-weight:600;color:#2563eb;display:block;margin-bottom:6px;">
                        <i class="fa-regular fa-calendar-days" style="margin-right:7px;color:#2563eb;"></i>
                        New Expiry Date
                    </label>
                    <input type="date" id="expiry_date" name="expiry_date" value="<?= htmlspecialchars($station['expiry_date'] ?? '') ?>" required style="margin-top:6px;padding:8px 12px;border-radius:7px;border:1px solid #d1d5db;font-size:1em;width:100%;max-width:260px;">
                </div>
                <div style="display:flex;gap:12px;">
                    <button type="submit" class="btn btn-primary" style="background:#2563eb;border:none;padding:8px 22px;border-radius:7px;font-weight:600;font-size:1em;">Renew</button>
                    <a href="subscriptions.php" class="btn btn-secondary" style="background:#f3f4f6;color:#222;padding:8px 22px;border-radius:7px;font-weight:600;font-size:1em;text-decoration:none;display:inline-block;">Cancel</a>
                     <a href="subscriptions.php" class="btn btn-secondary" style="background:#f3f4f6;color:#222;padding:8px 22px;border-radius:7px;font-weight:600;font-size:1em;text-decoration:none;display:inline-block;">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
