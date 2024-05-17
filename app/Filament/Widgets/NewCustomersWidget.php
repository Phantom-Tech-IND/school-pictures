<?php

namespace App\Filament\Widgets;

use App\Models\Contact; // Use the Contact model
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class NewCustomersWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $now = Carbon::now();
        $startOfLast30Days = $now->copy()->subDays(30);
        $startOfLast60Days = $now->copy()->subDays(60);

        $newCustomersLast30Days = Contact::whereBetween('created_at', [$startOfLast30Days, $now])->count();
        $newCustomers30To60Days = Contact::whereBetween('created_at', [$startOfLast60Days, $startOfLast30Days])->count();

        $difference = $newCustomersLast30Days - $newCustomers30To60Days;
        $percentageChange = $newCustomers30To60Days > 0 ? round(($difference / $newCustomers30To60Days) * 100) : 0;

        $description = sprintf("%+d%% compared to last month", $percentageChange);
        $color = $percentageChange >= 0 ? 'success' : 'danger';
        $descriptionIcon = $percentageChange >= 0 ? 'feathericon-trending-up' : 'feathericon-trending-down';

        return [
            Stat::make('New Customers This Month', $newCustomersLast30Days)
                ->description($description)
                ->descriptionIcon($descriptionIcon)
                ->color($color)
                ->icon('heroicon-o-user-group'),
        ];
    }
}
