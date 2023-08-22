<?php

namespace App\Filament\Resources\Membership\PlanInvoiceResource\Pages;

use App\Filament\Resources\Membership\PlanInvoiceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePlanInvoice extends CreateRecord
{
    protected static string $resource = PlanInvoiceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
