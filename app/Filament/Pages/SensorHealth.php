<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class SensorHealth extends Page
{
    protected static ?string $navigationIcon = 'fontisto-heartbeat-alt';

    protected static string $view = 'filament.pages.sensor-health';
     protected static ?int $navigationSort = 30;
}
