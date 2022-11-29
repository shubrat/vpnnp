<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait UploadFile
{
    public function uploadOneFile(UploadedFile $file, $folder = null, $filename = null): string
    {
        File::ensureDirectoryExists(public_path() . '/uploads/' . $folder);

        $name = !is_null($filename)
            ? $filename . '.' . $file->getClientOriginalExtension()
            : Str::random(25) . '.' . $file->getClientOriginalExtension();

        File::copy($file, getcwd() . '/uploads/' . $folder . $name);

        return $folder . $name;
    }

    public function deleteOneFile($path = null)
    {
        if ($path) {
            File::delete(getcwd() . '/uploads/' . $path);
        }
    }
}
