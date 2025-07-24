<?php

namespace App\Livewire\Pages;

use Kreait\Firebase\Contract\Database;
use Livewire\Component;

class ThresholdCustomization extends Component
{
    protected Database $database;

    public $temperatureData;
    public $tempMinThresholdData;
    public $tempMaxThresholdData;
    public $setMinTempThresholdValue;
    public $setMaxTempThresholdValue;

    public $humidityData;
    public $humidMinThresholdData;
    public $humidMaxThresholdData;
    public $setMinHumidThresholdValue;
    public $setMaxHumidThresholdValue;

    public $liquidTempData;
    public $liquidTempMinThresholdData;
    public $liquidTempMaxThresholdData;
    public $setMinLiquidTempThresholdValue;
    public $setMaxLiquidTempThresholdValue;

    public $alcoholData;
    public $alcoholMinThresholdData;
    public $alcoholMaxThresholdData;
    public $setMinAlcoholThresholdValue;
    public $setMaxAlcoholThresholdValue;

    public $brixData;
    public $brixMinThresholdData;
    public $brixMaxThresholdData;
    public $setMinBrixThresholdValue;
    public $setMaxBrixThresholdValue;

    public $pHLevelData;
    public $pHMinThresholdData;
    public $pHMaxThresholdData;
    public $setMinPHThresholdValue;
    public $setMaxPHThresholdValue;

    public $liquidLevelData;
    public $liquidLevelMinThresholdData;
    public $liquidLevelMaxThresholdData;
    public $setMinLiquidLevelThresholdValue;
    public $setMaxLiquidLevelThresholdValue;

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
            // MIN THRESHOLD
            $referenceTempMinTresh = $this->database->getReference('/Temperature/Min');  // Example path
            $snapshotTempMinTresh = $referenceTempMinTresh->getSnapshot();
            $this->tempMinThresholdData = $snapshotTempMinTresh->getValue();
            $this->setMinTempThresholdValue = $this->tempMinThresholdData;
            // MAX THRESHOLD
            $referenceTempMaxTresh = $this->database->getReference('/Temperature/Max');  // Example path
            $snapshotTempMaxTresh = $referenceTempMaxTresh->getSnapshot();
            $this->tempMaxThresholdData = $snapshotTempMaxTresh->getValue();
            $this->setMaxTempThresholdValue = $this->tempMaxThresholdData;

            // Humidity
            $referenceHumid = $this->database->getReference('/Humidity/SensorValue');  // Example path
            $snapshotHumid = $referenceHumid->getSnapshot();
            $this->humidityData = $snapshotHumid->getValue();
            // MIN THRESHOLD
            $referenceHumidMinTresh = $this->database->getReference('/Humidity/Min');  // Example path
            $snapshotHumidMinTresh = $referenceHumidMinTresh->getSnapshot();
            $this->humidMinThresholdData = $snapshotHumidMinTresh->getValue();
            $this->setMinHumidThresholdValue = $this->humidMinThresholdData;
            // MAX THRESHOLD
            $referenceHumidMaxTresh = $this->database->getReference('/Humidity/Max');  // Example path
            $snapshotHumidMaxTresh = $referenceHumidMaxTresh->getSnapshot();
            $this->humidMaxThresholdData = $snapshotHumidMaxTresh->getValue();
            $this->setMaxHumidThresholdValue = $this->humidMaxThresholdData;

            // Liquid Temp
            $referenceLiquidTemp = $this->database->getReference('/LiquidTemp/SensorValue');  // Example path
            $snapshotLiquidTemp = $referenceLiquidTemp->getSnapshot();
            $this->liquidTempData = $snapshotLiquidTemp->getValue();
            // MIN THRESHOLD
            $referenceLiquidTempMinTresh = $this->database->getReference('/LiquidTemp/Min');  // Example path
            $snapshotLiquidTempMinTresh = $referenceLiquidTempMinTresh->getSnapshot();
            $this->liquidTempMinThresholdData = $snapshotLiquidTempMinTresh->getValue();
            $this->setMinLiquidTempThresholdValue = $this->liquidTempMinThresholdData;
            // MAX THRESHOLD
            $referenceLiquidTempMaxTresh = $this->database->getReference('/LiquidTemp/Max');  // Example path
            $snapshotLiquidTempMaxTresh = $referenceLiquidTempMaxTresh->getSnapshot();
            $this->liquidTempMaxThresholdData = $snapshotLiquidTempMaxTresh->getValue();
            $this->setMaxLiquidTempThresholdValue = $this->liquidTempMaxThresholdData;

            // Alcohol Level
            $referenceAlcohol = $this->database->getReference('/AlcoholLevel/SensorValue');  // Example path
            $snapshotAlcohol = $referenceAlcohol->getSnapshot();
            $this->alcoholData = $snapshotAlcohol->getValue();
            // MIN THRESHOLD
            $referenceAlcoholMinTresh = $this->database->getReference('/AlcoholLevel/Min');  // Example path
            $snapshotAlcoholMinTresh = $referenceAlcoholMinTresh->getSnapshot();
            $this->alcoholMinThresholdData = $snapshotAlcoholMinTresh->getValue();
            $this->setMinAlcoholThresholdValue = $this->alcoholMinThresholdData;
            // MAX THRESHOLD
            $referenceAlcoholMaxTresh = $this->database->getReference('/AlcoholLevel/Max');  // Example path
            $snapshotAlcoholMaxTresh = $referenceAlcoholMaxTresh->getSnapshot();
            $this->alcoholMaxThresholdData = $snapshotAlcoholMaxTresh->getValue();
            $this->setMaxAlcoholThresholdValue = $this->alcoholMaxThresholdData;

            // Brix
            $referenceBrix = $this->database->getReference('/Brix/SensorValue');  // Example path
            $snapshotBrix = $referenceBrix->getSnapshot();
            $this->brixData = $snapshotBrix->getValue();
            // MIN THRESHOLD
            $referenceBrixMinTresh = $this->database->getReference('/Brix/Min');  // Example path
            $snapshotBrixMinTresh = $referenceBrixMinTresh->getSnapshot();
            $this->brixMinThresholdData = $snapshotBrixMinTresh->getValue();
            $this->setMinBrixThresholdValue = $this->brixMinThresholdData;
            // MAX THRESHOLD
            $referenceBrixMaxTresh = $this->database->getReference('/Brix/Max');  // Example path
            $snapshotBrixMaxTresh = $referenceBrixMaxTresh->getSnapshot();
            $this->brixMaxThresholdData = $snapshotBrixMaxTresh->getValue();
            $this->setMaxBrixThresholdValue = $this->brixMaxThresholdData;

            // pH Level
            $referencePHLevel = $this->database->getReference('/pHLevel/SensorValue');  // Example path
            $snapshotPHLevel = $referencePHLevel->getSnapshot();
            $this->pHLevelData = $snapshotPHLevel->getValue();
            // MIN THRESHOLD
            $referencePHLevelMinTresh = $this->database->getReference('/pHLevel/Min');  // Example path
            $snapshotPHLevelMinTresh = $referencePHLevelMinTresh->getSnapshot();
            $this->pHMinThresholdData = $snapshotPHLevelMinTresh->getValue();
            $this->setMinPHThresholdValue = $this->pHMinThresholdData;
            // MAX THRESHOLD
            $referencePHLevelMaxTresh = $this->database->getReference('/pHLevel/Max');  // Example path
            $snapshotPHLevelMaxTresh = $referencePHLevelMaxTresh->getSnapshot();
            $this->pHMaxThresholdData = $snapshotPHLevelMaxTresh->getValue();
            $this->setMaxPHThresholdValue = $this->pHMaxThresholdData;

            // Liquid Level
            $referenceLiquidLevel = $this->database->getReference('/LiquidLevel/SensorValue');  // Example path
            $snapshotLiquidLevel = $referenceLiquidLevel->getSnapshot();
            $this->liquidLevelData = $snapshotLiquidLevel->getValue();
            // MIN THRESHOLD
            $referenceLiquidLevelMinTresh = $this->database->getReference('/LiquidLevel/Min');  // Example path
            $snapshotLiquidLevelMinTresh = $referenceLiquidLevelMinTresh->getSnapshot();
            $this->liquidLevelMinThresholdData = $snapshotLiquidLevelMinTresh->getValue();
            $this->setMinLiquidLevelThresholdValue = $this->liquidLevelMinThresholdData;
            // MAX THRESHOLD
            $referenceLiquidLevelMaxTresh = $this->database->getReference('/LiquidLevel/Max');  // Example path
            $snapshotLiquidLevelMaxTresh = $referenceLiquidLevelMaxTresh->getSnapshot();
            $this->liquidLevelMaxThresholdData = $snapshotLiquidLevelMaxTresh->getValue();
            $this->setMaxLiquidLevelThresholdValue = $this->liquidLevelMaxThresholdData;

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

    public function setTempThreshold(Database $database){
        $this->database = $database;
        try {
            // Set Temperature Min threshold
            $referenceMinTempTresh = $this->database->getReference('Temperature/Min');
            $minTempThreshValue = (float) $this->setMinTempThresholdValue;
            $referenceMinTempTresh->set($minTempThreshValue);

            // Set Temperature Max threshold
            $referenceMaxTempTresh = $this->database->getReference('Temperature/Max');
            $maxTempThreshValue = (float) $this->setMaxTempThresholdValue;
            $referenceMaxTempTresh->set($maxTempThreshValue);
            
            
            $this->dispatch('reload');
        } catch (\Exception $e) {
            // Handle error
            return response()->json(['error' => 'Error setting data: ' . $e->getMessage()], 500);
        }
    }

    public function setHumidThreshold(Database $database){
        $this->database = $database;
        try {
            // Set Humidity Min threshold
            $referenceMinHumidTresh = $this->database->getReference('Humidity/Min');
            $minHumidThreshValue = (float) $this->setMinHumidThresholdValue;
            $referenceMinHumidTresh->set($minHumidThreshValue);

            // Set Humidity Max threshold
            $referenceMaxHumidTresh = $this->database->getReference('Humidity/Max');
            $maxHumidThreshValue = (float) $this->setMaxHumidThresholdValue;
            $referenceMaxHumidTresh->set($maxHumidThreshValue);
            
            
            $this->dispatch('reload');
        } catch (\Exception $e) {
            // Handle error
            return response()->json(['error' => 'Error setting data: ' . $e->getMessage()], 500);
        }
    }

    public function setLiquidTempThreshold(Database $database){
        $this->database = $database;
        try {
            // Set Liquid Temp Min threshold
            $referenceMinLiquidTempTresh = $this->database->getReference('LiquidTemp/Min');
            $minLiquidTempThreshValue = (float) $this->setMinLiquidTempThresholdValue;
            $referenceMinLiquidTempTresh->set($minLiquidTempThreshValue);

            // Set Liquid Temp Max threshold
            $referenceMaxLiquidTempTresh = $this->database->getReference('LiquidTemp/Max');
            $maxLiquidTempThreshValue = (float) $this->setMaxLiquidTempThresholdValue;
            $referenceMaxLiquidTempTresh->set($maxLiquidTempThreshValue);
            
            
            $this->dispatch('reload');
        } catch (\Exception $e) {
            // Handle error
            return response()->json(['error' => 'Error setting data: ' . $e->getMessage()], 500);
        }
    }

    public function setAlcoholThreshold(Database $database){
        $this->database = $database;
        try {
            // Set Alcohol Min threshold
            $referenceMinAlcoholTresh = $this->database->getReference('AlcoholLevel/Min');
            $minAlcoholThreshValue = (float) $this->setMinAlcoholThresholdValue;
            $referenceMinAlcoholTresh->set($minAlcoholThreshValue);

            // Set Alcohol Max threshold
            $referenceMaxAlcoholTresh = $this->database->getReference('AlcoholLevel/Max');
            $maxAlcoholThreshValue = (float) $this->setMaxAlcoholThresholdValue;
            $referenceMaxAlcoholTresh->set($maxAlcoholThreshValue);
            
            
            $this->dispatch('reload');
        } catch (\Exception $e) {
            // Handle error
            return response()->json(['error' => 'Error setting data: ' . $e->getMessage()], 500);
        }
    }

    public function setBrixThreshold(Database $database){
        $this->database = $database;
        try {
            // Set Brix Min threshold
            $referenceMinBrixTresh = $this->database->getReference('Brix/Min');
            $minBrixThreshValue = (float) $this->setMinBrixThresholdValue;
            $referenceMinBrixTresh->set($minBrixThreshValue);

            // Set Brix Max threshold
            $referenceMaxBrixTresh = $this->database->getReference('Brix/Max');
            $maxBrixThreshValue = (float) $this->setMaxBrixThresholdValue;
            $referenceMaxBrixTresh->set($maxBrixThreshValue);
            
            
            $this->dispatch('reload');
        } catch (\Exception $e) {
            // Handle error
            return response()->json(['error' => 'Error setting data: ' . $e->getMessage()], 500);
        }
    }

    public function setPHLevelThreshold(Database $database){
        $this->database = $database;
        try {
            // Set pH Level Min threshold
            $referenceMinPHLevelTresh = $this->database->getReference('pHLevel/Min');
            $minPHLevelThreshValue = (float) $this->setMinPHThresholdValue;
            $referenceMinPHLevelTresh->set($minPHLevelThreshValue);

            // Set pH Level Max threshold
            $referenceMaxPHLevelTresh = $this->database->getReference('pHLevel/Max');
            $maxPHLevelThreshValue = (float) $this->setMaxPHThresholdValue;
            $referenceMaxPHLevelTresh->set($maxPHLevelThreshValue);
            
            
            $this->dispatch('reload');
        } catch (\Exception $e) {
            // Handle error
            return response()->json(['error' => 'Error setting data: ' . $e->getMessage()], 500);
        }
    }

    public function setLiquidLevelThreshold(Database $database){
        $this->database = $database;
        try {
            // Set Liquid Level Min threshold
            $referenceMinLiquidLevelTresh = $this->database->getReference('LiquidLevel/Min');
            $minLiquidLevelThreshValue = (float) $this->setMinLiquidLevelThresholdValue;
            $referenceMinLiquidLevelTresh->set($minLiquidLevelThreshValue);

            // Set Liquid Level Max threshold
            $referenceMaxLiquidLevelTresh = $this->database->getReference('LiquidLevel/Max');
            $maxLiquidLevelThreshValue = (float) $this->setMaxLiquidLevelThresholdValue;
            $referenceMaxLiquidLevelTresh->set($maxLiquidLevelThreshValue);
            
            
            $this->dispatch('reload');
        } catch (\Exception $e) {
            // Handle error
            return response()->json(['error' => 'Error setting data: ' . $e->getMessage()], 500);
        }
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
        return view('livewire.pages.threshold-customization' , [
            'temperature' => $this->temperatureData,
            'humidity' => $this->humidityData,
            'liquidTemp' => $this->liquidTempData,
            'alcohol' => $this->alcoholData,
            'brix' => $this->brixData,
            'pHLevel' => $this->pHLevelData,
            'liquidLevel' => $this->liquidLevelData,
        ]);
    }
}
