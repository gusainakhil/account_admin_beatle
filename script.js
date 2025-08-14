// Comprehensive Hardcoded Dashboard Data
const DASHBOARD_DATA = {
    software: {
        'RRMS': {
            name: 'Running Rooom Mnagement System',
            shortName: 'RRMS',
            color: '#1a73e8',
            zones: {
                'North Zone': {
                    name: 'North Zone',
                    divisions: {
                        'Delhi Division': {
                            name: 'Delhi Division',
                            stations: {
                                'New Delhi': {
                                    name: 'New Delhi Railway Station',
                                    code: 'NDLS',
                                    expiryDate: '2025-08-15',
                                    reports: ['Passenger Traffic Analysis', 'Revenue Report', 'Safety Audit', 'Maintenance Log', 'Platform Utilization']
                                },
                                'Old Delhi': {
                                    name: 'Old Delhi Junction',
                                    code: 'DLI',
                                    expiryDate: '2025-09-20',
                                    reports: ['Passenger Count', 'Revenue Report', 'Daily Operations', 'Security Report']
                                },
                                'Chandni Chowk': {
                                    name: 'Chandni Chowk Metro',
                                    code: 'CHCH',
                                    expiryDate: '2025-07-30',
                                    reports: ['Passenger Count', 'Safety Audit', 'Environmental Report']
                                },
                                'Nizamuddin': {
                                    name: 'Hazrat Nizamuddin',
                                    code: 'NZM',
                                    expiryDate: '2025-11-15',
                                    reports: ['Passenger Analysis', 'Revenue Tracking', 'Operations Report', 'Maintenance Schedule']
                                }
                            }
                        },
                        'Punjab Division': {
                            name: 'Punjab Division',
                            stations: {
                                'Amritsar': {
                                    name: 'Amritsar Junction',
                                    code: 'ASR',
                                    expiryDate: '2025-10-15',
                                    reports: ['Passenger Count', 'Revenue Report', 'Security Report', 'Border Traffic Analysis']
                                },
                                'Ludhiana': {
                                    name: 'Ludhiana Junction',
                                    code: 'LDH',
                                    expiryDate: '2025-08-05',
                                    reports: ['Passenger Count', 'Maintenance Log', 'Industrial Traffic Report']
                                },
                                'Jalandhar': {
                                    name: 'Jalandhar City',
                                    code: 'JRC',
                                    expiryDate: '2025-12-10',
                                    reports: ['Daily Operations', 'Passenger Flow', 'Revenue Analysis']
                                }
                            }
                        }
                    }
                },
                'South Zone': {
                    name: 'South Zone',
                    divisions: {
                        'Chennai Division': {
                            name: 'Chennai Division',
                            stations: {
                                'Chennai Central': {
                                    name: 'Chennai Central',
                                    code: 'MAS',
                                    expiryDate: '2025-11-30',
                                    reports: ['Passenger Count', 'Revenue Report', 'Safety Audit', 'Environmental Report', 'Metro Integration']
                                },
                                'Chennai Egmore': {
                                    name: 'Chennai Egmore',
                                    code: 'MS',
                                    expiryDate: '2025-08-10',
                                    reports: ['Passenger Count', 'Daily Operations', 'Heritage Maintenance']
                                },
                                'Chennai Beach': {
                                    name: 'Chennai Beach',
                                    code: 'MSB',
                                    expiryDate: '2025-09-25',
                                    reports: ['Suburban Traffic', 'Coastal Operations', 'Safety Report']
                                }
                            }
                        },
                        'Bangalore Division': {
                            name: 'Bangalore Division',
                            stations: {
                                'Bangalore City': {
                                    name: 'KSR Bangalore',
                                    code: 'SBC',
                                    expiryDate: '2025-10-30',
                                    reports: ['Tech Hub Traffic', 'Revenue Analysis', 'Modern Infrastructure', 'IT Corridor Report']
                                },
                                'Bangalore East': {
                                    name: 'Bangalore East',
                                    code: 'BNC',
                                    expiryDate: '2025-12-20',
                                    reports: ['Suburban Analysis', 'Freight Operations', 'Connectivity Report']
                                }
                            }
                        }
                    }
                },
                'West Zone': {
                    name: 'West Zone',
                    divisions: {
                        'Mumbai Division': {
                            name: 'Mumbai Division',
                            stations: {
                                'Mumbai CST': {
                                    name: 'Chhatrapati Shivaji Terminus',
                                    code: 'CSTM',
                                    expiryDate: '2025-09-15',
                                    reports: ['Heritage Operations', 'Passenger Density', 'UNESCO Compliance', 'Revenue Report']
                                },
                                'Mumbai Central': {
                                    name: 'Mumbai Central',
                                    code: 'BCT',
                                    expiryDate: '2025-07-28',
                                    reports: ['Long Distance Operations', 'Platform Management', 'Revenue Analysis']
                                },
                                'Dadar': {
                                    name: 'Dadar Central',
                                    code: 'DR',
                                    expiryDate: '2025-11-05',
                                    reports: ['Junction Operations', 'Suburban Integration', 'Crowd Management']
                                }
                            }
                        }
                    }
                }
            }
        },
        'PA': {
            name: 'Public Announcement System',
            shortName: 'PA',
            color: '#10b981',
            zones: {
                'Western Zone': {
                    name: 'Western Zone',
                    divisions: {
                        'Mumbai Division': {
                            name: 'Mumbai Division',
                            stations: {
                                'Mumbai CST': {
                                    name: 'Chhatrapati Shivaji Terminus',
                                    code: 'CSTM',
                                    expiryDate: '2025-09-15',
                                    reports: ['Announcement System Status', 'Platform Audio Quality', 'Emergency Alerts', 'Multi-language Support']
                                },
                                'Dadar': {
                                    name: 'Dadar Junction',
                                    code: 'DR',
                                    expiryDate: '2025-07-28',
                                    reports: ['Speaker System Health', 'Platform Management', 'Crowd Control Announcements']
                                },
                                'Bandra': {
                                    name: 'Bandra Terminus',
                                    code: 'BDTS',
                                    expiryDate: '2025-10-12',
                                    reports: ['Digital Announcements', 'Multilingual Support', 'Emergency Protocols']
                                }
                            }
                        },
                        'Pune Division': {
                            name: 'Pune Division',
                            stations: {
                                'Pune Junction': {
                                    name: 'Pune Junction',
                                    code: 'PUNE',
                                    expiryDate: '2025-12-01',
                                    reports: ['System Reliability', 'Voice Clarity', 'Automated Announcements', 'Maintenance Schedule']
                                }
                            }
                        }
                    }
                },
                'Northern Zone': {
                    name: 'Northern Zone',
                    divisions: {
                        'Delhi Division': {
                            name: 'Delhi Division',
                            stations: {
                                'New Delhi': {
                                    name: 'New Delhi Railway Station',
                                    code: 'NDLS',
                                    expiryDate: '2025-08-20',
                                    reports: ['Hindi-English Announcements', 'VIP Protocol', 'Emergency Systems', 'Platform Coverage']
                                }
                            }
                        }
                    }
                }
            }
        },
        'OBHS': {
            name: 'Online Booking & Help System',
            shortName: 'OBHS',
            color: '#8b5cf6',
            zones: {
                'Central Zone': {
                    name: 'Central Zone',
                    divisions: {
                        'Bhopal Division': {
                            name: 'Bhopal Division',
                            stations: {
                                'Bhopal Junction': {
                                    name: 'Bhopal Junction',
                                    code: 'BPL',
                                    expiryDate: '2025-12-01',
                                    reports: ['Online Reservation System', 'Booking Analytics', 'Customer Support', 'Digital Payment Gateway']
                                },
                                'Bhopal New': {
                                    name: 'Rani Kamlapati',
                                    code: 'RKMP',
                                    expiryDate: '2025-11-10',
                                    reports: ['Modern Booking Interface', 'Self-Service Kiosks', 'Help Desk Analytics']
                                }
                            }
                        },
                        'Nagpur Division': {
                            name: 'Nagpur Division',
                            stations: {
                                'Nagpur Junction': {
                                    name: 'Nagpur Junction',
                                    code: 'NGP',
                                    expiryDate: '2025-09-30',
                                    reports: ['Central India Hub', 'Booking Efficiency', 'Customer Satisfaction', 'Digital Integration']
                                }
                            }
                        }
                    }
                },
                'Eastern Zone': {
                    name: 'Eastern Zone',
                    divisions: {
                        'Kolkata Division': {
                            name: 'Kolkata Division',
                            stations: {
                                'Howrah': {
                                    name: 'Howrah Junction',
                                    code: 'HWH',
                                    expiryDate: '2025-08-18',
                                    reports: ['Heritage Station Booking', 'Traditional & Digital Mix', 'Bengali Language Support']
                                }
                            }
                        }
                    }
                }
            }
        },
        'Station Cleaning': {
            name: 'Station Cleaning Management',
            shortName: 'Cleaning',
            color: '#06b6d4',
            zones: {
                'East Zone': {
                    name: 'East Zone',
                    divisions: {
                        'Kolkata Division': {
                            name: 'Kolkata Division',
                            stations: {
                                'Howrah': {
                                    name: 'Howrah Junction',
                                    code: 'HWH',
                                    expiryDate: '2025-08-01',
                                    reports: ['Cleaning Schedule', 'Waste Management', 'Hygiene Audit', 'Sanitization Protocol', 'Staff Performance']
                                },
                                'Sealdah': {
                                    name: 'Sealdah Station',
                                    code: 'SDAH',
                                    expiryDate: '2025-10-20',
                                    reports: ['Terminal Cleaning', 'Waste Segregation', 'Public Toilet Maintenance']
                                },
                                'Kolkata': {
                                    name: 'Kolkata Station',
                                    code: 'KOAA',
                                    expiryDate: '2025-11-25',
                                    reports: ['Platform Cleaning', 'Escalator Maintenance', 'Food Court Hygiene']
                                }
                            }
                        }
                    }
                },
                'Southern Zone': {
                    name: 'Southern Zone',
                    divisions: {
                        'Chennai Division': {
                            name: 'Chennai Division',
                            stations: {
                                'Chennai Central': {
                                    name: 'Chennai Central',
                                    code: 'MAS',
                                    expiryDate: '2025-09-14',
                                    reports: ['Metro Integration Cleaning', 'Air Conditioning Maintenance', 'Floor Disinfection']
                                }
                            }
                        }
                    }
                }
            }
        },
        'Feedback': {
            name: 'Customer Feedback System',
            shortName: 'Feedback',
            color: '#f59e0b',
            zones: {
                'All Zones': {
                    name: 'Pan-India Operations',
                    divisions: {
                        'Digital Services': {
                            name: 'Digital Services Division',
                            stations: {
                                'Online Portal': {
                                    name: 'RailConnect Web Portal',
                                    code: 'WEB',
                                    expiryDate: '2025-12-31',
                                    reports: ['Customer Feedback Analytics', 'Survey Response Analysis', 'Complaint Management', 'Satisfaction Tracking', 'Real-time Feedback']
                                },
                                'Mobile App': {
                                    name: 'RailConnect Mobile App',
                                    code: 'MOB',
                                    expiryDate: '2025-11-15',
                                    reports: ['App Store Reviews', 'User Experience Analytics', 'Bug Reports', 'Feature Requests', 'Rating Analysis']
                                },
                                'Station Kiosks': {
                                    name: 'Interactive Feedback Kiosks',
                                    code: 'KIOSK',
                                    expiryDate: '2025-10-08',
                                    reports: ['Touch Screen Feedback', 'Quick Polls', 'Service Rating', 'Instant Complaints']
                                }
                            }
                        },
                        'Call Center': {
                            name: 'Customer Care Division',
                            stations: {
                                'Helpline 139': {
                                    name: 'Railway Helpline Service',
                                    code: 'HELP139',
                                    expiryDate: '2025-08-30',
                                    reports: ['Call Volume Analysis', 'Response Time Tracking', 'Issue Resolution Rate', 'Agent Performance']
                                },
                                'WhatsApp Support': {
                                    name: 'WhatsApp Customer Support',
                                    code: 'WHATSAPP',
                                    expiryDate: '2025-12-15',
                                    reports: ['Message Analytics', 'Response Automation', 'Customer Satisfaction', 'Issue Categories']
                                }
                            }
                        }
                    }
                }
            }
        }
    },
    recentActivity: [
        {
            type: 'success',
            title: 'New subscription renewed',
            description: 'Mumbai CST RRMS subscription extended to Dec 2025',
            time: '2 hours ago'
        },
        {
            type: 'warning',
            title: 'Expiry alert triggered',
            description: 'Dadar PA system expires in 3 days',
            time: '4 hours ago'
        },
        {
            type: 'info',
            title: 'New station added',
            description: 'Bandra Terminus added to PA system',
            time: '6 hours ago'
        },
        {
            type: 'success',
            title: 'System maintenance completed',
            description: 'OBHS system updated successfully',
            time: '1 day ago'
        },
        {
            type: 'warning',
            title: 'Bulk expiry detected',
            description: '5 stations require renewal this month',
            time: '2 days ago'
        }
    ]
};

// Global Variables
let currentPage = 'dashboard';
let filteredData = null;

// DOM Elements - will be initialized after DOM loads
let navItems, pages, pageTitle, pageSubtitle;
let totalSoftware, totalReports, expiringReports, totalStations, notificationCount;
let softwareGrid, searchInput, activityList, expiryTableBody, subscriptionsTableBody, performanceMetrics;

// Initialize Dashboard
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Content Loaded - Starting initialization...');
    
    // Initialize DOM elements after page loads
    initializeDOMElements();
    
    // Debug: Check if elements were found
    console.log('Navigation items found:', navItems ? navItems.length : 0);
    console.log('Pages found:', pages ? pages.length : 0);
    
    initializeDashboard();
    setupEventListeners();
    updateStatistics();
    showPage('dashboard');
    initializeModals();
    
    console.log('Dashboard initialization complete');
});

function initializeDOMElements() {
    // Navigation Elements
    navItems = document.querySelectorAll('.nav-item');
    pages = document.querySelectorAll('.page');
    pageTitle = document.getElementById('pageTitle');
    pageSubtitle = document.getElementById('pageSubtitle');

    // Statistics Elements
    totalSoftware = document.getElementById('totalSoftware');
    totalReports = document.getElementById('totalReports');
    expiringReports = document.getElementById('expiringReports');
    totalStations = document.getElementById('totalStations');
    notificationCount = document.getElementById('notificationCount');

    // Page-specific Elements
    softwareGrid = document.getElementById('softwareGrid');
    searchInput = document.getElementById('searchInput');
    activityList = document.getElementById('activityList');
    expiryTableBody = document.getElementById('expiryTableBody');
    subscriptionsTableBody = document.getElementById('subscriptionsTableBody');
    performanceMetrics = document.getElementById('performanceMetrics');
}

function initializeDashboard() {
    renderRecentActivity();
    renderExpiryTable();
    renderSoftwareGrid();
    renderSubscriptionsTable();
    renderPerformanceMetrics();
    updateNotificationCount();
}

function setupEventListeners() {
    console.log('Setting up event listeners...');
    
    // Navigation
    if (navItems && navItems.length > 0) {
        navItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const page = this.dataset.page;
                console.log('Navigation clicked:', page);
                showPage(page);
            });
        });
        console.log('Navigation listeners set up for', navItems.length, 'items');
    } else {
        console.error('No navigation items found');
    }

    // Search functionality
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            performSearch(searchTerm);
        });
        console.log('Search listener set up');
    }

    // Filter functionality
    const softwareFilter = document.getElementById('softwareFilter');
    const statusFilter = document.getElementById('statusFilter');
    
    if (softwareFilter) {
        populateSoftwareFilter();
        softwareFilter.addEventListener('change', filterSubscriptions);
    }
    
    if (statusFilter) {
        statusFilter.addEventListener('change', filterSubscriptions);
    }
    
    console.log('Event listeners setup complete');
}

// Initialize modal functionality
function initializeModals() {
    // Close modal when clicking outside of it
    window.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });

    // Close modal when pressing Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const openModals = document.querySelectorAll('.modal[style*="block"]');
            openModals.forEach(modal => {
                modal.style.display = 'none';
            });
            document.body.style.overflow = 'auto';
        }
    });

    // Initialize expiry alert close
    const closeExpiryAlert = document.getElementById('closeExpiryAlert');
    if (closeExpiryAlert) {
        closeExpiryAlert.addEventListener('click', function() {
            closeModal('expiryAlert');
        });
    }
    
    console.log('Modal initialization complete');
}

function showPage(pageName) {
    console.log('Switching to page:', pageName);

    // Always get navItems and pages fresh in case DOM changed
    let navs = navItems;
    let pgs = pages;
    if (!navs || navs.length === 0) navs = document.querySelectorAll('.nav-item');
    if (!pgs || pgs.length === 0) pgs = document.querySelectorAll('.page');

    if (!navs || !pgs) {
        console.error('Navigation elements not found');
        return;
    }

    // Update navigation
    navs.forEach(item => {
        item.classList.remove('active');
        if (item.dataset.page === pageName) {
            item.classList.add('active');
        }
    });

    // Update pages
    pgs.forEach(page => {
        page.classList.remove('active');
    });

    const targetPage = document.getElementById(pageName + 'Page');
    if (targetPage) {
        targetPage.classList.add('active');
        currentPage = pageName;
    } else {
        console.error('Page not found:', pageName + 'Page');
        return;
    }

    // Update page title and subtitle
    updatePageTitle(pageName);

    // Refresh page-specific content
    switch (pageName) {
        case 'dashboard':
            renderExpiryTable();
            renderRecentActivity();
            break;
        case 'software':
            renderSoftwareGrid();
            break;
        case 'subscriptions':
            renderSubscriptionsTable();
            break;
        case 'reports':
            renderPerformanceMetrics();
            renderAnalyticsCharts();
            break;
    }


    console.log('Page switched successfully to:', pageName);
}

function updatePageTitle(pageName) {
    const titles = {
        dashboard: {
            title: 'Dashboard Overview',
            subtitle: 'Monitor all software products and subscriptions'
        },
        software: {
            title: 'Software Management',
            subtitle: 'Manage railway software products and infrastructure'
        },
        subscriptions: {
            title: 'Subscription Management',
            subtitle: 'Track and manage all subscription expiry dates'
        },
        reports: {
            title: 'Reports & Analytics',
            subtitle: 'Comprehensive insights and performance metrics'
        },
        settings: {
            title: 'System Settings',
            subtitle: 'Configure dashboard preferences and notifications'
        }
    };

    const pageInfo = titles[pageName] || { title: 'Dashboard', subtitle: 'Railway Management System' };
    pageTitle.textContent = pageInfo.title;
    pageSubtitle.textContent = pageInfo.subtitle;
}

function updateStatistics() {
    let totalReportsCount = 0;
    let expiringCount = 0;
    let totalStationsCount = 0;
    
    Object.values(DASHBOARD_DATA.software).forEach(software => {
        Object.values(software.zones).forEach(zone => {
            Object.values(zone.divisions).forEach(division => {
                Object.values(division.stations).forEach(station => {
                    totalStationsCount++;
                    totalReportsCount += station.reports.length;
                    
                    const status = getExpiryStatus(station.expiryDate);
                    if (status === 'warning' || status === 'expired') {
                        expiringCount++;
                    }
                });
            });
        });
    });

    totalSoftware.textContent = Object.keys(DASHBOARD_DATA.software).length;
    totalReports.textContent = totalReportsCount;
    expiringReports.textContent = expiringCount;
    totalStations.textContent = totalStationsCount;
}

function updateNotificationCount() {
    const expiringStations = getExpiringStations();
    notificationCount.textContent = expiringStations.length;
}

function getExpiryStatus(expiryDate) {
    if (!expiryDate) return 'valid';
    
    const today = new Date();
    const expiry = new Date(expiryDate);
    const diffTime = expiry - today;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
    if (diffDays < 0) return 'expired';
    if (diffDays <= 30) return 'warning';
    return 'valid';
}

function getDaysUntilExpiry(expiryDate) {
    if (!expiryDate) return null;
    
    const today = new Date();
    const expiry = new Date(expiryDate);
    const diffTime = expiry - today;
    return Math.ceil(diffTime / (1000 * 60 * 60 * 24));
}

function formatDate(dateString) {
    if (!dateString) return 'No expiry';
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { 
        year: 'numeric', 
        month: 'short', 
        day: 'numeric' 
    });
}

function getExpiringStations() {
    const expiringStations = [];
    
    Object.entries(DASHBOARD_DATA.software).forEach(([softwareKey, software]) => {
        Object.entries(software.zones).forEach(([zoneKey, zone]) => {
            Object.entries(zone.divisions).forEach(([divisionKey, division]) => {
                Object.entries(division.stations).forEach(([stationKey, station]) => {
                    const status = getExpiryStatus(station.expiryDate);
                    if (status === 'warning' || status === 'expired') {
                        expiringStations.push({
                            software: software.shortName,
                            softwareColor: software.color,
                            zone: zone.name,
                            division: division.name,
                            station: station.name,
                            code: station.code,
                            expiryDate: station.expiryDate,
                            daysLeft: getDaysUntilExpiry(station.expiryDate),
                            status: status,
                            reportsCount: station.reports.length
                        });
                    }
                });
            });
        });
    });
    
    return expiringStations.sort((a, b) => a.daysLeft - b.daysLeft);
}

function renderRecentActivity() {
    if (!activityList) return;
    
    activityList.innerHTML = '';
    
    DASHBOARD_DATA.recentActivity.forEach(activity => {
        const activityItem = document.createElement('div');
        activityItem.className = 'activity-item fade-in';
        
        activityItem.innerHTML = `
            <div class="activity-icon ${activity.type}">
                <i class="fas fa-${getActivityIcon(activity.type)}"></i>
            </div>
            <div class="activity-content">
                <div class="activity-title">${activity.title}</div>
                <div class="activity-desc">${activity.description}</div>
            </div>
            <div class="activity-time">${activity.time}</div>
        `;
        
        activityList.appendChild(activityItem);
    });
}

function getActivityIcon(type) {
    const icons = {
        success: 'check-circle',
        warning: 'exclamation-triangle',
        info: 'info-circle',
        error: 'times-circle'
    };
    return icons[type] || 'info-circle';
}

function renderExpiryTable() {
    if (!expiryTableBody) return;
    
    const expiringStations = getExpiringStations();
    expiryTableBody.innerHTML = '';
    
    if (expiringStations.length === 0) {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td colspan="8" style="text-align: center; padding: 2rem; color: #64748b;">
                <i class="fas fa-check-circle" style="font-size: 2rem; margin-bottom: 1rem; display: block; color: #10b981;"></i>
                No subscriptions expiring soon!
            </td>
        `;
        expiryTableBody.appendChild(row);
        return;
    }
    
    expiringStations.forEach(station => {
        const row = document.createElement('tr');
        row.className = 'fade-in';
        
        const statusClass = station.status === 'expired' ? 'expired' : 'warning';
        const daysText = station.daysLeft < 0 ? 'EXPIRED' : `${station.daysLeft} days`;
        
        row.innerHTML = `
            <td>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <div style="width: 12px; height: 12px; background: ${station.softwareColor}; border-radius: 50%;"></div>
                    <strong>${station.software}</strong>
                </div>
            </td>
            <td>${station.zone}</td>
            <td>${station.division}</td>
            <td>
                <div>
                    <strong>${station.station}</strong>
                    <div style="font-size: 0.75rem; color: #64748b;">${station.code}</div>
                </div>
            </td>
            <td>${formatDate(station.expiryDate)}</td>
            <td>
                <span style="color: ${station.daysLeft < 0 ? '#ef4444' : '#f59e0b'}; font-weight: 600;">
                    ${daysText}
                </span>
            </td>
            <td>
                <span class="status-badge ${statusClass}">
                    ${station.status === 'expired' ? 'Expired' : 'Expiring Soon'}
                </span>
            </td>
            <td>
                <button class="btn btn-primary btn-small" onclick="renewSubscription('${station.station}')">
                    <i class="fas fa-sync-alt"></i> Renew
                </button>
            </td>
        `;
        
        expiryTableBody.appendChild(row);
    });
}

function renderSoftwareGrid() {
    if (!softwareGrid) return;
    
    softwareGrid.innerHTML = '';
    
    Object.entries(DASHBOARD_DATA.software).forEach(([softwareKey, software]) => {
        const stats = calculateSoftwareStats(software);
        
        const softwareCard = document.createElement('div');
        softwareCard.className = 'software-card fade-in';
        
        softwareCard.innerHTML = `
            <div class="software-card-header" style="background: linear-gradient(135deg, ${software.color}, ${adjustColor(software.color, 20)});">
                <div>
                    <div class="software-card-title">${software.shortName}</div>
                    <div class="software-card-subtitle">${software.name}</div>
                </div>
                <div class="software-card-actions">
                    <button class="icon-btn" onclick="editSoftware('${softwareKey}')" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="icon-btn" onclick="viewSoftwareDetails('${softwareKey}')" title="View Details">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            <div class="software-card-content">
                <div class="software-stats">
                    <div class="software-stat">
                        <span class="software-stat-number">${stats.zones}</span>
                        <span class="software-stat-label">Zones</span>
                    </div>
                    <div class="software-stat">
                        <span class="software-stat-number">${stats.stations}</span>
                        <span class="software-stat-label">Stations</span>
                    </div>
                    <div class="software-stat">
                        <span class="software-stat-number">${stats.reports}</span>
                        <span class="software-stat-label">Reports</span>
                    </div>
                </div>
                <div style="margin-top: 1rem;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                        <span style="font-size: 0.875rem; color: #64748b;">Health Status</span>
                        <span style="font-size: 0.875rem; font-weight: 600; color: ${stats.expiring > 0 ? '#f59e0b' : '#10b981'};">
                            ${stats.expiring > 0 ? `${stats.expiring} Expiring` : 'All Good'}
                        </span>
                    </div>
                    <div style="width: 100%; height: 8px; background: #e2e8f0; border-radius: 4px; overflow: hidden;">
                        <div style="width: ${((stats.stations - stats.expiring) / stats.stations) * 100}%; height: 100%; background: ${stats.expiring > 0 ? '#f59e0b' : '#10b981'}; transition: width 0.3s ease;"></div>
                    </div>
                </div>
                <div style="margin-top: 1rem; display: flex; gap: 0.5rem;">
                    <button class="btn btn-primary btn-small" onclick="viewSoftwareDetails('${softwareKey}')">
                        <i class="fas fa-chart-bar"></i> View Analytics
                    </button>
                    <button class="btn btn-secondary btn-small" onclick="manageSoftware('${softwareKey}')">
                        <i class="fas fa-cogs"></i> Manage
                    </button>
                </div>
            </div>
        `;
        
        softwareGrid.appendChild(softwareCard);
    });
}

function calculateSoftwareStats(software) {
    let zones = 0;
    let stations = 0;
    let reports = 0;
    let expiring = 0;
    
    Object.values(software.zones).forEach(zone => {
        zones++;
        Object.values(zone.divisions).forEach(division => {
            Object.values(division.stations).forEach(station => {
                stations++;
                reports += station.reports.length;
                
                const status = getExpiryStatus(station.expiryDate);
                if (status === 'warning' || status === 'expired') {
                    expiring++;
                }
            });
        });
    });
    
    return { zones, stations, reports, expiring };
}

function renderSubscriptionsTable() {
    if (!subscriptionsTableBody) return;
    
    const allStations = [];
    
    Object.entries(DASHBOARD_DATA.software).forEach(([softwareKey, software]) => {
        Object.entries(software.zones).forEach(([zoneKey, zone]) => {
            Object.entries(zone.divisions).forEach(([divisionKey, division]) => {
                Object.entries(division.stations).forEach(([stationKey, station]) => {
                    allStations.push({
                        software: software.shortName,
                        softwareColor: software.color,
                        zone: zone.name,
                        division: division.name,
                        station: station.name,
                        code: station.code,
                        expiryDate: station.expiryDate,
                        status: getExpiryStatus(station.expiryDate),
                        reportsCount: station.reports.length,
                        daysLeft: getDaysUntilExpiry(station.expiryDate)
                    });
                });
            });
        });
    });
    
    // Sort by expiry date
    allStations.sort((a, b) => new Date(a.expiryDate) - new Date(b.expiryDate));
    
    subscriptionsTableBody.innerHTML = '';
    
    // allStations.forEach(station => {
    //     const row = document.createElement('tr');
    //     row.className = 'fade-in';
        
    //     row.innerHTML = `
    //         <td><input type="checkbox" class="station-checkbox" data-station="${station.station}"></td>
    //         <td>
    //             <div style="display: flex; align-items: center; gap: 0.5rem;">
    //                 <div style="width: 12px; height: 12px; background: ${station.softwareColor}; border-radius: 50%;"></div>
    //                 <strong>${station.software}</strong>
    //             </div>
    //         </td>
    //         <td>${station.zone}</td>
    //         <td>${station.division}</td>
    //         <td>
    //             <div>
    //                 <strong>${station.station}</strong>
    //                 <div style="font-size: 0.75rem; color: #64748b;">${station.code}</div>
    //             </div>
    //         </td>
    //         <td>
    //             <span class="badge" style="background: #e8f0fe; color: #1a73e8; padding: 0.25rem 0.5rem; border-radius: 12px; font-size: 0.75rem;">
    //                 ${station.reportsCount} reports
    //             </span>
    //         </td>
    //         <td>${formatDate(station.expiryDate)}</td>
    //         <td>
    //             <span class="status-badge ${station.status}">
    //                 ${station.status === 'valid' ? 'Active' : station.status === 'warning' ? 'Expiring Soon' : 'Expired'}
    //             </span>
    //         </td>
    //         <td>
    //             <div style="display: flex; gap: 0.25rem;">
    //                 <button class="icon-btn" onclick="editSubscription('${station.station}')" title="Edit" style="background: #f8fafc; color: #64748b;">
    //                     <i class="fas fa-edit"></i>
    //                 </button>
    //                 <button class="icon-btn" onclick="renewSubscription('${station.station}')" title="Renew" style="background: #f8fafc; color: #64748b;">
    //                     <i class="fas fa-sync-alt"></i>
    //                 </button>
    //             </div>
    //         </td>
    //     `;
        
    //     subscriptionsTableBody.appendChild(row);
    // });
}

function renderPerformanceMetrics() {
    if (!performanceMetrics) return;
    
    const totalStations = Object.values(DASHBOARD_DATA.software).reduce((total, software) => {
        return total + Object.values(software.zones).reduce((zoneTotal, zone) => {
            return zoneTotal + Object.values(zone.divisions).reduce((divTotal, division) => {
                return divTotal + Object.keys(division.stations).length;
            }, 0);
        }, 0);
    }, 0);
    
    const totalReports = Object.values(DASHBOARD_DATA.software).reduce((total, software) => {
        return total + Object.values(software.zones).reduce((zoneTotal, zone) => {
            return zoneTotal + Object.values(zone.divisions).reduce((divTotal, division) => {
                return divTotal + Object.values(division.stations).reduce((stationTotal, station) => {
                    return stationTotal + station.reports.length;
                }, 0);
            }, 0);
        }, 0);
    }, 0);
    
    const expiringStations = getExpiringStations();
    const activeSubscriptions = totalStations - expiringStations.length;
    
    performanceMetrics.innerHTML = `
        <div class="metric-item">
            <span class="metric-value">${totalStations}</span>
            <span class="metric-label">Total Stations</span>
        </div>
        <div class="metric-item">
            <span class="metric-value">${activeSubscriptions}</span>
            <span class="metric-label">Active Subscriptions</span>
        </div>
        <div class="metric-item">
            <span class="metric-value">${expiringStations.length}</span>
            <span class="metric-label">Requires Attention</span>
        </div>
        <div class="metric-item">
            <span class="metric-value">${totalReports}</span>
            <span class="metric-label">Total Reports</span>
        </div>
        <div class="metric-item">
            <span class="metric-value">${Object.keys(DASHBOARD_DATA.software).length}</span>
            <span class="metric-label">Software Products</span>
        </div>
        <div class="metric-item">
            <span class="metric-value">${Math.round((activeSubscriptions / totalStations) * 100)}%</span>
            <span class="metric-label">System Health</span>
        </div>
    `;
}

function renderAnalyticsCharts() {
    // Placeholder for chart rendering
    const chartContainers = ['softwareChart', 'zoneChart', 'trendChart'];
    
    chartContainers.forEach(containerId => {
        const container = document.getElementById(containerId);
        if (container) {
            container.innerHTML = `
                <div style="text-align: center; color: #64748b;">
                    <i class="fas fa-chart-bar" style="font-size: 2rem; margin-bottom: 1rem; opacity: 0.5;"></i>
                    <p>Chart visualization would be implemented here</p>
                    <p style="font-size: 0.875rem; margin-top: 0.5rem;">
                        Integration with Chart.js, D3.js, or similar library
                    </p>
                </div>
            `;
        }
    });
}

function populateSoftwareFilter() {
    const softwareFilter = document.getElementById('softwareFilter');
    if (!softwareFilter) return;
    
    Object.values(DASHBOARD_DATA.software).forEach(software => {
        const option = document.createElement('option');
        option.value = software.shortName;
        option.textContent = software.shortName;
        softwareFilter.appendChild(option);
    });
}

function performSearch(searchTerm) {
    if (currentPage !== 'software') return;
    
    if (!searchTerm) {
        renderSoftwareGrid();
        return;
    }
    
    // Filter software based on search term
    const filteredSoftware = {};
    
    Object.entries(DASHBOARD_DATA.software).forEach(([key, software]) => {
        const matchesSoftware = software.name.toLowerCase().includes(searchTerm) || 
                               software.shortName.toLowerCase().includes(searchTerm);
        
        if (matchesSoftware) {
            filteredSoftware[key] = software;
        } else {
            // Check zones, divisions, stations
            const filteredZones = {};
            
            Object.entries(software.zones).forEach(([zoneKey, zone]) => {
                if (zone.name.toLowerCase().includes(searchTerm)) {
                    filteredZones[zoneKey] = zone;
                } else {
                    // Check divisions and stations
                    const filteredDivisions = {};
                    
                    Object.entries(zone.divisions).forEach(([divKey, division]) => {
                        if (division.name.toLowerCase().includes(searchTerm)) {
                            filteredDivisions[divKey] = division;
                        } else {
                            // Check stations
                            const filteredStations = {};
                            
                            Object.entries(division.stations).forEach(([stationKey, station]) => {
                                if (station.name.toLowerCase().includes(searchTerm) || 
                                    station.code.toLowerCase().includes(searchTerm)) {
                                    filteredStations[stationKey] = station;
                                }
                            });
                            
                            if (Object.keys(filteredStations).length > 0) {
                                filteredDivisions[divKey] = {
                                    ...division,
                                    stations: filteredStations
                                };
                            }
                        }
                    });
                    
                    if (Object.keys(filteredDivisions).length > 0) {
                        filteredZones[zoneKey] = {
                            ...zone,
                            divisions: filteredDivisions
                        };
                    }
                }
            });
            
            if (Object.keys(filteredZones).length > 0) {
                filteredSoftware[key] = {
                    ...software,
                    zones: filteredZones
                };
            }
        }
    });
    
    // Render filtered results
    renderFilteredSoftwareGrid(filteredSoftware);
}

function renderFilteredSoftwareGrid(filteredSoftware) {
    if (!softwareGrid) return;
    
    softwareGrid.innerHTML = '';
    
    if (Object.keys(filteredSoftware).length === 0) {
        softwareGrid.innerHTML = `
            <div style="grid-column: 1 / -1; text-align: center; padding: 4rem; color: #64748b;">
                <i class="fas fa-search" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
                <p style="font-size: 1.25rem; margin-bottom: 0.5rem;">No results found</p>
                <p>Try adjusting your search terms</p>
            </div>
        `;
        return;
    }
    
    Object.entries(filteredSoftware).forEach(([softwareKey, software]) => {
        const stats = calculateSoftwareStats(software);
        
        const softwareCard = document.createElement('div');
        softwareCard.className = 'software-card fade-in';
        
        softwareCard.innerHTML = `
            <div class="software-card-header" style="background: linear-gradient(135deg, ${software.color}, ${adjustColor(software.color, 20)});">
                <div>
                    <div class="software-card-title">${software.shortName}</div>
                    <div class="software-card-subtitle">${software.name}</div>
                </div>
                <div class="software-card-actions">
                    <button class="icon-btn" onclick="editSoftware('${softwareKey}')" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="icon-btn" onclick="viewSoftwareDetails('${softwareKey}')" title="View Details">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            <div class="software-card-content">
                <div class="software-stats">
                    <div class="software-stat">
                        <span class="software-stat-number">${stats.zones}</span>
                        <span class="software-stat-label">Zones</span>
                    </div>
                    <div class="software-stat">
                        <span class="software-stat-number">${stats.stations}</span>
                        <span class="software-stat-label">Stations</span>
                    </div>
                    <div class="software-stat">
                        <span class="software-stat-number">${stats.reports}</span>
                        <span class="software-stat-label">Reports</span>
                    </div>
                </div>
                <div style="margin-top: 1rem;">
                    <span style="background: #e8f0fe; color: #1a73e8; padding: 0.25rem 0.5rem; border-radius: 12px; font-size: 0.75rem;">
                        Search Result
                    </span>
                </div>
            </div>
        `;
        
        softwareGrid.appendChild(softwareCard);
    });
}

function filterSubscriptions() {
    const softwareFilter = document.getElementById('softwareFilter');
    const statusFilter = document.getElementById('statusFilter');
    
    if (!softwareFilter || !statusFilter) return;
    
    const selectedSoftware = softwareFilter.value;
    const selectedStatus = statusFilter.value;
    
    // Get all rows
    const rows = subscriptionsTableBody.querySelectorAll('tr');
    
    rows.forEach(row => {
        const softwareText = row.cells[1].textContent.trim();
        const statusElement = row.cells[7].querySelector('.status-badge');
        const status = statusElement.className.includes('valid') ? 'valid' : 
                      statusElement.className.includes('warning') ? 'warning' : 'expired';
        
        let showRow = true;
        
        if (selectedSoftware && !softwareText.includes(selectedSoftware)) {
            showRow = false;
        }
        
        if (selectedStatus && status !== selectedStatus) {
            showRow = false;
        }
        
        row.style.display = showRow ? '' : 'none';
    });
}

// Utility Functions
function adjustColor(color, amount) {
    const num = parseInt(color.replace("#", ""), 16);
    const amt = Math.round(2.55 * amount);
    const R = (num >> 16) + amt;
    const G = (num >> 8 & 0x00FF) + amt;
    const B = (num & 0x0000FF) + amt;
    return "#" + (0x1000000 + (R < 255 ? R < 1 ? 0 : R : 255) * 0x10000 +
        (G < 255 ? G < 1 ? 0 : G : 255) * 0x100 +
        (B < 255 ? B < 1 ? 0 : B : 255)).toString(16).slice(1);
}

// Action Functions
function showAddSoftwareModal() {
    addSoftware(); // Call the new enhanced addSoftware function
}

function showAddStationModal() {
    addStation(); // Call the new enhanced addStation function
}

function editSoftware(softwareKey) {
    // Open edit modal for specific software
    showToast(`Edit functionality for ${softwareKey} coming soon!`, 'info');
}

function viewSoftwareDetails(softwareKey) {
    // Navigate to detailed view
    showToast(`Detailed view for ${softwareKey} coming soon!`, 'info');
}

function manageSoftware(softwareKey) {
    // Open management interface
    showToast(`Management interface for ${softwareKey} coming soon!`, 'info');
}

function renewSubscription(stationName) {
    if (confirm(`Renew subscription for ${stationName}?\nThis would open a renewal form with:\n- New expiry date\n- Payment integration\n- Confirmation workflow`)) {
        showToast(`Subscription renewal initiated for ${stationName}`, 'success');
    }
}

function editSubscription(stationName) {
    // Open edit subscription modal
    showToast(`Edit subscription for ${stationName} coming soon!`, 'info');
}

function showBulkUpdateModal() {
    bulkUpdate(); // Call the new enhanced bulkUpdate function
}

function exportSubscriptions() {
    showToast('Subscription data exported successfully!', 'success');
}

function exportAllData() {
    showToast('Complete dashboard data exported successfully!', 'success');
}

function checkAllExpiry() {
    updateStatistics();
    renderExpiryTable();
    showToast('Expiry status refreshed!', 'info');
}

function resetDashboard() {
    if (confirm('Reset dashboard to factory defaults?\nThis will restore all original data and settings.')) {
        showToast('Dashboard reset to defaults!', 'warning');
    }
}

function clearAllData() {
    if (confirm('Clear all dashboard data?\nThis action cannot be undone!')) {
        showToast('All data cleared!', 'error');
    }
}

function showToast(message, type = 'success') {
    // Create toast element
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.style.cssText = `
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        background: ${type === 'success' ? '#10b981' : type === 'warning' ? '#f59e0b' : type === 'error' ? '#ef4444' : '#3b82f6'};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        z-index: 10000;
        animation: slideIn 0.3s ease;
    `;
    
    toast.innerHTML = `
        <div style="display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-${type === 'success' ? 'check' : type === 'warning' ? 'exclamation-triangle' : type === 'error' ? 'times' : 'info-circle'}"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(toast);
    
    // Remove toast after 3 seconds
    setTimeout(() => {
        toast.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, 3000);
}


// Add CSS animations for toast
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

function renderSoftwareContent(softwareKey) {
    const software = dashboardData.software[softwareKey];
    currentSoftware = softwareKey;
    
    contentTitle.textContent = software.name + ' - Structure & Reports';
    addZoneBtn.style.display = 'block';
    
    let content = '<div class="hierarchy-container">';
    
    Object.keys(software.zones).forEach(zoneKey => {
        const zone = software.zones[zoneKey];
        content += renderZoneCard(softwareKey, zoneKey, zone);
    });
    
    content += '</div>';
    contentBody.innerHTML = content;
    
    // Update active state
    document.querySelectorAll('.software-header').forEach(header => {
        header.classList.remove('active');
    });
    document.querySelector(`[data-software="${softwareKey}"]`).classList.add('active');
}

function renderZoneCard(softwareKey, zoneKey, zone) {
    let card = `
        <div class="zone-card fade-in">
            <div class="zone-header">
                <h3 class="zone-title">${zone.name}</h3>
                <div class="zone-actions">
                    <button class="icon-btn" onclick="addDivision('${softwareKey}', '${zoneKey}')" title="Add Division">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button class="icon-btn" onclick="editItem('zone', '${softwareKey}', '${zoneKey}')" title="Edit Zone">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="icon-btn" onclick="deleteItem('zone', '${softwareKey}', '${zoneKey}')" title="Delete Zone">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="zone-content">
                <div class="divisions-grid">
    `;
    
    Object.keys(zone.divisions).forEach(divisionKey => {
        const division = zone.divisions[divisionKey];
        card += renderDivisionCard(softwareKey, zoneKey, divisionKey, division);
    });
    
    card += `
                </div>
            </div>
        </div>
    `;
    
    return card;
}

function renderDivisionCard(softwareKey, zoneKey, divisionKey, division) {
    let card = `
        <div class="division-card">
            <div class="division-header">
                <h4 class="division-title">${division.name}</h4>
                <div class="zone-actions">
                    <button class="icon-btn" onclick="addStation('${softwareKey}', '${zoneKey}', '${divisionKey}')" title="Add Station">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button class="icon-btn" onclick="editItem('division', '${softwareKey}', '${zoneKey}', '${divisionKey}')" title="Edit Division">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="icon-btn" onclick="deleteItem('division', '${softwareKey}', '${zoneKey}', '${divisionKey}')" title="Delete Division">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="stations-list">
    `;
    
    Object.keys(division.stations).forEach(stationKey => {
        const station = division.stations[stationKey];
        card += renderStationItem(softwareKey, zoneKey, divisionKey, stationKey, station);
    });
    
    card += `
            </div>
        </div>
    `;
    
    return card;
}

function renderStationItem(softwareKey, zoneKey, divisionKey, stationKey, station) {
    const expiryStatus = getExpiryStatus(station.expiryDate);
    const formattedDate = formatDate(station.expiryDate);
    
    let item = `
        <div class="station-item">
            <div class="station-header">
                <span class="station-name">${station.name}</span>
                <div style="display: flex; gap: 0.5rem; align-items: center;">
                    <span class="expiry-date ${expiryStatus}">${formattedDate}</span>
                    <button class="icon-btn" onclick="addReport('${softwareKey}', '${zoneKey}', '${divisionKey}', '${stationKey}')" title="Add Report">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button class="icon-btn" onclick="editItem('station', '${softwareKey}', '${zoneKey}', '${divisionKey}', '${stationKey}')" title="Edit Station">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="icon-btn" onclick="deleteItem('station', '${softwareKey}', '${zoneKey}', '${divisionKey}', '${stationKey}')" title="Delete Station">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="reports-list">
    `;
    
    station.reports.forEach((report, index) => {
        item += `<span class="report-item" onclick="editReport('${softwareKey}', '${zoneKey}', '${divisionKey}', '${stationKey}', ${index})">${report}</span>`;
    });
    
    item += `
            </div>
        </div>
    `;
    
    return item;
}



// ...existing code...

// Make key functions globally available for HTML onclick handlers
window.showPage = showPage;
window.showAddSoftwareModal = showAddSoftwareModal;
window.showAddStationModal = showAddStationModal;
window.editSoftware = editSoftware;
window.viewSoftwareDetails = viewSoftwareDetails;
window.manageSoftware = manageSoftware;
window.renewSubscription = renewSubscription;
window.editSubscription = editSubscription;
window.showBulkUpdateModal = showBulkUpdateModal;
window.exportSubscriptions = exportSubscriptions;
window.exportAllData = exportAllData;
window.checkAllExpiry = checkAllExpiry;
window.resetDashboard = resetDashboard;
window.clearAllData = clearAllData;
// Add any other functions that need to be called from HTML here

function setupEventListeners() {
    // Software list click handler
    softwareList.addEventListener('click', function(e) {
        const softwareHeader = e.target.closest('.software-header');
        if (softwareHeader) {
            const softwareKey = softwareHeader.dataset.software;
            renderSoftwareContent(softwareKey);
        }
    });
    
    // Search functionality
    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        performSearch(searchTerm);
    });
    
    // Add zone button
    addZoneBtn.addEventListener('click', function() {
        if (currentSoftware) {
            addZone(currentSoftware);
        }
    });
    
    // Add software button
    addSoftwareBtn.addEventListener('click', function() {
        addSoftware();
    });
    
    // Export data button
    exportDataBtn.addEventListener('click', function() {
        exportData();
    });
    
    // Modal event listeners
    closeModal.addEventListener('click', closeModalHandler);
    cancelBtn.addEventListener('click', closeModalHandler);
    dataForm.addEventListener('submit', handleFormSubmit);
    
    // Toast close
    toastClose.addEventListener('click', function() {
        toast.style.display = 'none';
    });
    
    // Expiry alert close
    closeExpiryAlert.addEventListener('click', function() {
        expiryAlert.style.display = 'none';
    });
    
    // Modal background click
    window.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModalHandler();
        }
        if (e.target === expiryAlert) {
            expiryAlert.style.display = 'none';
        }
    });
}

function performSearch(searchTerm) {
    if (!searchTerm) {
        if (currentSoftware) {
            renderSoftwareContent(currentSoftware);
        }
        return;
    }
    
    const results = [];
    
    Object.entries(dashboardData.software).forEach(([softwareKey, software]) => {
        Object.entries(software.zones).forEach(([zoneKey, zone]) => {
            Object.entries(zone.divisions).forEach(([divisionKey, division]) => {
                Object.entries(division.stations).forEach(([stationKey, station]) => {
                    // Search in zone, division, station names and reports
                    const searchableText = `${zone.name} ${division.name} ${station.name} ${station.reports.join(' ')}`.toLowerCase();
                    
                    if (searchableText.includes(searchTerm)) {
                        results.push({
                            software: software.name,
                            softwareKey,
                            zone: zone.name,
                            zoneKey,
                            division: division.name,
                            divisionKey,
                            station: station.name,
                            stationKey,
                            reports: station.reports,
                            expiryDate: station.expiryDate
                        });
                    }
                });
            });
        });
    });
    
    renderSearchResults(results, searchTerm);
}

function renderSearchResults(results, searchTerm) {
    contentTitle.textContent = `Search Results for "${searchTerm}"`;
    addZoneBtn.style.display = 'none';
    
    if (results.length === 0) {
        contentBody.innerHTML = `
            <div class="welcome-message">
                <i class="fas fa-search"></i>
                <p>No results found for "${searchTerm}"</p>
            </div>
        `;
        return;
    }
    
    let content = '<div class="hierarchy-container">';
    
    results.forEach(result => {
        const expiryStatus = getExpiryStatus(result.expiryDate);
        const formattedDate = formatDate(result.expiryDate);
        
        content += `
            <div class="zone-card fade-in">
                <div class="zone-header">
                    <h3 class="zone-title">${result.software} - ${result.zone} > ${result.division} > ${result.station}</h3>
                </div>
                <div class="zone-content">
                    <div class="station-item">
                        <div class="station-header">
                            <span class="station-name">${result.station}</span>
                            <span class="expiry-date ${expiryStatus}">${formattedDate}</span>
                        </div>
                        <div class="reports-list">
                            ${result.reports.map(report => `<span class="report-item">${report}</span>`).join('')}
                        </div>
                    </div>
                </div>
            </div>
        `;
    });
    
    content += '</div>';
    contentBody.innerHTML = content;
}

// CRUD Operations
function addSoftware() {
    openModal('addSoftwareModal');
}

function addZone(softwareKey) {
    currentAction = { type: 'add', level: 'zone' };
    currentPath = { software: softwareKey };
    
    modalTitle.textContent = 'Add New Zone';
    itemName.value = '';
    itemName.placeholder = 'Enter zone name (e.g., North Zone)';
    expiryGroup.style.display = 'none';
    parentGroup.style.display = 'none';
    
    modal.style.display = 'block';
}

function addDivision(softwareKey, zoneKey) {
    currentAction = { type: 'add', level: 'division' };
    currentPath = { software: softwareKey, zone: zoneKey };
    
    modalTitle.textContent = 'Add New Division';
    itemName.value = '';
    itemName.placeholder = 'Enter division name (e.g., Delhi Division)';
    expiryGroup.style.display = 'none';
    parentGroup.style.display = 'none';
    
    modal.style.display = 'block';
}

function addStation(softwareKey, zoneKey, divisionKey) {
    currentAction = { type: 'add', level: 'station' };
    currentPath = { software: softwareKey, zone: zoneKey, division: divisionKey };
    
    modalTitle.textContent = 'Add New Station';
    itemName.value = '';
    itemName.placeholder = 'Enter station name (e.g., New Delhi)';
    expiryGroup.style.display = 'block';
    expiryDate.value = '';
    parentGroup.style.display = 'none';
    
    modal.style.display = 'block';
}

function addReport(softwareKey, zoneKey, divisionKey, stationKey) {
    currentAction = { type: 'add', level: 'report' };
    currentPath = { software: softwareKey, zone: zoneKey, division: divisionKey, station: stationKey };
    
    modalTitle.textContent = 'Add New Report';
    itemName.value = '';
    itemName.placeholder = 'Enter report name (e.g., Passenger Count)';
    expiryGroup.style.display = 'none';
    parentGroup.style.display = 'none';
    
    modal.style.display = 'block';
}

function editItem(level, softwareKey, zoneKey, divisionKey, stationKey) {
    currentAction = { type: 'edit', level: level };
    currentPath = { software: softwareKey, zone: zoneKey, division: divisionKey, station: stationKey };
    
    let item;
    switch (level) {
        case 'zone':
            item = dashboardData.software[softwareKey].zones[zoneKey];
            break;
        case 'division':
            item = dashboardData.software[softwareKey].zones[zoneKey].divisions[divisionKey];
            break;
        case 'station':
            item = dashboardData.software[softwareKey].zones[zoneKey].divisions[divisionKey].stations[stationKey];
            break;
    }
    
    modalTitle.textContent = `Edit ${level.charAt(0).toUpperCase() + level.slice(1)}`;
    itemName.value = item.name;
    
    if (level === 'station') {
        expiryGroup.style.display = 'block';
        expiryDate.value = item.expiryDate || '';
    } else {
        expiryGroup.style.display = 'none';
    }
    
    parentGroup.style.display = 'none';
    modal.style.display = 'block';
}

function editReport(softwareKey, zoneKey, divisionKey, stationKey, reportIndex) {
    const station = dashboardData.software[softwareKey].zones[zoneKey].divisions[divisionKey].stations[stationKey];
    const reportName = station.reports[reportIndex];
    
    currentAction = { type: 'edit', level: 'report', reportIndex: reportIndex };
    currentPath = { software: softwareKey, zone: zoneKey, division: divisionKey, station: stationKey };
    
    modalTitle.textContent = 'Edit Report';
    itemName.value = reportName;
    expiryGroup.style.display = 'none';
    parentGroup.style.display = 'none';
    
    modal.style.display = 'block';
}

function deleteItem(level, softwareKey, zoneKey, divisionKey, stationKey) {
    if (!confirm(`Are you sure you want to delete this ${level}? This action cannot be undone.`)) {
        return;
    }
    
    try {
        switch (level) {
            case 'zone':
                delete dashboardData.software[softwareKey].zones[zoneKey];
                break;
            case 'division':
                delete dashboardData.software[softwareKey].zones[zoneKey].divisions[divisionKey];
                break;
            case 'station':
                delete dashboardData.software[softwareKey].zones[zoneKey].divisions[divisionKey].stations[stationKey];
                break;
        }
        
        renderSoftwareContent(currentSoftware);
        updateStats();
        saveToLocalStorage();
        showToast(`${level.charAt(0).toUpperCase() + level.slice(1)} deleted successfully!`, 'success');
    } catch (error) {
        showToast('Error deleting item. Please try again.', 'error');
    }
}

function handleFormSubmit(e) {
    e.preventDefault();
    
    const name = itemName.value.trim();
    if (!name) {
        showToast('Please enter a name', 'error');
        return;
    }
    
    try {
        if (currentAction.type === 'add') {
            handleAdd(name);
        } else if (currentAction.type === 'edit') {
            handleEdit(name);
        }
        
        closeModalHandler();
        updateStats();
        saveToLocalStorage();
        showToast(`${currentAction.level.charAt(0).toUpperCase() + currentAction.level.slice(1)} ${currentAction.type === 'add' ? 'added' : 'updated'} successfully!`, 'success');
    } catch (error) {
        showToast('Error saving data. Please try again.', 'error');
    }
}

function handleAdd(name) {
    const key = name.toLowerCase().replace(/\s+/g, '-');
    
    switch (currentAction.level) {
        case 'software':
            dashboardData.software[key] = {
                name: name,
                zones: {}
            };
            renderSoftwareList();
            break;
            
        case 'zone':
            dashboardData.software[currentPath.software].zones[key] = {
                name: name,
                divisions: {}
            };
            renderSoftwareContent(currentPath.software);
            break;
            
        case 'division':
            dashboardData.software[currentPath.software].zones[currentPath.zone].divisions[key] = {
                name: name,
                stations: {}
            };
            renderSoftwareContent(currentPath.software);
            break;
            
        case 'station':
            const station = {
                name: name,
                expiryDate: expiryDate.value || null,
                reports: []
            };
            dashboardData.software[currentPath.software].zones[currentPath.zone].divisions[currentPath.division].stations[key] = station;
            renderSoftwareContent(currentPath.software);
            break;
            
        case 'report':
            const stationObj = dashboardData.software[currentPath.software].zones[currentPath.zone].divisions[currentPath.division].stations[currentPath.station];
            stationObj.reports.push(name);
            renderSoftwareContent(currentPath.software);
            break;
    }
}

function handleEdit(name) {
    switch (currentAction.level) {
        case 'zone':
            dashboardData.software[currentPath.software].zones[currentPath.zone].name = name;
            break;
            
        case 'division':
            dashboardData.software[currentPath.software].zones[currentPath.zone].divisions[currentPath.division].name = name;
            break;
            
        case 'station':
            const station = dashboardData.software[currentPath.software].zones[currentPath.zone].divisions[currentPath.division].stations[currentPath.station];
            station.name = name;
            station.expiryDate = expiryDate.value || null;
            break;
            
        case 'report':
            const stationObj = dashboardData.software[currentPath.software].zones[currentPath.zone].divisions[currentPath.division].stations[currentPath.station];
            stationObj.reports[currentAction.reportIndex] = name;
            break;
    }
    
    renderSoftwareContent(currentPath.software);
}

function closeModalHandler() {
    modal.style.display = 'none';
    currentAction = null;
    currentPath = {};
    dataForm.reset();
}

function showToast(message, type = 'success') {
    toastMessage.textContent = message;
    toast.className = `toast ${type}`;
    toast.style.display = 'flex';
    
    setTimeout(() => {
        toast.style.display = 'none';
    }, 3000);
}

function exportData() {
    const dataStr = JSON.stringify(dashboardData, null, 2);
    const dataBlob = new Blob([dataStr], { type: 'application/json' });
    const url = URL.createObjectURL(dataBlob);
    
    const link = document.createElement('a');
    link.href = url;
    link.download = 'beatle-analytics-dashboard-data.json';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    
    URL.revokeObjectURL(url);
    showToast('Data exported successfully!', 'success');
}

function saveToLocalStorage() {
    try {
        localStorage.setItem('beatleAnalyticsDashboard', JSON.stringify(dashboardData));
    } catch (error) {
        console.warn('Could not save to localStorage:', error);
    }
}

// Enhanced Modal Management Functions
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}

// Enhanced Dashboard Management Functions
function addStation() {
    openModal('addStationModal');
    // No JS population: use PHP-generated dropdowns for correct IDs
}

function bulkUpdate() {
    openModal('bulkUpdateModal');
    populateBulkStationList();
    
    // Initialize bulk update state
    window.bulkUpdateState = {
        currentTab: 'select',
        selectedStations: [],
        updateData: {}
    };
}

function generateReport() {
    openModal('generateReportModal');
    
    // Set default dates
    const today = new Date();
    const lastMonth = new Date(today.getFullYear(), today.getMonth() - 1, today.getDate());
    
    document.getElementById('reportDateFrom').value = lastMonth.toISOString().split('T')[0];
    document.getElementById('reportDateTo').value = today.toISOString().split('T')[0];
    
    // Handle form submission
    const form = document.getElementById('generateReportForm');
    form.onsubmit = function(e) {
        e.preventDefault();
        
        const reportType = document.querySelector('input[name="reportType"]:checked').value;
        const dateFrom = document.getElementById('reportDateFrom').value;
        const dateTo = document.getElementById('reportDateTo').value;
        const softwareFilter = Array.from(document.getElementById('reportSoftware').selectedOptions).map(o => o.value);
        const format = document.getElementById('reportFormat').value;
        const sections = Array.from(document.querySelectorAll('input[name="sections"]:checked')).map(cb => cb.value);
        
        // Simulate report generation
        showProgressModal('Generating Report...', async () => {
            await simulateProgress(3000);
            
            // Create download link
            const reportData = generateReportData(reportType, dateFrom, dateTo, softwareFilter, sections);
            downloadReport(reportData, format, reportType);
            
            showToast('Report generated successfully!', 'success');
            closeModal('generateReportModal');
        });
    };
}

// Bulk Update Functions
function switchBulkTab(tabName) {
    // Update tab buttons
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    // Update tab content
    document.querySelectorAll('.bulk-tab').forEach(tab => tab.classList.remove('active'));
    document.getElementById(`bulk${tabName.charAt(0).toUpperCase() + tabName.slice(1)}Tab`).classList.add('active');
    
    window.bulkUpdateState.currentTab = tabName;
    
    // Update navigation buttons
    const nextBtn = document.getElementById('bulkNextBtn');
    const executeBtn = document.getElementById('bulkExecuteBtn');
    
    if (tabName === 'preview') {
        nextBtn.style.display = 'none';
        executeBtn.style.display = 'inline-block';
        generateBulkPreview();
    } else {
        nextBtn.style.display = 'inline-block';
        executeBtn.style.display = 'none';
    }
}

function nextBulkStep() {
    const state = window.bulkUpdateState;
    
    if (state.currentTab === 'select') {
        if (state.selectedStations.length === 0) {
            showToast('Please select at least one station', 'warning');
            return;
        }
        switchBulkTab('update');
    } else if (state.currentTab === 'update') {
        // Validate update data
        const expiryDate = document.getElementById('bulkExpiryDate').value;
        const extendMonths = document.getElementById('extendSubscription').checked ? 
            document.getElementById('extendMonths').value : null;
        
        if (!expiryDate && !extendMonths) {
            showToast('Please specify either a new expiry date or extension period', 'warning');
            return;
        }
        
        state.updateData = {
            expiryDate,
            extendMonths,
            notes: document.getElementById('bulkNotes').value
        };
        
        switchBulkTab('preview');
    }
}

function executeBulkUpdate() {
    const state = window.bulkUpdateState;
    
    showProgressModal('Updating Subscriptions...', async () => {
        await simulateProgress(2000);
        
        // Apply updates
        state.selectedStations.forEach(station => {
            console.log('Updating station:', station);
        });
        
        showToast(`Successfully updated ${state.selectedStations.length} stations`, 'success');
        closeModal('bulkUpdateModal');
    });
}
// Helper Functions
function populateZoneDropdown() {
    const zoneSelect = document.getElementById('stationZone');
    // Clear previous options
    zoneSelect.innerHTML = `
      <option value="">Select Zone</option>
      <option value="CR">Central Railway</option>
      <option value="ER">Eastern Railway</option>
      <option value="ECR">East Central Railway</option>
      <option value="ECoR">East Coast Railway</option>
      <option value="NR">Northern Railway</option>
      <option value="NCR">North Central Railway</option>
      <option value="NER">North Eastern Railway</option>
      <option value="NFR">Northeast Frontier Railway</option>
      <option value="NWR">North Western Railway</option>
      <option value="SCR">South Central Railway</option>
      <option value="SCoR">South Coast Railway</option>
      <option value="SECR">South East Central Railway</option>
      <option value="SER">South Eastern Railway</option>
      <option value="SWR">South Western Railway</option>
      <option value="SR">Southern Railway</option>
      <option value="WCR">West Central Railway</option>
      <option value="WR">Western Railway</option>
      <option value="MR">Metro Railway, Kolkata</option>
      <option value="KRCL">Konkan Railway</option>
    `;
}

function populateDivisionDropdown() {
    const zoneSelect = document.getElementById('stationZone');
    const divisionSelect = document.getElementById('stationDivision');
    const selectedZone = zoneSelect.value;

    // Map of zones to their divisions
    const zoneDivisionsMap = {
        "CR": ["Mumbai", "Bhusawal", "Pune", "Nagpur", "Solapur"],
        "ER": ["Howrah", "Sealdah", "Asansol", "Malda"],
        "ECR": ["Danapur", "Dhanbad", "Pandit Deen Dayal Upadhyaya", "Samastipur", "Sonpur"],
        "ECoR": ["Khurda Road", "Sambalpur", "Waltair"],
        "NR": ["Delhi", "Ambala", "Firozpur", "Lucknow NR", "Moradabad"],
        "NCR": ["Prayagraj", "Agra", "Jhansi"],
        "NER": ["Izzatnagar", "Lucknow NER", "Varanasi"],
        "NFR": ["Alipurduar", "Katihar", "Lumding", "Rangiya", "Tinsukia"],
        "NWR": ["Jaipur", "Ajmer", "Bikaner", "Jodhpur"],
        "SCR": ["Secunderabad", "Hyderabad", "Vijayawada", "Guntur", "Guntakal", "Nanded"],
        "SCoR": ["Visakhapatnam"],
        "SECR": ["Bilaspur", "Raipur", "Nagpur SECR"],
        "SER": ["Adra", "Chakradharpur", "Kharagpur", "Ranchi"],
        "SWR": ["Bengaluru", "Hubballi", "Mysuru"],
        "SR": ["Chennai", "Salem", "Tiruchirappalli", "Madurai", "Palakkad", "Thiruvananthapuram"],
        "WCR": ["Bhopal", "Jabalpur", "Kota"],
        "WR": ["Mumbai WR", "Ahmedabad", "Vadodara", "Ratlam", "Rajkot", "Bhavnagar"],
        "MR": ["Kolkata Metro"],
        "KRCL": []
    };

    divisionSelect.innerHTML = '<option value="">Select Division</option>';

    if (selectedZone && zoneDivisionsMap[selectedZone]) {
        zoneDivisionsMap[selectedZone].forEach(division => {
            divisionSelect.innerHTML += `<option value="${division}">${division}</option>`;
        });
    }
}

// Automatically update divisions when zone changes
document.addEventListener('DOMContentLoaded', function() {
    const zoneSelect = document.getElementById('stationZone');
    if (zoneSelect) {
        zoneSelect.addEventListener('change', populateDivisionDropdown);
    }
});

const allDivisions = [
  "Mumbai", "Bhusawal", "Pune", "Nagpur", "Solapur",
  "Howrah", "Sealdah", "Asansol", "Malda",
  "Danapur", "Dhanbad", "Pandit Deen Dayal Upadhyaya", "Samastipur", "Sonpur",
  "Khurda Road", "Sambalpur", "Waltair",
  "Delhi", "Ambala", "Firozpur", "Lucknow NR", "Moradabad",
  "Prayagraj", "Agra", "Jhansi",
  "Izzatnagar", "Lucknow NER", "Varanasi",
  "Jaipur", "Ajmer", "Bikaner", "Jodhpur",
  "Alipurduar", "Katihar", "Lumding", "Rangiya", "Tinsukia",
  "Secunderabad", "Hyderabad", "Vijayawada", "Guntur", "Guntakal", "Nanded",
  "Visakhapatnam",
  "Adra", "Chakradharpur", "Kharagpur", "Ranchi",
  "Bilaspur", "Raipur", "Nagpur SECR",
  "Chennai", "Salem", "Tiruchirappalli", "Madurai", "Palakkad", "Thiruvananthapuram",
  "Bengaluru", "Hubballi", "Mysuru",
  "Mumbai WR", "Ahmedabad", "Vadodara", "Ratlam", "Rajkot", "Bhavnagar",
  "Bhopal", "Jabalpur", "Kota",
  "Kolkata Metro"
];


function populateBulkStationList() {
    const container = document.getElementById('bulkStationList');
    let html = '';
    
    Object.entries(DASHBOARD_DATA).forEach(([software, data]) => {
        Object.entries(data.zones || {}).forEach(([zone, zoneData]) => {
            Object.entries(zoneData.divisions || {}).forEach(([division, divisionData]) => {
                (divisionData.stations || []).forEach(station => {
                    const status = getSubscriptionStatus(station.expiry);
                    html += `
                        <div class="station-item">
                            <input type="checkbox" value="${software}-${zone}-${division}-${station.code}" 
                                   onchange="toggleStationSelection(this)">
                            <div class="station-info">
                                <strong>${station.name}</strong> (${station.code})
                                <br><small>${software} - ${zone} > ${division}</small>
                                <br><span class="status ${status.class}">${status.text}</span>
                            </div>
                        </div>
                    `;
                });
            });
        });
    });
    
    container.innerHTML = html;
}

function toggleStationSelection(checkbox) {
    const state = window.bulkUpdateState;
    
    if (checkbox.checked) {
        state.selectedStations.push(checkbox.value);
    } else {
        const index = state.selectedStations.indexOf(checkbox.value);
        if (index > -1) {
            state.selectedStations.splice(index, 1);
        }
    }
}

function generateBulkPreview() {
    const state = window.bulkUpdateState;
    const container = document.getElementById('previewSummary');
    
    let html = `
        <h4>Update Summary</h4>
        <p><strong>Selected Stations:</strong> ${state.selectedStations.length}</p>
        <p><strong>Update Type:</strong> ${state.updateData.expiryDate ? 'Set Expiry Date' : 'Extend Subscription'}</p>
    `;
    
    if (state.updateData.expiryDate) {
        html += `<p><strong>New Expiry Date:</strong> ${state.updateData.expiryDate}</p>`;
    }
    
    if (state.updateData.extendMonths) {
        html += `<p><strong>Extension Period:</strong> ${state.updateData.extendMonths} months</p>`;
    }
    
    if (state.updateData.notes) {
        html += `<p><strong>Notes:</strong> ${state.updateData.notes}</p>`;
    }
    
    container.innerHTML = html;
}

// Report Generation Functions
function generateReportData(type, dateFrom, dateTo, softwareFilter, sections) {
    const data = {
        type,
        dateRange: { from: dateFrom, to: dateTo },
        software: softwareFilter,
        sections,
        generatedAt: new Date().toISOString(),
        data: {}
    };
    
    // Generate sample data based on type
    switch (type) {
        case 'subscription':
            data.data = generateSubscriptionReportData();
            break;
        case 'analytics':
            data.data = generateAnalyticsReportData();
            break;
        case 'maintenance':
            data.data = generateMaintenanceReportData();
            break;
    }
    
    return data;
}

function downloadReport(data, format, type) {
    const timestamp = new Date().toISOString().slice(0, 19).replace(/:/g, '-');
    const filename = `${type}_report_${timestamp}`;
    
    let content, mimeType;
    
    switch (format) {
        case 'json':
            content = JSON.stringify(data, null, 2);
            mimeType = 'application/json';
            break;
        case 'csv':
            content = convertToCSV(data);
            mimeType = 'text/csv';
            break;
        default:
            content = JSON.stringify(data, null, 2);
            mimeType = 'application/json';
    }
    
    const blob = new Blob([content], { type: mimeType });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `${filename}.${format === 'json' ? 'json' : 'csv'}`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    window.URL.revokeObjectURL(url);
}

// Utility Functions
function showProgressModal(message, action) {
    const modal = document.createElement('div');
    modal.className = 'modal';
    modal.style.display = 'block';
    modal.innerHTML = `
        <div class="modal-content" style="max-width: 400px; text-align: center;">
            <div class="modal-body">
                <i class="fas fa-spinner fa-spin" style="font-size: 2rem; color: #1a73e8; margin-bottom: 1rem;"></i>
                <h3>${message}</h3>
                <div class="progress-bar">
                    <div class="progress-fill" id="progressFill" style="width: 0%;"></div>
                </div>
                <p id="progressText">0%</p>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    action().then(() => {
        document.body.removeChild(modal);
    });
}

function simulateProgress(duration) {
    return new Promise(resolve => {
        let progress = 0;
        const interval = setInterval(() => {
            progress += Math.random() * 10;
            if (progress >= 100) {
                progress = 100;
                clearInterval(interval);
                resolve();
            }
            
            const progressFill = document.getElementById('progressFill');
            const progressText = document.getElementById('progressText');
            
            if (progressFill) progressFill.style.width = `${progress}%`;
            if (progressText) progressText.textContent = `${Math.round(progress)}%`;
        }, duration / 20);
    });
}

function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.innerHTML = `
        <span>${message}</span>
        <span onclick="this.parentElement.remove()" style="cursor: pointer; margin-left: 10px;">&times;</span>
    `;
    
    document.body.appendChild(toast);
    toast.style.display = 'flex';
    
    setTimeout(() => {
        if (toast.parentElement) {
            toast.remove();
        }
    }, 5000);
}

// Sample data generators
function generateSubscriptionReportData() {
    return {
        totalStations: 156,
        activeSubscriptions: 134,
        expiredSubscriptions: 12,
        expiringWithin30Days: 10,
        byStatus: {
            active: 134,
            expired: 12,
            expiring: 10
        }
    };
}

function generateAnalyticsReportData() {
    return {
        totalUsage: 45672,
        averageDaily: 1522,
        peakUsage: 3456,
        systemUptime: 99.8,
        errorRate: 0.12
    };
}

function generateMaintenanceReportData() {
    return {
        scheduledMaintenance: 24,
        completedMaintenance: 22,
        pendingIssues: 5,
        systemHealth: 95.2
    };
}

function convertToCSV(data) {
    // Simple CSV conversion for sample data
    return Object.entries(data.data)
        .map(([key, value]) => `${key},${value}`)
        .join('\n');
}

function loadFromLocalStorage() {
    try {
        const saved = localStorage.getItem('beatleAnalyticsDashboard');
        if (saved) {
            dashboardData = JSON.parse(saved);
            return true;
        }
    } catch (error) {
        console.warn('Could not load from localStorage:', error);
    }
    return false;
}

// Load saved data on page load
if (loadFromLocalStorage()) {
    console.log('Loaded data from localStorage');
}
