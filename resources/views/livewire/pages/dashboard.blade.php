<div class="w-full h-auto">
    <div class="flex w-full lg:flex-row flex-col items-stretch">
        <div class="lg:w-[70%] w-full h-full mr-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-5 ">
            {{-- HUMIDITY --}}
                <x-card class="relative overflow-hidden aspect-square rounded-2xl">
                    <div class="absolute inset-0 pointer-events-none overflow-hidden droplets">
                    {{-- @for ($i = 0; $i < 15; $i++)
                        <span class="droplet"
                            style="left: {{ rand(0,100) }}%; animation-delay: {{ rand(0,3000) }}ms;"></span>
                    @endfor --}}
                    </div>
                    <div class="p-2 relative z-10 flex flex-col justify-center items-center h-full">
                        <div class="flex justify-center items-center gap-3">
                            <img src="{{ asset('/images/humid.png') }}" alt="" class="w-6 h-6">
                            <h3 class="text-md font-regular">Humidity</h3>
                        </div>
                        
                        <p class="font-bold text-2xl mt-3">{{number_format($humidityData, 2, '.', ',')}} %</p>
                    </div>
                </x-card>
                
                {{-- TEMPERATURE --}}
                <x-card class="relative overflow-hidden aspect-square">
                    <div class="absolute inset-0 pointer-events-none">
                    {{-- @for ($i = 0; $i < 6; $i++)
                        <span class="heat-line"
                            style="left: {{ rand(10, 90) }}%; animation-delay: {{ rand(0,2000) }}ms;"></span>
                    @endfor --}}
                    </div>
                    <div class="p-2 relative z-10 flex flex-col justify-center items-center h-full">
                        <div class="flex justify-center items-center gap-3">
                            <img src="{{ asset('/images/temp.png') }}" alt="" class="w-6 h-6">
                            <h3 class="text-md font-regular">Temperature</h3>
                        </div>
                        <p class="font-bold text-2xl mt-3">{{number_format($temperatureData, 2, '.', ',')}} °C</p>
                    </div>
                </x-card>
                
                {{-- ALCOHOL LEVEL --}}
                <x-card class="relative overflow-hidden aspect-square">
                    <div class="absolute inset-0 pointer-events-none">
                    {{-- @for ($i = 0; $i < 8; $i++)
                        <span class="bubble"
                            style="left: {{ rand(10,90) }}%; animation-delay: {{ rand(0,3000) }}ms;"></span>
                    @endfor --}}
                    </div>
                    <div class="p-4 relative z-10 flex flex-col justify-center items-center h-full">
                        <div class="flex justify-center items-center gap-3">
                            <img src="{{ asset('/images/alc-level.png') }}" alt="" class="w-6 h-6">
                            <h3 class="text-md font-regular">Alcohol Level</h3>
                        </div>
                        <p class="font-bold text-2xl mt-3">{{number_format($alcoholData, 2, '.', ',')}} %</p>
                    </div>
                </x-card>
            
                {{-- LIQUID TEMP --}}
                <x-card class="relative overflow-hidden aspect-square">
                    <div class="absolute inset-0 pointer-events-none">
                        {{-- @for ($i = 0; $i < 6; $i++)
                            <span class="heatwave"
                                style="left: {{ rand(10,90) }}%; animation-delay: {{ rand(0,2000) }}ms;"></span>
                        @endfor --}}
                    </div>
                    <div class="p-4 relative z-10 flex flex-col justify-center items-center h-full">
                        <div class="flex justify-center items-center gap-3">
                            <img src="{{ asset('/images/temp.png') }}" alt="" class="w-6 h-6">
                            <h3 class="text-md font-regular text-center">Liquid Temperature</h3>
                        </div>
                        <p class="font-bold text-2xl mt-3">{{number_format($liquidTempData, 2, '.', ',')}} °C</p>
                    </div>
                </x-card>
            
                {{-- pH LEVEL --}}
                <x-card class="relative overflow-hidden aspect-square rounded-t-lg rounded-b-lg">
                    {{-- <div class="absolute inset-0 animate-ph pointer-events-none"></div> --}}
                    <div class="p-4 relative z-10 flex flex-col justify-center items-center h-full">
                        <div class="flex justify-center items-center gap-3">
                            <img src="{{ asset('/images/ph.png') }}" alt="" class="w-6 h-6">
                            <h3 class="text-md font-regular">pH Level</h3>
                        </div>
                        <p class="font-bold text-2xl mt-3">{{number_format($pHLevelData, 2, '.', ',')}}</p>
                    </div>
                </x-card>
            
                {{-- BRIX --}}
                <x-card class="relative overflow-hidden aspect-square">
                    <div class="absolute inset-0 pointer-events-none">
                    {{-- @for ($i = 0; $i < 10; $i++)
                        <span class="sparkle"
                            style="left: {{ rand(5,90) }}%; top: {{ rand(10,90) }}%; animation-delay: {{ rand(0,3000) }}ms;"></span>
                    @endfor --}}
                    </div>
                    <div class="p-4 relative z-10 flex flex-col justify-center items-center h-full">
                        <div class="flex justify-center items-center gap-3">
                            <img src="{{ asset('/images/brix.png') }}" alt="" class="w-6 h-6">
                            <h3 class="text-md font-regular">Brix Level</h3>
                        </div>
                        <p class="font-bold text-2xl mt-3">{{number_format($brixData, 2, '.', ',')}} °Bx</p>
                    </div>
                </x-card>
        
            </div>
        </div>
        
        <div class="lg:w-[30%] w-full h-full">
            {{-- <x-card class="relative h-[440px] overflow-hidden rounded-lg">
                <div class="waveContainer" style="--level: {{ floor($liquidLevelData * 2.85) }}%;">
                    <div class="waveAnimation w-full h-full">
                        <svg class="w-full h-full" viewBox="0 0 500 150" preserveAspectRatio="none">
                            <path class="w1 waveTop"
                                  d="M-8.74,90 C120,120 380,60 505,90 L500,150 L0,150 Z"/>
                            <path class="w2 waveMiddle"
                                  d="M-20,110 C140,80 360,100 520,110 L500,150 L0,150 Z"/>
                            <path class="w3 waveBottom"
                                  d="M-20,120 C160,100 340,130 520,120 L500,150 L0,150 Z"/>
                        </svg>
                    </div>
                </div>
            
                <div class="absolute inset-0 flex flex-col justify-center items-center z-10">
                    <h3 class="text-md font-regular">Liquid Level</h3>
                    <p class="font-bold text-3xl">{{number_format($liquidLevelData, 2, '.', ',')}} %</p>
                </div>
            </x-card> --}}
            <x-card class="relative h-[300px] flex items-center justify-center rounded-lg">
                <div class="relative w-64 h-64">
                    <svg class="w-full h-full -rotate-90" viewBox="0 0 36 36">
                        <!-- Background circle -->
                        <circle
                            class="text-gray-200"
                            stroke="currentColor"
                            stroke-width="3"
                            fill="none"
                            cx="18" cy="18" r="15.915"
                        />
            
                        <!-- Progress circle -->
                        <circle
                            class="text-blue-500"
                            stroke="currentColor"
                            stroke-width="3"
                            stroke-linecap="round"
                            fill="none"
                            cx="18" cy="18" r="15.915"
                            stroke-dasharray="{{ $liquidLevelData }}, 100"
                        />
                    </svg>
            
                    <!-- Center text -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <h3 class="text-md font-regular text-gray-600">Liquid Level</h3>
                        <p class="font-bold text-3xl text-gray-900">
                            {{ number_format($liquidLevelData, 2, '.', ',') }} %
                        </p>
                    </div>
                </div>
            </x-card>
            
        </div>
    </div>
</div>
