<?php

namespace App\Filament\Resources\Membership\PlanFeatureResource\Pages;

use App\Filament\Resources\Membership\PlanFeatureResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePlanFeature extends CreateRecord
{
    protected static string $resource = PlanFeatureResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
