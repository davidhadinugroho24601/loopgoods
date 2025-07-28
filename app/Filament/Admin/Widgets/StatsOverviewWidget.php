<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Request;
use App\Models\Item;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverviewWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Requests', Request::count())
                ->icon('heroicon-o-paper-airplane')
                ->description('All time')
                ->color('success'),

            Card::make('Total Items', Item::count())
                ->icon('heroicon-o-archive-box')
                ->description('Available in system')
                ->color('success'),
        ];
    }

    protected function getColumns(): int
    {
        return 2; // adjust to 3 if you add a third stat
    }
        // StatsOverviewWidget.php
public static function getSort(): int
{
    return 1; // Top
}


}

