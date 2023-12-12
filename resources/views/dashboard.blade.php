<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">

                <!-- Chart.js Container -->
                <canvas id="employeeChart" width="400" height="200"></canvas>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const fetchData = async () => {
                        try {
                            const response = await fetch('/employee-count'); // Route defined in web.php
                            const data = await response.json();
                            createChart(data);
                        } catch (error) {
                            console.error('Error fetching data:', error);
                        }
                    };

                    // Create and update the chart with the provided data
                    const createChart = (data) => {
                        const ctx = document.getElementById('employeeChart').getContext('2d');

                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Registered Employees'],
                                datasets: [{
                                    label: 'Number of Employees',
                                    data: [data.employeeCount], // Adjust data accordingly
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    };

                    // Fetch data and create/update chart on page load
                    document.addEventListener('DOMContentLoaded', fetchData);
                </script>

            </div>
        </div>
    </div>
</x-app-layout>