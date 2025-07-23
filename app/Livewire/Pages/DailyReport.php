<?php

namespace App\Livewire\Pages;

use App\Models\DailySensorData;
use App\Models\SensorDatas;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;


class DailyReport extends Component
{

    public $temperatureData=[];
    public $humidityData=[];
    public $liquidTempData=[];
    public $alcoholData=[];
    public $pHLevelData=[];
    public $brixData=[];
    public $liquidLevelData=[];
    
    
    #[Url(as: 'start')]
    public ?string $startDate = null;

    #[Url(as: 'end')]
    public ?string $endDate = null;

    public function mount(){
        $this->startDate ??= Carbon::now()->startOfMonth()->toDateString();
        $this->endDate ??= Carbon::now()->endOfMonth()->toDateString();
        
        $this->getTemperatureForCurrentMonth($this->startDate, $this->endDate);
        $this->getHumidityForCurrentMonth($this->startDate, $this->endDate);

        $this->getLiquidTempForCurrentMonth($this->startDate, $this->endDate);
        $this->getAlcoholForCurrentMonth($this->startDate, $this->endDate);
        $this->getpHLevelForCurrentMonth($this->startDate, $this->endDate);
        $this->getBrixForCurrentMonth($this->startDate, $this->endDate);
        $this->getLiquidLevelForCurrentMonth($this->startDate, $this->endDate);
        
    }

    public function getTemperatureForCurrentMonth($startDate = null, $endDate = null)
    {
        $startOfRange = $startDate ? Carbon::parse($startDate)->startOfDay() : Carbon::now()->startOfMonth();
        $endOfRange = $endDate ? Carbon::parse($endDate)->endOfDay() : Carbon::now()->endOfMonth();

        $tempData = DailySensorData::selectRaw('DATE_FORMAT(reading_date, "%b, %d") as Day, temperature as Value')
            ->whereBetween(DB::raw('DATE(reading_date)'), [
                $startOfRange->toDateString(),
                $endOfRange->toDateString()
            ])
            ->whereIn('id', function ($query) use ($startOfRange, $endOfRange) {
                $query->selectRaw('MAX(id)')
                    ->from('daily_sensor_data')
                    ->whereBetween(DB::raw('DATE(reading_date)'), [
                        $startOfRange->toDateString(),
                        $endOfRange->toDateString()
                    ])
                    ->groupByRaw('DATE(reading_date)');
            })
            ->orderBy('reading_date')
            ->get();

        $this->temperatureData = $tempData->map(function ($item) {
            return [
                'Day' => $item->Day,
                'Value' => round($item->Value, 2)
            ];
        })->toArray();
    }

    public function getHumidityForCurrentMonth($startDate = null, $endDate = null)
    {
        $startOfRange = $startDate ? Carbon::parse($startDate)->startOfDay() : Carbon::now()->startOfMonth();
        $endOfRange = $endDate ? Carbon::parse($endDate)->endOfDay() : Carbon::now()->endOfMonth();

        $humidData = DailySensorData::selectRaw('DATE_FORMAT(reading_date, "%b, %d") as Day, humidity as Value')
            ->whereBetween(DB::raw('DATE(reading_date)'), [
                $startOfRange->toDateString(),
                $endOfRange->toDateString()
            ])
            ->whereIn('id', function ($query) use ($startOfRange, $endOfRange) {
                $query->selectRaw('MAX(id)')
                    ->from('daily_sensor_data')
                    ->whereBetween(DB::raw('DATE(reading_date)'), [
                        $startOfRange->toDateString(),
                        $endOfRange->toDateString()
                    ])
                    ->groupByRaw('DATE(reading_date)');
            })
            ->orderBy('reading_date')
            ->get();

        $this->humidityData = $humidData->map(function ($item) {
            return [
                'Day' => $item->Day,
                'Value' => round($item->Value, 2)
            ];
        })->toArray();
    }

    public function getLiquidTempForCurrentMonth($startDate = null, $endDate = null)
    {
        $startOfRange = $startDate ? Carbon::parse($startDate)->startOfDay() : Carbon::now()->startOfMonth();
        $endOfRange = $endDate ? Carbon::parse($endDate)->endOfDay() : Carbon::now()->endOfMonth();

        $liquidTmpData = DailySensorData::selectRaw('DATE_FORMAT(reading_date, "%b, %d") as Day, liquid_temp as Value')
            ->whereBetween(DB::raw('DATE(reading_date)'), [
                $startOfRange->toDateString(),
                $endOfRange->toDateString()
            ])
            ->whereIn('id', function ($query) use ($startOfRange, $endOfRange) {
                $query->selectRaw('MAX(id)')
                    ->from('daily_sensor_data')
                    ->whereBetween(DB::raw('DATE(reading_date)'), [
                        $startOfRange->toDateString(),
                        $endOfRange->toDateString()
                    ])
                    ->groupByRaw('DATE(reading_date)');
            })
            ->orderBy('reading_date')
            ->get();

        $this->liquidTempData = $liquidTmpData->map(function ($item) {
            return [
                'Day' => $item->Day,
                'Value' => round($item->Value, 2)
            ];
        })->toArray();
    }

    public function getAlcoholForCurrentMonth($startDate = null, $endDate = null)
    {
        $startOfRange = $startDate ? Carbon::parse($startDate)->startOfDay() : Carbon::now()->startOfMonth();
        $endOfRange = $endDate ? Carbon::parse($endDate)->endOfDay() : Carbon::now()->endOfMonth();

        $alcData = DailySensorData::selectRaw('DATE_FORMAT(reading_date, "%b, %d") as Day, alcohol as Value')
            ->whereBetween(DB::raw('DATE(reading_date)'), [
                $startOfRange->toDateString(),
                $endOfRange->toDateString()
            ])
            ->whereIn('id', function ($query) use ($startOfRange, $endOfRange) {
                $query->selectRaw('MAX(id)')
                    ->from('daily_sensor_data')
                    ->whereBetween(DB::raw('DATE(reading_date)'), [
                        $startOfRange->toDateString(),
                        $endOfRange->toDateString()
                    ])
                    ->groupByRaw('DATE(reading_date)');
            })
            ->orderBy('reading_date')
            ->get();

        $this->alcoholData = $alcData->map(function ($item) {
            return [
                'Day' => $item->Day,
                'Value' => round($item->Value, 2)
            ];
        })->toArray();
    }

    public function getpHLevelForCurrentMonth($startDate = null, $endDate = null)
    {
        $startOfRange = $startDate ? Carbon::parse($startDate)->startOfDay() : Carbon::now()->startOfMonth();
        $endOfRange = $endDate ? Carbon::parse($endDate)->endOfDay() : Carbon::now()->endOfMonth();

        $pHlvlData = DailySensorData::selectRaw('DATE_FORMAT(reading_date, "%b, %d") as Day, pH_level as Value')
            ->whereBetween(DB::raw('DATE(reading_date)'), [
                $startOfRange->toDateString(),
                $endOfRange->toDateString()
            ])
            ->whereIn('id', function ($query) use ($startOfRange, $endOfRange) {
                $query->selectRaw('MAX(id)')
                    ->from('daily_sensor_data')
                    ->whereBetween(DB::raw('DATE(reading_date)'), [
                        $startOfRange->toDateString(),
                        $endOfRange->toDateString()
                    ])
                    ->groupByRaw('DATE(reading_date)');
            })
            ->orderBy('reading_date')
            ->get();

        $this->pHLevelData = $pHlvlData->map(function ($item) {
            return [
                'Day' => $item->Day,
                'Value' => round($item->Value, 2)
            ];
        })->toArray();
    }

    public function getBrixForCurrentMonth($startDate = null, $endDate = null)
    {
        $startOfRange = $startDate ? Carbon::parse($startDate)->startOfDay() : Carbon::now()->startOfMonth();
        $endOfRange = $endDate ? Carbon::parse($endDate)->endOfDay() : Carbon::now()->endOfMonth();

        $brxData = DailySensorData::selectRaw('DATE_FORMAT(reading_date, "%b, %d") as Day, brix as Value')
            ->whereBetween(DB::raw('DATE(reading_date)'), [
                $startOfRange->toDateString(),
                $endOfRange->toDateString()
            ])
            ->whereIn('id', function ($query) use ($startOfRange, $endOfRange) {
                $query->selectRaw('MAX(id)')
                    ->from('daily_sensor_data')
                    ->whereBetween(DB::raw('DATE(reading_date)'), [
                        $startOfRange->toDateString(),
                        $endOfRange->toDateString()
                    ])
                    ->groupByRaw('DATE(reading_date)');
            })
            ->orderBy('reading_date')
            ->get();

        $this->brixData = $brxData->map(function ($item) {
            return [
                'Day' => $item->Day,
                'Value' => round($item->Value, 2)
            ];
        })->toArray();
    }

    public function getLiquidLevelForCurrentMonth($startDate = null, $endDate = null)
    {
        $startOfRange = $startDate ? Carbon::parse($startDate)->startOfDay() : Carbon::now()->startOfMonth();
        $endOfRange = $endDate ? Carbon::parse($endDate)->endOfDay() : Carbon::now()->endOfMonth();

        $liquidLvlData = DailySensorData::selectRaw('DATE_FORMAT(reading_date, "%b, %d") as Day, liquid_level as Value')
            ->whereBetween(DB::raw('DATE(reading_date)'), [
                $startOfRange->toDateString(),
                $endOfRange->toDateString()
            ])
            ->whereIn('id', function ($query) use ($startOfRange, $endOfRange) {
                $query->selectRaw('MAX(id)')
                    ->from('daily_sensor_data')
                    ->whereBetween(DB::raw('DATE(reading_date)'), [
                        $startOfRange->toDateString(),
                        $endOfRange->toDateString()
                    ])
                    ->groupByRaw('DATE(reading_date)');
            })
            ->orderBy('reading_date')
            ->get();

        $this->liquidLevelData = $liquidLvlData->map(function ($item) {
            return [
                'Day' => $item->Day,
                'Value' => round($item->Value, 2)
            ];
        })->toArray();
    }

    public function getGraphValues(){
        $start = $this->startDate ?? Carbon::now()->startOfMonth();
        $end = $this->endDate ?? Carbon::now()->endOfMonth();

        $this->getTemperatureForCurrentMonth($start, $end);
        $this->getHumidityForCurrentMonth($start, $end);

        $this->getLiquidTempForCurrentMonth($start, $end);
        $this->getAlcoholForCurrentMonth($start, $end);
        $this->getpHLevelForCurrentMonth($start, $end);
        $this->getBrixForCurrentMonth($start, $end);
        $this->getLiquidLevelForCurrentMonth($start, $end);
       
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
