<?php
require_once 'db.php';

if (!isset($_GET['zone_id']) || !is_numeric($_GET['zone_id'])) {
    echo '<option value="">Select Division</option>';
    exit;
}
$zone_id = intval($_GET['zone_id']);
$sql = "SELECT id, name FROM divisions WHERE zone_id = ? ORDER BY name";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $zone_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $result->num_rows > 0) {
    echo '<option value="">Select Division</option>';
    while ($row = $result->fetch_assoc()) {
        // Output division id as value, not name
        echo '<option value="' . (int)$row['id'] . '">' . htmlspecialchars($row['name']) . '</option>';
    }
} else {
    echo '<option value="">No divisions found</option>';
}
$stmt->close();
