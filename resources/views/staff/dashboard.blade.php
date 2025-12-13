@extends('staff.layoutadmin.layout')

@section('pagetitle', 'Dashboard')

@section('content')

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

        {{-- Card Item --}}
        @php
            $cards = [
                ['icon' => '📚', 'label' => 'Total Students', 'value' => 25, 'status' => 'Active', 'color' => 'blue'],
                ['icon' => '🎓', 'label' => 'Total Programs', 'value' => 9, 'status' => 'Done', 'color' => 'green'],
                ['icon' => '📁', 'label' => 'Total Materials', 'value' => 105, 'status' => 'Uploaded', 'color' => 'yellow'],
                ['icon' => '🧾', 'label' => 'Total Invoice', 'value' => 12, 'status' => 'Paid', 'color' => 'purple'],
            ];
        @endphp

        @foreach ($cards as $card)
            <div
                class="bg-white border border-gray-200 hover:border-yellow-400 hover:shadow-xl transition-all duration-300 rounded-2xl p-5">
                <div class="flex justify-between items-center">
                    <span class="text-4xl">{{ $card['icon'] }}</span>
                    <span class="text-xs px-3 py-1 rounded-full text-white bg-{{ $card['color'] }}-500">
                        {{ $card['status'] }}
                    </span>
                </div>

                <h3 class="text-4xl font-bold text-{{ $card['color'] }}-600 mb-1">{{ $card['value'] }}</h3>
                <p class="text-sm text-gray-500">{{ $card['label'] }}</p>
            </div>
        @endforeach

    </div>




    {{-- ====================== STUDENT STATISTIC ====================== --}}
    <div class="mb-6">
        <div class="bg-white p-6 rounded-3xl shadow-xl">

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-yellow-500">📊 Active Student Statistic</h3>

                <div class="flex gap-2">
                    <button id="studentMonthlyBtn"
                        class="stat-btn bg-yellow-500 text-white px-4 py-1 rounded-lg text-sm font-semibold">
                        Monthly
                    </button>
                    <button id="studentAnnualBtn"
                        class="stat-btn bg-gray-200 hover:bg-yellow-400 hover:text-white px-4 py-1 rounded-lg text-sm font-semibold">
                        Annually
                    </button>
                </div>
            </div>

            <div class="h-48">
                <canvas id="studentChart"></canvas>
            </div>
        </div>
    </div>




    {{-- ====================== REVENUE STATISTIC ====================== --}}
    <div class="mb-6">
        <div class="bg-white p-6 rounded-3xl shadow-xl">

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-yellow-500">💰 Revenue Statistics</h3>

                <div class="flex gap-2">
                    <button id="revenueMonthlyBtn"
                        class="stat-btn bg-yellow-500 text-white px-4 py-1 rounded-lg text-sm font-semibold">
                        Monthly
                    </button>
                    <button id="revenueAnnualBtn"
                        class="stat-btn bg-gray-200 hover:bg-yellow-400 hover:text-white px-4 py-1 rounded-lg text-sm font-semibold">
                        Annually
                    </button>
                </div>
            </div>

            <div class="h-48">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- ========= Simple Toggle Script (nanti diganti Chart.js) ========= --}}
    <script>
        const sections = [
            { monthly: "studentMonthlyBtn", annual: "studentAnnualBtn", chart: "studentChart" },
            { monthly: "revenueMonthlyBtn", annual: "revenueAnnualBtn", chart: "revenueChart" },
        ];

        sections.forEach(section => {

            document.getElementById(section.monthly).addEventListener("click", () => {
                activate(section.monthly, section.annual, section.chart, "📈 Monthly Data Loaded...");
            });

            document.getElementById(section.annual).addEventListener("click", () => {
                activate(section.annual, section.monthly, section.chart, "📊 Annual Data Loaded...");
            });

        });


        function activate(activeBtn, inactiveBtn, chart, text) {
            document.getElementById(activeBtn).classList.replace("bg-gray-200", "bg-yellow-500");
            document.getElementById(activeBtn).classList.replace("text-gray-700", "text-white");

            document.getElementById(inactiveBtn).classList.replace("bg-yellow-500", "bg-gray-200");
            document.getElementById(inactiveBtn).classList.replace("text-white", "text-gray-700");

            document.getElementById(chart).innerHTML = text;
        }
    </script>
    <script>
        // ======================= STUDENT CHART ==========================
        const studentCtx = document.getElementById('studentChart').getContext('2d');

        let studentChart = new Chart(studentCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Active Students',
                    data: [5, 8, 12, 14, 18, 20],
                    backgroundColor: '#FACC15',
                    borderRadius: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        document.getElementById("studentMonthlyBtn").addEventListener("click", () => {
            studentChart.data.labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
            studentChart.data.datasets[0].data = [5, 8, 12, 14, 18, 20];
            studentChart.update();
        });

        document.getElementById("studentAnnualBtn").addEventListener("click", () => {
            studentChart.data.labels = ['2021', '2022', '2023', '2024'];
            studentChart.data.datasets[0].data = [10, 22, 30, 45];
            studentChart.update();
        });



        // ======================= REVENUE CHART ==========================
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');

        let revenueChart = new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Revenue ($)',
                    data: [200, 300, 400, 550, 700, 850],
                    backgroundColor: '#34D399',
                    borderRadius: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        document.getElementById("revenueMonthlyBtn").addEventListener("click", () => {
            revenueChart.data.labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
            revenueChart.data.datasets[0].data = [200, 300, 400, 550, 700, 850];
            revenueChart.update();
        });

        document.getElementById("revenueAnnualBtn").addEventListener("click", () => {
            revenueChart.data.labels = ['2021', '2022', '2023', '2024'];
            revenueChart.data.datasets[0].data = [1500, 3200, 5100, 6400];
            revenueChart.update();
        }); 
    </script>

@endsection