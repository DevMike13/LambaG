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
            $referenceTemp = $this->database->getReference('/Temperature');  // Example path
            $snapshotTemp = $referenceTemp->getSnapshot();
            $this->temperatureData = $snapshotTemp->getValue();

            // Humidity
            $referenceHumid = $this->database->getReference('/Humidity');  // Example path
            $snapshotHumid = $referenceHumid->getSnapshot();
            $this->humidityData = $snapshotHumid->getValue();

            // Liquid Temp
            $referenceLiquidTemp = $this->database->getReference('/LiquidTemp');  // Example path
            $snapshotLiquidTemp = $referenceLiquidTemp->getSnapshot();
            $this->liquidTempData = $snapshotLiquidTemp->getValue();

        } catch (\Exception $e) {
            $this->temperatureData = 'Error: ' . $e->getMessage();
        }
    }

    public function handleTemperatureUpdate($temperatureData)
    {
        $this->temperatureData = $temperatureData;
    }

    public function render()
    {
        return view('livewire.pages.parameters-monitoring', [
            'pHLevel' => $this->phData,
            'pHTreshold' => $this->phTresholdData,
            'DissolvedOxygen' => $this->doData,
            'DOTreshold' => $this->doTresholdData,
            'AlkalinityLevel' => $this->alData,
            'ALTreshold' => $this->alTresholdData,
            'WaterTemperature' => $this->wTempData,
            'WTTreshold' => $this->wTempTresholdData
        ]);
    }
}
