<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait UploadImage
{

    public function uploadOne(UploadedFile $file, $folder = null, $width = null, $height = null, $filename = null, $thumb = false, $thumbWidth = null, $thumbHeight = null): string
    {
        // Check if the folder exists or not || If not this creates the required folder.
        File::ensureDirectoryExists(public_path() . '/uploads/' . $folder);

        $name = !is_null($filename)
            ? $filename . '.' . $file->getClientOriginalExtension()
            : Str::random(25) . '.' . $file->getClientOriginalExtension();

        if ($width == null || $height == null) {
            Image::make($file)
                ->save('uploads/' . $folder . $name);
        } else {
            Image::make($file)
                ->fit($width, $height)
                ->save('uploads/' . $folder . $name);
        }

        if ($thumb) {
            $this->uploadThumbnail($file, $folder, $name, $thumbWidth, $thumbHeight);
        }

        return $folder . $name;
    }

    public function uploadThumbnail($file, $folder, $name, $width = null, $height = null)
    {
        Image::make($file)->fit($width, $height)->save('uploads/thumb/' . $folder . $name);
    }

    public function deleteOne($path = null, $thumb = false)
    {
        if ($path) {
            File::delete('uploads/' . $path);

            if ($thumb) {
                File::delete('uploads/thumb/' . $path);
            }

        }
    }

    public function deleteFolder($path = null)
    {
        if ($path) {
            File::deleteDirectory('uploads/' . $path);
        }
    }

}
