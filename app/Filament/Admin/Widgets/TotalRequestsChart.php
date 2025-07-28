<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Request; // Replace with your actual model
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TotalRequestsChart extends ChartWidget
{
    protected static ?string $heading = 'Total Requests by Month';
    public function getColumnSpan(): int | string | array
    {
        return 'full';
    }

    protected function getData(): array
    {
        $requests = Request::query()
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $labels = $requests->map(function ($item) {
            return Carbon::createFromDate($item->year, $item->month, 1)->format('M Y');
        })->toArray();

        $data = $requests->pluck('count')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Requests',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line'; // or 'line'
    }
    // TotalRequestsChart.php
public static function getSort(): int
{
    return 2;
}
}
