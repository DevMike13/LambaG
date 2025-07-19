<div>
   <div class="flex flex-col lg:flex-row justify-center items-center gap-3 mb-3">
        <div class="w-[90%] lg:w-auto flex gap-3 justify-center">
            <x-datetime-picker
                label="Start Date"
                placeholder="Start Date"
                wire:model.defer="startDate"
                without-time
                parse-format="YYYY-MM-DD"
                display-format="MMMM DD, YYYY"
            />

            <x-datetime-picker
                label="End Date"
                placeholder="End Date"
                wire:model.defer="endDate"
                without-time
                parse-format="YYYY-MM-DD"
                display-format="MMMM DD, YYYY"
            />
        </div>

        <div class="lg:pt-6 w-[90%] lg:w-auto">
            <x-button icon="filter" positive label="Apply" wire:click="getGraphValues" />
        </div>
    </div>

    <div class="border-b border-gray-200 dark:border-neutral-700 overflow-x-auto flex justify-center">
        <nav class="flex gap-x-3" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
            <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500 active" id="tabs-with-icons-item-1" aria-selected="true" data-hs-tab="#tabs-with-icons-1" aria-controls="tabs-with-icons-1" role="tab">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="20" height="20">
                    <path d="M307.72 302.27a8 8 0 01-3.72-6.75V80a48 48 0 00-48-48h0a48 48 0 00-48 48v215.52a8 8 0 01-3.71 6.74 97.51 97.51 0 00-44.19 86.07A96 96 0 00352 384a97.49 97.49 0 00-44.28-81.73zM256 112v272" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/>
                    <circle cx="256" cy="384" r="48"/>
                </svg>  
                Temp
            </button>
            <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-2" aria-selected="false" data-hs-tab="#tabs-with-icons-2" aria-controls="tabs-with-icons-2" role="tab">
                <svg width="24" height="24" fill="#00BCD4" viewBox="0 0 24 24">
                    <path d="M12 2C10 6 6 10 6 14c0 3.3 2.7 6 6 6s6-2.7 6-6c0-4-4-8-6-12zm0 16c-2.2 0-4-1.8-4-4 0-1.6 1.5-3.9 4-7.2 2.5 3.3 4 5.6 4 7.2 0 2.2-1.8 4-4 4z"/>
                </svg>                
                Humidity
            </button>
            <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-3" aria-selected="false" data-hs-tab="#tabs-with-icons-3" aria-controls="tabs-with-icons-3" role="tab">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="20" height="20">
                    <path d="M307.72 302.27a8 8 0 01-3.72-6.75V80a48 48 0 00-48-48h0a48 48 0 00-48 48v215.52a8 8 0 01-3.71 6.74 97.51 97.51 0 00-44.19 86.07A96 96 0 00352 384a97.49 97.49 0 00-44.28-81.73zM256 112v272" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/>
                    <circle cx="256" cy="384" r="48"/>
                </svg>                
                Liquid Temp
            </button>
            <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-4" aria-selected="false" data-hs-tab="#tabs-with-icons-4" aria-controls="tabs-with-icons-4" role="tab">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                </svg>              
                Alcohol Level
            </button>
            <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-5" aria-selected="false" data-hs-tab="#tabs-with-icons-5" aria-controls="tabs-with-icons-5" role="tab">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                </svg>               
                pH Level
            </button>
            <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-6" aria-selected="false" data-hs-tab="#tabs-with-icons-6" aria-controls="tabs-with-icons-6" role="tab">               
                ° Brix
            </button>
            <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-7" aria-selected="false" data-hs-tab="#tabs-with-icons-7" aria-controls="tabs-with-icons-7" role="tab">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 0-6.23-.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                </svg>               
                Liquid Level
            </button>
          {{-- <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500 active" id="tabs-with-icons-item-1" aria-selected="true" data-hs-tab="#tabs-with-icons-1" aria-controls="tabs-with-icons-1" role="tab">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="20" height="20">
                <path d="M400 320c0 88.37-55.63 144-144 144s-144-55.63-144-144c0-94.83 103.23-222.85 134.89-259.88a12 12 0 0118.23 0C296.77 97.15 400 225.17 400 320z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/>
                <path d="M344 328a72 72 0 01-72 72" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
            </svg>
            Soil Moisture
          </button>
          <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-2" aria-selected="false" data-hs-tab="#tabs-with-icons-2" aria-controls="tabs-with-icons-2" role="tab">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="20" height="20">
                <path d="M321.89 171.42C233 114 141 155.22 56 65.22c-19.8-21-8.3 235.5 98.1 332.7 77.79 71 197.9 63.08 238.4-5.92s18.28-163.17-70.61-220.58zM173 253c86 81 175 129 292 147" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
            </svg>
            Soil PH
          </button>
          <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-3" aria-selected="false" data-hs-tab="#tabs-with-icons-3" aria-controls="tabs-with-icons-3" role="tab">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="20" height="20">
                <circle cx="256" cy="184" r="120" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
                <circle cx="344" cy="328" r="120" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
                <circle cx="168" cy="328" r="120" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
            </svg>
            Water PH
          </button>
          <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-4" aria-selected="false" data-hs-tab="#tabs-with-icons-4" aria-controls="tabs-with-icons-4" role="tab">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="20" height="20">
                <path d="M307.72 302.27a8 8 0 01-3.72-6.75V80a48 48 0 00-48-48h0a48 48 0 00-48 48v215.52a8 8 0 01-3.71 6.74 97.51 97.51 0 00-44.19 86.07A96 96 0 00352 384a97.49 97.49 0 00-44.28-81.73zM256 112v272" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/>
                <circle cx="256" cy="384" r="48"/>
            </svg>  
            Temperature
          </button>
          <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-5" aria-selected="false" data-hs-tab="#tabs-with-icons-5" aria-controls="tabs-with-icons-5" role="tab">
            <svg width="24" height="24" fill="#00BCD4" viewBox="0 0 24 24">
                <path d="M12 2C10 6 6 10 6 14c0 3.3 2.7 6 6 6s6-2.7 6-6c0-4-4-8-6-12zm0 16c-2.2 0-4-1.8-4-4 0-1.6 1.5-3.9 4-7.2 2.5 3.3 4 5.6 4 7.2 0 2.2-1.8 4-4 4z"/>
            </svg>                
            Humidity
          </button> --}}
        </nav>
    </div>
      
    <div class="mt-3">
        <div id="tabs-with-icons-1" role="tabpanel" aria-labelledby="tabs-with-icons-item-1">
            <div>
                <canvas id="soilMoistureChart"></canvas>
            </div>
        </div>
        <div id="tabs-with-icons-2" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-2">
            <div>
                <canvas id="soilPHChart"></canvas>
            </div>
        </div>
        <div id="tabs-with-icons-3" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-3">
            <div>
                <canvas id="waterPHChart"></canvas>
            </div>
        </div>
        <div id="tabs-with-icons-4" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-4">
            <div>
                <canvas id="temperatureChart"></canvas>
            </div>
        </div>
        <div id="tabs-with-icons-5" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-5">
            <div>
                <canvas id="humidityChart"></canvas>
            </div>
        </div>
        <div id="tabs-with-icons-6" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-6">
            <div>
                <canvas id="humidityChart"></canvas>
            </div>
        </div>
        <div id="tabs-with-icons-7" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-7">
            <div>
                <canvas id="humidityChart"></canvas>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        
        var soilMoistureData = @json($soilMoistureData);
        
        console.log(soilMoistureData);
        
        const ctx = document.getElementById('soilMoistureChart');
        const days = soilMoistureData.map(item => item.Day);
        const values = soilMoistureData.map(item => item.Value);
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: days,
                datasets: [{
                    label: 'Soil Moisture',
                    data: values, 
                    borderWidth: 1,
                    tension: 0.5,
                    borderColor: '#4CAF50',
                    backgroundColor: '#4CAF50',
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
        Livewire.on('updateChart', (newSoilData) => {
            soilMoistureData = newSoilData;
        });

    </script>

    <script>
            
        var soilPHData = @json($soilPHData);
        
        console.log(soilPHData);
        
        const ctxSoil = document.getElementById('soilPHChart');
        const daysSoil = soilPHData.map(item => item.Day);
        const valuesSoil = soilPHData.map(item => item.Value);
        
        new Chart(ctxSoil, {
            type: 'line',
            data: {
                labels: daysSoil,
                datasets: [{
                    label: 'Soil PH',
                    data: valuesSoil, 
                    borderWidth: 1,
                    tension: 0.5,
                    borderColor: '#795548',
                    backgroundColor: '#795548',
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
        Livewire.on('updateSoilPHChart', (newSoilPHData) => {
            soilPHData = newSoilPHData;
        });

    </script>

    <script>
                
        var waterPHData = @json($waterPHData);
        
        console.log(waterPHData);
        
        const ctxWater = document.getElementById('waterPHChart');
        const daysWater = waterPHData.map(item => item.Day);
        const valuesWater = waterPHData.map(item => item.Value);
        
        new Chart(ctxWater, {
            type: 'line',
            data: {
                labels: daysWater,
                datasets: [{
                    label: 'Water PH',
                    data: valuesWater, 
                    borderWidth: 1,
                    tension: 0.5,
                    borderColor: '#03A9F4',
                    backgroundColor: '#03A9F4',
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
        Livewire.on('updateWaterPHChart', (newWaterPHData) => {
            waterPHData = newWaterPHData;
        });

    </script>

    <script>
                    
        var temperatureData = @json($temperatureData);
        
        console.log(temperatureData);
        
        const ctxTemp = document.getElementById('temperatureChart');
        const daysTemp = temperatureData.map(item => item.Day);
        const valuesTemp = temperatureData.map(item => item.Value);
        
        new Chart(ctxTemp, {
            type: 'line',
            data: {
                labels: daysTemp,
                datasets: [{
                    label: 'Temperature',
                    data: valuesTemp, 
                    borderWidth: 1,
                    tension: 0.5,
                    borderColor: '#FF5722',
                    backgroundColor: '#FF5722',
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
        Livewire.on('updateTemperatureChart', (newTempData) => {
            temperatureData = newTempData;
        });

    </script>

    <script>
                        
        var humidityData = @json($humidityData);
        
        console.log(humidityData);
        
        const ctxHumid = document.getElementById('humidityChart');
        const daysHumid = humidityData.map(item => item.Day);
        const valuesHumid = humidityData.map(item => item.Value);
        
        new Chart(ctxHumid, {
            type: 'line',
            data: {
                labels: daysHumid,
                datasets: [{
                    label: 'Humidity',
                    data: valuesHumid, 
                    borderWidth: 1,
                    tension: 0.5,
                    borderColor: '#00BCD4',
                    backgroundColor: '#00BCD4',
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
        Livewire.on('updateHumidityChart', (newHumidData) => {
            humidityData = newHumidData;
        });

    </script>
</div>

