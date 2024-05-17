<?php declare(strict_types=1);

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Order;
use Carbon\Carbon;

class RevenueWidget extends ChartWidget
{
    protected static ?string $heading = 'Revenue Over Time';

    protected function getData(): array
    {
        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();
        
        $data = [];

        for ($date = clone $startDate; $date->lte($endDate); $date->addDay()) {
            $data[$date->format('Y-m-d')] = ['x' => $date->format('Y-m-d'), 'y' => 0];
        }

        $orders = Order::whereBetween('created_at', [$startDate, $endDate])
                       ->orderBy('created_at')
                       ->get()
                       ->groupBy(function ($date) {
                           return Carbon::parse($date->created_at)->format('Y-m-d'); // grouping by day
                       });

        foreach ($orders as $date => $dailyOrders) {
            $dailyTotal = $dailyOrders->sum('amount');
            $data[$date] = ['x' => $date, 'y' => $dailyTotal];
        }

        return [
            'labels' => array_keys($data),
            'datasets' => [
                [
                    'label' => 'Daily Revenue',
                    'data' => array_column($data, 'y'),
                    'fill' => true,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
