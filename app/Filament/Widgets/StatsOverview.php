<?php

namespace App\Filament\Widgets;

use App\Models\Problem;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class StatsOverview extends BaseWidget
{

    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Problems', Problem::count()),
            Stat::make('Total Members', User::whereHas('roles', function (Builder $query) {
                $query->where('name', 'member');
            })->count()),
        ];
    }
}
