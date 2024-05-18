<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ThreeInOneStatsWidget extends BaseWidget
{
    protected function getCards(): array
    {
        $newCustomersWidget = new NewCustomersWidget();
        $totalCustomersWidget = new TotalCustomersWidget();
        $newOrdersWidget = new NewOrdersWidget();

        return array_merge(
            $newCustomersWidget->getStats(),
            $totalCustomersWidget->getStats(),
            $newOrdersWidget->getStats()
        );
    }
}

