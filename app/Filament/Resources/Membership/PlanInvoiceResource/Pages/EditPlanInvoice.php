<?php

namespace App\Filament\Resources\Membership\PlanInvoiceResource\Pages;

use App\Enum\PlanInvoice\StatusEnum;
use App\Filament\Resources\Membership\PlanInvoiceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlanInvoice extends EditRecord
{
    protected static string $resource = PlanInvoiceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
