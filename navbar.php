<?php
// Navigation bar for all pages
// require_once 'auth.php';
// requireLogin(); // Ensure user is logged in to access any page with navbar
// $currentUser = getCurrentUser();
?>
<nav class="navbar">
    <div class="navbar-brand">
        <i class="fas fa-railway"></i>
        <span class="brand-text">Beatle Analytics</span>
    </div>
    <div class="navbar-menu">
        <a href="index.php" class="nav-item<?php if(basename($_SERVER['PHP_SELF'])=='dashboard.php') echo ' active'; ?>">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
        <a href="software.php" class="nav-item<?php if(basename($_SERVER['PHP_SELF'])=='software.php') echo ' active'; ?>">
            <i class="fas fa-cogs"></i>
            <span>Software Management</span>
        </a>
        <a href="subscriptions.php" class="nav-item<?php if(basename($_SERVER['PHP_SELF'])=='subscriptions.php') echo ' active'; ?>">
            <i class="fas fa-calendar-check"></i>
            <span>Stations & Subscriptions</span>
        </a>
        <!-- <a href="reports.php" class="nav-item<?php if(basename($_SERVER['PHP_SELF'])=='reports.php') echo ' active'; ?>">
            <i class="fas fa-chart-bar"></i>
            <span>Reports & Analytics</span>
        </a> -->
        <a href="website-reports.php" class="nav-item<?php if(basename($_SERVER['PHP_SELF'])=='website-reports.php') echo ' active'; ?>">
            <i class="fas fa-chart-bar"></i>
            <span>Website</span>
        </a>
    </div>
    <div class="navbar-profile">
        <!--<div class="notification-bell">-->
        <!--    <i class="fas fa-bell"></i>-->
        <!--    <span class="notification-badge" id="notificationCount">3</span>-->
        <!--</div>-->
        <div class="profile-dropdown">
            <img src="https://www.beatleanalytics.com/assets/frontend/img/favicon.png" alt="Profile" class="profile-avatar">
            <span class="profile-name"><?php echo htmlspecialchars($currentUser['username']); ?></span>
            <div class="dropdown-menu">
                <a href="logout.php" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </div>
    </div>
</nav>
<br>
 
<br>
