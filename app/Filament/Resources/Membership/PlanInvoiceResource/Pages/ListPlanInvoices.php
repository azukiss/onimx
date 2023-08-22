<?php

namespace App\Filament\Resources\Membership\PlanInvoiceResource\Pages;

use App\Filament\Resources\Membership\PlanInvoiceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlanInvoices extends ListRecords
{
    protected static string $resource = PlanInvoiceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
