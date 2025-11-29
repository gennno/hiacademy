<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Learning Adventure 🚀</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Fredoka', sans-serif;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .emoji-bounce {
            display: inline-block;
            animation: bounce 2s infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-yellow-400 to-yellow-400 min-h-screen overflow-x-hidden">
    <!-- Sidebar Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-[999] hidden"></div>
    
    <!-- Sidebar -->
    <div id="sidebar" class="fixed left-0 top-0 h-screen w-64 bg-gradient-to-b from-black to-black transition-transform duration-300 z-[1000] shadow-2xl -translate-x-full lg:translate-x-0">
        <div class="p-4 text-center border-b border-white border-opacity-20">
            <h2 class="text-white text-2xl font-bold mb-1">🎓 LearnHub</h2>
            <p class="text-white text-opacity-80 text-sm">Kids Edition</p>
        </div>
        
        <div class="mt-4">
            <div class="sidebar-item text-white px-5 py-3 mx-4 my-2 rounded-xl transition-all duration-300 cursor-pointer flex items-center gap-3 bg-white bg-opacity-20">
                <span class="text-xl">🏠</span>
                <span>Dashboard</span>
            </div>
            <div class="sidebar-item text-white px-5 py-3 mx-4 my-2 rounded-xl transition-all duration-300 cursor-pointer flex items-center gap-3 hover:bg-white hover:bg-opacity-20 hover:translate-x-1">
                <span class="text-xl">📚</span>
                <span>My Courses</span>
            </div>
            <div class="sidebar-item text-white px-5 py-3 mx-4 my-2 rounded-xl transition-all duration-300 cursor-pointer flex items-center gap-3 hover:bg-white hover:bg-opacity-20 hover:translate-x-1">
                <span class="text-xl">📝</span>
                <span>Assignments</span>
            </div>
            <div class="sidebar-item text-white px-5 py-3 mx-4 my-2 rounded-xl transition-all duration-300 cursor-pointer flex items-center gap-3 hover:bg-white hover:bg-opacity-20 hover:translate-x-1">
                <span class="text-xl">🏆</span>
                <span>Achievements</span>
            </div>
            <div class="sidebar-item text-white px-5 py-3 mx-4 my-2 rounded-xl transition-all duration-300 cursor-pointer flex items-center gap-3 hover:bg-white hover:bg-opacity-20 hover:translate-x-1">
                <span class="text-xl">📅</span>
                <span>Calendar</span>
            </div>
            <div class="sidebar-item text-white px-5 py-3 mx-4 my-2 rounded-xl transition-all duration-300 cursor-pointer flex items-center gap-3 hover:bg-white hover:bg-opacity-20 hover:translate-x-1">
                <span class="text-xl">💬</span>
                <span>Messages</span>
            </div>
            <div class="sidebar-item text-white px-5 py-3 mx-4 my-2 rounded-xl transition-all duration-300 cursor-pointer flex items-center gap-3 hover:bg-white hover:bg-opacity-20 hover:translate-x-1">
                <span class="text-xl">⚙️</span>
                <span>Settings</span>
            </div>
        </div>
        
        <div class="absolute bottom-0 left-0 right-0 p-4 text-center">
            <div class="bg-white bg-opacity-20 rounded-lg p-3">
                <p class="text-white text-sm">Need help? 🤔</p>
                <button class="bg-white text-purple-600 px-4 py-2 rounded-lg text-sm font-semibold mt-2 hover:bg-opacity-90 transition-opacity">
                    Ask Teacher
                </button>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div id="mainContent" class="lg:ml-64 transition-all duration-300 p-5">
        <!-- Topbar -->
        <div class="bg-white rounded-3xl border border-white shadow-lg p-4 mb-6">
            <div class="flex justify-between items-center flex-wrap gap-4">
                <div class="flex items-center gap-3">
                    <button id="toggleSidebar" class="bg-gray-100 hover:bg-gray-200 rounded-full p-2 w-11 h-11 flex items-center justify-center transition-colors">
                        <span class="text-xl">☰</span>
                    </button>
                    <div>
                        <h4 class="text-xl font-bold text-indigo-600 mb-0">Welcome back, Alex! <span class="emoji-bounce">👋</span></h4>
                        <p class="text-sm text-gray-500 mb-0">Ready to learn something new today?</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 rounded-full p-2 w-11 h-11 flex items-center justify-center relative transition-colors">
                        <span class="text-xl">🔔</span>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                    </button>
                    
                    <div class="relative">
                        <button id="profileBtn" class="bg-gray-100 hover:bg-gray-200 rounded-full flex items-center gap-2 px-3 py-2 transition-colors">
                            <div class="w-9 h-9 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                                A
                            </div>
                            <span class="font-semibold hidden md:inline">Alex</span>
                            <span class="text-xs">▼</span>
                        </button>
                        
                        <div id="profileDropdown" class="hidden absolute top-full right-0 mt-2 bg-white rounded-xl shadow-2xl p-2 min-w-[200px] z-[1001]">
                            <div class="px-4 py-2 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors">
                                <span class="mr-2">👤</span> My Profile
                            </div>
                            <div class="px-4 py-2 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors">
                                <span class="mr-2">⚙️</span> Settings
                            </div>
                            <div class="px-4 py-2 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors">
                                <span class="mr-2">❓</span> Help
                            </div>
                            <hr class="my-2 border-gray-200">
                            <div class="px-4 py-2 hover:bg-gray-100 rounded-lg cursor-pointer text-red-500 transition-colors">
                                <span class="mr-2">🚪</span> Logout
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-6">
            <div class="bg-white rounded-2xl p-5 shadow-md">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-3xl">📚</span>
                    <span class="bg-blue-500 text-white text-xs px-3 py-1 rounded-full">Active</span>
                </div>
                <h3 class="text-3xl font-bold text-indigo-600 mb-0">5</h3>
                <p class="text-sm text-gray-500 mb-0">Enrolled Courses</p>
            </div>
            
            <div class="bg-white rounded-2xl p-5 shadow-md">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-3xl">✅</span>
                    <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full">Done</span>
                </div>
                <h3 class="text-3xl font-bold text-green-600 mb-0">12</h3>
                <p class="text-sm text-gray-500 mb-0">Completed Tasks</p>
            </div>
            
            <div class="bg-white rounded-2xl p-5 shadow-md">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-3xl">⭐</span>
                    <span class="bg-yellow-500 text-white text-xs px-3 py-1 rounded-full">Earned</span>
                </div>
                <h3 class="text-3xl font-bold text-yellow-600 mb-0">850</h3>
                <p class="text-sm text-gray-500 mb-0">Total Points</p>
            </div>
            
            <div class="bg-white rounded-2xl p-5 shadow-md">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-3xl">🔥</span>
                    <span class="bg-red-500 text-white text-xs px-3 py-1 rounded-full">Streak</span>
                </div>
                <h3 class="text-3xl font-bold text-red-600 mb-0">7</h3>
                <p class="text-sm text-gray-500 mb-0">Days in a Row</p>
            </div>
        </div>
        
        <!-- My Programs Section -->
        <div class="mb-6">
            <h3 class="text-2xl font-bold text-white mb-4">📖 My Programs</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white rounded-3xl p-5 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border-2 border-transparent hover:border-indigo-600">
                    <div class="flex justify-between items-start mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center text-2xl">
                            🧮
                        </div>
                        <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full">Active</span>
                    </div>
                    <h5 class="text-lg font-bold mb-2">Math Adventure</h5>
                    <p class="text-sm text-gray-500 mb-3">Learn numbers, shapes, and problem solving!</p>
                    <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden mb-2">
                        <div class="h-full bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full transition-all duration-500" style="width: 75%"></div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">75% Complete</span>
                        <span class="text-sm font-semibold text-green-600">15/20 Lessons</span>
                    </div>
                </div>
                
                <div class="bg-white rounded-3xl p-5 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border-2 border-transparent hover:border-indigo-600">
                    <div class="flex justify-between items-start mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center text-2xl">
                            🔬
                        </div>
                        <span class="bg-blue-500 text-white text-xs px-3 py-1 rounded-full">Active</span>
                    </div>
                    <h5 class="text-lg font-bold mb-2">Science Explorers</h5>
                    <p class="text-sm text-gray-500 mb-3">Discover the wonders of science experiments!</p>
                    <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden mb-2">
                        <div class="h-full bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full transition-all duration-500" style="width: 60%"></div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">60% Complete</span>
                        <span class="text-sm font-semibold text-blue-600">9/15 Lessons</span>
                    </div>
                </div>
                
                <div class="bg-white rounded-3xl p-5 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border-2 border-transparent hover:border-indigo-600">
                    <div class="flex justify-between items-start mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-700 rounded-xl flex items-center justify-center text-2xl">
                            📖
                        </div>
                        <span class="bg-yellow-500 text-white text-xs px-3 py-1 rounded-full">Active</span>
                    </div>
                    <h5 class="text-lg font-bold mb-2">Reading Rockets</h5>
                    <p class="text-sm text-gray-500 mb-3">Improve your reading and vocabulary skills!</p>
                    <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden mb-2">
                        <div class="h-full bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full transition-all duration-500" style="width: 40%"></div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">40% Complete</span>
                        <span class="text-sm font-semibold text-yellow-600">8/20 Lessons</span>
                    </div>
                </div>
                
                <div class="bg-white rounded-3xl p-5 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border-2 border-transparent hover:border-indigo-600">
                    <div class="flex justify-between items-start mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-700 rounded-xl flex items-center justify-center text-2xl">
                            🎨
                        </div>
                        <span class="bg-cyan-500 text-white text-xs px-3 py-1 rounded-full">Active</span>
                    </div>
                    <h5 class="text-lg font-bold mb-2">Creative Arts</h5>
                    <p class="text-sm text-gray-500 mb-3">Express yourself through art and creativity!</p>
                    <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden mb-2">
                        <div class="h-full bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full transition-all duration-500" style="width: 85%"></div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">85% Complete</span>
                        <span class="text-sm font-semibold text-purple-600">17/20 Lessons</span>
                    </div>
                </div>
                
                <div class="bg-white rounded-3xl p-5 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border-2 border-transparent hover:border-indigo-600">
                    <div class="flex justify-between items-start mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-700 rounded-xl flex items-center justify-center text-2xl">
                            🎵
                        </div>
                        <span class="bg-red-500 text-white text-xs px-3 py-1 rounded-full">Active</span>
                    </div>
                    <h5 class="text-lg font-bold mb-2">Music Makers</h5>
                    <p class="text-sm text-gray-500 mb-3">Learn rhythm, melody, and instruments!</p>
                    <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden mb-2">
                        <div class="h-full bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full transition-all duration-500" style="width: 30%"></div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">30% Complete</span>
                        <span class="text-sm font-semibold text-pink-600">3/10 Lessons</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="lg:col-span-2 bg-white rounded-2xl p-5 shadow-md">
                <h5 class="text-lg font-bold mb-4">📅 Upcoming Assignments</h5>
                
                <div class="flex items-center justify-between p-3 mb-3 bg-gray-100 rounded-xl">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">📝</span>
                        <div>
                            <p class="font-semibold mb-0">Math Quiz - Chapter 5</p>
                            <p class="text-sm text-gray-500 mb-0">Due: Tomorrow</p>
                        </div>
                    </div>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-full transition-colors">Start</button>
                </div>
                
                <div class="flex items-center justify-between p-3 mb-3 bg-gray-100 rounded-xl">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">🔬</span>
                        <div>
                            <p class="font-semibold mb-0">Science Project</p>
                            <p class="text-sm text-gray-500 mb-0">Due: In 3 days</p>
                        </div>
                    </div>
                    <button class="bg-white border-2 border-blue-500 text-blue-500 hover:bg-blue-50 text-sm px-4 py-2 rounded-full transition-colors">View</button>
                </div>
                
                <div class="flex items-center justify-between p-3 bg-gray-100 rounded-xl">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">📖</span>
                        <div>
                            <p class="font-semibold mb-0">Reading Report</p>
                            <p class="text-sm text-gray-500 mb-0">Due: Next week</p>
                        </div>
                    </div>
                    <button class="bg-white border-2 border-blue-500 text-blue-500 hover:bg-blue-50 text-sm px-4 py-2 rounded-full transition-colors">View</button>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-5 shadow-md">
                <h5 class="text-lg font-bold mb-4">🏆 My Badges</h5>
                <div class="flex flex-wrap gap-3 justify-center">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer" title="Math Master">🧮</div>
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer" title="Science Star">⭐</div>
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer" title="Reading Pro">📚</div>
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer" title="Creative Mind">🎨</div>
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer" title="Perfect Week">🔥</div>
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer" title="Quick Learner">⚡</div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const toggleBtn = document.getElementById('toggleSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');
        
        // Toggle Sidebar
        toggleBtn.addEventListener('click', () => {
            if (window.innerWidth < 1024) {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            } else {
                sidebar.classList.toggle('-translate-x-full');
                mainContent.classList.toggle('lg:ml-64');
                mainContent.classList.toggle('lg:ml-0');
            }
        });
        
        // Close sidebar on overlay click
        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
        
        // Profile dropdown toggle
        profileBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });
        
        // Sidebar item click
        const sidebarItems = document.querySelectorAll('.sidebar-item');
        sidebarItems.forEach(item => {
            item.addEventListener('click', () => {
                sidebarItems.forEach(i => {
                    i.classList.remove('bg-white', 'bg-opacity-20');
                });
                item.classList.add('bg-white', 'bg-opacity-20');
                
                // Close sidebar on mobile after selection
                if (window.innerWidth < 1024) {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            });
        });
        
        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                overlay.classList.add('hidden');
                sidebar.classList.remove('-translate-x-full');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
</body>
</html>