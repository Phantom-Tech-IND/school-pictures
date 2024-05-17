<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalCustomersWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalCustomers = Contact::count();
        return [
            Stat::make('Total Customers', $totalCustomers)
                ->description('Total number of registered customers')
                ->color('primary'),
        ];
    }
}
