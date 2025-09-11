<?php

namespace App\Livewire\Pages;

use App\Exports\SensorReadingsExport;
use App\Models\DailySensorData;
use App\Models\SensorDatas;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;


class DailyReport extends Component
{

    public $temperatureData=[];
    public $humidityData=[];
    public $liquidTempData=[];
    public $alcoholData=[];
    public $pHLevelData=[];
    public $brixData=[];
    public $liquidLevelData=[];
    
    #[Url(as: 'date')]
    public ?string $filterDate = null;

    public function mount(){
        $this->filterDate ??= Carbon::now('Asia/Manila')->toDateString();

        $this->getTemperatureForCurrentMonth($this->filterDate);
        $this->getHumidityForCurrentMonth($this->filterDate);

        $this->getLiquidTempForCurrentMonth($this->filterDate);
        $this->getAlcoholForCurrentMonth($this->filterDate);
        $this->getpHLevelForCurrentMonth($this->filterDate);
        $this->getBrixForCurrentMonth($this->filterDate);
        $this->getLiquidLevelForCurrentMonth($this->filterDate);
        
    }

    public function exportSensorData()
    {
        $date  = $this->filterDate ?? now()->toDateString();

        $filename = "SensorData_{$date}.xlsx";

        $this->dispatch('reload');

        return Excel::download(new SensorReadingsExport($date), $filename);
    }

    public function getTemperatureForCurrentMonth($filterDate = null)
    {
        $filterDate = $filterDate ?? Carbon::now('Asia/Manila')->toDateString();

        $tempData = DailySensorData::selectRaw('DATE_FORMAT(reading_date, "%h:%i %p") as time, temperature as Value')
            ->whereDate('reading_date', $filterDate)
            ->orderBy('reading_date')
            ->get();

        $this->temperatureData = $tempData->map(function ($item) {
            return [
                'time' => $item->time,
                'Value' => round($item->Value, 2)
            ];
        })->toArray();
    }

    public function getHumidityForCurrentMonth($filterDate = null)
    {
        $filterDate = $filterDate ?? Carbon::now('Asia/Manila')->toDateString();

        $humidData = DailySensorData::selectRaw('DATE_FORMAT(reading_date, "%h:%i %p") as time, humidity as Value')
            ->whereDate('reading_date', $filterDate)
            ->orderBy('reading_date')
            ->get();

        $this->humidityData = $humidData->map(function ($item) {
            return [
                'time' => $item->time,
                'Value' => round($item->Value, 2)
            ];
        })->toArray();
    }

    public function getLiquidTempForCurrentMonth($filterDate = null)
    {
        $filterDate = $filterDate ?? Carbon::now('Asia/Manila')->toDateString();

        $liquidTmpData = DailySensorData::selectRaw('DATE_FORMAT(reading_date, "%h:%i %p") as time, liquid_temp as Value')
            ->whereDate('reading_date', $filterDate)
            ->orderBy('reading_date')
            ->get();

        $this->liquidTempData = $liquidTmpData->map(function ($item) {
            return [
                'time' => $item->time,
                'Value' => round($item->Value, 2)
            ];
        })->toArray();
    }

    public function getAlcoholForCurrentMonth($filterDate = null)
    {
        $filterDate = $filterDate ?? Carbon::now('Asia/Manila')->toDateString();

        $alcData = DailySensorData::selectRaw('DATE_FORMAT(reading_date, "%h:%i %p") as time, alcohol as Value')
            ->whereDate('reading_date', $filterDate)
            ->orderBy('reading_date')
            ->get();

        $this->alcoholData = $alcData->map(function ($item) {
            return [
                'time' => $item->time,
                'Value' => round($item->Value, 2)
            ];
        })->toArray();
    }

    public function getpHLevelForCurrentMonth($filterDate = null)
    {
        $filterDate = $filterDate ?? Carbon::now('Asia/Manila')->toDateString();

        $pHlvlData = DailySensorData::selectRaw('DATE_FORMAT(reading_date, "%h:%i %p") as time, pH_level as Value')
            ->whereDate('reading_date', $filterDate)
            ->orderBy('reading_date')
            ->get();


        $this->pHLevelData = $pHlvlData->map(function ($item) {
            return [
                'time' => $item->time,
                'Value' => round($item->Value, 2)
            ];
        })->toArray();
    }

    public function getBrixForCurrentMonth($filterDate = null)
    {
        $filterDate = $filterDate ?? Carbon::now('Asia/Manila')->toDateString();

        $brxData = DailySensorData::selectRaw('DATE_FORMAT(reading_date, "%h:%i %p") as time, brix as Value')
            ->whereDate('reading_date', $filterDate)
            ->orderBy('reading_date')
            ->get();

        $this->brixData = $brxData->map(function ($item) {
            return [
                'time' => $item->time,
                'Value' => round($item->Value, 2)
            ];
        })->toArray();
    }

    public function getLiquidLevelForCurrentMonth($filterDate = null)
    {
        $filterDate = $filterDate ?? Carbon::now('Asia/Manila')->toDateString();

        $liquidLvlData = DailySensorData::selectRaw('DATE_FORMAT(reading_date, "%h:%i %p") as time, liquid_level as Value')
            ->whereDate('reading_date', $filterDate)
            ->orderBy('reading_date')
            ->get();

        $this->liquidLevelData = $liquidLvlData->map(function ($item) {
            return [
                'time' => $item->time,
                'Value' => round($item->Value, 2)
            ];
        })->toArray();
    }

    public function getGraphValues(){
        $date = $this->filterDate ?? Carbon::now('Asia/Manila')->toDateString();

        $this->getTemperatureForCurrentMonth($date);
        $this->getHumidityForCurrentMonth($date);

        $this->getLiquidTempForCurrentMonth($date);
        $this->getAlcoholForCurrentMonth($date);
        $this->getpHLevelForCurrentMonth($date);
        $this->getBrixForCurrentMonth($date);
        $this->getLiquidLevelForCurrentMonth($date);
       
        $this->dispatch('updateTemperatureChart', $this->temperatureData);
        $this->dispatch('updateHumidityChart', $this->humidityData);
        $this->dispatch('updateLiquidTempChart', $this->liquidTempData);
        $this->dispatch('updateAlcoholChart', $this->alcoholData);
        $this->dispatch('updatepHLevelChart', $this->pHLevelData);
        $this->dispatch('updateBrixChart', $this->brixData);
        $this->dispatch('updateLiquidLevelChart', $this->liquidLevelData);
        
        $this->dispatch('reload'); 
    }

    public function render()
    {
        return view('livewire.pages.daily-report');
    }
}
