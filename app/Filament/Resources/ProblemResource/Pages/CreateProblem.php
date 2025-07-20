<?php

namespace App\Filament\Resources\ProblemResource\Pages;

use App\Filament\Resources\ProblemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateProblem extends CreateRecord
{
    protected static string $resource = ProblemResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Delete uploaded markdown file after saving its content
        if (!empty($data['uploaded_markdown_path'])) {
            Storage::disk('public')->delete($data['uploaded_markdown_path']);
            unset($data['uploaded_markdown_path']);
        }

        return $data;
    }
}
