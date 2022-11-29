<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class ImageUploadService
{
    public function uploadImageFromRequestUrl(
        Request $request,
        Model   $model,
        string  $requestParam = 'image_url',
        string  $collectionName = 'image'
    ): void
    {
        if ($request->has($requestParam) && $request[$requestParam] != NULL) {
            $imagePath = explode(config('app.url') . '/', $request[$requestParam]);
            try {
                $model->addMedia(public_path($imagePath[1]))
                    ->preservingOriginal()
                    ->toMediaCollection($collectionName);
            } catch (FileCannotBeAdded $e) {
                abort(413, 'File size too big or there was some issue with upload. Please try again.');
            }
        }
    }


    public function uploadFromRequest(
        Request $request,
        Model   $model,
        string  $name = 'image',
        string  $collectionName = 'image'
    ): void
    {
        if ($request->hasFile($name) && $request->file($name)->isValid()) {
            try {
                $model->addMediaFromRequest($name)
                    ->preservingOriginal()
                    ->toMediaCollection($collectionName);
            } catch (FileDoesNotExist|FileIsTooBig $e) {
                abort(413, 'File size too big or there was some issue with upload. Please try again.');
            }
        }
    }


    public function uploadMultipleMediaFromRequest(
        Request $request,
        Model   $model,
        string  $requestParam = 'images',
        string  $collectionName = 'images'
    ): void
    {
        if ($request->has($requestParam) && $request[$requestParam] != NULL) {

            $gallery_image_urls = explode(',', $request[$requestParam]);

            foreach ($gallery_image_urls as $gallery_image_path) {
                $imagePath = explode(config('app.url') . '/', $gallery_image_path);

                try {
                    $model->addMedia(public_path($imagePath[1]))
                        ->preservingOriginal()
                        ->toMediaCollection($collectionName);
                } catch (FileCannotBeAdded $e) {
                    abort(413, 'File size too big or there was some issue with upload. Please try again.');
                }
            }
        }
    }


    
}