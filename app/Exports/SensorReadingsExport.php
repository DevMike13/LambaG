<?php

namespace App\Exports;

use App\Models\DailySensorData;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class SensorReadingsExport implements FromCollection, WithHeadings, WithStyles, WithEvents, WithTitle
{
    use Exportable;

    protected $date;

    public function __construct($date)
    {
        $this->date  = $date;
    }

    public function collection()
    {
        $data = DailySensorData::whereDate('reading_date', $this->date)
            ->orderBy('reading_date')
            ->get();

        $rows = new Collection();

        foreach ($data as $item) {
            $dateTime = Carbon::parse($item->reading_date);

            $rows->push([
                number_format((float) $item->temperature, 2) . ' °C',    // Temp (°C)
                number_format((float) $item->humidity, 2) . ' %',       // Humidity (%)
                number_format((float) $item->liquid_temp, 2) . ' °C',    // Liquid Temp (°C)
                number_format((float) $item->alcohol, 2) . ' %',  // Alcohol Level (%)
                number_format((float) $item->brix, 2),     // Sugar (°Brix)
                number_format((float) $item->pH_level, 2),       // pH Level
                number_format((float) $item->liquid_level, 2) . ' %',   // Liquid Level (%)
                $dateTime->format('M. d, Y'),                    // Date
                $dateTime->format('h:i A'),                      // Time
            ]);
        }

        return $rows;
    }


    public function headings(): array
    {
        return [
            'Temp (°C)',
            'Humidity (%)',
            'Liquid Temp (°C)',
            'Alcohol Level (%)',
            'Sugar (°Brix)',
            'pH Level',
            'Liquid Level (%)',
            'Date',
            'Time',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                foreach (range('A', $sheet->getHighestColumn()) as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }

                $sheet->getStyle('A1:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
                    ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A1:' . $sheet->getHighestColumn() . $sheet->getHighestRow())
                    ->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
            }
        ];
    }

    public function title(): string
    {
        return 'Sensor Data';
    }
}
