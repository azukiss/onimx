<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function beforeSave(): void
    {
        if (!empty($this->record->avatar))
        {
            if (!empty(array_values($this->data['avatar'])) && $this->record->avatar != array_values($this->data['avatar'])[0])
            {
                File::delete(public_path($this->record->avatar));
            }
            elseif (empty(array_values($this->data['avatar'])))
            {
                File::delete(public_path($this->record->avatar));
            }
        }
    }

    protected function afterSave(): void
    {
        if (empty($this->record->email_verified_at) && $this->data['verified'] == true) {
            $this->record->verifyEmail();
        } elseif (!empty($this->record->email_verified_at) && $this->data['verified'] == false) {
            $this->record->unVerifyEmail();
        }

        if ($this->data['2fa'] == false) {
            $this->record->disableTwoFactor();
        }

        if (!empty($this->record->avatar))
        {
            $path = public_path($this->record->avatar);
            $image= Image::make($path);

            $image->fit(150, 150)->save($path);

            $image->destroy();
        }
    }
}
