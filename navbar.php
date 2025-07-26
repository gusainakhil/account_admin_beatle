<?php
// Navigation bar for all pages
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
        <a href="reports.php" class="nav-item<?php if(basename($_SERVER['PHP_SELF'])=='reports.php') echo ' active'; ?>">
            <i class="fas fa-chart-bar"></i>
            <span>Reports & Analytics</span>
        </a>
        <a href="website-reports.php" class="nav-item<?php if(basename($_SERVER['PHP_SELF'])=='website-reports.php') echo ' active'; ?>">
            <i class="fas fa-cog"></i>
            <span>Website</span>
        </a>
    </div>
    <div class="navbar-profile">
        <div class="notification-bell">
            <i class="fas fa-bell"></i>
            <span class="notification-badge" id="notificationCount">3</span>
        </div>
        <div class="profile-dropdown">
            <img src="https://via.placeholder.com/40x40/1a73e8/ffffff?text=BA" alt="Profile" class="profile-avatar">
            <span class="profile-name">Admin User</span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
</nav>
<br>
 
<br>
