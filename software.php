<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Management</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
   
    <div class="main-container">
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
        <div id="addSoftwareModal" class="modal">
        <div class="modal-content large-modal">
            <div class="modal-header">
                <h3 style="cursor:pointer;" onclick="showAddSoftwareModal()"><i class="fas fa-plus"></i> Add New Software</h3>
                <span class="close" onclick="closeModal('addSoftwareModal')">&times;</span>
            </div>
            <div class="modal-body">
                <form id="addSoftwareForm" method="POST" action="software_backend.php">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="softwareName">Software Name</label>
                            <input type="text" id="softwareName" name="name" placeholder="e.g., RRMS, PA System" required>
                        </div>
                        <div class="form-group">
                            <label for="softwareShortName">Short Name</label>
                            <input type="text" id="softwareShortName" name="short_name" placeholder="e.g., RRMS" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="softwareColor">Theme Color</label>
                            <input type="color" id="softwareColor" name="color" value="#1a73e8">
                        </div>
                        <div class="form-group">
                            <label for="softwareCategory">Category</label>
                            <select id="softwareCategory" name="category">
                                <option value="reservation">Reservation System</option>
                                <option value="announcement">Announcement System</option>
                                <option value="maintenance">Maintenance System</option>
                                <option value="feedback">Feedback System</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="softwareDescription">Description</label>
                        <textarea id="softwareDescription" name="description" rows="3"
                            placeholder="Brief description of the software system"></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary"
                            onclick="closeModal('addSoftwareModal')">Cancel</button>
                        <input type="submit" class="btn btn-primary" value="Create Software">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
