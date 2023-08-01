<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        if (!empty($this->record->avatar))
        {
            $path = public_path($this->record->avatar);
            $image= Image::make($path);

            $image->fit(150, 150)->save($path);

            Storage::disk(config('filesystems.default'))->put($this->record->avatar, $image->stream());
            $image->destroy();

            File::delete(public_path($this->record->avatar));
        }
    }
}
