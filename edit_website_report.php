<?php
require_once 'db.php';

if (!isset($_GET['id'])) {
    echo "No report ID provided.";
    exit;
}
$id = intval($_GET['id']);

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['updateWebsiteUrl'];
    $start = $_POST['updateWebsiteStartDate'];
    $end = $_POST['updateWebsiteEndDate'];
    $price = $_POST['updateWebsitePrice'];
    $email = $_POST['updateEmailService'];
    $status = $_POST['updateWebsiteStatus'];

    $stmt = $conn->prepare("UPDATE website_reports SET url=?, start_date=?, end_date=?, price=?, email_service=?, status=? WHERE id=?");
    $stmt->bind_param("ssssssi", $url, $start, $end, $price, $email, $status, $id);
    $stmt->execute();
    $stmt->close();
    header('Location: website-reports.php');
    exit;
}

$stmt = $conn->prepare("SELECT * FROM website_reports WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$report = $result->fetch_assoc();
$stmt->close();
if (!$report) {
    echo "Report not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Website Report</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
    .card {
        padding: 32px;
        margin: 32px auto;
        max-width: 520px;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .section-title {
        font-size: 1.4em;
        color: #1a73e8;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .form-group {
        margin-bottom: 18px;
    }
    label {
        font-weight: 500;
        color: #333;
        display: block;
        margin-bottom: 6px;
    }
    input, select {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #d1d5db;
        font-size: 1em;
        background: #f9fafb;
        margin-bottom: 2px;
    }
    .form-actions {
        text-align: right;
        margin-top: 24px;
    }
    .btn {
        padding: 10px 22px;
        border-radius: 6px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        margin-left: 8px;
    }
    .btn-success { background: #34a853; color: #fff; }
    .btn-secondary { background: #9aa0a6; color: #fff; }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="main-container">
        <div class="card">
            <div class="section-title"><i class="fas fa-edit"></i> Edit Website Report</div>
            <form method="POST">
                <div class="form-group">
                    <label for="updateWebsiteUrl"><i class="fas fa-link"></i> Website URL</label>
                    <input type="url" id="updateWebsiteUrl" name="updateWebsiteUrl" value="<?php echo htmlspecialchars($report['url']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="updateWebsiteStartDate"><i class="fas fa-calendar-plus"></i> Start Date</label>
                    <input type="date" id="updateWebsiteStartDate" name="updateWebsiteStartDate" value="<?php echo htmlspecialchars($report['start_date']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="updateWebsiteEndDate"><i class="fas fa-calendar-minus"></i> End Date</label>
                    <input type="date" id="updateWebsiteEndDate" name="updateWebsiteEndDate" value="<?php echo htmlspecialchars($report['end_date']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="updateWebsitePrice"><i class="fas fa-rupee-sign"></i> Price</label>
                    <input type="number" id="updateWebsitePrice" name="updateWebsitePrice" value="<?php echo htmlspecialchars($report['price']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="updateEmailService"><i class="fas fa-envelope"></i> Email Service Enabled</label>
                    <select id="updateEmailService" name="updateEmailService" required>
                        <option value="yes" <?php if($report['email_service']==='yes') echo 'selected'; ?>>Yes</option>
                        <option value="no" <?php if($report['email_service']==='no') echo 'selected'; ?>>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="updateWebsiteStatus"><i class="fas fa-toggle-on"></i> Website Status</label>
                    <select id="updateWebsiteStatus" name="updateWebsiteStatus">
                        <option value="active" <?php if($report['status']==='active') echo 'selected'; ?>>Active</option>
                        <option value="inactive" <?php if($report['status']==='inactive') echo 'selected'; ?>>Inactive</option>
                    </select>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Update</button>
                    <a href="website-reports.php" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
