<?php

namespace App\Filament\Resources\Membership\PlanPaymentMethodResource\Pages;

use App\Filament\Resources\Membership\PlanPaymentMethodResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlanPaymentMethods extends ListRecords
{
    protected static string $resource = PlanPaymentMethodResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
