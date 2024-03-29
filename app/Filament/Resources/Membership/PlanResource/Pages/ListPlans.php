<?php

namespace App\Filament\Resources\Membership\PlanResource\Pages;

use App\Filament\Resources\Membership\PlanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlans extends ListRecords
{
    protected static string $resource = PlanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
