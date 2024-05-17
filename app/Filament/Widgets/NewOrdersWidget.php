<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Order;
use Carbon\Carbon;

class NewOrdersWidget extends BaseWidget
{
    protected function getStats(): array
    {
        
        $MonthlyData = $this->getOrdersForLastDays(30);
        $YearlyData = $this->getOrdersForLastDays(365, 14);

        $totalMonthlyOrders = array_sum($MonthlyData);
        $totalYearlyOrders = array_sum($YearlyData);

        $PrevMonthlyData = $this->getOrdersForLastDays(60, 60)[0] - $totalMonthlyOrders;
        $PrevYearlyData = $this->getOrdersForLastDays(730, 730)[0] - $totalYearlyOrders;

        // Calculate percentage differences
        if ($PrevMonthlyData != 0) {
            $monthlyPercentageDifference = $totalMonthlyOrders / $PrevMonthlyData * 100;
        }
        if ($PrevYearlyData != 0) {
            $yearlyPercentageDifference = $totalYearlyOrders / $PrevYearlyData * 100;
        }

        return [
            Stat::make('Orders This Month', $totalMonthlyOrders)
                ->description($monthlyPercentageDifference ?? ' data still not available')
                ->chart($MonthlyData)
                ->color('success'),
            Stat::make('Orders This Year', $totalYearlyOrders)
                ->description($yearlyPercentageDifference ?? ' data still not available')
                ->chart($YearlyData)
                ->color('success'),
        ];
    }

    private function getOrdersForLastDays(int $duration, int $smoother = 1): array
    {
        $start = Carbon::now()->subDays($duration);
        $end = Carbon::now();
        $orders = $this->getOrdersBetweenDates($start, $end);

        $period = Carbon::parse($start)->daysUntil($end);
        $data = [];
        $sum = 0;
        $count = 0;

        foreach ($period as $date) {
            $formattedDate = $date->format('Y-m-d');
            $sum += $orders[$formattedDate] ?? 0;
            $count++;

            if ($count === $smoother) {
                $data[] = $sum;
                $sum = 0;
                $count = 0;
            }
        }

        // Add remaining data if the total days are not exactly divisible by smoother
        if ($count > 0) {
            $data[] = $sum;
        }

        return $data;
    }

    private function getOrdersBetweenDates($startDate, $endDate): array
    {
        $orders = Order::whereBetween('created_at', [$startDate, $endDate])->get();

        $groupedOrders = $orders->groupBy(function ($order) {
            return Carbon::parse($order->created_at)->format('Y-m-d');
        });

        $mappedOrders = $groupedOrders->map(function ($group) {
            // Counting the number of orders for each date
            return $group->count();
        })->all();

        return $mappedOrders;
    }
}

