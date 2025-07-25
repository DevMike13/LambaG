<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class DailyReport extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-list';

    protected static string $view = 'filament.pages.daily-report';

    protected static ?string $navigationLabel = 'Daily Records';

    protected static ?int $navigationSort = 3;
}
