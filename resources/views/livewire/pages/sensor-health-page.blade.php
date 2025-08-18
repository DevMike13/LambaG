<div class="flex justify-center items-center mb-4">
    <table class="w-full border-separate border-spacing-y-4">
        <thead class="">
            <tr class="">
                <th class="px-8 py-2 text-start">SENSOR NAME</th>
                <th class="px-8 py-2 text-start">READING DATE</th>
                <th class="px-8 py-2 text-start">SENSOR STATUS</th>
            </tr>    
        </thead>
        <tbody>
            <tr class="bg-white">
                <td class="px-8 py-2 rounded-l-full shadow-sm">Alcohol Sensor (MQ-3)</td>
                <td class="px-8 py-2 shadow-sm">2025-06-15 08:00 AM</td>
                <td class="px-8 py-2 rounded-r-full shadow-sm font-semibold uppercase 
                    {{ $alcoholSensor === 'Warning' ? 'text-red-600' : 'text-blue-600' }}">
                    {{ $alcoholSensor }}
                </td>
            </tr>
            <tr class="bg-white">
                <td class="px-8 py-2 rounded-l-full shadow-sm">Temperature & Humidity Sensor (DHT22)</td>
                <td class="px-8 py-2 shadow-sm">2025-06-15 08:00 AM</td>
                <td class="px-8 py-2 rounded-r-full shadow-sm font-semibold uppercase 
                    {{ $TempHumidSensor === 'Warning' ? 'text-red-600' : 'text-blue-600' }}">
                    {{ $TempHumidSensor }}
                </td>
            </tr>
            <tr class="bg-white">
                <td class="px-8 py-2 rounded-l-full shadow-sm">Waterproof Temperature Sensor (DS18B20)</td>
                <td class="px-8 py-2 shadow-sm">2025-06-15 08:00 AM</td>
                <td class="px-8 py-2 rounded-r-full shadow-sm font-semibold uppercase 
                    {{ $WaterProof === 'Warning' ? 'text-red-600' : 'text-blue-600' }}">
                    {{ $WaterProof }}
                </td>
            </tr>
            <tr class="bg-white">
                <td class="px-8 py-2 rounded-l-full shadow-sm">Analog PH Sensor</td>
                <td class="px-8 py-2 shadow-sm">2025-06-15 08:00 AM</td>
                <td class="px-8 py-2 rounded-r-full shadow-sm font-semibold uppercase 
                    {{ $analogPHSensor === 'Warning' ? 'text-red-600' : 'text-blue-600' }}">
                    {{ $analogPHSensor }}
                </td>
            </tr>
            <tr class="bg-white">
                <td class="px-8 py-2 rounded-l-full shadow-sm">Waterproof Ultrasonic Sensor (JSN-SRD4T)</td>
                <td class="px-8 py-2 shadow-sm">2025-06-15 08:00 AM</td>
                <td class="px-8 py-2 rounded-r-full shadow-sm font-semibold uppercase 
                    {{ $UltrasonicSensor === 'Warning' ? 'text-red-600' : 'text-blue-600' }}">
                    {{ $UltrasonicSensor }}
                </td>
            </tr>
            <tr class="bg-white">
                <td class="px-8 py-2 rounded-l-full shadow-sm">GSM Module (SIM-800L)</td>
                <td class="px-8 py-2 shadow-sm">2025-06-15 08:00 AM</td>
                <td class="px-8 py-2 rounded-r-full shadow-sm font-semibold uppercase 
                    {{ $GSMModule === 'Warning' ? 'text-red-600' : 'text-blue-600' }}">
                    {{ $GSMModule }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
