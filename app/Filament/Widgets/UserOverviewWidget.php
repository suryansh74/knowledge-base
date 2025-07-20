<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class UserOverviewWidget extends Widget
{
    protected static string $view = 'filament.widgets.user-overview-widget';

    protected static ?int $sort = 1;


    public function getUserData(): array
    {
        $user = auth()->user();

        return [
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $user->roles->pluck('name')->toArray(),
            'problems_count' => $user->problems()->count(),
        ];
    }
}
