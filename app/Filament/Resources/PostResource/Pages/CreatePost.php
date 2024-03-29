<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        if (!empty(array_values($this->record->image)))
        {
            foreach (array_values($this->record->image) as $img)
            {
                $path = public_path($img);
                $image = Image::make($path);

                $image->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path);

                Storage::disk(config('filesystems.default', 'public'))->put($img, $image->stream());
                $image->destroy();
            }
        }
    }
}
