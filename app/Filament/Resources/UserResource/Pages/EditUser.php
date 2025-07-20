<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
            Action::make('updatePassword')
                ->form([
                    TextInput::make('password')->required()->password()->confirmed(),
                    TextInput::make('password_confirmation')->required()->password(),
                ])
                ->action(function (array $data) {
                    $this->record->update([
                        'password' => $data['password']
                    ]);
                    Notification::make()
                        ->title('Password Updated Successfully')
                        ->success()
                        ->send();
                })
        ];
    }
}
