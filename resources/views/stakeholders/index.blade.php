<x-app-layout>
    <div class="container p-6 mx-auto">
        <h1 class="mb-4 text-3xl font-bold">Stakeholder Analytics Dashboard</h1>

        <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-2">
            <!-- Total Farms -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Total Farms</h2>
                <p class="text-lg text-gray-700">{{ $totalFarms }}</p>
            </div>

            <!-- Average Farm Size -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Average Farm Size</h2>
                <p class="text-lg text-gray-700">{{ number_format($averageSize, 2) }} acres</p>
            </div>

            <!-- Total Employees -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Total Employees</h2>
                <p class="text-lg text-gray-700">{{ $totalEmployees }}</p>
            </div>

            <!-- Farming Practices Distribution -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Farming Practices</h2>
                <ul>
                    @foreach($farmingPractices as $practice)
                        <li>{{ $practice->farming_practices }}: {{ $practice->count }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Land Type Distribution -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Land Types</h2>
                <ul>
                    @foreach($landTypes as $land)
                        <li>{{ $land->land_type }}: {{ $land->count }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Ownership Distribution -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Ownership Distribution</h2>
                <ul>
                    @foreach($ownershipDistribution as $ownership)
                        <li>{{ $ownership->ownership }}: {{ $ownership->count }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Water Sources Distribution -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Water Sources</h2>
                <ul>
                    @foreach($waterSourcesDistribution as $source)
                        <li>{{ $source->water_sources }}: {{ $source->count }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Establishment Year Distribution -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Establishment Years</h2>
                <ul>
                    @foreach($establishmentYears as $year)
                        <li>{{ $year->year }}: {{ $year->count }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Average Size by Land Type -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Average Size by Land Type</h2>
                <ul>
                    @foreach($averageSizeByLandType as $type)
                        <li>{{ $type->land_type }}: {{ number_format($type->average_size, 2) }} acres</li>
                    @endforeach
                </ul>
            </div>

            <!-- Crop Popularity -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Crop Popularity</h2>
                <ul>
                    @foreach($cropPopularity as $crop)
                        <li>{{ $crop->name }}: {{ $crop->count }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Planting Dates -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Common Planting Dates</h2>
                <ul>
                    @foreach($plantingDates as $date)
                        <li>{{ $date->planting }}: {{ $date->count }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
    <div class="container p-6 mx-auto">
        <h1 class="mb-4 text-3xl font-bold">Stakeholder Analytics Dashboard</h1>

        <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-2">
            <!-- Total Farms Chart -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Total Farms</h2>
                <canvas id="totalFarmsChart" style="width: 100%; height: 400px;"></canvas>
                <p class="mt-2 text-gray-700">This chart shows the total number of farms registered in the system.</p>
            </div>

            <!-- Average Farm Size Chart -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Average Farm Size</h2>
                <canvas id="averageSizeChart" style="width: 100%; height: 400px;"></canvas>
                <p class="mt-2 text-gray-700">This chart displays the average size of farms in acres.</p>
            </div>

            <!-- Total Employees Chart -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Total Employees</h2>
                <canvas id="totalEmployeesChart" style="width: 100%; height: 400px;"></canvas>
                <p class="mt-2 text-gray-700">This chart represents the total number of employees across all farms.</p>
            </div>

            <!-- Crop Popularity Chart -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Crop Popularity</h2>
                <canvas id="cropPopularityChart" style="width: 100%; height: 400px;"></canvas>
                <p class="mt-2 text-gray-700">This chart illustrates the popularity of different crops based on their occurrence.</p>
            </div>

            <!-- Planting Dates Chart -->
            <div class="p-5 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">Common Planting Dates</h2>
                <canvas id="plantingDatesChart" style="width: 100%; height: 400px;"></canvas>
                <p class="mt-2 text-gray-700">This chart shows the most common planting dates used by farmers.</p>
            </div>

        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Total Farms Chart
            const totalFarmsCtx = document.getElementById('totalFarmsChart').getContext('2d');
            const totalFarmsData = {
                labels: ['Total Farms'],
                datasets: [{
                    label: 'Number of Farms',
                    data: [{{ $totalFarms }}],
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }]
            };

            const totalFarmsChart = new Chart(totalFarmsCtx, {
                type: 'bar',
                data: totalFarmsData,
                options: {
                    responsive: true,
                    animation: {
                        duration: 1000,
                        easing: 'easeOutBounce'
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Count'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Metrics'
                            }
                        }
                    }
                }
            });

            // Average Size Chart
            const averageSizeCtx = document.getElementById('averageSizeChart').getContext('2d');
            const averageSizeData = {
                labels: ['Average Size'],
                datasets: [{
                    label: 'Average Farm Size (acres)',
                    data: [{{ number_format($averageSize, 2) }}],
                    backgroundColor: 'rgba(153, 102, 255, 0.6)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1,
                }]
            };

            const averageSizeChart = new Chart(averageSizeCtx, {
                type: 'bar',
                data: averageSizeData,
                options: {
                    responsive: true,
                    animation: {
                        duration: 1000,
                        easing: 'easeOutBounce'
                    },
                    scales: {
                        y: {
                            beginAtZero:true,
                            title:{
                                display:true,
                                text:'Acres'
                            }
                        },
                        x:{
                            title:{
                                display:true,
                                text:'Metrics'
                            }
                        }
                    }
                }
            });

            // Total Employees Chart
            const totalEmployeesCtx = document.getElementById('totalEmployeesChart').getContext('2d');
            const totalEmployeesData = {
                labels: ['Total Employees'],
                datasets: [{
                    label: 'Number of Employees',
                    data: [{{ $totalEmployees }}],
                    backgroundColor: 'rgba(255, 159, 64, 0.6)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1,
                }]
            };

            const totalEmployeesChart = new Chart(totalEmployeesCtx, {
                type: 'bar',
                data: totalEmployeesData,
                options: {
                    responsive:true,
                    animation:{
                        duration :1000,
                        easing:'easeOutBounce'
                    },
                    scales:{
                        y:{
                            beginAtZero:true,
                            title:{
                                display:true,
                                text:'Count'
                            }
                        },
                        x:{
                            title:{
                                display:true,
                                text:'Metrics'
                            }
                        }
                    }
                }
            });

           // Crop Popularity Chart
           const cropPopularityCtx = document.getElementById('cropPopularityChart').getContext('2d');
           const cropPopularityData = {
               labels:[
                   @foreach($cropPopularity as $crop)
                       '{{ $crop->name }}',
                   @endforeach
               ],
               datasets:[{
                   label:'Crop Popularity',
                   data:[
                       @foreach($cropPopularity as $crop)
                           {{ $crop->count }},
                       @endforeach
                   ],
                   backgroundColor:'rgba(75,192,192,0.6)',
                   borderColor:'rgba(75,192,192,1)',
                   borderWidth :1,
               }]
           };

           const cropPopularityChart = new Chart(cropPopularityCtx,{
               type:'bar',
               data : cropPopularityData,
               options:{
                   responsive:true,
                   animation:{
                       duration :1000,
                       easing:'easeOutBounce'
                   },
                   scales:{
                       y:{
                           beginAtZero:true,
                           title:{
                               display:true,
                               text:'Count'
                           }
                       },
                       x:{
                           title:{
                               display:true,
                               text:'Crops'
                           }
                       }
                   }
               }
           });

           // Planting Dates Chart
           const plantingDatesCtx = document.getElementById('plantingDatesChart').getContext('2d');
           const plantingDatesData = {
               labels:[
                   @foreach($plantingDates as $date)
                       '{{ $date->planting }}',
                   @endforeach
               ],
               datasets:[{
                   label:'Common Planting Dates',
                   data:[
                       @foreach($plantingDates as $date)
                           {{ $date->count }},
                       @endforeach
                   ],
                   backgroundColor:'rgba(153,102,255,0.6)',
                   borderColor:'rgba(153,102,255,1)',
                   borderWidth :1,
               }]
           };

           const plantingDatesChart = new Chart(plantingDatesCtx,{
               type:'line',
               data : plantingDatesData,
               options:{
                   responsive:true,
                   animation:{
                       duration :1000,
                       easing:'easeOutBounce'
                   },
                   scales:{
                       y:{
                           beginAtZero:true,
                           title:{
                               display:true,
                               text:'Count'
                           }
                       },
                       x:{
                           title:{
                               display:true,
                               text:'Planting Dates'
                           }
                       }
                   }
               }
           });
       });
    </script>
</x-app-layout>
