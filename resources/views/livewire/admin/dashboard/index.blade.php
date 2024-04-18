<div class="flex flex-col min-h-screen">
    @include('livewire.sidebar.sidebar')
    <div class="relative md:min-h-[20px] md:h-20 bottom-0 left-0 right-0 flex flex-row p-4 md:bg-white">
        <h1 class="relative z-10 text-xl font-semibold tracking-tight text-gray-700 ml-14">Dashboard</h1>
        <div class="absolute inset-0 shadow-lg"></div>
    </div>

    <div class="flex-grow p-5 my-3 mr-3 space-y-5 ml-14">
        <div class="relative flex flex-col gap-10 lg:flex-row">
            <div class="flex flex-col justify-center w-full lg:w-1/3">
                <div
                    class="flex flex-col justify-center w-full gap-3 py-5 pl-2 mb-3 text-black bg-white shadow-lg rounded-2xl dark:bg-gray-100 h-60 hover:scale-105">
                    <h1 class="text-4xl font-bold">Appointments today</h1>
                    <div class="flex flex-row gap-2">
                        <div class="flex flex-col">
                            <p class="text-3xl">{{ count($scheduled) }}</p>
                            <p class="text-lg">Upcoming</p>
                        </div>
                        <div class="flex flex-col ml-7">
                            <p class="text-3xl">{{ count($completed) }}</p>
                            <p class="text-lg">Completed</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center w-full lg:w-1/3">
                <div
                    class="flex flex-col justify-center w-full gap-3 py-5 pl-2 mb-3 text-black bg-white shadow-lg rounded-2xl dark:bg-gray-100 h-60 hover:scale-105">
                    <div class="flex flex-col">
                        <h1 class="text-2xl font-bold">Total Patients this month</h1>
                        <div class="flex flex-col">
                            <p class="text-lg">20</p>
                            <p class="text-md">Patients</p>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-2xl font-bold">Total Patients last month</h1>
                        <div class="flex flex-col">
                            <p class="text-lg">12</p>
                            <p class="text-md">Patients</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center w-full lg:w-1/4">
                <div
                    class="flex flex-col justify-center w-full gap-3 py-5 pl-2 mb-3 text-black bg-white shadow-lg rounded-2xl dark:bg-gray-100 h-60 hover:scale-105">
                    <h1 class="text-4xl font-bold">Total Revenue</h1>
                    <p class="text-2xl">Php {{ $monthlyRevenue}}</p>
                </div>
            </div>
        </div>

        {{-- Divide --}}

        <div class="relative flex flex-col gap-3 lg:flex-row" style="width: 98%">
            <div class="flex flex-col justify-center w-full lg:w-1/2">
                <div class="relative flex justify-center w-full gap-3 px-2 pt-2 pb-10 mb-2 text-black bg-white shadow-lg rounded-2xl dark:bg-gray-100 h-60 hover:scale-105">
                    @include('layout.appointmentchart')
                </div>
            </div>
            <div class="relative flex flex-col justify-center w-full lg:w-1/2">
                <div
                    class="relative flex justify-center w-full gap-3 px-2 pt-2 pb-10 mb-2 text-black bg-white shadow-lg rounded-2xl dark:bg-gray-100 h-60 hover:scale-105">
                    <canvas id="patientsChart" width="100" height="100"></canvas>

                    <!-- Total Patients Section -->
                    <div class="absolute mt-6 transform -translate-x-1/2 top-3/4 left-1/2 -translate-y-1/8">
                        <label class="font-bold text-center">Total Patient&lpar;s&rpar;:</label>
                        <span class="text-center">{{ $males->count() + $females->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('layout.footer-nav')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Livewire component data
        const appointmentsCount = {{ $appointments->count() }};
        const malesCount = {{ $males->count() }};
        const femalesCount = {{ $females->count() }};
        const seniorCount = 10; // Example senior patients count
        const minorCount = 5; // Example minor patients count

        // Patients Chart
        var patientsChart = new Chart(document.getElementById('patientsChart'), {
            type: 'doughnut',
            data: {
                labels: ["Male", "Female"],
                datasets: [{
                    data: [malesCount, femalesCount],
                    backgroundColor: ["#36A2EB", "#FF6384"]
                }]
            },
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                }
            }
        });
    </script>
</div>
