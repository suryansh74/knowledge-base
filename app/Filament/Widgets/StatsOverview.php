<?php

namespace App\Filament\Widgets;

use App\Models\Problem;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Contracts\Database\Eloquent\Builder;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Problems', Problem::count()),
            Stat::make('Total Members', User::whereHas('roles', function (Builder $query) {
                $query->where('name', 'member');
            })->count())
            // ->descriptionIcon('heroicon-m-arrow-trending-up'),

        ];
    }
}
