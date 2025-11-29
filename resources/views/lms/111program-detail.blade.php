@extends('lms.layoutlms.layout')

@section('title', 'dashboard')

@section('content')

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-6">
            <div
                class="bg-white border-4 rounded-2xl hover:shadow-2xl hover:-translate-y-2 duration-300 hover:border-yellow-400 p-5 shadow-md">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-3xl">📚</span>
                    <span class="bg-blue-500 text-white text-xs px-3 py-1 rounded-full">Active</span>
                </div>
                <h3 class="text-3xl font-bold text-indigo-600 mb-0">5</h3>
                <p class="text-sm text-gray-500 mb-0">Enrolled Courses</p>
            </div>

            <div
                class="bg-white border-4 rounded-2xl p-5 hover:shadow-2xl hover:-translate-y-2 duration-300 hover:border-yellow-400 shadow-md">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-3xl">✅</span>
                    <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full">Done</span>
                </div>
                <h3 class="text-3xl font-bold text-green-600 mb-0">12</h3>
                <p class="text-sm text-gray-500 mb-0">Completed Tasks</p>
            </div>

            <div
                class="bg-white border-4 rounded-2xl p-5 hover:shadow-2xl hover:-translate-y-2 duration-300 hover:border-yellow-400 col-span-2 shadow-md">
                <h5 class="text-lg font-bold mb-4">🏆 My Badges</h5>
                <div class="flex flex-wrap gap-3 justify-center">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer"
                        title="Math Master">🧮</div>
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer"
                        title="Science Star">⭐</div>
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer"
                        title="Reading Pro">📚</div>
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer"
                        title="Creative Mind">🎨</div>
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer"
                        title="Perfect Week">🔥</div>
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer"
                        title="Quick Learner">⚡</div>
                </div>
            </div>
        </div>

        <!-- My Programs Section -->
        <div class="mb-6">
            <h3 class="text-2xl font-bold text-black mb-4">📖 My Programs</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div
                    class="bg-white  rounded-3xl p-5 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border-4 border-transparent hover:border-yellow-400">
                    <div class="flex justify-between items-start mb-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center text-2xl">
                            🧮
                        </div>
                        <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full">Active</span>
                    </div>
                    <h5 class="text-lg font-bold mb-2">Math Adventure</h5>
                    <p class="text-sm text-gray-500 mb-3">Learn numbers, shapes, and problem solving!</p>
                    <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden mb-2">
                        <div class="h-full bg-gradient-to-r from-yellow-400 to-green-600 rounded-full transition-all duration-500"
                            style="width: 75%"></div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">75% Complete</span>
                        <span class="text-sm font-semibold text-green-600">15/20 Lessons</span>
                    </div>
                </div>

                <div
                    class="bg-white rounded-3xl p-5 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border-4 border-transparent hover:border-yellow-400">
                    <div class="flex justify-between items-start mb-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center text-2xl">
                            🔬
                        </div>
                        <span class="bg-blue-500 text-white text-xs px-3 py-1 rounded-full">Active</span>
                    </div>
                    <h5 class="text-lg font-bold mb-2">Science Explorers</h5>
                    <p class="text-sm text-gray-500 mb-3">Discover the wonders of science experiments!</p>
                    <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden mb-2">
                        <div class="h-full bg-gradient-to-r from-yellow-400 to-green-600 rounded-full transition-all duration-500"
                            style="width: 60%"></div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">60% Complete</span>
                        <span class="text-sm font-semibold text-blue-600">9/15 Lessons</span>
                    </div>
                </div>

                <div
                    class="bg-white rounded-3xl p-5 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border-4 border-transparent hover:border-yellow-400">
                    <div class="flex justify-between items-start mb-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-700 rounded-xl flex items-center justify-center text-2xl">
                            📖
                        </div>
                        <span class="bg-yellow-500 text-white text-xs px-3 py-1 rounded-full">Active</span>
                    </div>
                    <h5 class="text-lg font-bold mb-2">Reading Rockets</h5>
                    <p class="text-sm text-gray-500 mb-3">Improve your reading and vocabulary skills!</p>
                    <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden mb-2">
                        <div class="h-full bg-gradient-to-r from-yellow-400 to-green-600 rounded-full transition-all duration-500"
                            style="width: 40%"></div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">40% Complete</span>
                        <span class="text-sm font-semibold text-yellow-600">8/20 Lessons</span>
                    </div>
                </div>

                <div
                    class="bg-white rounded-3xl p-5 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border-4 border-transparent hover:border-yellow-400">
                    <div class="flex justify-between items-start mb-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-700 rounded-xl flex items-center justify-center text-2xl">
                            🎨
                        </div>
                        <span class="bg-cyan-500 text-white text-xs px-3 py-1 rounded-full">Active</span>
                    </div>
                    <h5 class="text-lg font-bold mb-2">Creative Arts</h5>
                    <p class="text-sm text-gray-500 mb-3">Express yourself through art and creativity!</p>
                    <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden mb-2">
                        <div class="h-full bg-gradient-to-r from-yellow-400 to-green-600 rounded-full transition-all duration-500"
                            style="width: 85%"></div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">85% Complete</span>
                        <span class="text-sm font-semibold text-purple-600">17/20 Lessons</span>
                    </div>
                </div>

                <div
                    class="bg-white rounded-3xl p-5 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer border-4 border-transparent hover:border-yellow-400">
                    <div class="flex justify-between items-start mb-3">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-700 rounded-xl flex items-center justify-center text-2xl">
                            🎵
                        </div>
                        <span class="bg-red-500 text-white text-xs px-3 py-1 rounded-full">Active</span>
                    </div>
                    <h5 class="text-lg font-bold mb-2">Music Makers</h5>
                    <p class="text-sm text-gray-500 mb-3">Learn rhythm, melody, and instruments!</p>
                    <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden mb-2">
                        <div class="h-full bg-gradient-to-r from-yellow-400 to-green-600 rounded-full transition-all duration-500"
                            style="width: 30%"></div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">30% Complete</span>
                        <span class="text-sm font-semibold text-pink-600">3/10 Lessons</span>
                    </div>
                </div>
            </div>
        </div>

@endsection