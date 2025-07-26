<?php
require_once 'db.php';

// Handle Add Website Report
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['websiteUrl']) && !isset($_POST['updateWebsiteId'])) {
    $url = $_POST['websiteUrl'];
    $start = $_POST['websiteStartDate'];
    $end = $_POST['websiteEndDate'];
    $price = $_POST['websitePrice'];
    $email = $_POST['emailService'];
    $status = $_POST['websiteStatus'];

    $stmt = $conn->prepare("INSERT INTO website_reports (url, start_date, end_date, price, email_service, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $url, $start, $end, $price, $email, $status);
    $stmt->execute();
    $stmt->close();
    header('Location: website-reports.php');
    exit;
}

// Handle Update Website Report
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateWebsiteId'])) {
    $id = $_POST['updateWebsiteId'];
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Reports</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
    .modern-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    .modern-table th, .modern-table td {
        padding: 14px 18px;
        text-align: left;
    }
    .modern-table thead {
        background: #f5f7fa;
    }
    .modern-table tbody tr {
        transition: background 0.2s;
    }
    .modern-table tbody tr:hover {
        background: #f0f6ff;
    }
    .badge {
        display: inline-block;
        padding: 0.35em 0.7em;
        font-size: 0.95em;
        font-weight: 600;
        border-radius: 0.5em;
        color: #fff;
        vertical-align: middle;
    }
    .badge-info { background: #1a73e8; }
    .badge-success { background: #34a853; }
    .badge-danger { background: #ea4335; }
    .badge-secondary { background: #9aa0a6; }
    .active-row { background: #e8f5e9 !important; }
    .inactive-row { background: #fbe9e7 !important; }
    .section-title { margin: 0 0 12px 0; font-size: 1.2em; color: #1a73e8; display: flex; align-items: center; gap: 8px; }
    .card { padding: 24px; margin-top: 24px; border-radius: 12px; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.06); }
    .subtitle { color: #5f6368; font-size: 1em; margin-top: 4px; }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="main-container">
        <div class="page-header">
            <div class="page-title-section">
                <h2><i class="fas fa-globe"></i> Website Reports</h2>
                <p class="subtitle">Generate and manage website reports</p>
            </div>
            <div class="page-actions">
                <button class="btn btn-primary" onclick="showAddWebsiteModal()">
                    <i class="fas fa-plus"></i> Add Website Report
                </button>
            </div>
        </div>
    <!-- Update Website Modal -->
    <div id="updateWebsiteModal" class="modal">
        <div class="modal-content large-modal">
            <div class="modal-header">
                <h3><i class="fas fa-edit"></i> Update Website Report</h3>
                <span class="close" onclick="closeModal('updateWebsiteModal')">&times;</span>
            </div>
            <div class="modal-body">
                <form id="updateWebsiteForm" method="POST">
                    <input type="hidden" id="updateWebsiteId" name="updateWebsiteId">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="updateWebsiteUrl"><i class="fas fa-link"></i> Website URL</label>
                            <input type="url" id="updateWebsiteUrl" name="updateWebsiteUrl" required>
                        </div>
                        <div class="form-group">
                            <label for="updateWebsiteStartDate"><i class="fas fa-calendar-plus"></i> Start Date</label>
                            <input type="date" id="updateWebsiteStartDate" name="updateWebsiteStartDate" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="updateWebsiteEndDate"><i class="fas fa-calendar-minus"></i> End Date</label>
                            <input type="date" id="updateWebsiteEndDate" name="updateWebsiteEndDate" required>
                        </div>
                        <div class="form-group">
                            <label for="updateWebsitePrice"><i class="fas fa-rupee-sign"></i> Price</label>
                            <input type="number" id="updateWebsitePrice" name="updateWebsitePrice" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="updateEmailService"><i class="fas fa-envelope"></i> Email Service Enabled</label>
                            <select id="updateEmailService" name="updateEmailService" required>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="updateWebsiteStatus"><i class="fas fa-toggle-on"></i> Website Status</label>
                            <select id="updateWebsiteStatus" name="updateWebsiteStatus">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions" style="text-align:right;">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Update</button>
                        <button type="button" class="btn btn-secondary" onclick="closeModal('updateWebsiteModal')"><i class="fas fa-times"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <div class="website-reports-table-container card">
            <h3 class="section-title"><i class="fas fa-table"></i> All Website Reports</h3>
            <table class="data-table modern-table">
                <thead>
                    <tr>
                        <th>Website URL</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Price</th>
                        <th>Email Service</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM website_reports ORDER BY created_at DESC");
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $rowClass = $row['status'] === 'active' ? 'active-row' : 'inactive-row';
                            echo '<tr class="' . $rowClass . '">';
                            echo '<td><a href="' . htmlspecialchars($row['url']) . '" target="_blank">' . htmlspecialchars($row['url']) . '</a></td>';
                            echo '<td>' . htmlspecialchars($row['start_date']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['end_date']) . '</td>';
                            echo '<td><span class="badge badge-info">₹' . htmlspecialchars($row['price']) . '</span></td>';
                            echo '<td>' . ($row['email_service'] === 'yes' ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>') . '</td>';
                            echo '<td>' . ($row['status'] === 'active' ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>') . '</td>';
                            echo '<td>';
                            echo '<button class="btn btn-sm btn-primary" onclick="showUpdateWebsiteModal(' .
                                json_encode($row['id']) . ', '
                                . json_encode($row['url']) . ', '
                                . json_encode($row['start_date']) . ', '
                                . json_encode($row['end_date']) . ', '
                                . json_encode($row['price']) . ', '
                                . json_encode($row['email_service']) . ', '
                                . json_encode($row['status']) .
                                ')"><i class="fas fa-edit"></i></button> ';
                            echo '<button class="btn btn-sm btn-danger"><i class="fas fa-sync"></i></button>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="7">No website reports found.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="addWebsiteModal" class="modal">
        <div class="modal-content large-modal">
            <div class="modal-header">
                <h3><i class="fas fa-plus"></i> Add New Website Report</h3>
                <span class="close" onclick="closeModal('addWebsiteModal')">&times;</span>
            </div>
            <div class="modal-body">
                <form id="addWebsiteForm" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="websiteUrl"><i class="fas fa-link"></i> Website URL</label>
                            <input type="url" id="websiteUrl" name="websiteUrl" placeholder="e.g., https://example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="websiteStartDate"><i class="fas fa-calendar-plus"></i> Start Date</label>
                            <input type="date" id="websiteStartDate" name="websiteStartDate" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="websiteEndDate"><i class="fas fa-calendar-minus"></i> End Date</label>
                            <input type="date" id="websiteEndDate" name="websiteEndDate" required>
                        </div>
                        <div class="form-group">
                            <label for="websitePrice"><i class="fas fa-rupee-sign"></i> Price</label>
                            <input type="number" id="websitePrice" name="websitePrice" placeholder="e.g., 1000" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="emailService"><i class="fas fa-envelope"></i> Email Service Enabled</label>
                            <select id="emailService" name="emailService" required>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="websiteStatus"><i class="fas fa-toggle-on"></i> Website Status</label>
                            <select id="websiteStatus" name="websiteStatus">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions" style="text-align:right;">
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Add Website Report</button>
                        <button type="button" class="btn btn-secondary" onclick="closeModal('addWebsiteModal')"><i class="fas fa-times"></i> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





<script>
function showAddWebsiteModal() {
    document.getElementById('addWebsiteModal').style.display = 'block';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Optional: Close modal when clicking outside
window.onclick = function(event) {
    var addModal = document.getElementById('addWebsiteModal');
    var updateModal = document.getElementById('updateWebsiteModal');
    if (event.target == addModal) {
        addModal.style.display = 'none';
    }
    if (event.target == updateModal) {
        updateModal.style.display = 'none';
    }
}

// Show Update Modal and fill values
function showUpdateWebsiteModal(id, url, start, end, price, email, status) {
    console.log('showUpdateWebsiteModal called', id, url, start, end, price, email, status);
    document.getElementById('updateWebsiteId').value = id;
    document.getElementById('updateWebsiteUrl').value = url;
    document.getElementById('updateWebsiteStartDate').value = start;
    document.getElementById('updateWebsiteEndDate').value = end;
    document.getElementById('updateWebsitePrice').value = price;
    document.getElementById('updateEmailService').value = email;
    document.getElementById('updateWebsiteStatus').value = status;
    document.getElementById('updateWebsiteModal').style.display = 'block';
    // Remove display:none if set by CSS
    document.getElementById('updateWebsiteModal').classList.remove('hidden');
}
    </script>
</body>
</html>