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
    
    public $temperatureData;
    public $humidityData;
    public $liquidTempData;
    public $alcoholData;
    public $brixData;
    public $pHLevelData;
    public $liquidLevelData;

    public $smsState;
    public bool $isActiveSMS;

    public $buzzerState;
    public bool $isActiveBuzzer;

    protected $listeners = [
        'updateTemperature' => 'handleTemperatureUpdate',
        'updateHumidity' => 'handleHumidityUpdate',
        'updateLiquidTemp' => 'handleLiquidTempUpdate',
        'updateAlcohol' => 'handleAlcoholUpdate',
        'updateBrix' => 'handleBrixUpdate',
        'updatePHLevel' => 'handlePHLevelUpdate',
        'updateLiquidLevel' => 'handleLiquidLevelUpdate',
        'updateSMSState' => 'handleSMSStateUpdate',
        'updateBuzzerState' => 'handleBuzzerStateUpdate',
    ];
    

    public function mount(Database $database)
    {
        $this->database = $database;
        $this->fetchData();
    }

    public function fetchData()
    {
        try {
            // TEMPERATURE
            $referenceTemp = $this->database->getReference('/Temperature/SensorValue');  // Example path
            $snapshotTemp = $referenceTemp->getSnapshot();
            $this->temperatureData = $snapshotTemp->getValue();

            // Humidity
            $referenceHumid = $this->database->getReference('/Humidity/SensorValue');  // Example path
            $snapshotHumid = $referenceHumid->getSnapshot();
            $this->humidityData = $snapshotHumid->getValue();

            // Liquid Temp
            $referenceLiquidTemp = $this->database->getReference('/LiquidTemp/SensorValue');  // Example path
            $snapshotLiquidTemp = $referenceLiquidTemp->getSnapshot();
            $this->liquidTempData = $snapshotLiquidTemp->getValue();

            // Alcohol Level
            $referenceAlcohol = $this->database->getReference('/AlcoholLevel/SensorValue');  // Example path
            $snapshotAlcohol = $referenceAlcohol->getSnapshot();
            $this->alcoholData = $snapshotAlcohol->getValue();

            // Brix
            $referenceBrix = $this->database->getReference('/Brix/SensorValue');  // Example path
            $snapshotBrix = $referenceBrix->getSnapshot();
            $this->brixData = $snapshotBrix->getValue();

            // pH Level
            $referencePHLevel = $this->database->getReference('/pHLevel/SensorValue');  // Example path
            $snapshotPHLevel = $referencePHLevel->getSnapshot();
            $this->pHLevelData = $snapshotPHLevel->getValue();

            // Liquid Level
            $referenceLiquidLevel = $this->database->getReference('/LiquidLevel/SensorValue');  // Example path
            $snapshotLiquidLevel = $referenceLiquidLevel->getSnapshot();
            $this->liquidLevelData = $snapshotLiquidLevel->getValue();

            // SMS STATE
            $referenceSMSState = $this->database->getReference('System/SMS');
            $snapshotSMSState = $referenceSMSState->getSnapshot();
            $this->smsState = $snapshotSMSState->getValue();

            // LIGHT STATE
            $referenceBuzzerState = $this->database->getReference('System/Buzzer');
            $snapshotBuzzerState = $referenceBuzzerState->getSnapshot();
            $this->buzzerState = $snapshotBuzzerState->getValue();

        } catch (\Exception $e) {
            $this->temperatureData = 'Error: ' . $e->getMessage();
        }
    }

    public function handleTemperatureUpdate($temperature)
    {
        $this->temperatureData = $temperature;
    }

    public function handleHumidityUpdate($humidity)
    {
        $this->humidityData = $humidity;
    }

    public function handleLiquidTempUpdate($liquidTemp)
    {
        $this->liquidTempData = $liquidTemp;
    }

    public function handleAlcoholUpdate($alcohol)
    {
        $this->alcoholData = $alcohol;
    }

    public function handleBrixUpdate($brix)
    {
        $this->brixData = $brix;
    }

    public function handlePHLevelUpdate($pHLevel)
    {
        $this->pHLevelData = $pHLevel;
    }

    public function handleLiquidLevelUpdate($liquidLevel)
    {
        $this->liquidLevelData = $liquidLevel;
    }

    // SYSTEM SMS
    public function getSMSState()
    {
        try {
            $reference = $this->database->getReference('System/SMS');
            $currentData = $reference->getValue();

            if ($currentData == 'ON') {
                $this->smsState = 'ON';
                $this->isActiveSMS = true;
            } else {
                $this->smsState = 'OFF';
                $this->isActiveSMS = false;
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error retrieving status: ' . $e->getMessage()], 500);
        }
    }

    public function toggleSMS(Database $database)
    {
        $this->database = $database;
        try {
            $reference = $this->database->getReference('System/SMS');
            
            $currentData = $reference->getValue();
            
            if ($currentData == 'OFF') {
                $this->smsState = 'ON';
                $this->isActiveSMS = true;
            } else {
                $this->smsState = 'OFF';
                $this->isActiveSMS = false;
            }

            $reference->set($this->smsState);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error toggling status: ' . $e->getMessage()], 500);
        }
    }

    public function handleSMSStateUpdate($smsState)
    {
        $this->smsState = $smsState;
        $this->isActiveSMS = $smsState === 'ON';
    }

    // SYSTEM Buzzer
    public function getBuzzerState()
    {
        try {
            $reference = $this->database->getReference('System/Buzzer');
            $currentData = $reference->getValue();

            if ($currentData == 'ON') {
                $this->buzzerState = 'ON';
                $this->isActiveBuzzer = true;
            } else {
                $this->buzzerState = 'OFF';
                $this->isActiveBuzzer = false;
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error retrieving status: ' . $e->getMessage()], 500);
        }
    }

    public function toggleBuzzer(Database $database)
    {
        $this->database = $database;
        try {
            $reference = $this->database->getReference('System/Buzzer');
            
            $currentData = $reference->getValue();
            
            if ($currentData == 'OFF') {
                $this->buzzerState = 'ON';
                $this->isActiveBuzzer = true;
            } else {
                $this->buzzerState = 'OFF';
                $this->isActiveBuzzer = false;
            }

            $reference->set($this->buzzerState);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error toggling status: ' . $e->getMessage()], 500);
        }
    }

    public function handleBuzzerStateUpdate($buzzerState)
    {
        $this->buzzerState = $buzzerState;
        $this->isActiveBuzzer = $buzzerState === 'ON';
    }

    public function render()
    {
        return view('livewire.pages.dashboard', [
            'temperature' => $this->temperatureData,
            'humidity' => $this->humidityData,
            'liquidTemp' => $this->liquidTempData,
            'alcohol' => $this->alcoholData,
            'brix' => $this->brixData,
            'pHLevel' => $this->pHLevelData,
            'liquidLevel' => $this->liquidLevelData
        ]);
    }
}
