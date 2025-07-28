<x-filament::widget>
    <x-filament::card>
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold">Total Requests by Month</h2>
            <a
                href="{{ route('requests.export.csv') }}"
                class="filament-button"
                download
            >
                Download CSV
            </a>
        </div>

        <canvas id="requestsChart" height="100"></canvas>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('requestsChart').getContext('2d');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($this->getChartData()['labels']),
                        datasets: [{
                            label: 'Requests',
                            data: @json($this->getChartData()['data']),
                            backgroundColor: '#3b82f6',
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                            }
                        }
                    }
                });
            });
        </script>
    </x-filament::card>
</x-filament::widget>
