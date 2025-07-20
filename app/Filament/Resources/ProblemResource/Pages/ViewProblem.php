<?php

namespace App\Filament\Resources\ProblemResource\Pages;

use App\Filament\Resources\ProblemResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProblem extends ViewRecord
{
    protected static string $resource = ProblemResource::class;

    public function getView(): string
    {
        return 'filament.resources.problems.view-problem';
    }
}
