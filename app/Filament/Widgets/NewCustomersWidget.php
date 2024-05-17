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
        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth();

        $newContactsToday = Contact::whereDate('created_at', $today)->count();
        $newContactsThisMonth = Contact::whereBetween('created_at', [$startOfMonth, now()])->count();
        return [
            Stat::make('New Contacts Today', $newContactsToday)
                ->description('Registered today')
                ->color('success'),
            Stat::make('New Contacts This Month', $newContactsThisMonth)
                ->value($newContactsThisMonth)
                ->description('Registered this month')
                ->color('primary'),
        ];
    }
}
