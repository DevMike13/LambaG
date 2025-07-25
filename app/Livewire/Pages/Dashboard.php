<?php

namespace App\Livewire\Pages;

use App\Models\SensorDatas;
use Carbon\Carbon;
use Livewire\Component;
use Kreait\Firebase\Contract\Database;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class Dashboard extends Component
{
    protected Database $database;
    
    public $soilMoistureData;
    public $soilPHData;
    public $waterPHData;
    public $temperatureData;
    public $humidityData;
    
    public $fanState;
    public bool $isActiveFan;

    public $lightState;
    public bool $isActiveLight;

    public $mistingSystemData;
    public $waterLevelData;

    // #[Url()]
    public $selectedBoard = 'B1';

    protected $listeners = [
        'updateSoilMoistureLevel' => 'handleSoilMoistureLevelUpdate',
        'updateSoilPHLevel' => 'handleSoilPHLevelUpdate',
        'updateWaterPHLevel' => 'handleWaterPHLevelUpdate',
        'updateTemperatureLevel' => 'handleTemperatureLevelUpdate',
        'updateHumidityLevel' => 'handleHumidityLevelUpdate',
        'updateFanState' => 'handleFanStateUpdate',
        'updateLightState' => 'handleLightStateUpdate',
        'updateMistingSystem' => 'handleMistingSystemUpdate',
        'updateWaterLevel' => 'handleWaterLevelUpdate',
    ];

    public $phLevelData = [];
    public $doLevelData = [];
    public $alLevelData=[];
    public $wtLevelData=[];

    public function mount(Database $database)
    {
        $this->database = $database;
        $this->fetchData();
        $this->getFanState();
        // $this->getPhLevelDataForCurrentWeek();
        // $this->getDOLevelDataForCurrentWeek();
        // $this->getAlLevelDataForCurrentWeek();
        // $this->getWtDataForCurrentWeek();
        
    }

    public function getPhLevelDataForCurrentWeek()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $phData = SensorDatas::selectRaw('DAYNAME(reading_date) as Day, ph_level as Value')
            ->whereIn('id', function ($query) use ($startOfWeek, $endOfWeek) {
                $query->selectRaw('MAX(id)')
                    ->from('sensor_datas')
                    ->whereBetween('reading_date', [$startOfWeek, $endOfWeek])
                    ->groupByRaw('DATE(reading_date)');
            })
            ->orderByRaw('FIELD(Day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")')
            ->get();

        $this->phLevelData = $phData->map(function ($item) {
            return [
                'Day' => substr($item->Day, 0, 3), // Shorten day name (Mon, Tue, etc.)
                'Value' => round($item->Value, 2)  // Round to 2 decimal places
            ];
        })->toArray();
    }

    public function getDOLevelDataForCurrentWeek()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Get only the latest dissolved oxygen level data for each day of the current week
        $doData = SensorDatas::selectRaw('DAYNAME(reading_date) as Day, dissolved_oxygen as Value')
            ->whereIn('id', function ($query) use ($startOfWeek, $endOfWeek) {
                $query->selectRaw('MAX(id)')
                    ->from('sensor_datas')
                    ->whereBetween('reading_date', [$startOfWeek, $endOfWeek])
                    ->groupByRaw('DATE(reading_date)');
            })
            ->orderByRaw('FIELD(Day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")')
            ->get();

        // Format the data for use in your view or chart
        $this->doLevelData = $doData->map(function ($item) {
            return [
                'Day' => substr($item->Day, 0, 3), // Shorten day name (Mon, Tue, etc.)
                'Value' => round($item->Value, 2)  // Round to 2 decimal places
            ];
        })->toArray();
    }

    public function getAlLevelDataForCurrentWeek()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $alData = SensorDatas::selectRaw('DAYNAME(reading_date) as Day, alkalinity_level as Value')
            ->whereIn('id', function ($query) use ($startOfWeek, $endOfWeek) {
                $query->selectRaw('MAX(id)')
                    ->from('sensor_datas')
                    ->whereBetween('reading_date', [$startOfWeek, $endOfWeek])
                    ->groupByRaw('DATE(reading_date)');
            })
            ->orderByRaw('FIELD(Day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")')
            ->get();

        $this->alLevelData = $alData->map(function ($item) {
            return [
                'Day' => substr($item->Day, 0, 3), // Shorten day name (Mon, Tue, etc.)
                'Value' => round($item->Value, 2)  // Round to 2 decimal places
            ];
        })->toArray();
    }

    public function getWtDataForCurrentWeek()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Retrieve only the latest water temperature data for each day of the current week
        $wtData = SensorDatas::selectRaw('DAYNAME(reading_date) as Day, water_temperature as Value')
            ->whereIn('id', function ($query) use ($startOfWeek, $endOfWeek) {
                $query->selectRaw('MAX(id)')
                    ->from('sensor_datas')
                    ->whereBetween('reading_date', [$startOfWeek, $endOfWeek])
                    ->groupByRaw('DATE(reading_date)');
            })
            ->orderByRaw('FIELD(Day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")')
            ->get();

        // Format the data for use in the chart
        $this->wtLevelData = $wtData->map(function ($item) {
            return [
                'Day' => substr($item->Day, 0, 3),  // Shorten the day name (e.g., Mon, Tue)
                'Value' => round($item->Value, 2)   // Round to 2 decimal places
            ];
        })->toArray();
    }

    public function fetchData()
    {
        try {
            $board = $this->selectedBoard ?? 'B1';

            // SOIL MOISTURE
            $referenceSoilMoisture = $this->database->getReference("{$board}/SoilMoisture");
            $snapshotSoilMoisture = $referenceSoilMoisture->getSnapshot();
            $this->soilMoistureData = $snapshotSoilMoisture->getValue();

            // SOIL PH
            $referenceSoilPH = $this->database->getReference('{$board}/SoilPH');
            $snapshotSoilPH = $referenceSoilPH->getSnapshot();
            $this->soilPHData = $snapshotSoilPH->getValue();

            // SOIL WATER PH
            $referenceWaterPH = $this->database->getReference('B5/WaterPH');
            $snapshotWaterPH= $referenceWaterPH->getSnapshot();
            $this->waterPHData = $snapshotWaterPH->getValue();

            // TEMPERATURE
            $referenceTemperature = $this->database->getReference('B1/Temperature');
            $snapshotTemperature = $referenceTemperature->getSnapshot();
            $this->temperatureData = $snapshotTemperature->getValue();

            // HUMIDITY
            $referenceHumidity = $this->database->getReference('B1/Humidity');
            $snapshotHumidity = $referenceHumidity->getSnapshot();
            $this->humidityData = $snapshotHumidity->getValue();

            // FAN STATE
            $referenceFanState = $this->database->getReference('System/Fan');
            $snapshotFanState = $referenceFanState->getSnapshot();
            $this->fanState = $snapshotFanState->getValue();

            // LIGHT STATE
            $referenceLightState = $this->database->getReference('System/Light');
            $snapshotLightState = $referenceLightState->getSnapshot();
            $this->lightState = $snapshotLightState->getValue();

            // MISTING SYSTEM
            $referenceMistingSystem = $this->database->getReference('System/MistingSystem');
            $snapshotMistingSystem = $referenceMistingSystem->getSnapshot();
            $this->mistingSystemData = $snapshotMistingSystem->getValue();

            // WATER LEVEL
            $referenceWaterLevel = $this->database->getReference('System/WaterLevel');
            $snapshotWaterLevel = $referenceWaterLevel->getSnapshot();
            $this->waterLevelData = $snapshotWaterLevel->getValue();

        } catch (\Exception $e) {
            $this->soilMoistureData = 'Error: ' . $e->getMessage();
        }
    }

    public function handleSoilMoistureLevelUpdate($soilMoistureLevel)
    {
        $this->soilMoistureData = $soilMoistureLevel;
    }

    public function handleSoilPHLevelUpdate($soilPHLevel)
    {
        $this->soilPHData = $soilPHLevel;
    }

    public function handleWaterPHLevelUpdate($waterPHLevel)
    {
        $this->waterPHData = $waterPHLevel;
    }

    public function handleTemperatureLevelUpdate($temperatureLevel)
    {
        $this->temperatureData = $temperatureLevel;
    }

    public function handleHumidityLevelUpdate($humidityLevel)
    {
        $this->humidityData = $humidityLevel;
    }

    public function updatedSelectedBoard($value)
    {
        $this->dispatch('board-changed', board: $value);
    }

    // SYSTEM
    public function getFanState()
    {
        try {
            $reference = $this->database->getReference('System/Fan');
            $currentData = $reference->getValue();

            if ($currentData == 'ON') {
                $this->fanState = 'ON';
                $this->isActiveFan = true;
            } else {
                $this->fanState = 'OFF';
                $this->isActiveFan = false;
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error retrieving status: ' . $e->getMessage()], 500);
        }
    }

    public function toggleFan(Database $database)
    {
        $this->database = $database;
        try {
            $reference = $this->database->getReference('System/Fan');
            
            $currentData = $reference->getValue();
            
            if ($currentData == 'OFF') {
                $this->fanState = 'ON';
                $this->isActiveFan = true;
            } else {
                $this->fanState = 'OFF';
                $this->isActiveFan = false;
            }

            $reference->set($this->fanState);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error toggling status: ' . $e->getMessage()], 500);
        }
    }

    public function handleFanStateUpdate($fanState)
    {
        $this->fanState = $fanState;
        $this->isActiveFan = $fanState === 'ON';
    }

    // LIGHT
    public function getLightState()
    {
        try {
            $reference = $this->database->getReference('System/Light');
            $currentData = $reference->getValue();

            if ($currentData == 'ON') {
                $this->lightState = 'ON';
                $this->isActiveLight = true;
            } else {
                $this->lightState = 'OFF';
                $this->isActiveLight = false;
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error retrieving status: ' . $e->getMessage()], 500);
        }
    }

    public function toggleLight(Database $database)
    {
        $this->database = $database;
        try {
            $reference = $this->database->getReference('System/Light');
            
            $currentData = $reference->getValue();
            
            if ($currentData == 'OFF') {
                $this->lightState = 'ON';
                $this->isActiveLight = true;
            } else {
                $this->lightState = 'OFF';
                $this->isActiveLight = false;
            }

            $reference->set($this->lightState);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error toggling status: ' . $e->getMessage()], 500);
        }
    }

    public function handleMistingSystemUpdate($mistingSystem)
    {
        $this->mistingSystemData = $mistingSystem;
    }

    public function handleWaterLevelUpdate($waterLevel)
    {
        $this->waterLevelData = $waterLevel;
    }

    public function render()
    {
        return view('livewire.pages.dashboard', [
            'soilMoisture' => $this->soilMoistureData,
            'soilPH' => $this->soilPHData,
            'waterPH' => $this->waterPHData,
            'temperature' => $this->temperatureData,
            'humidity' => $this->humidityData,
            'mistingSystem' => $this->mistingSystemData,
            'waterLevel' => $this->waterLevelData,
        ]);
    }
}
