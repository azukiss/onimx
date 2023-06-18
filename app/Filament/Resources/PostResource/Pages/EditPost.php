<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

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
//        if (!empty(array_values($this->record->image)))
//        {
//            foreach ($this->record->image as $image => $key)
//            {
//                if (!empty(array_values($this->data['image'])[$key]) && $this->record->image[$key] != array_values($this->data['image'])[$key])
//                {
//                    File::delete(public_path($image));
//                    File::delete(public_path(str_replace('uploads/post/', 'uploads/post/thumb/', $image)));
//                }
//                elseif (empty(array_values($this->data['image'])))
//                {
//                    File::delete(public_path($image));
//                    File::delete(public_path(str_replace('uploads/post/', 'uploads/post/thumb/', $image)));
//                }
//            }
//        }

//        dd(empty(array_diff(array_values($this->data['image']), array_values($this->record->image))));

        $oldImages = array_values($this->record->image);
        $newImages = array_values($this->data['image']);
        $diff = array_diff($oldImages, $newImages);

//        dd($diff);
//        if (!empty($diff))
//        {
//            foreach ($diff as $img)
//            {
//                $path = public_path($img);
//                $image = Image::make($path);
//
//                $image->resize(500, 500, function ($constraint) {
//                    $constraint->aspectRatio();
//                    $constraint->upsize();
//                });
//
//                $image->save($path);
//
//                $image->destroy();
//            }
//        }

        if (!empty($diff))
        {
            foreach ($diff as $img) {
                File::delete(public_path($img));
            }
        }
    }

    protected function afterSave(): void
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
                });

                $image->save($path);

                $image->destroy();

            }
        }
    }
}
