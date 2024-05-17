<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Order;
use Carbon\Carbon; // Ensure Carbon is included for date manipulation

class NewOrdersWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $pendingOrdersCount = Order::where('status', 'pending')->count();
        $recentPendingOrdersCount = Order::where('status', 'pending')
                                         ->where('created_at', '>=', Carbon::now()->subHours(48))
                                         ->count();
        $olderPendingOrdersExist = Order::where('status', 'pending')
                                        ->where('created_at', '<', Carbon::now()->subDays(7))
                                        ->exists();
        $recentPendingPercentage = ($pendingOrdersCount > 0) ? ($recentPendingOrdersCount / $pendingOrdersCount * 100) : 0;

        $color = 'warning';
        $description = 'Pending orders';

        if ($olderPendingOrdersExist) {
            $color = 'danger';
            $description = "Orders older than 7 days exist.";
        } elseif ($recentPendingPercentage >= 60) {
            $color = 'success';
            $description = "Healthy flow: 60% or more of orders were made in the last 48 hours.";
        } elseif ($pendingOrdersCount == 0) {
            $color = 'secondary';
            $description = "No pending orders.";
        }

        return [
            Stat::make('Pending Orders', $pendingOrdersCount)
                ->description($description)
                ->color($color), // Apply the determined color
        ];
    }
}

