<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LastedMembers extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected bool $paginated = false;

    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                User::orderBy('created_at', 'desc')->take(3)
            )
            ->columns([
                TextColumn::make('name')->label('New Member'),
                TextColumn::make('created_at')->dateTime()->label('Joined At'),
            ])->paginated(false);
    }
}
