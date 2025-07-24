<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ThresholdCustomization extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-adjustments-vertical';

    protected static string $view = 'filament.pages.threshold-customization';

    protected static ?int $navigationSort = 5;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->role == 'admin';
    }
}
