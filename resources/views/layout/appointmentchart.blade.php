<div id="monthlyAppointmentsChart" class="max-w-md mx-auto bg-white p-4 w-full">
    <h1 class="text-lg font-bold mb-2">Monthly Appointments Chart</h1>
    <div class="flex flex-row">
        <div id="barLabels" class="flex flex-col w-auto pr-2">
            @foreach([75, 60, 45, 30, 15] as $label)
                <div class="h-5">{{ $label }}</div>
            @endforeach
        </div>
        <div id="barsContainer" class="border-l-2 flex justify-between gap-1 border-b-2 pl-3 border-black w-full"></div>
    </div>
    <div id="monthLabels" class="flex gap-1 justify-between pl-10 mt-2">
        @foreach(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'] as $month)
            <span class="text-md">{{ $month }}</span>
        @endforeach
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
    var barsContainer = document.getElementById('barsContainer');
    const appointmentsCount = {{ $appointments->count() }};

    for (var i = 0; i < 12; i++) {
        var bar = document.createElement('div');
        bar.className = 'w-1/12 bg-blue-500 rounded-md mt-auto mx-1';
        bar.style.height = (i < 6) ? '15%' : ((appointmentsCount / 30) * 100) + '%';

        barsContainer.appendChild(bar);
    }
});
    </script>
</div>
