<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Order;
use Carbon\Carbon;

class OrdersPerMonthWidget extends ChartWidget
{
    protected static ?string $heading = 'Orders Per Month';

    protected function getData(): array
    {
        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();


        $data = [];
        for ($date = clone $startDate; $date->lte($endDate); $date->addDay()) {
            $data[$date->format('Y-m-d')] = 0;
        }

        $orders = Order::whereBetween('created_at', [$startDate, $endDate])
                       ->orderBy('created_at')
                       ->get()
                       ->groupBy(function ($date) {
                           return Carbon::parse($date->created_at)->format('Y-m-d'); // grouping by day
                       });

        foreach ($orders as $date => $dailyOrders) {
            $data[$date] = count($dailyOrders);
        }

        return [
            'labels' => array_keys($data),
            'datasets' => [
                [
                    'label' => 'Total Orders',
                    'data' => array_values($data),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1,
                ]
            ]
        ];
    }

    protected function getType(): string
    {
        return 'line'; // or 'line' depending on your preference
    }
}
