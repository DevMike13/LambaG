<div>
    <div class="flex justify-between items-center flex-col gap-5 lg:flex-row lg:gap-2 mb-5">
        <div class="w-full lg:w-1/2 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700 flex justify-between items-center">
                <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                    GSM Module Config
                </p>
            </div>
            <div class="p-4 md:p-5">
                <div class="flex justify-start items-center gap-2">
                    <div>
                        <x-toggle left-label="SMS Alerts" wire:model.defer="isActiveSMS" lg wire:click="toggleSMS" />
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700 flex justify-between items-center">
                <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">
                    Controls
                </p>
            </div>
            <div class="p-4 md:p-5">
                <div class="flex justify-start items-center gap-2">
                    <div>
                        <x-toggle left-label="Buzzer Alert" wire:model.defer="isActiveBuzzer" lg wire:click="toggleBuzzer" />
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        Min Value
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Max Value
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
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
                        {{number_format($tempMinThresholdData, 2, '.', ',')}} °C
                    </td>
                    <td class="px-6 py-4">
                        {{number_format($tempMaxThresholdData, 2, '.', ',')}} °C
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" onclick="$openModal('temperatureModal')" class="text-xs bg-blue-600 px-2 py-1 rounded-lg text-white">Set Threshhold Range</a>
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
                        {{number_format($humidMinThresholdData, 2, '.', ',')}} %
                    </td>
                    <td class="px-6 py-4">
                        {{number_format($humidMaxThresholdData, 2, '.', ',')}} %
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" onclick="$openModal('humidityModal')" class="text-xs bg-blue-600 px-2 py-1 rounded-lg text-white">Set Threshhold Range</a>
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
                        {{number_format($liquidTempMinThresholdData, 2, '.', ',')}} °C
                    </td>
                    <td class="px-6 py-4">
                        {{number_format($liquidTempMaxThresholdData, 2, '.', ',')}} °C
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" onclick="$openModal('liquidTempModal')" class="text-xs bg-blue-600 px-2 py-1 rounded-lg text-white">Set Threshhold Range</a>
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
                        {{number_format($alcoholMinThresholdData, 2, '.', ',')}} %
                    </td>
                    <td class="px-6 py-4">
                        {{number_format($alcoholMaxThresholdData, 2, '.', ',')}} %
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" onclick="$openModal('alcoholModal')" class="text-xs bg-blue-600 px-2 py-1 rounded-lg text-white">Set Threshhold Range</a>
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
                        {{number_format($brixMinThresholdData, 2, '.', ',')}} %
                    </td>
                    <td class="px-6 py-4">
                        {{number_format($brixMaxThresholdData, 2, '.', ',')}} %
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" onclick="$openModal('brixModal')" class="text-xs bg-blue-600 px-2 py-1 rounded-lg text-white">Set Threshhold Range</a>
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
                        {{number_format($pHMinThresholdData, 2, '.', ',')}}
                    </td>
                    <td class="px-6 py-4">
                        {{number_format($pHMaxThresholdData, 2, '.', ',')}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" onclick="$openModal('pHLevelModal')" class="text-xs bg-blue-600 px-2 py-1 rounded-lg text-white">Set Threshhold Range</a>
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
                        {{number_format($liquidLevelMinThresholdData, 2, '.', ',')}} %
                    </td>
                    <td class="px-6 py-4">
                        {{number_format($liquidLevelMaxThresholdData, 2, '.', ',')}} %
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" onclick="$openModal('liquidLevelModal')" class="text-xs bg-blue-600 px-2 py-1 rounded-lg text-white">Set Threshhold Range</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- TEMP MODAL --}}
    <x-modal blur name="temperatureModal" persistent align="center" max-width="sm">
        <x-card title="Set Temperature Treshold">
            
            <x-inputs.number label="Min Value" wire:model="setMinTempThresholdValue" />
            <div class="mt-5">
                <x-inputs.number label="Max Value" wire:model="setMaxTempThresholdValue" />
            </div>
            
            <x-slot name="footer" class="flex justify-end gap-x-4">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Save" wire:click="setTempThreshold" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    {{-- HUMID MODAL --}}
    <x-modal blur name="humidityModal" persistent align="center" max-width="sm">
        <x-card title="Set Humidity Treshold">
            
            <x-inputs.number label="Min Value" wire:model="setMinHumidThresholdValue" />
            <div class="mt-5">
                <x-inputs.number label="Max Value" wire:model="setMaxHumidThresholdValue" />
            </div>
            
            <x-slot name="footer" class="flex justify-end gap-x-4">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Save" wire:click="setHumidThreshold" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    {{-- LIQUID TEMP MODAL --}}
    <x-modal blur name="liquidTempModal" persistent align="center" max-width="sm">
        <x-card title="Set Liquid Temp Treshold">
            
            <x-inputs.number label="Min Value" wire:model="setMinLiquidTempThresholdValue" />
            <div class="mt-5">
                <x-inputs.number label="Max Value" wire:model="setMaxLiquidTempThresholdValue" />
            </div>
            
            <x-slot name="footer" class="flex justify-end gap-x-4">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Save" wire:click="setLiquidTempThreshold" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    {{-- ALCOHOL MODAL --}}
    <x-modal blur name="alcoholModal" persistent align="center" max-width="sm">
        <x-card title="Set Alcohol Treshold">
            
            <x-inputs.number label="Min Value" wire:model="setMinAlcoholThresholdValue" />
            <div class="mt-5">
                <x-inputs.number label="Max Value" wire:model="setMaxAlcoholThresholdValue" />
            </div>
            
            <x-slot name="footer" class="flex justify-end gap-x-4">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Save" wire:click="setAlcoholThreshold" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    {{-- BRIX MODAL --}}
    <x-modal blur name="brixModal" persistent align="center" max-width="sm">
        <x-card title="Set Brix Treshold">
            
            <x-inputs.number label="Min Value" wire:model="setMinBrixThresholdValue" />
            <div class="mt-5">
                <x-inputs.number label="Max Value" wire:model="setMaxBrixThresholdValue" />
            </div>
            
            <x-slot name="footer" class="flex justify-end gap-x-4">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Save" wire:click="setBrixThreshold" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    {{-- PH LEVEL MODAL --}}
    <x-modal blur name="pHLevelModal" persistent align="center" max-width="sm">
        <x-card title="Set pH Level Treshold">
            
            <x-inputs.number label="Min Value" wire:model="setMinPHThresholdValue" />
            <div class="mt-5">
                <x-inputs.number label="Max Value" wire:model="setMaxPHThresholdValue" />
            </div>
            
            <x-slot name="footer" class="flex justify-end gap-x-4">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Save" wire:click="setPHLevelThreshold" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    {{-- LIQUID LEVEL MODAL --}}
    <x-modal blur name="liquidLevelModal" persistent align="center" max-width="sm">
        <x-card title="Set Liquid Level Treshold">
            
            <x-inputs.number label="Min Value" wire:model="setMinLiquidLevelThresholdValue" />
            <div class="mt-5">
                <x-inputs.number label="Max Value" wire:model="setMaxLiquidLevelThresholdValue" />
            </div>
            
            <x-slot name="footer" class="flex justify-end gap-x-4">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Save" wire:click="setLiquidLevelThreshold" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
