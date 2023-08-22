<?php

namespace App\Filament\Resources\Membership\PlanPaymentMethodResource\Pages;

use App\Filament\Resources\Membership\PlanPaymentMethodResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlanPaymentMethod extends EditRecord
{
    protected static string $resource = PlanPaymentMethodResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
