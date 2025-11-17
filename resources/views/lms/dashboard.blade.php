<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Learning Adventure 🚀</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Fredoka', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #5b4e18 0%, #e8b73c 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 260px;
            background: linear-gradient(180deg, #4F46E5 0%, #7C3AED 100%);
            transition: transform 0.3s ease;
            z-index: 1000;
            box-shadow: 4px 0 20px rgba(0,0,0,0.1);
        }
        
        .sidebar.closed {
            transform: translateX(-100%);
        }
        
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: none;
            z-index: 999;
        }
        
        .sidebar-overlay.active {
            display: block;
        }
        
        .main-content {
            margin-left: 260px;
            transition: margin-left 0.3s ease;
            padding: 20px;
        }
        
        .main-content.expanded {
            margin-left: 0;
        }
        
        .topbar {
            background: white;
            border-radius: 20px;
            padding: 15px 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 25px;
        }
        
        .program-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            border: 3px solid transparent;
        }
        
        .program-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.15);
            border-color: #4F46E5;
        }
        
        .sidebar-item {
            color: white;
            padding: 12px 20px;
            margin: 8px 15px;
            border-radius: 12px;
            transition: all 0.3s;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .sidebar-item:hover, .sidebar-item.active {
            background: rgba(255,255,255,0.2);
            transform: translateX(5px);
        }
        
        .progress-bar {
            height: 10px;
            border-radius: 10px;
            background: #E0E7FF;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #4F46E5, #7C3AED);
            border-radius: 10px;
            transition: width 0.5s ease;
        }
        
        .badge-item {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            background: linear-gradient(135deg, #FCD34D, #F59E0B);
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
            transition: transform 0.3s;
        }
        
        .badge-item:hover {
            transform: scale(1.1) rotate(5deg);
        }
        
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 280px;
                transform: translateX(-100%);
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
        
        .emoji-bounce {
            display: inline-block;
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .profile-dropdown {
            position: relative;
        }
        
        .dropdown-menu-custom {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            padding: 10px;
            min-width: 200px;
            display: none;
            z-index: 1001;
        }
        
        .dropdown-menu-custom.show {
            display: block;
        }
        
        .dropdown-item-custom {
            padding: 10px 15px;
            border-radius: 8px;
            transition: background 0.2s;
            cursor: pointer;
        }
        
        .dropdown-item-custom:hover {
            background: #F3F4F6;
        }
    </style>
</head>
<body>
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="p-4 text-center border-b border-white border-opacity-20">
            <h2 class="text-white text-2xl font-bold mb-1">🎓 LearnHub</h2>
            <p class="text-white text-opacity-80 text-sm">Kids Edition</p>
        </div>
        
        <div class="mt-4">
            <div class="sidebar-item active">
                <span class="text-xl">🏠</span>
                <span>Dashboard</span>
            </div>
            <div class="sidebar-item">
                <span class="text-xl">📚</span>
                <span>My Courses</span>
            </div>
            <div class="sidebar-item">
                <span class="text-xl">📝</span>
                <span>Assignments</span>
            </div>
            <div class="sidebar-item">
                <span class="text-xl">🏆</span>
                <span>Achievements</span>
            </div>
            <div class="sidebar-item">
                <span class="text-xl">📅</span>
                <span>Calendar</span>
            </div>
            <div class="sidebar-item">
                <span class="text-xl">💬</span>
                <span>Messages</span>
            </div>
            <div class="sidebar-item">
                <span class="text-xl">⚙️</span>
                <span>Settings</span>
            </div>
        </div>
        
        <div class="absolute bottom-0 left-0 right-0 p-4 text-center">
            <div class="bg-white bg-opacity-20 rounded-lg p-3">
                <p class="text-white text-sm">Need help? 🤔</p>
                <button class="bg-white text-purple-600 px-4 py-2 rounded-lg text-sm font-semibold mt-2 hover:bg-opacity-90">
                    Ask Teacher
                </button>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Topbar -->
        <div class="topbar d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light rounded-circle p-2" id="toggleSidebar" style="width: 45px; height: 45px;">
                    <span style="font-size: 20px;">☰</span>
                </button>
                <div>
                    <h4 class="mb-0 fw-bold" style="color: #4F46E5;">Welcome back, Alex! <span class="emoji-bounce">👋</span></h4>
                    <p class="mb-0 text-muted small">Ready to learn something new today?</p>
                </div>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light rounded-circle p-2 position-relative" style="width: 45px; height: 45px;">
                    <span style="font-size: 20px;">🔔</span>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">3</span>
                </button>
                
                <div class="profile-dropdown">
                    <button class="btn btn-light rounded-pill d-flex align-items-center gap-2 px-3" id="profileBtn">
                        <div style="width: 35px; height: 35px; background: linear-gradient(135deg, #4F46E5, #7C3AED); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                            A
                        </div>
                        <span class="fw-semibold d-none d-md-inline">Alex</span>
                        <span style="font-size: 12px;">▼</span>
                    </button>
                    
                    <div class="dropdown-menu-custom" id="profileDropdown">
                        <div class="dropdown-item-custom">
                            <span class="me-2">👤</span> My Profile
                        </div>
                        <div class="dropdown-item-custom">
                            <span class="me-2">⚙️</span> Settings
                        </div>
                        <div class="dropdown-item-custom">
                            <span class="me-2">❓</span> Help
                        </div>
                        <hr class="my-2">
                        <div class="dropdown-item-custom text-danger">
                            <span class="me-2">🚪</span> Logout
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span style="font-size: 32px;">📚</span>
                        <span class="badge bg-primary rounded-pill">Active</span>
                    </div>
                    <h3 class="fw-bold mb-0" style="color: #4F46E5;">5</h3>
                    <p class="text-muted mb-0 small">Enrolled Courses</p>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span style="font-size: 32px;">✅</span>
                        <span class="badge bg-success rounded-pill">Done</span>
                    </div>
                    <h3 class="fw-bold mb-0" style="color: #10B981;">12</h3>
                    <p class="text-muted mb-0 small">Completed Tasks</p>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span style="font-size: 32px;">⭐</span>
                        <span class="badge bg-warning rounded-pill">Earned</span>
                    </div>
                    <h3 class="fw-bold mb-0" style="color: #F59E0B;">850</h3>
                    <p class="text-muted mb-0 small">Total Points</p>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span style="font-size: 32px;">🔥</span>
                        <span class="badge bg-danger rounded-pill">Streak</span>
                    </div>
                    <h3 class="fw-bold mb-0" style="color: #EF4444;">7</h3>
                    <p class="text-muted mb-0 small">Days in a Row</p>
                </div>
            </div>
        </div>
        
        <!-- My Programs Section -->
        <div class="mb-4">
            <h3 class="fw-bold mb-3" style="color: white;">📖 My Programs</h3>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <div class="program-card">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #10B981, #059669); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                                🧮
                            </div>
                            <span class="badge bg-success">Active</span>
                        </div>
                        <h5 class="fw-bold mb-2">Math Adventure</h5>
                        <p class="text-muted small mb-3">Learn numbers, shapes, and problem solving!</p>
                        <div class="progress-bar mb-2">
                            <div class="progress-fill" style="width: 75%"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-muted">75% Complete</span>
                            <span class="small fw-semibold" style="color: #10B981;">15/20 Lessons</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="program-card">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #3B82F6, #2563EB); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                                🔬
                            </div>
                            <span class="badge bg-primary">Active</span>
                        </div>
                        <h5 class="fw-bold mb-2">Science Explorers</h5>
                        <p class="text-muted small mb-3">Discover the wonders of science experiments!</p>
                        <div class="progress-bar mb-2">
                            <div class="progress-fill" style="width: 60%"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-muted">60% Complete</span>
                            <span class="small fw-semibold" style="color: #3B82F6;">9/15 Lessons</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="program-card">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #F59E0B, #D97706); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                                📖
                            </div>
                            <span class="badge bg-warning">Active</span>
                        </div>
                        <h5 class="fw-bold mb-2">Reading Rockets</h5>
                        <p class="text-muted small mb-3">Improve your reading and vocabulary skills!</p>
                        <div class="progress-bar mb-2">
                            <div class="progress-fill" style="width: 40%"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-muted">40% Complete</span>
                            <span class="small fw-semibold" style="color: #F59E0B;">8/20 Lessons</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="program-card">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #8B5CF6, #7C3AED); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                                🎨
                            </div>
                            <span class="badge bg-info">Active</span>
                        </div>
                        <h5 class="fw-bold mb-2">Creative Arts</h5>
                        <p class="text-muted small mb-3">Express yourself through art and creativity!</p>
                        <div class="progress-bar mb-2">
                            <div class="progress-fill" style="width: 85%"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-muted">85% Complete</span>
                            <span class="small fw-semibold" style="color: #8B5CF6;">17/20 Lessons</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="program-card">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #EC4899, #DB2777); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px;">
                                🎵
                            </div>
                            <span class="badge bg-danger">Active</span>
                        </div>
                        <h5 class="fw-bold mb-2">Music Makers</h5>
                        <p class="text-muted small mb-3">Learn rhythm, melody, and instruments!</p>
                        <div class="progress-bar mb-2">
                            <div class="progress-fill" style="width: 30%"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="small text-muted">30% Complete</span>
                            <span class="small fw-semibold" style="color: #EC4899;">3/10 Lessons</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Section -->
        <div class="row g-3">
            <div class="col-lg-8">
                <div class="stat-card">
                    <h5 class="fw-bold mb-3">📅 Upcoming Assignments</h5>
                    <div class="d-flex align-items-center justify-content-between p-3 mb-2" style="background: #F3F4F6; border-radius: 12px;">
                        <div class="d-flex align-items-center gap-3">
                            <span style="font-size: 24px;">📝</span>
                            <div>
                                <p class="mb-0 fw-semibold">Math Quiz - Chapter 5</p>
                                <p class="mb-0 text-muted small">Due: Tomorrow</p>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-primary rounded-pill">Start</button>
                    </div>
                    
                    <div class="d-flex align-items-center justify-content-between p-3 mb-2" style="background: #F3F4F6; border-radius: 12px;">
                        <div class="d-flex align-items-center gap-3">
                            <span style="font-size: 24px;">🔬</span>
                            <div>
                                <p class="mb-0 fw-semibold">Science Project</p>
                                <p class="mb-0 text-muted small">Due: In 3 days</p>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-outline-primary rounded-pill">View</button>
                    </div>
                    
                    <div class="d-flex align-items-center justify-content-between p-3" style="background: #F3F4F6; border-radius: 12px;">
                        <div class="d-flex align-items-center gap-3">
                            <span style="font-size: 24px;">📖</span>
                            <div>
                                <p class="mb-0 fw-semibold">Reading Report</p>
                                <p class="mb-0 text-muted small">Due: Next week</p>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-outline-primary rounded-pill">View</button>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="stat-card">
                    <h5 class="fw-bold mb-3">🏆 My Badges</h5>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <div class="badge-item" title="Math Master">🧮</div>
                        <div class="badge-item" title="Science Star">⭐</div>
                        <div class="badge-item" title="Reading Pro">📚</div>
                        <div class="badge-item" title="Creative Mind">🎨</div>
                        <div class="badge-item" title="Perfect Week">🔥</div>
                        <div class="badge-item" title="Quick Learner">⚡</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const toggleBtn = document.getElementById('toggleSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');
        
        // Toggle Sidebar
        toggleBtn.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('open');
                overlay.classList.toggle('active');
            } else {
                sidebar.classList.toggle('closed');
                mainContent.classList.toggle('expanded');
            }
        });
        
        // Close sidebar on overlay click
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
        });
        
        // Profile dropdown toggle
        profileBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            profileDropdown.classList.toggle('show');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileDropdown.classList.remove('show');
            }
        });
        
        // Sidebar item click
        const sidebarItems = document.querySelectorAll('.sidebar-item');
        sidebarItems.forEach(item => {
            item.addEventListener('click', () => {
                sidebarItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
                
                // Close sidebar on mobile after selection
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                }
            });
        });
        
        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                overlay.classList.remove('active');
            }
        });
    </script>
</body>
</html>