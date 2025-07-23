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
    <div class="flex">
        <div class="border-e border-gray-200 dark:border-neutral-700 bg-[#0d4530] rounded-xl">
            <nav class="flex flex-col space-y-2 px-2 py-2" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-white hs-tab-active:text-white py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-white focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500 active" id="vertical-tab-with-border-item-1" aria-selected="true" data-hs-tab="#vertical-tab-with-border-1" aria-controls="vertical-tab-with-border-1" role="tab">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="20" height="20">
                        <path d="M307.72 302.27a8 8 0 01-3.72-6.75V80a48 48 0 00-48-48h0a48 48 0 00-48 48v215.52a8 8 0 01-3.71 6.74 97.51 97.51 0 00-44.19 86.07A96 96 0 00352 384a97.49 97.49 0 00-44.28-81.73zM256 112v272" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/>
                        <circle cx="256" cy="384" r="48"/>
                    </svg>  
                    Temp
                </button>
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-white hs-tab-active:text-white py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-white focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="vertical-tab-with-border-item-2" aria-selected="false" data-hs-tab="#vertical-tab-with-border-2" aria-controls="vertical-tab-with-border-2" role="tab">
                    <svg width="24" height="24" fill="#00BCD4" viewBox="0 0 24 24">
                        <path d="M12 2C10 6 6 10 6 14c0 3.3 2.7 6 6 6s6-2.7 6-6c0-4-4-8-6-12zm0 16c-2.2 0-4-1.8-4-4 0-1.6 1.5-3.9 4-7.2 2.5 3.3 4 5.6 4 7.2 0 2.2-1.8 4-4 4z"/>
                    </svg>                
                    Humidity
                </button>
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-white hs-tab-active:text-white py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-white focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-3" aria-selected="false" data-hs-tab="#tabs-with-icons-3" aria-controls="tabs-with-icons-3" role="tab">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="20" height="20">
                        <path d="M307.72 302.27a8 8 0 01-3.72-6.75V80a48 48 0 00-48-48h0a48 48 0 00-48 48v215.52a8 8 0 01-3.71 6.74 97.51 97.51 0 00-44.19 86.07A96 96 0 00352 384a97.49 97.49 0 00-44.28-81.73zM256 112v272" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/>
                        <circle cx="256" cy="384" r="48"/>
                    </svg>                
                    Liquid Temp
                </button>
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-white hs-tab-active:text-white py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-white focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-4" aria-selected="false" data-hs-tab="#tabs-with-icons-4" aria-controls="tabs-with-icons-4" role="tab">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                    </svg>              
                    Alcohol Level
                </button>
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-white hs-tab-active:text-white py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-white focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-5" aria-selected="false" data-hs-tab="#tabs-with-icons-5" aria-controls="tabs-with-icons-5" role="tab">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
                    </svg>               
                    pH Level
                </button>
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-white hs-tab-active:text-white py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-white focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-6" aria-selected="false" data-hs-tab="#tabs-with-icons-6" aria-controls="tabs-with-icons-6" role="tab">               
                    ° Brix
                </button>
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-white hs-tab-active:text-white py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-white focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500" id="tabs-with-icons-item-7" aria-selected="false" data-hs-tab="#tabs-with-icons-7" aria-controls="tabs-with-icons-7" role="tab">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 0-6.23-.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                    </svg>               
                    Liquid Level
                </button>
            </nav>
        </div>
      
        <div class="mt-3 flex-1 p-4">
            <div id="vertical-tab-with-border-1" role="tabpanel" aria-labelledby="vertical-tab-with-border-item-1">
                <div class="w-full h-full">
                    <canvas id="temperatureChart"></canvas>
                </div>
            </div>
            <div id="vertical-tab-with-border-2" class="hidden" role="tabpanel" aria-labelledby="vertical-tab-with-border-item-2">
                <div>
                    <canvas id="humidityChart"></canvas>
                </div>
            </div>
            <div id="tabs-with-icons-3" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-3">
                <div>
                    <canvas id="liquidTemperatureChart"></canvas>
                </div>
            </div>
            <div id="tabs-with-icons-4" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-4">
                <div>
                    <canvas id="alcoholChart"></canvas>
                </div>
            </div>
            <div id="tabs-with-icons-5" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-5">
                <div>
                    <canvas id="pHLevelChart"></canvas>
                </div>
            </div>
            <div id="tabs-with-icons-6" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-6">
                <div>
                    <canvas id="brixChart"></canvas>
                </div>
            </div>
            <div id="tabs-with-icons-7" class="hidden" role="tabpanel" aria-labelledby="tabs-with-icons-item-7">
                <div>
                    <canvas id="liquidLevelChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        
        var temperatureData = @json($temperatureData);
        
        console.log(temperatureData);
        
        const ctx = document.getElementById('temperatureChart');
        const days = temperatureData.map(item => item.Day);
        const values = temperatureData.map(item => item.Value);
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: days,
                datasets: [{
                    label: 'Temperature',
                    data: values, 
                    borderWidth: 1,
                    tension: 0.5,
                    borderColor: '#F97316',
                    backgroundColor: '#F97316',
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
        Livewire.on('updateTemperatureChart', (neTempData) => {
            temperatureData = neTempData;
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
                    borderColor: '#3B82F6',
                    backgroundColor: '#3B82F6',
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

    <script>
                
        var liquidTempData = @json($liquidTempData);
        
        console.log(liquidTempData);
        
        const ctxLiquidTemp = document.getElementById('liquidTemperatureChart');
        const daysLiquidTemp = liquidTempData.map(item => item.Day);
        const valuesLiquidTemp = liquidTempData.map(item => item.Value);
        
        new Chart(ctxLiquidTemp, {
            type: 'line',
            data: {
                labels: daysLiquidTemp,
                datasets: [{
                    label: 'Liquid Temperature',
                    data: valuesLiquidTemp, 
                    borderWidth: 1,
                    tension: 0.5,
                    borderColor: '#0EA5E9',
                    backgroundColor: '#0EA5E9',
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
        Livewire.on('updateLiquidTempChart', (newLiquidTempData) => {
            liquidTempData = newLiquidTempData;
        });

    </script>

    <script>
                    
        var alcoholData = @json($alcoholData);
        
        console.log(alcoholData);
        
        const ctxAlc = document.getElementById('alcoholChart');
        const daysAlc = alcoholData.map(item => item.Day);
        const valuesAlc = alcoholData.map(item => item.Value);
        
        new Chart(ctxAlc, {
            type: 'line',
            data: {
                labels: daysAlc,
                datasets: [{
                    label: 'Alcohol',
                    data: valuesAlc, 
                    borderWidth: 1,
                    tension: 0.5,
                    borderColor: '#8B5CF6',
                    backgroundColor: '#8B5CF6',
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
        Livewire.on('updateAlcoholChart', (newAlcData) => {
            alcoholData = newAlcData;
        });

    </script>

    <script>
                        
        var pHLevelData = @json($pHLevelData);
        
        console.log(pHLevelData);
        
        const ctxpHlvl = document.getElementById('pHLevelChart');
        const dayspHlvl = pHLevelData.map(item => item.Day);
        const valuespHlvl = pHLevelData.map(item => item.Value);
        
        new Chart(ctxpHlvl, {
            type: 'line',
            data: {
                labels: dayspHlvl,
                datasets: [{
                    label: 'pH Level',
                    data: valuespHlvl, 
                    borderWidth: 1,
                    tension: 0.5,
                    borderColor: '#22C55E',
                    backgroundColor: '#22C55E',
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
        Livewire.on('updatepHLevelChart', (newpHLevelData) => {
            pHLevelData = newpHLevelData;
        });

    </script>

    <script>
                            
        var brixData = @json($brixData);
        
        console.log(brixData);
        
        const ctxBrix = document.getElementById('brixChart');
        const daysBrix = brixData.map(item => item.Day);
        const valuesBrix = brixData.map(item => item.Value);
        
        new Chart(ctxBrix, {
            type: 'line',
            data: {
                labels: daysBrix,
                datasets: [{
                    label: 'Brix',
                    data: valuesBrix, 
                    borderWidth: 1,
                    tension: 0.5,
                    borderColor: '#EAB308',
                    backgroundColor: '#EAB308',
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
        Livewire.on('updateBrixChart', (newBrixData) => {
            brixData = newBrixData;
        });

    </script>

    <script>
                                
        var liquidLevelData = @json($liquidLevelData);
        
        console.log(liquidLevelData);
        
        const ctxLiquidLevel = document.getElementById('liquidLevelChart');
        const daysLiquidLevel = liquidLevelData.map(item => item.Day);
        const valuesLiquidLevel = liquidLevelData.map(item => item.Value);
        
        new Chart(ctxLiquidLevel, {
            type: 'line',
            data: {
                labels: daysLiquidLevel,
                datasets: [{
                    label: 'Liquid Level',
                    data: valuesLiquidLevel, 
                    borderWidth: 1,
                    tension: 0.5,
                    borderColor: '#14B8A6',
                    backgroundColor: '#14B8A6',
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
        Livewire.on('updateLiquidLevelChart', (newLiquidLevelData) => {
            liquidLevelData = newLiquidLevelData;
        });

    </script>
</div>

