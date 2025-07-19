<?php

namespace App\Livewire\Pages;

use Kreait\Firebase\Contract\Database;
use Livewire\Component;

class SensorHealthPage extends Component
{
    protected Database $database;

    public $alcoholSensor;
    public $analogPHSensor;
    public $GSMModule;
    public $TempHumidSensor;
    public $UltrasonicSensor;
    public $WaterProof;

    protected $listeners = [
        'updateAlcoholSensor' => 'handleAlcoholSensorUpdate',
        'updateAnalogPHSensor' => 'handleAnalogPHSensorUpdate',
        'updateGSMModule' => 'handleGSMModuleUpdate',
        'updateTempHumidSensor' => 'handleTempHumidSensorUpdate',
        'updateUltrasonicSensor' => 'handleUltrasonicSensorUpdate',
        'updateWaterProof' => 'handleWaterProofUpdate'
    ];

    public function mount(Database $database)
    {
        $this->database = $database;
        $this->fetchData();
    }

    public function fetchData()
    {
        try {
            // Alcohol Sensor
            $referenceAlcoholSensor = $this->database->getReference("SensorHealth/AlcoholSensor");
            $snapshotAlcoholSensor = $referenceAlcoholSensor->getSnapshot();
            $this->alcoholSensor = $snapshotAlcoholSensor->getValue();

            // Analog PH Sensor
            $referenceAnalogPHSensor = $this->database->getReference("SensorHealth/AnalogPHSensor");
            $snapshotAnalogPHSensor = $referenceAnalogPHSensor->getSnapshot();
            $this->analogPHSensor = $snapshotAnalogPHSensor->getValue();

            
            // GSM Module
            $referenceGSMModule = $this->database->getReference("SensorHealth/GSMModule");
            $snapshotGSMModule = $referenceGSMModule->getSnapshot();
            $this->GSMModule = $snapshotGSMModule->getValue();

            // Temp & Humid Sensor
            $referenceTempHumidSensor = $this->database->getReference("SensorHealth/Temperature&HumiditySensor");
            $snapshotTempHumidSensor = $referenceTempHumidSensor->getSnapshot();
            $this->TempHumidSensor = $snapshotTempHumidSensor->getValue();
            
            // Temp & Humid Sensor
            $referenceUltrasonicSensor = $this->database->getReference("SensorHealth/UltrasonicSensor");
            $snapshotUltrasonicSensor = $referenceUltrasonicSensor->getSnapshot();
            $this->UltrasonicSensor = $snapshotUltrasonicSensor->getValue();

             // WaterProof
             $referenceWaterProof = $this->database->getReference("SensorHealth/Waterproof");
             $snapshotWaterProof = $referenceWaterProof->getSnapshot();
             $this->WaterProof = $snapshotWaterProof->getValue();

        } catch (\Exception $e) {
            $this->alcoholSensor = 'Error: ' . $e->getMessage();
            $this->analogPHSensor = 'Error: ' . $e->getMessage();
        }
    }

    public function handleAlcoholSensorUpdate($alcoholSensor)
    {
        $this->alcoholSensor = $alcoholSensor;
    }

    public function handleAnalogPHSensorUpdate($analogPHSensor)
    {
        $this->analogPHSensor = $analogPHSensor;
    }

    public function handleGSMModuleUpdate($GSMModule)
    {
        $this->GSMModule = $GSMModule;
    }

    public function handleUltrasonicSensorUpdate($UltrasonicSensor)
    {
        $this->UltrasonicSensor = $UltrasonicSensor;
    }

    public function handleTempHumidSensorUpdate($TempHumidSensor)
    {
        $this->TempHumidSensor = $TempHumidSensor;
    }

    public function handleWaterProofUpdate($WaterProof)
    {
        $this->WaterProof = $WaterProof;
    }
    
    public function render()
    {
        return view('livewire.pages.sensor-health-page', [
            'alcoholSensor' => $this->alcoholSensor,
            'analogPHSensor' => $this->analogPHSensor,
            'GSMModule' => $this->GSMModule,
            'TempHumidSensor' => $this->TempHumidSensor,
            'UltrasonicSensor' => $this->UltrasonicSensor,
            'WaterProof' => $this->WaterProof
        ]);
    }
}
