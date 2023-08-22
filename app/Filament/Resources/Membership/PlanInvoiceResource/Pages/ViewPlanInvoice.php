<?php

namespace App\Filament\Resources\Membership\PlanInvoiceResource\Pages;

use App\Filament\Resources\Membership\PlanInvoiceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPlanInvoice extends ViewRecord
{
    protected static string $resource = PlanInvoiceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
