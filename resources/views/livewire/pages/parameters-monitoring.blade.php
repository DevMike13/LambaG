<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Environmental Metrics
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sensor Readings
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Temp (°C)
                    </th>
                    <td class="px-6 py-4">
                        {{number_format($temperatureData, 2, '.', ',')}} °C
                    </td>
                    <td class="px-6 py-4">
                        
                    </td>
                </tr>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Humidity (%)
                    </th>
                    <td class="px-6 py-4">
                        {{number_format($humidityData, 2, '.', ',')}} %
                    </td>
                    <td class="px-6 py-4">
                        
                    </td>
                </tr>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Liquid Temp (°C)
                    </th>
                    <td class="px-6 py-4">
                        {{number_format($liquidTempData, 2, '.', ',')}} °C
                    </td>
                    <td class="px-6 py-4">
                        
                    </td>
                </tr>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Alcohol Level (%)
                    </th>
                    <td class="px-6 py-4">
                        {{number_format($alcoholData, 2, '.', ',')}} %
                    </td>
                    <td class="px-6 py-4">
                        
                    </td>
                </tr>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Sugar (°Brix)
                    </th>
                    <td class="px-6 py-4">
                        {{number_format($brixData, 2, '.', ',')}} %
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" onclick="$openModal('brixModal')" class="text-xs bg-blue-600 px-2 py-1 rounded-lg text-white">Set Brix</a>
                    </td>
                </tr>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        pH Level
                    </th>
                    <td class="px-6 py-4">
                        {{number_format($pHLevelData, 2, '.', ',')}}
                    </td>
                    <td class="px-6 py-4">
                        
                    </td>
                </tr>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Liquid Level (%)
                    </th>
                    <td class="px-6 py-4">
                        {{number_format($liquidLevelData, 2, '.', ',')}} %
                    </td>
                    <td class="px-6 py-4">
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- BRIX MODAL --}}
    <x-modal blur name="brixModal" persistent align="center" max-width="sm">
        <x-card title="Set Brix Value">
            
            <x-inputs.number label="Brix Value" wire:model="brixSetData" />
           
            <x-slot name="footer" class="flex justify-end gap-x-4">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Save" wire:click="setBrixValue" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
