<?php

namespace App\Filament\Resources\Membership\PlanPaymentMethodResource\Pages;

use App\Filament\Resources\Membership\PlanPaymentMethodResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePlanPaymentMethod extends CreateRecord
{
    protected static string $resource = PlanPaymentMethodResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
