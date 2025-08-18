<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Kreait\Firebase\Contract\Database;

class ParametersMonitoring extends Component
{
    protected Database $database;

    public $temperatureData;
    public $humidityData;
    public $liquidTempData;
    public $alcoholData;
    public $brixData;
    public $pHLevelData;
    public $liquidLevelData;
    
    public $brixSetData;
   

    protected $listeners = [
        'updateTemperature' => 'handleTemperatureUpdate',
        'updateHumidity' => 'handleHumidityUpdate',
        'updateLiquidTemp' => 'handleLiquidTempUpdate',
        'updateAlcohol' => 'handleAlcoholUpdate',
        'updateBrix' => 'handleBrixUpdate',
        'updatePHLevel' => 'handlePHLevelUpdate',
        'updateLiquidLevel' => 'handleLiquidLevelUpdate',
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

    public function setBrixValue(Database $database){
        $this->database = $database;
        try {
            // Set Temperature Min threshold
            $referenceBrixValueSet = $this->database->getReference('Brix/SensorValue');
            $brixValueSetted = (float) $this->brixSetData;
            $referenceBrixValueSet->set($brixValueSetted);

            $this->dispatch('reload');
        } catch (\Exception $e) {
            // Handle error
            return response()->json(['error' => 'Error setting data: ' . $e->getMessage()], 500);
        }
    }

    public function render()
    {
        return view('livewire.pages.parameters-monitoring', [
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
